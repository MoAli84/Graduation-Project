<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\edudata;
use App\Models\edumatrial;
use App\Models\stumatrial;
use App\Models\stu;
use App\Models\behavior;
use App\Models\stubehavior;
use App\Models\sublevel;
use App\Models\Term;
use App\Models\Year;
use App\Models\eduactivity;
use App\Models\stuactivity;
use App\Models\absence;
use Carbon\Carbon;



class entryOfficerController extends Controller
{


    public function Adminhome()
    {
        return view('entryOfficer.entry-home');
    }

    public function login()
    {
        return view('entryOfficer.login');
    }
    public function dologin(Request $request)
    {
        $data=$request->validate([
            'username'=>'required|email',
            'password'=>'required'
        ]);

       if(auth()->guard('entry')->attempt($data)) {
       return redirect(url('entry/home'));
       }else{
        return redirect(url('/entry/login'));

       }
    }
    public function logout()
    {
      auth()->guard('entry')-> logout();
      return redirect(url('/entry/login'));
    }






//-------------------------home--------------------------
    public function entry()
    {
        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);

        return view('entryOfficer.entry-home',['p'=>$p,'pre'=>$pre,'sec'=>$sec]);
    }
//----------------------------------------------------------------------


//-------------------------index--------------------------
    public function l1($id){

        $d7=Term::get(['terms.TermName']);

        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);


        return view('entryOfficer.entry-levels',['id'=>$id,'d7'=>$d7,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
    }
//----------------------------------------------------------------------


//-------------------------matrials First term--------------------------
    public function matrialsF($id)
    {
        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);

        $d=Year::max('academicyear.year');

        $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','first term')
        ->where('academicyear.year',2022)
        ->get(['students.id','students.Name']);

        $d3=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','first term')
        ->get(['materials.MaterialName']);

        $d5=stu::join('student_material','students.StudentSsn','=','student_material.StudentSsn')
        ->join('education_data','students.StudentSsn','=','education_data.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('edumaterial','sublevel.id','=','edumaterial.LevelId')
        ->join('materials','student_material.MaterialId','=','materials.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->whereColumn('education_data.TermId','=','terms.id')
        ->whereColumn('edumaterial.MaterialId','=','materials.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','first term')
        ->where('academicyear.year',$d)
        ->get(['materials.MaterialName','student_material.Score','students.Name','materials.totalScore']);



        return view('entryOfficer.matrialsF',['id'=>$id,'d1'=>$d1,'d3'=>$d3,'d5'=>$d5,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
    }



    public function gradesF(Request $r,$id){
        $rr=$r->all();

        $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','first term')
        ->where('academicyear.year',Carbon::today()->year)
        ->whereIn('students.id',$rr['stuid'])
        ->get(['students.StudentSsn']);

        $d3=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','first term')
        ->whereIn('materials.MaterialName',$rr['matrails'])
        ->get('materials.id');

        $s=[];
        $s=$rr['score'];
        $i=0;

foreach($d1 as $dd1)
{
    foreach($d3 as $dd3)
    {
        if($s[$i]!==null)
        {
            stumatrial::updateOrCreate(['StudentSsn'=>$dd1['StudentSsn'],'MaterialId'=>$dd3['id']],['Score'=>$s[$i]]);
        }
$i++;
}
}
        return redirect()->route('e.l1',$id);
    }
//----------------------------------------------------------------------


//-------------------------matrials Second term--------------------------
public function matrialsS($id)
{
    $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);

        $d2=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','second term')
        ->where('academicyear.year',Carbon::today()->year)
        ->get(['students.id','students.Name']);

        $d4=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
        ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('materials','edumaterial.MaterialId','=','materials.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','second term')
        ->get(['materials.MaterialName']);

        $d6=stu::join('student_material','students.StudentSsn','=','student_material.StudentSsn')
        ->join('education_data','students.StudentSsn','=','education_data.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('edumaterial','sublevel.id','=','edumaterial.LevelId')
        ->join('materials','student_material.MaterialId','=','materials.id')
        ->join('terms','edumaterial.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->whereColumn('education_data.TermId','=','terms.id')
        ->whereColumn('edumaterial.MaterialId','=','materials.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','second term')
        ->where('academicyear.year',Carbon::today()->year)
        ->get(['materials.MaterialName','student_material.Score','students.Name','materials.totalScore']);

        return view('entryOfficer.matrialsS',['id'=>$id,'d2'=>$d2,'d4'=>$d4,'d6'=>$d6,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
}


public function gradesS(Request $r,$id){
    $rr=$r->all();

    $d2=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->where('academicyear.year',Carbon::today()->year)
    ->whereIn('students.id',$rr['stuid'])
    ->get(['students.StudentSsn']);

    $d4=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->whereIn('materials.MaterialName',$rr['matrails'])
    ->get('materials.id');

$s=[];
$s=$rr['score'];
$i=0;

foreach($d2 as $dd2)
{
foreach($d4 as $ddk4=> $dd4)
{
if($s[$i]!==null)
{
    stumatrial::updateOrCreate(['StudentSsn'=>$dd2['StudentSsn'],'MaterialId'=>$dd4['id']],['Score'=>$s[$i]]);
}
$i++;
}
}
return redirect()->route('e.l1',$id);
}
//----------------------------------------------------------------------


//-------------------------behavior First term--------------------------
    public function behaviorF($id)
    {
        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);

        return view('entryOfficer.behaviorF',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
    }


    public function behaviorF1(Request $r,$id){

        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);

        $rr=$r->all();

        $d1=stu::join('education_data','students.StudentSsn','=','education_data.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('students.id',$rr['studentid'])
        ->where('sublevel.id',$id)
        ->where('academicyear.year',Carbon::today()->year)
        ->where('terms.TermName','first term')
        ->get(['students.id','students.Name']);

        /* return redirect()->route('e.behaviorF',$id,['d1'=>$d1]); */

        return view('entryOfficer.behaviorF',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec,'d1'=>$d1]);

    }


    public function searchF(Request $r,$id){
        $rr=$r->all();

        $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','first term')
        ->where('academicyear.year',Carbon::today()->year)
        ->where('students.id',$rr['stuid'])
        ->get(['education_data.id']);

        $d2=behavior::where('behavior.type',$rr['flexRadioDefault'])
        ->get(['behavior.id']);

        foreach($d1 as $dd1)
        {
            foreach($d2 as $dd2)
            {
              stubehavior::Create(['educationDataId'=>$dd1['id'],'behavorId'=>$dd2['id'],'description'=>$rr['description']]);
            }
        }

        return redirect()->route('e.behaviorF',$id);
    }
//----------------------------------------------------------------------

//-------------------------behavior second term--------------------------
    public function behaviorS($id)
    {
        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);

        return view('entryOfficer.behaviorS',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
    }


    public function behaviorS1(Request $r,$id){

        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);

        $rr=$r->all();

        $d1=stu::join('education_data','students.StudentSsn','=','education_data.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('students.id',$rr['studentid'])
        ->where('sublevel.id',$id)
        ->where('academicyear.year',Carbon::today()->year)
        ->where('terms.TermName','second term')
        ->get(['students.id','students.Name']);

        /* return redirect()->route('e.behaviorF',$id,['d1'=>$d1]); */

        return view('entryOfficer.behaviorS',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec,'d1'=>$d1]);

    }


    public function searchS(Request $r,$id){
        $rr=$r->all();

        $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('terms','education_data.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','second term')
        ->where('academicyear.year',Carbon::today()->year)
        ->where('students.id',$rr['stuid'])
        ->get(['education_data.id']);

        $d2=behavior::where('behavior.type',$rr['flexRadioDefault'])
        ->get(['behavior.id']);

        foreach($d1 as $dd1)
        {
            foreach($d2 as $dd2)
            {
              stubehavior::Create(['educationDataId'=>$dd1['id'],'behavorId'=>$dd2['id'],'description'=>$rr['description']]);
            }
        }

        return redirect()->route('e.behaviorS',$id);
    }
//-------------------------------------------------------------------


//-------------------------activites First term--------------------------
public function activitesF($id)
{
    $p=sublevel::where('sublevel.LevelId',1)
    ->get(['sublevel.id']);

    $pre=sublevel::where('sublevel.LevelId',2)
    ->get(['sublevel.id']);

    $sec=sublevel::where('sublevel.LevelId',3)
    ->get(['sublevel.id']);

    $d=Year::max('academicyear.year');

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
    ->where('academicyear.year',$d)
    ->get(['students.id','students.Name']);

    $d3=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
        ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
        ->join('terms','eduactivity.TermId','=','terms.id')
        ->join('activities','eduactivity.ActivityId','=','activities.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','first term')
        ->get(['activities.ActivityName']);

        /* dd($d3); */

    $d5=stu::join('student_activity','students.StudentSsn','=','student_activity.StudentSsn')
        ->join('education_data','students.StudentSsn','=','education_data.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('eduactivity','sublevel.id','=','eduactivity.LevelId')
        ->join('activities','student_activity.ActivityId','=','activities.id')
        ->join('terms','eduactivity.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->whereColumn('education_data.TermId','=','terms.id')
        ->whereColumn('eduactivity.ActivityId','=','activities.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','first term')
        ->where('academicyear.year',$d)
        ->get(['activities.ActivityName','student_activity.Score','students.Name','activities.totalScore']);


    return view('entryOfficer.activitesF',['id'=>$id,'d1'=>$d1,'d3'=>$d3,'d5'=>$d5,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
}


public function scoresF(Request $r,$id){
    $rr=$r->all();

    $d=Year::max('academicyear.year');

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
    ->where('academicyear.year',$d)
    ->whereIn('students.id',$rr['stuid'])
    ->get(['students.StudentSsn']);

    $d3=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
    ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
    ->join('terms','eduactivity.TermId','=','terms.id')
    ->join('activities','eduactivity.ActivityId','=','activities.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
    ->whereIn('activities.ActivityName',$rr['activites'])
    ->get('activities.id');

    $s=[];
    $s=$rr['score'];
    $i=0;

foreach($d1 as $dd1)
{
foreach($d3 as $dd3)
{
    if($s[$i]!==null)
    {
        stuactivity::updateOrCreate(['StudentSsn'=>$dd1['StudentSsn'],'ActivityId'=>$dd3['id']],['Score'=>$s[$i]]);
    }
$i++;
}
}

    return redirect()->route('e.l1',$id);
}
//-------------------------------------------------------------------


//-------------------------activites second term--------------------------
public function activitesS($id)
{
    $p=sublevel::where('sublevel.LevelId',1)
    ->get(['sublevel.id']);

    $pre=sublevel::where('sublevel.LevelId',2)
    ->get(['sublevel.id']);

    $sec=sublevel::where('sublevel.LevelId',3)
    ->get(['sublevel.id']);

    $d=Year::max('academicyear.year');

    $d2=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->where('academicyear.year',$d)
    ->get(['students.id','students.Name']);

    $d4=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
        ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
        ->join('terms','eduactivity.TermId','=','terms.id')
        ->join('activities','eduactivity.ActivityId','=','activities.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','second term')
        ->get(['activities.ActivityName']);

    $d6=stu::join('student_activity','students.StudentSsn','=','student_activity.StudentSsn')
        ->join('education_data','students.StudentSsn','=','education_data.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('eduactivity','sublevel.id','=','eduactivity.LevelId')
        ->join('activities','student_activity.ActivityId','=','activities.id')
        ->join('terms','eduactivity.TermId','=','terms.id')
        ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
        ->whereColumn('education_data.TermId','=','terms.id')
        ->whereColumn('eduactivity.ActivityId','=','activities.id')
        ->where('sublevel.id',$id)
        ->where('terms.TermName','second term')
        ->where('academicyear.year',$d)
        ->get(['activities.ActivityName','student_activity.Score','students.Name','activities.totalScore']);



    return view('entryOfficer.activitesS',['id'=>$id,'d2'=>$d2,'d4'=>$d4,'d6'=>$d6,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
}


public function scoresS(Request $r,$id){
    $rr=$r->all();

    $d=Year::max('academicyear.year');

    $d2=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->where('academicyear.year',$d)
    ->whereIn('students.id',$rr['stuid'])
    ->get(['students.StudentSsn']);

    $d4=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
    ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
    ->join('terms','eduactivity.TermId','=','terms.id')
    ->join('activities','eduactivity.ActivityId','=','activities.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->whereIn('activities.ActivityName',$rr['activites'])
    ->get('activities.id');

    $s=[];
$s=$rr['score'];
$i=0;

foreach($d2 as $dd2)
{
foreach($d4 as $ddk4=> $dd4)
{
if($s[$i]!==null)
{
    stuactivity::updateOrCreate(['StudentSsn'=>$dd2['StudentSsn'],'ActivityId'=>$dd4['id']],['Score'=>$s[$i]]);
    }
$i++;
}
}

    return redirect()->route('e.l1',$id);
}
//-------------------------------------------------------------------


//-------------------------absence first term--------------------------
public function absenceF($id)
{
    $p=sublevel::where('sublevel.LevelId',1)
    ->get(['sublevel.id']);

    $pre=sublevel::where('sublevel.LevelId',2)
    ->get(['sublevel.id']);

    $sec=sublevel::where('sublevel.LevelId',3)
    ->get(['sublevel.id']);

    $d=Year::max('academicyear.year');

    return view('entryOfficer.absenceF',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
}


public function storeF(Request $r,$id){
    $rr=$r->all();

    $d=Year::max('academicyear.year');

    $date=Carbon::parse($rr['datee'])->format('Y');

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
    ->where('academicyear.year',$date)
    ->whereIn('students.id',$rr['stuid'])
    ->get(['education_data.id']);

    foreach($d1 as $dd1){

    if($d1!==null && $rr['datee']!==null)
    {
        absence::updateOrCreate(['educationDataId'=>$dd1['id'],'Date'=>$rr['datee']]);
    }

}

    return redirect()->route('e.l1',$id);
}
//-------------------------------------------------------------------


//-------------------------absence second term--------------------------
public function absenceS($id)
{
    $p=sublevel::where('sublevel.LevelId',1)
    ->get(['sublevel.id']);

    $pre=sublevel::where('sublevel.LevelId',2)
    ->get(['sublevel.id']);

    $sec=sublevel::where('sublevel.LevelId',3)
    ->get(['sublevel.id']);

    $d=Year::max('academicyear.year');

    return view('entryOfficer.absenceS',['id'=>$id,'p'=>$p,'pre'=>$pre,'sec'=>$sec]);
}


public function storeS(Request $r,$id){
    $rr=$r->all();

    $d=Year::max('academicyear.year');

    $date=Carbon::parse($rr['datee'])->format('Y');

    $d2=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->where('academicyear.year',$date)
    ->whereIn('students.id',$rr['stuid'])
    ->get(['education_data.id']);

    foreach($d2 as $dd2){

    if($d2!==null && $rr['datee']!==null)
    {
        absence::updateOrCreate(['educationDataId'=>$dd2['id'],'Date'=>$rr['datee']]);
    }

}

    return redirect()->route('e.l1',$id);
}

//-------------------------------------------------------------------

}
