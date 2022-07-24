<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\edudata;
use App\Models\sublevel;
use App\Models\edumatrial;
use App\Models\matrail;
use App\Models\stu;
use App\Models\stumatrial;
use App\Models\Year;
use App\Models\Term;
use App\Models\eduactivity;
use App\Models\absence;
use App\Models\academicyeardays;
use DB;
use Carbon\Carbon;

class managerController extends Controller
{

    //-------------------------home--------------------------
        public function home()
        {
            $p=sublevel::where('sublevel.LevelId',1)
            ->get(['sublevel.sublevel','sublevel.id']);

            $pre=sublevel::where('sublevel.LevelId',2)
            ->get(['sublevel.sublevel','sublevel.id']);

            $sec=sublevel::where('sublevel.LevelId',3)
            ->get(['sublevel.sublevel','sublevel.id']);

            $date=Year::max('academicyear.year');

            return view('manager.home',['p'=>$p,'pre'=>$pre,'sec'=>$sec]);
        }


        public function login()
        {
            return view('Manager.login');
        }
        public function dologin(Request $request)
        {
            $data=$request->validate([
                'username'=>'required|email',
                'password'=>'required'
            ]);

           if(auth()->guard('manager')->attempt($data)) {
                 return redirect(url('manager/home'));
           }else{
                 return redirect(url('manager/login'));
           }
        }
        public function logout()
        {
          auth()->guard('manager')-> logout();
          return redirect(url('manager/login'));
        }
    //    -----------


    //----------------------------------------------------------------------


    //-------------------------indexAnalysis--------------------------
    /* public function indexAnalysis($id)
    {
        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.sublevel','sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.sublevel','sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.sublevel','sublevel.id']);

        return view('manager.indexAnalysis',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
    } */
//----------------------------------------------------------------------


    //-------------------------indexReport--------------------------
    public function indexReport($id)
    {
        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.sublevel','sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.sublevel','sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.sublevel','sublevel.id']);

        $date=Year::max('academicyear.year');

        $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
            ->join('sublevel','education_data.LevelId','=','sublevel.id')
            ->join('terms','education_data.TermId','=','terms.id')
            ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
            ->where('sublevel.id',$id)
            ->where('academicyear.year',$date)
            ->distinct()
            ->get(['students.id','students.Name']);


        return view('manager.indexReport',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec,'d1'=>$d1]);
    }
//----------------------------------------------------------------------


//-------------------------search--------------------------
public function search(Request $r,$id)
    {
        $rr=$r->all();

        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.sublevel','sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.sublevel','sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.sublevel','sublevel.id']);

        $d=Year::max('academicyear.year');

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
    ->where('academicyear.year',$d)
    ->where('students.id',$rr['studentid'])
    ->get(['students.id','students.Name']);


    return view('manager.indexReport',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec,'d1'=>$d1]);
}
//----------------------------------------------------------------------


//-------------------------semesterReport1--------------------------
    public function semesterReport1($id)
    {
        $date=Year::max('academicyear.year');

        $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->where('students.id',$id)
        ->where('academicyear.year',$date)
        ->where('terms.TermName','first term')
        ->get(['students.id','students.Name','educational_level.EduLevelName','sublevel.sublevel','sublevel.SubLevelName','students.StudentSsn','terms.TermName']);
        /* dd($d1); */

        $arr=array();
        foreach($d1 as $dd1){
            array_push($arr,$dd1['TermName'],$dd1['id'],$dd1['Name'],$dd1['EduLevelName'],$dd1['sublevel']);
        }
        /* dd($arr); */

        foreach($d1 as $dd1){
        $d2=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->join('student_material','materials.id','=','student_material.MaterialId')
        ->where('student_material.StudentSsn',$dd1['StudentSsn'])
        ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
        ->where('terms.TermName','first term')
        ->get(['materials.MaterialName','student_material.Score','materials.totalScore']);
        }

        $arr1=array();
        foreach($d2 as $dd2){
        $array1=array();
        array_push($array1,$dd2['MaterialName'],$dd2['Score'],$dd2['totalScore']);
        array_push($arr1,$array1);
        $array1=array();
        }
        /* dd($arr1); */

            $d3=  edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
            ->join('sublevel','education_data.LevelId','=','sublevel.id')
            ->join('terms','education_data.TermId','=','terms.id')
            ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
            ->join('educational_level','sublevel.LevelId','=','educational_level.id')
            ->where('students.id',$id)
            ->where('academicyear.year',$date)
            ->where('terms.TermName','first term')
            ->get(['education_data.id']);
            /* dd($d3); */

            foreach($d3 as $dd3){
            $d4=  absence::where('absence.educationDataId',$dd3['id'])
            ->get(['absence.Date']);
            }
            $v=count($d4);
            /* dd($v); */


            $d5= academicyeardays::join('academicyear','academic_year_days.AcdYearId','=','academicyear.id')
            ->join('terms','academic_year_days.TermId','=','terms.id')
            ->where('terms.id',1)
            ->where('academicyear.year',$date)
            ->get(['academic_year_days.NumOfDays']);

            foreach($d5 as $dd5){
               $num=$dd5['NumOfDays'];
            }


            foreach($d1 as $dd1){
                $d6=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
                ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
                ->join('terms','eduactivity.TermId','=','terms.id')
                ->join('activities','eduactivity.ActivityId','=','activities.id')
                ->join('student_activity','activities.id','=','student_activity.ActivityId')
                ->where('student_activity.StudentSsn',$dd1['StudentSsn'])
                ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
                ->where('terms.TermName','first term')
                ->get(['activities.ActivityName','student_activity.Score']);
                }

                $arr2=array();
                foreach($d6 as $dd6){
                $array2=array();
                array_push($array2,$dd6['ActivityName'],$dd6['Score']);
                array_push($arr2,$array2);
                $array2=array();
                }
                /* dd($arr2); */

                $arr3=array();
                for($i=0;$i<count($arr1);$i++)
                {
                    $hold=$arr1[$i][1];
                    $holdd=$arr1[$i][2];
                    $rate = ($hold * 100) / $holdd;
                if ($rate < 50) {
                    $ratee = 'fail';
                } else if (($rate <= 65) && ($rate >= 50)) {
                    $ratee = 'bad';
                } else if (($rate <= 75) && ($rate > 65)) {
                    $ratee = 'good';
                } else if (($rate <= 85) && ($rate > 75)) {
                    $ratee = 'very good';
                } else if ($rate > 85) {
                    $ratee = 'excellent';
                }
                array_push($arr3,$ratee);
                }
                /* dd($arr3); */

                $summation = 0;
        for ($i = 0; $i < count($arr1); $i++) {
            $summation = $summation + $arr1[$i][1];
        }
        /* dd($summation); */

        return view('manager.SR1',['id'=>$id,'d1'=>$d1,'date'=>$date,'v'=>$v,'num'=>$num,'arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3,'arr'=>$arr,'summation'=>$summation]);
    }
//----------------------------------------------------------------------


//-------------------------semesterReport2--------------------------
public function semesterReport2($id)
{

$date=Year::max('academicyear.year');

        $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->where('students.id',$id)
        ->where('academicyear.year',$date)
        ->where('terms.TermName','second term')
        ->get(['students.id','students.Name','educational_level.EduLevelName','sublevel.sublevel','sublevel.SubLevelName','students.StudentSsn','terms.TermName']);
        /* dd($d1); */

        $arr=array();
        foreach($d1 as $dd1){
            array_push($arr,$dd1['TermName'],$dd1['id'],$dd1['Name'],$dd1['EduLevelName'],$dd1['sublevel']);
        }
        /* dd($arr); */

        foreach($d1 as $dd1){
        $d2=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->join('student_material','materials.id','=','student_material.MaterialId')
        ->where('student_material.StudentSsn',$dd1['StudentSsn'])
        ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
        ->where('terms.TermName','second term')
        ->get(['materials.MaterialName','student_material.Score','materials.totalScore']);
        }

        $arr1=array();
        foreach($d2 as $dd2){
        $array1=array();
        array_push($array1,$dd2['MaterialName'],$dd2['Score'],$dd2['totalScore']);
        array_push($arr1,$array1);
        $array1=array();
        }
        /* dd($arr1); */

            $d3=  edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
            ->join('sublevel','education_data.LevelId','=','sublevel.id')
            ->join('terms','education_data.TermId','=','terms.id')
            ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
            ->join('educational_level','sublevel.LevelId','=','educational_level.id')
            ->where('students.id',$id)
            ->where('academicyear.year',$date)
            ->where('terms.TermName','second term')
            ->get(['education_data.id']);
            /* dd($d3); */

            foreach($d3 as $dd3){
            $d4=  absence::where('absence.educationDataId',$dd3['id'])
            ->get(['absence.Date']);
            }
            $v=count($d4);
            /* dd($v); */


            $d5= academicyeardays::join('academicyear','academic_year_days.AcdYearId','=','academicyear.id')
            ->join('terms','academic_year_days.TermId','=','terms.id')
            ->where('terms.id',1)
            ->where('academicyear.year',$date)
            ->get(['academic_year_days.NumOfDays']);

            foreach($d5 as $dd5){
               $num=$dd5['NumOfDays'];
            }


            foreach($d1 as $dd1){
                $d6=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
                ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
                ->join('terms','eduactivity.TermId','=','terms.id')
                ->join('activities','eduactivity.ActivityId','=','activities.id')
                ->join('student_activity','activities.id','=','student_activity.ActivityId')
                ->where('student_activity.StudentSsn',$dd1['StudentSsn'])
                ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
                ->where('terms.TermName','second term')
                ->get(['activities.ActivityName','student_activity.Score']);
                }

                $arr2=array();
                foreach($d6 as $dd6){
                $array2=array();
                array_push($array2,$dd6['ActivityName'],$dd6['Score']);
                array_push($arr2,$array2);
                $array2=array();
                }
                /* dd($arr2); */

                $arr3=array();
                for($i=0;$i<count($arr1);$i++)
                {
                    $hold=$arr1[$i][1];
                    $holdd=$arr1[$i][2];
                    $rate = ($hold * 100) / $holdd;
                if ($rate < 50) {
                    $ratee = 'fail';
                } else if (($rate <= 65) && ($rate >= 50)) {
                    $ratee = 'bad';
                } else if (($rate <= 75) && ($rate > 65)) {
                    $ratee = 'good';
                } else if (($rate <= 85) && ($rate > 75)) {
                    $ratee = 'very good';
                } else if ($rate > 85) {
                    $ratee = 'excellent';
                }
                array_push($arr3,$ratee);
                }
                /* dd($arr3); */

                $summation = 0;
        for ($i = 0; $i < count($arr1); $i++) {
            $summation = $summation + $arr1[$i][1];
        }
        /* dd($summation); */

        return view('manager.SR2',['id'=>$id,'d1'=>$d1,'date'=>$date,'v'=>$v,'num'=>$num,'arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3,'arr'=>$arr,'summation'=>$summation]);
    }
//----------------------------------------------------------------------


//-------------------------academicYearReport--------------------------
public function academicYearReport($id)
{
    $date=Year::max('academicyear.year');

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->join('educational_level','sublevel.LevelId','=','educational_level.id')
    ->where('students.id',$id)
    ->where('academicyear.year',$date)
    ->distinct()
    ->get(['students.id','students.Name','educational_level.EduLevelName','sublevel.sublevel','sublevel.SubLevelName','students.StudentSsn']);
    /* dd($d1); */


        $arr1=array();
        foreach($d1 as $dd1){
      $d2=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
      ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
      ->join('terms','edumaterial.TermId','=','terms.id')
      ->join('materials','edumaterial.MaterialId','=','materials.id')
      ->join('student_material','materials.id','=','student_material.MaterialId')
      ->where('student_material.StudentSsn',$dd1['StudentSsn'])
      ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
      ->groupBy('terms.TermName')
      ->get(['terms.TermName',DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);

      $arr2=array();
      foreach($d2 as $dd2){
      array_push($arr2,$dd2['TermName'],$dd2['totalStuScore'],$dd2['totalMatrialScore']);
      array_push($arr1,$arr2);
      $arr2=array();
      }
        }
        /* dd($arr1); */


        $arr3=array();
        foreach($d1 as $dd1){
      $d3=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
      ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
      ->join('terms','edumaterial.TermId','=','terms.id')
      ->join('materials','edumaterial.MaterialId','=','materials.id')
      ->join('student_material','materials.id','=','student_material.MaterialId')
      ->where('student_material.StudentSsn',$dd1['StudentSsn'])
      ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
      ->groupBy('materials.MaterialName')
      ->get(['materials.MaterialName',DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);

      $arr4=array();
      foreach($d3 as $dd3){
      array_push($arr4,$dd3['MaterialName'],$dd3['totalStuScore'],$dd3['totalMatrialScore']);
      array_push($arr3,$arr4);
      $arr4=array();
      }
        }
        /* dd($arr3); */


        $arr5=array();
        foreach($d1 as $dd1){
        $d4=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->join('student_material','materials.id','=','student_material.MaterialId')
        ->where('student_material.StudentSsn',$dd1['StudentSsn'])
        ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
        ->where('terms.TermName','first term')
        ->get(['materials.MaterialName','student_material.Score','materials.totalScore']);

        $arr6=array();
        foreach($d4 as $dd4){
        array_push($arr6,$dd4['MaterialName'],$dd4['Score'],$dd4['totalScore']);
        array_push($arr5,$arr6);
        $arr6=array();
        }
    }
       /*  dd($arr5); */


       $arr7=array();
       foreach($d1 as $dd1){
       $d5=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
       ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
       ->join('terms','edumaterial.TermId','=','terms.id')
       ->join('materials','edumaterial.MaterialId','=','materials.id')
       ->join('student_material','materials.id','=','student_material.MaterialId')
       ->where('student_material.StudentSsn',$dd1['StudentSsn'])
       ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
       ->where('terms.TermName','second term')
       ->get(['materials.MaterialName','student_material.Score','materials.totalScore']);

       $arr8=array();
       foreach($d5 as $dd5){
       array_push($arr8,$dd5['MaterialName'],$dd5['Score'],$dd5['totalScore']);
       array_push($arr7,$arr8);
       $arr8=array();
       }
   }
   /* dd($arr7); */

   $arr9=array();
   foreach($d1 as $dd1){
   $d8=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
   ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
   ->join('terms','eduactivity.TermId','=','terms.id')
   ->join('activities','eduactivity.ActivityId','=','activities.id')
   ->join('student_activity','activities.id','=','student_activity.ActivityId')
   ->where('student_activity.StudentSsn',$dd1['StudentSsn'])
   ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
   ->where('terms.TermName','first term')
   ->get(['activities.ActivityName','student_activity.Score','activities.totalScore']);

   $arr10=array();
   foreach($d8 as $dd8){
   array_push($arr10,$dd8['ActivityName'],$dd8['Score'],$dd8['totalScore']);
   array_push($arr9,$arr10);
   $arr10=array();
   }
}


$arr11=array();
   foreach($d1 as $dd1){
   $d9=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
   ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
   ->join('terms','eduactivity.TermId','=','terms.id')
   ->join('activities','eduactivity.ActivityId','=','activities.id')
   ->join('student_activity','activities.id','=','student_activity.ActivityId')
   ->where('student_activity.StudentSsn',$dd1['StudentSsn'])
   ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
   ->where('terms.TermName','second term')
   ->get(['activities.ActivityName','student_activity.Score','activities.totalScore']);

   $arr12=array();
   foreach($d9 as $dd9){
   array_push($arr12,$dd9['ActivityName'],$dd9['Score'],$dd9['totalScore']);
   array_push($arr11,$arr12);
   $arr12=array();
   }
}

/* dd($arr9); */

$ar=array();
        foreach($d1 as $dd1){
            array_push($ar,$dd1['id'],$dd1['Name'],$dd1['EduLevelName'],$dd1['sublevel']);
        }


    return view('manager.AYR',['id'=>$id,'date'=>$date,'d1'=>$d1,'arr1'=>$arr1,'arr3'=>$arr3,'arr5'=>$arr5,'arr7'=>$arr7,'arr9'=>$arr9,'arr11'=>$arr11,'ar'=>$ar]);
}
//----------------------------------------------------------------------

//------------------------education stage----------------------------------------
    public function ESR($id)
    {

        $date=Year::max('academicyear.year');


        $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->where('students.id',$id)
        ->where('academicyear.year',$date)
        ->distinct()
        ->get(['students.id','students.Name','educational_level.EduLevelName']);


        $edlv=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->where('students.id',$id)
        ->where('academicyear.year',$date)
        ->distinct()
        ->get(['educational_level.EduLevelName','educational_level.id','students.StudentSsn']);


        $MaterialName=array();
        foreach($edlv as $edlvv){
        $d2=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->where('educational_level.EduLevelName',$edlvv['EduLevelName'])
        ->distinct()
        ->get(['materials.MaterialName']);
        }
        foreach($d2 as $dd2){
            array_push($MaterialName,$dd2['MaterialName']);
            /* $MaterialName[$dd2['MaterialName']] = $dd2['MaterialName']; */
            }
            /* dd($MaterialName); */


        $arr1=array();
       foreach($edlv as $edlvv){
        foreach($d2 as $dd2){
        $arr2=array();
        $d3=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->join('student_material','materials.id','=','student_material.MaterialId')
        ->where('student_material.StudentSsn',$edlvv['StudentSsn'])
        ->where('materials.MaterialName',$dd2['MaterialName'])
        ->where('educational_level.EduLevelName',$edlvv['EduLevelName'])
        /* ->groupBy('materials.MaterialName') */
        ->distinct()
        ->get(['materials.MaterialName','sublevel.SubLevelName']);
        foreach($d3 as $dd3){
        array_push($arr2,$dd3['id'],$dd3['SubLevelName']);
        }
        foreach($d3 as $dd3){
        $arr1[$dd3['MaterialName']] = $arr2;
        }
        $arr2=array();
        }
       }
       /* dd($arr1); */


      $ssn=stu::where('students.id',$id)
      ->get(['students.StudentSsn']);


      foreach($edlv as $edlvv){
        $levels=sublevel::where('sublevel.LevelId',$edlvv['id'])
            ->get(['sublevel.SubLevelName','sublevel.sublevel']);
      }
      /* dd($levels); */


      $x1=array();
      foreach($levels as $kllevels=>$llevels){
      foreach($ssn as $sssn){
      $d4=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
      ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
      ->join('terms','edumaterial.TermId','=','terms.id')
      ->join('materials','edumaterial.MaterialId','=','materials.id')
      ->join('student_material','materials.id','=','student_material.MaterialId')
      ->where('student_material.StudentSsn',$sssn['StudentSsn'])
      ->where('sublevel.SubLevelName',$llevels['SubLevelName'])
      ->groupBy('materials.MaterialName')
      ->get(['materials.MaterialName',DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);
      $x=array();
      foreach($d4 as $dd4){
      array_push($x,$llevels['sublevel'],$dd4['MaterialName'],$dd4['totalStuScore'],$dd4['totalMatrialScore']);
      array_push($x1,$x);
      $x=array();
      }
    }
    }
    /* dd($x1); */


    $array3=array();
    foreach($edlv as $edlvv){
        $d6=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->where('educational_level.EduLevelName',$edlvv['EduLevelName'])
        ->where('terms.TermName','first term')
        /* ->where('terms.TermName','second term') */
        ->distinct()
        ->get(['materials.MaterialName']);
        }
        foreach($d6 as $dd6){
            array_push($array3,$dd6['MaterialName']);
        }


        $array4=array();
    foreach($edlv as $edlvv){
        $d7=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->where('educational_level.EduLevelName',$edlvv['EduLevelName'])
        /* ->where('terms.TermName','first term') */
        ->where('terms.TermName','second term')
        ->distinct()
        ->get(['materials.MaterialName']);
        }
        foreach($d7 as $dd7){
            array_push($array4,$dd7['MaterialName']);
        }
        /* dd($array3); */


$val=min(count($array4),count($array3));
$vale=max(count($array4),count($array3));
$vall=abs(count($array4)-count($array3));
/* dd($vall); */

if (count($array3)> count($array4)) {
    $mm = $array3;
    $nn = $array4;
} else {
    $mm = $array4;
    $nn = $array3;
}

$array5=array();
        for($i=0;$i<$val;$i++)
        {
            for($j=0;$j<$vale;$j++)
        {
            if($nn[$i]==$mm[$j])
            {
                array_push($array5,$nn[$i]);
            }
        }
    }
   /*  dd($array5); */


    $array1=array();
      foreach($levels as $kllevels=>$llevels){
      $d5=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
      ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
      ->join('terms','edumaterial.TermId','=','terms.id')
      ->join('materials','edumaterial.MaterialId','=','materials.id')
      ->join('student_material','materials.id','=','student_material.MaterialId')
      ->where('sublevel.SubLevelName',$llevels['SubLevelName'])
      ->groupBy('materials.MaterialName')
      ->get(['materials.MaterialName',DB::raw('avg(student_material.Score) As totalStuScore')]);
      $array2=array();
      foreach($d5 as $dd5){
      array_push($array2,$llevels['sublevel'],$dd5['MaterialName'],$dd5['totalStuScore']);
      array_push($array1,$array2);
      $array2=array();
    }
    }


    for($i=0;$i<count($array5);$i++)
    {
        for($j=0;$j<count($array1);$j++)
        {
    if($array1[$j][1]==$array5[$i])
    {
        $array1[$j][2]=$array1[$j][2]*2;
    }
        }
    }
    /* dd($array1); */


    $array6=array();
    foreach($levels as $kllevels=>$llevels){
    foreach($ssn as $sssn){
    $d6=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->join('student_material','materials.id','=','student_material.MaterialId')
    ->where('student_material.StudentSsn',$sssn['StudentSsn'])
    ->where('sublevel.SubLevelName',$llevels['SubLevelName'])
    ->where('terms.TermName','first term')
    ->get([DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);
    $array7=array();
    foreach($d6 as $dd6){
    array_push($array7,$llevels['sublevel'],$dd6['totalStuScore'],$dd6['totalMatrialScore']);
    array_push($array6,$array7);
    $array7=array();
    }
  }
  }

  $array7=array();
    foreach($levels as $kllevels=>$llevels){
    foreach($ssn as $sssn){
    $d7=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->join('student_material','materials.id','=','student_material.MaterialId')
    ->where('student_material.StudentSsn',$sssn['StudentSsn'])
    ->where('sublevel.SubLevelName',$llevels['SubLevelName'])
    ->where('terms.TermName','second term')
    ->get([DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);
    $array8=array();
    foreach($d7 as $dd7){
    array_push($array8,$llevels['sublevel'],$dd7['totalStuScore'],$dd7['totalMatrialScore']);
    array_push($array7,$array8);
    $array8=array();
    }
  }
  }

  /* dd($array7); */

  $ar=array();
        foreach($d1 as $dd1){
            array_push($ar,$dd1['id'],$dd1['Name'],$dd1['EduLevelName']);
        }

        foreach($d1 as $dd1){
            $eedulv=$dd1['EduLevelName'];
        }

        return view('manager.ESR',['id'=>$id,'date'=>$date,'d1'=>$d1,'d2'=>$d2,'arr1'=>$arr1,'MaterialName'=>$MaterialName,'x1'=>$x1,'array1'=>$array1,'array6'=>$array6,'array7'=>$array7,'ar'=>$ar,'eedulv'=>$eedulv]);
    }

//----------------------------------------------------------------------

//-------------------------history--------------------------
    public function history($id)
    {

        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.sublevel','sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.sublevel','sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.sublevel','sublevel.id']);


        return view('manager.history',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
    }
//----------------------------------------------------------------------

//-------------------------search history--------------------------
public function searchYear(Request $r,$id)
    {
        $rr=$r->all();

        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.sublevel','sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.sublevel','sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.sublevel','sublevel.id']);

        $yyear=Year::where('academicyear.year',$rr['year'])
        ->get(['academicyear.year']);

        $yyearr=0;
        foreach ($yyear as $yyear1){
            $yyearr=$yyear1['year'];
        }
        /* dd($yyearr); */


    return view('manager.history',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec,'yyearr'=>$yyearr]);
}
//----------------------------------------------------------------------




//-------------------------semesterReport1 old--------------------------
public function semesterReport1Old($id, $yyearr)
{

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->join('educational_level','sublevel.LevelId','=','educational_level.id')
    ->where('students.id',$id)
    ->where('academicyear.year',$yyearr)
    ->where('terms.TermName','first term')
    ->get(['students.id','students.Name','educational_level.EduLevelName','sublevel.sublevel','sublevel.SubLevelName','students.StudentSsn','terms.TermName']);
    /* dd($d1); */

    $arr=array();
    foreach($d1 as $dd1){
        array_push($arr,$dd1['TermName'],$dd1['id'],$dd1['Name'],$dd1['EduLevelName'],$dd1['sublevel']);
    }
    /* dd($arr); */

    foreach($d1 as $dd1){
    $d2=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->join('student_material','materials.id','=','student_material.MaterialId')
    ->where('student_material.StudentSsn',$dd1['StudentSsn'])
    ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
    ->where('terms.TermName','first term')
    ->get(['materials.MaterialName','student_material.Score','materials.totalScore']);
    }

    $arr1=array();
    foreach($d2 as $dd2){
    $array1=array();
    array_push($array1,$dd2['MaterialName'],$dd2['Score'],$dd2['totalScore']);
    array_push($arr1,$array1);
    $array1=array();
    }
    /* dd($arr1); */

        $d3=  edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->where('students.id',$id)
        ->where('academicyear.year',$yyearr)
        ->where('terms.TermName','first term')
        ->get(['education_data.id']);
        /* dd($d3); */

        foreach($d3 as $dd3){
        $d4=  absence::where('absence.educationDataId',$dd3['id'])
        ->get(['absence.Date']);
        }
        $v=count($d4);
        /* dd($v); */


        $d5= academicyeardays::join('academicyear','academic_year_days.AcdYearId','=','academicyear.id')
        ->join('terms','academic_year_days.TermId','=','terms.id')
        ->where('terms.id',1)
        ->where('academicyear.year',$yyearr)
        ->get(['academic_year_days.NumOfDays']);

        $num=0;
        foreach($d5 as $dd5){
           $num=$dd5['NumOfDays'];
        }
/* dd($num); */

        foreach($d1 as $dd1){
            $d6=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
            ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
            ->join('terms','eduactivity.TermId','=','terms.id')
            ->join('activities','eduactivity.ActivityId','=','activities.id')
            ->join('student_activity','activities.id','=','student_activity.ActivityId')
            ->where('student_activity.StudentSsn',$dd1['StudentSsn'])
            ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
            ->where('terms.TermName','first term')
            ->get(['activities.ActivityName','student_activity.Score']);
            }

            $arr2=array();
            foreach($d6 as $dd6){
            $array2=array();
            array_push($array2,$dd6['ActivityName'],$dd6['Score']);
            array_push($arr2,$array2);
            $array2=array();
            }
            /* dd($arr2); */

            $arr3=array();
            for($i=0;$i<count($arr1);$i++)
            {
                $hold=$arr1[$i][1];
                $holdd=$arr1[$i][2];
                $rate = ($hold * 100) / $holdd;
            if ($rate < 50) {
                $ratee = 'fail';
            } else if (($rate <= 65) && ($rate >= 50)) {
                $ratee = 'bad';
            } else if (($rate <= 75) && ($rate > 65)) {
                $ratee = 'good';
            } else if (($rate <= 85) && ($rate > 75)) {
                $ratee = 'very good';
            } else if ($rate > 85) {
                $ratee = 'excellent';
            }
            array_push($arr3,$ratee);
            }
            /* dd($arr3); */

            $summation = 0;
    for ($i = 0; $i < count($arr1); $i++) {
        $summation = $summation + $arr1[$i][1];
    }
    /* dd($summation); */

    return view('manager.SR1History',['id'=>$id,'d1'=>$d1,'yyearr'=>$yyearr,'v'=>$v,'num'=>$num,'arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3,'arr'=>$arr,'summation'=>$summation]);
}
//----------------------------------------------------------------------


//-------------------------semesterReport2 old--------------------------
public function semesterReport2Old($id, $yyearr)
{

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->join('educational_level','sublevel.LevelId','=','educational_level.id')
    ->where('students.id',$id)
    ->where('academicyear.year',$yyearr)
    ->where('terms.TermName','second term')
    ->get(['students.id','students.Name','educational_level.EduLevelName','sublevel.sublevel','sublevel.SubLevelName','students.StudentSsn','terms.TermName']);
    /* dd($d1); */

    $arr=array();
    foreach($d1 as $dd1){
        array_push($arr,$dd1['TermName'],$dd1['id'],$dd1['Name'],$dd1['EduLevelName'],$dd1['sublevel']);
    }
    /* dd($arr); */

    foreach($d1 as $dd1){
    $d2=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->join('student_material','materials.id','=','student_material.MaterialId')
    ->where('student_material.StudentSsn',$dd1['StudentSsn'])
    ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
    ->where('terms.TermName','second term')
    ->get(['materials.MaterialName','student_material.Score','materials.totalScore']);
    }

    $arr1=array();
    foreach($d2 as $dd2){
    $array1=array();
    array_push($array1,$dd2['MaterialName'],$dd2['Score'],$dd2['totalScore']);
    array_push($arr1,$array1);
    $array1=array();
    }
    /* dd($arr1); */

        $d3=  edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->where('students.id',$id)
        ->where('academicyear.year',$yyearr)
        ->where('terms.TermName','second term')
        ->get(['education_data.id']);
        /* dd($d3); */

        foreach($d3 as $dd3){
        $d4=  absence::where('absence.educationDataId',$dd3['id'])
        ->get(['absence.Date']);
        }
        $v=count($d4);
        /* dd($v); */


        $d5= academicyeardays::join('academicyear','academic_year_days.AcdYearId','=','academicyear.id')
        ->join('terms','academic_year_days.TermId','=','terms.id')
        ->where('terms.id',1)
        ->where('academicyear.year',$yyearr)
        ->get(['academic_year_days.NumOfDays']);

        $num=0;
        foreach($d5 as $dd5){
           $num=$dd5['NumOfDays'];
        }


        foreach($d1 as $dd1){
            $d6=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
            ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
            ->join('terms','eduactivity.TermId','=','terms.id')
            ->join('activities','eduactivity.ActivityId','=','activities.id')
            ->join('student_activity','activities.id','=','student_activity.ActivityId')
            ->where('student_activity.StudentSsn',$dd1['StudentSsn'])
            ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
            ->where('terms.TermName','second term')
            ->get(['activities.ActivityName','student_activity.Score']);
            }

            $arr2=array();
            foreach($d6 as $dd6){
            $array2=array();
            array_push($array2,$dd6['ActivityName'],$dd6['Score']);
            array_push($arr2,$array2);
            $array2=array();
            }
            /* dd($arr2); */

            $arr3=array();
            for($i=0;$i<count($arr1);$i++)
            {
                $hold=$arr1[$i][1];
                $holdd=$arr1[$i][2];
                $rate = ($hold * 100) / $holdd;
            if ($rate < 50) {
                $ratee = 'fail';
            } else if (($rate <= 65) && ($rate >= 50)) {
                $ratee = 'bad';
            } else if (($rate <= 75) && ($rate > 65)) {
                $ratee = 'good';
            } else if (($rate <= 85) && ($rate > 75)) {
                $ratee = 'very good';
            } else if ($rate > 85) {
                $ratee = 'excellent';
            }
            array_push($arr3,$ratee);
            }
            /* dd($arr3); */

            $summation = 0;
    for ($i = 0; $i < count($arr1); $i++) {
        $summation = $summation + $arr1[$i][1];
    }
    /* dd($summation); */

    return view('manager.SR2History',['id'=>$id,'d1'=>$d1,'yyearr'=>$yyearr,'v'=>$v,'num'=>$num,'arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3,'arr'=>$arr,'summation'=>$summation]);
}
//----------------------------------------------------------------------


//-------------------------academicYearReport old--------------------------
public function academicYearReportOld($id, $yyearr)
{

$d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
->join('sublevel','education_data.LevelId','=','sublevel.id')
->join('terms','education_data.TermId','=','terms.id')
->join('academicyear','education_data.AcdYearId','=','academicyear.id')
->join('educational_level','sublevel.LevelId','=','educational_level.id')
->where('students.id',$id)
->where('academicyear.year',$yyearr)
->distinct()
->get(['students.id','students.Name','educational_level.EduLevelName','sublevel.sublevel','sublevel.SubLevelName','students.StudentSsn']);
/* dd($d1); */


    $arr1=array();
    foreach($d1 as $dd1){
  $d2=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
  ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
  ->join('terms','edumaterial.TermId','=','terms.id')
  ->join('materials','edumaterial.MaterialId','=','materials.id')
  ->join('student_material','materials.id','=','student_material.MaterialId')
  ->where('student_material.StudentSsn',$dd1['StudentSsn'])
  ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
  ->groupBy('terms.TermName')
  ->get(['terms.TermName',DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);

  $arr2=array();
  foreach($d2 as $dd2){
  array_push($arr2,$dd2['TermName'],$dd2['totalStuScore'],$dd2['totalMatrialScore']);
  array_push($arr1,$arr2);
  $arr2=array();
  }
    }
    /* dd($arr1); */


    $arr3=array();
    foreach($d1 as $dd1){
  $d3=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
  ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
  ->join('terms','edumaterial.TermId','=','terms.id')
  ->join('materials','edumaterial.MaterialId','=','materials.id')
  ->join('student_material','materials.id','=','student_material.MaterialId')
  ->where('student_material.StudentSsn',$dd1['StudentSsn'])
  ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
  ->groupBy('materials.MaterialName')
  ->get(['materials.MaterialName',DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);

  $arr4=array();
  foreach($d3 as $dd3){
  array_push($arr4,$dd3['MaterialName'],$dd3['totalStuScore'],$dd3['totalMatrialScore']);
  array_push($arr3,$arr4);
  $arr4=array();
  }
    }
    /* dd($arr3); */


    $arr5=array();
    foreach($d1 as $dd1){
    $d4=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->join('student_material','materials.id','=','student_material.MaterialId')
    ->where('student_material.StudentSsn',$dd1['StudentSsn'])
    ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
    ->where('terms.TermName','first term')
    ->get(['materials.MaterialName','student_material.Score','materials.totalScore']);

    $arr6=array();
    foreach($d4 as $dd4){
    array_push($arr6,$dd4['MaterialName'],$dd4['Score'],$dd4['totalScore']);
    array_push($arr5,$arr6);
    $arr6=array();
    }
}
   /*  dd($arr5); */


   $arr7=array();
   foreach($d1 as $dd1){
   $d5=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
   ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
   ->join('terms','edumaterial.TermId','=','terms.id')
   ->join('materials','edumaterial.MaterialId','=','materials.id')
   ->join('student_material','materials.id','=','student_material.MaterialId')
   ->where('student_material.StudentSsn',$dd1['StudentSsn'])
   ->where('sublevel.SubLevelName',$dd1['SubLevelName'])
   ->where('terms.TermName','second term')
   ->get(['materials.MaterialName','student_material.Score','materials.totalScore']);

   $arr8=array();
   foreach($d5 as $dd5){
   array_push($arr8,$dd5['MaterialName'],$dd5['Score'],$dd5['totalScore']);
   array_push($arr7,$arr8);
   $arr8=array();
   }
}
/* dd($arr7); */

$arr9=array();
foreach($d1 as $dd1){
$d8=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
->join('sublevel','eduactivity.LevelId','=','sublevel.id')
->join('terms','eduactivity.TermId','=','terms.id')
->join('activities','eduactivity.ActivityId','=','activities.id')
->join('student_activity','activities.id','=','student_activity.ActivityId')
->where('student_activity.StudentSsn',$dd1['StudentSsn'])
->where('sublevel.SubLevelName',$dd1['SubLevelName'])
->where('terms.TermName','first term')
->get(['activities.ActivityName','student_activity.Score','activities.totalScore']);

$arr10=array();
foreach($d8 as $dd8){
array_push($arr10,$dd8['ActivityName'],$dd8['Score'],$dd8['totalScore']);
array_push($arr9,$arr10);
$arr10=array();
}
}


$arr11=array();
foreach($d1 as $dd1){
$d9=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
->join('sublevel','eduactivity.LevelId','=','sublevel.id')
->join('terms','eduactivity.TermId','=','terms.id')
->join('activities','eduactivity.ActivityId','=','activities.id')
->join('student_activity','activities.id','=','student_activity.ActivityId')
->where('student_activity.StudentSsn',$dd1['StudentSsn'])
->where('sublevel.SubLevelName',$dd1['SubLevelName'])
->where('terms.TermName','second term')
->get(['activities.ActivityName','student_activity.Score','activities.totalScore']);

$arr12=array();
foreach($d9 as $dd9){
array_push($arr12,$dd9['ActivityName'],$dd9['Score'],$dd9['totalScore']);
array_push($arr11,$arr12);
$arr12=array();
}
}

/* dd($arr9); */

$ar=array();
    foreach($d1 as $dd1){
        array_push($ar,$dd1['id'],$dd1['Name'],$dd1['EduLevelName'],$dd1['sublevel']);
    }


return view('manager.AYRHistory',['id'=>$id,'yyearr'=>$yyearr,'d1'=>$d1,'arr1'=>$arr1,'arr3'=>$arr3,'arr5'=>$arr5,'arr7'=>$arr7,'arr9'=>$arr9,'arr11'=>$arr11,'ar'=>$ar]);
}
//----------------------------------------------------------------------

//------------------------education stage old----------------------------------------
public function ESROld($id, $yyearr)
{

    $date=Year::max('academicyear.year');


    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->join('educational_level','sublevel.LevelId','=','educational_level.id')
    ->where('students.id',$id)
    ->where('academicyear.year',$yyearr)
    ->distinct()
    ->get(['students.id','students.Name','educational_level.EduLevelName']);


    $edlv=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->join('educational_level','sublevel.LevelId','=','educational_level.id')
    ->where('students.id',$id)
    ->where('academicyear.year',$yyearr)
    ->distinct()
    ->get(['educational_level.EduLevelName','educational_level.id','students.StudentSsn']);


    $MaterialName=array();
    foreach($edlv as $edlvv){
    $d2=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->where('educational_level.EduLevelName',$edlvv['EduLevelName'])
    ->distinct()
    ->get(['materials.MaterialName']);
    }
    foreach($d2 as $dd2){
        array_push($MaterialName,$dd2['MaterialName']);
        /* $MaterialName[$dd2['MaterialName']] = $dd2['MaterialName']; */
        }
        /* dd($MaterialName); */


    $arr1=array();
   foreach($edlv as $edlvv){
    foreach($d2 as $dd2){
    $arr2=array();
    $d3=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->join('student_material','materials.id','=','student_material.MaterialId')
    ->where('student_material.StudentSsn',$edlvv['StudentSsn'])
    ->where('materials.MaterialName',$dd2['MaterialName'])
    ->where('educational_level.EduLevelName',$edlvv['EduLevelName'])
    /* ->groupBy('materials.MaterialName') */
    ->distinct()
    ->get(['materials.MaterialName','sublevel.SubLevelName']);
    foreach($d3 as $dd3){
    array_push($arr2,$dd3['id'],$dd3['SubLevelName']);
    }
    foreach($d3 as $dd3){
    $arr1[$dd3['MaterialName']] = $arr2;
    }
    $arr2=array();
    }
   }
   /* dd($arr1); */


  $ssn=stu::where('students.id',$id)
  ->get(['students.StudentSsn']);


  foreach($edlv as $edlvv){
    $levels=sublevel::where('sublevel.LevelId',$edlvv['id'])
        ->get(['sublevel.SubLevelName','sublevel.sublevel']);
  }
  /* dd($levels); */


  $x1=array();
  foreach($levels as $kllevels=>$llevels){
  foreach($ssn as $sssn){
  $d4=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
  ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
  ->join('terms','edumaterial.TermId','=','terms.id')
  ->join('materials','edumaterial.MaterialId','=','materials.id')
  ->join('student_material','materials.id','=','student_material.MaterialId')
  ->where('student_material.StudentSsn',$sssn['StudentSsn'])
  ->where('sublevel.SubLevelName',$llevels['SubLevelName'])
  ->groupBy('materials.MaterialName')
  ->get(['materials.MaterialName',DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);
  $x=array();
  foreach($d4 as $dd4){
  array_push($x,$llevels['sublevel'],$dd4['MaterialName'],$dd4['totalStuScore'],$dd4['totalMatrialScore']);
  array_push($x1,$x);
  $x=array();
  }
}
}
/* dd($x1); */


$array3=array();
foreach($edlv as $edlvv){
    $d6=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->where('educational_level.EduLevelName',$edlvv['EduLevelName'])
    ->where('terms.TermName','first term')
    /* ->where('terms.TermName','second term') */
    ->distinct()
    ->get(['materials.MaterialName']);
    }
    foreach($d6 as $dd6){
        array_push($array3,$dd6['MaterialName']);
    }


    $array4=array();
foreach($edlv as $edlvv){
    $d7=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->where('educational_level.EduLevelName',$edlvv['EduLevelName'])
    /* ->where('terms.TermName','first term') */
    ->where('terms.TermName','second term')
    ->distinct()
    ->get(['materials.MaterialName']);
    }
    foreach($d7 as $dd7){
        array_push($array4,$dd7['MaterialName']);
    }
    /* dd($array3); */


$val=min(count($array4),count($array3));
$vale=max(count($array4),count($array3));
$vall=abs(count($array4)-count($array3));
/* dd($vall); */

if (count($array3)> count($array4)) {
$mm = $array3;
$nn = $array4;
} else {
$mm = $array4;
$nn = $array3;
}

$array5=array();
    for($i=0;$i<$val;$i++)
    {
        for($j=0;$j<$vale;$j++)
    {
        if($nn[$i]==$mm[$j])
        {
            array_push($array5,$nn[$i]);
        }
    }
}
/*  dd($array5); */


$array1=array();
  foreach($levels as $kllevels=>$llevels){
  $d5=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
  ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
  ->join('terms','edumaterial.TermId','=','terms.id')
  ->join('materials','edumaterial.MaterialId','=','materials.id')
  ->join('student_material','materials.id','=','student_material.MaterialId')
  ->where('sublevel.SubLevelName',$llevels['SubLevelName'])
  ->groupBy('materials.MaterialName')
  ->get(['materials.MaterialName',DB::raw('avg(student_material.Score) As totalStuScore')]);
  $array2=array();
  foreach($d5 as $dd5){
  array_push($array2,$llevels['sublevel'],$dd5['MaterialName'],$dd5['totalStuScore']);
  array_push($array1,$array2);
  $array2=array();
}
}


for($i=0;$i<count($array5);$i++)
{
    for($j=0;$j<count($array1);$j++)
    {
if($array1[$j][1]==$array5[$i])
{
    $array1[$j][2]=$array1[$j][2]*2;
}
    }
}
/* dd($array1); */


$array6=array();
foreach($levels as $kllevels=>$llevels){
foreach($ssn as $sssn){
$d6=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
->join('sublevel','edumaterial.LevelId','=','sublevel.id')
->join('terms','edumaterial.TermId','=','terms.id')
->join('materials','edumaterial.MaterialId','=','materials.id')
->join('student_material','materials.id','=','student_material.MaterialId')
->where('student_material.StudentSsn',$sssn['StudentSsn'])
->where('sublevel.SubLevelName',$llevels['SubLevelName'])
->where('terms.TermName','first term')
->get([DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);
$array7=array();
foreach($d6 as $dd6){
array_push($array7,$llevels['sublevel'],$dd6['totalStuScore'],$dd6['totalMatrialScore']);
array_push($array6,$array7);
$array7=array();
}
}
}

$array7=array();
foreach($levels as $kllevels=>$llevels){
foreach($ssn as $sssn){
$d7=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
->join('sublevel','edumaterial.LevelId','=','sublevel.id')
->join('terms','edumaterial.TermId','=','terms.id')
->join('materials','edumaterial.MaterialId','=','materials.id')
->join('student_material','materials.id','=','student_material.MaterialId')
->where('student_material.StudentSsn',$sssn['StudentSsn'])
->where('sublevel.SubLevelName',$llevels['SubLevelName'])
->where('terms.TermName','second term')
->get([DB::raw('SUM(student_material.Score) As totalStuScore'),DB::raw('SUM(materials.totalScore) As totalMatrialScore')]);
$array8=array();
foreach($d7 as $dd7){
array_push($array8,$llevels['sublevel'],$dd7['totalStuScore'],$dd7['totalMatrialScore']);
array_push($array7,$array8);
$array8=array();
}
}
}

/* dd($array7); */

$ar=array();
    foreach($d1 as $dd1){
        array_push($ar,$dd1['id'],$dd1['Name'],$dd1['EduLevelName']);
    }

    foreach($d1 as $dd1){
        $eedulv=$dd1['EduLevelName'];
    }

    return view('manager.ESRHistory',['id'=>$id,'yyearr'=>$yyearr,'d1'=>$d1,'d2'=>$d2,'arr1'=>$arr1,'MaterialName'=>$MaterialName,'x1'=>$x1,'array1'=>$array1,'array6'=>$array6,'array7'=>$array7,'ar'=>$ar,'eedulv'=>$eedulv]);
}

//----------------------------------------------------------------------




}
