<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affairs;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Governorate;
use App\Models\Town;
use App\Models\District;
use App\Models\StdHealth;
use App\Models\Year;
use App\Models\EduLevel;
use App\Models\Sublevel;
use App\Models\Term;
use App\Models\EduData1;
use App\Models\edudata;
use App\Models\stumatrial;


use Carbon\Carbon;


class StudentAffairController extends Controller
{


    public function login()
    {
        return view('StudentAffairs.login');
    }
    public function dologin(Request $request)
    {
        $data=$request->validate([
            'username'=>'required|email',
            'password'=>'required'
        ]);

       if(auth('affairs')->attempt($data)) {
       return redirect(url('affair/index'));
       }else{
        return redirect(url('affair/login'));

       }
    }
    public function logout()
    {
      auth()->guard('affairs')-> logout();
      return redirect(url('affair/login'));
    }

    public function index()
    {
        $data = Affairs::join('gender','students.GenderId','=','gender.id')
        ->join('nationality','students.NationalityId','=','nationality.id')
        ->join('religion','students.ReligionId','=','religion.id')
        ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
        ->join('town', 'students.TownId','=','town.id')
        ->join('district', 'students.DistrictId','=','district.id')
        ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
        ->join('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('terms.TermName','first term')
        ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
        ->orderby('id', 'asc')->get();
    //    dd($data);

        return view('StudentAffairs.affair_index',['data' =>$data]);
    }

    public function create()
    {

        $sex        = Gender::get();
        $nation     = Nationality::get();
        $relig      = Religion::get();
        $govern     = Governorate::get();
        $town       = Town::get();
        $dist       = District::get();
        $year       = Year::get();
        $level      = EduLevel::get();
        $sub        = Sublevel::join('educational_level','educational_level.id','=','sublevel.levelId')
        ->select('sublevel.*','educational_level.EduLevelName')->get();
        $term       = Term::get();//where('id',1)->

        return view('StudentAffairs.affair_create', [

            'sex'       => $sex ,
            'nation'    => $nation ,
            'relig'     => $relig ,
            'govern'    => $govern ,
            'town'      => $town ,
            'dist'      => $dist,
            'year'      => $year,
            'level'     => $level,
            'sub'       => $sub,
            'term'      =>$term
            // 'disease'   =>$disease,
        ]);
    }

// ---------------------------------------------------------------------------

    // ------------------------------------------------

    public function store(Request $request)
    {
        $data = $request->validate ([
            'Surname'       =>'required',
            'Name'          =>'required',
            'StudentSsn'    =>'required|numeric',
            'Birthdate'     =>'required',
            'GenderId'      =>'required|numeric',
            'NationalityId' =>'required|numeric',
            'ReligionId'    =>'required|numeric',
            'GovernorateId' =>'required|numeric',
            'TownId'        =>'required|numeric',
            'DistrictId'    =>'required|numeric',
            'FatherName'    =>'required',
            'FatherSsn'     =>'required|numeric',
            'FatherJob'     =>'required',
            'FatherPhone'   =>'required|numeric',
            'MotherName'    =>'required',
            'MotherSsn'     =>'required|numeric',
            'MotherJob'     =>'required',
            'MotherPhone'   =>'required|numeric',


            'chronic'       =>'required',
            'disease_name'  =>'required',
            'disease_degree'=>'required',
            'height'        =>'required',
            'weight'        =>'required',
            'extra_data'    =>'required',

            'AcdYearId'     =>'required|numeric',
            'LevelId'       =>'required|numeric',
           // 'TermId'        //=>'required|numeric'

        ]);
        $except = $request->except(['chronic','disease_name','disease_degree', 'height','weight','extra_data',
        'AcdYearId','LevelId','TermId',
        '_token' ]);
// dd($data);
        $ob = Affairs::create($except);

        $disease = StdHealth::create([
            'StudentSsn'     =>$ob->StudentSsn,
            'chronic'        =>$request->chronic,
            'disease_name'   =>$request->disease_name,
            'disease_degree' =>$request->disease_degree,
            'height'         =>$request->height,
            'weight'         =>$request->weight,
            'extra_data'     =>$request->extra_data
        ]) ;
        $edudata = EduData1::create([
            'StudentSsn'     =>$ob->StudentSsn,
            'AcdYearId'      =>$request->AcdYearId,
            'LevelId'        =>$request->LevelId,
            'TermId'         =>1//=>$request->TermId
        ]);
        $edudata2 = EduData1::create([
            'StudentSsn'     =>$ob->StudentSsn,
            'AcdYearId'      =>$request->AcdYearId,
            'LevelId'        =>$request->LevelId,
            'TermId'         =>2//=>$request->TermId
        ]);
        // dd($edudata);

        return redirect(url('affair/index'))->with('success','Student is created successfull...');
    }

    public function show($StudentSsn)
    {
        $data = Affairs::join('gender','students.GenderId','=','gender.id')
        ->join('nationality','students.NationalityId','=','nationality.id')
        ->join('religion','students.ReligionId','=','religion.id')
        ->join('governorate', 'students.GovernorateId','=','governorate.id')
        ->join('town', 'students.TownId','=','town.id')
        ->join('district', 'students.DistrictId','=','district.id')
        ->leftjoin('education_data', 'education_data.StudentSsn','=','students.StudentSsn')
        ->join('terms','education_data.TermId','=','terms.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->leftjoin('sublevel','sublevel.id','=','education_data.LevelId')
        ->leftjoin('educational_level','educational_level.id','=','sublevel.LevelId')
        ->leftjoin('student_disease','students.StudentSsn','=','student_disease.StudentSsn')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('terms.TermName','first term')
        ->select('students.*',
                  'gender.Sex',
                  'nationality.Nation',
                  'religion.ReligName',
                  'academicyear.year',
                  'educational_level.EduLevelName',
                  'sublevel.SubLevelName',
                  'governorate.GovName','town.TownName','district.DistrictName',
                  'student_disease.chronic','student_disease.disease_name','student_disease.disease_degree','student_disease.height','student_disease.weight','student_disease.extra_data')
                  ->get()->where('StudentSsn','=',$StudentSsn);

          return view('StudentAffairs.affair_show',['data'=>$data ]);
    }

    public function edit($id)
    {
        $nation      = Nationality::get();
        $sex         = Gender::get();
        $religion    = Religion::get();
        $govern      = Governorate::get();
        $town        = Town::get();
        $dist        = District::get();
        $data        = Affairs::find($id);
        $ssn = $data->StudentSsn;
        $disease     = StdHealth::where('StudentSsn','=',$ssn)->get();
        $edudata     = EduData1::where('StudentSsn','=',$ssn)->get();
        $year        = Year::get();
        $level       = EduLevel::get();
        $sub         = Sublevel::join('educational_level','educational_level.id','=','sublevel.levelId')
                             ->select('sublevel.SubLevelName','educational_level.EduLevelName')->get();

        return view('StudentAffairs.affair_edit',[
          'edudata'     =>$edudata,
          'data'        =>$data,
          'sex'         =>$sex ,
          'religion'    =>$religion ,
          'nation'      =>$nation,
          'disease'     =>$disease,
          'govern'      =>$govern,
          'town'        =>$town,
          'dist'        =>$dist,
          'year'        =>$year,
          'level'       =>$level,
          'sub'         =>$sub,
        ]);
    }

    public function update(Request $request)
    {
        $info= $request->validate([
            'Name'          =>'required|min:3',
            'Surname'       =>'required|min:2',
            'Birthdate'     =>'required',
            'StudentSsn'    =>'required|min:14|max:14',
            'GenderId'      =>'required|numeric',
            'NationalityId' =>'required|numeric',
            'ReligionId'    =>'required|numeric',

            'GovernorateId' =>'required|numeric',
            'TownId'        =>'required|numeric',
            'DistrictId'    =>'required|numeric',

            'FatherName'    =>'required',
            'FatherSsn'     =>'required|min:14|max:14',
            'FatherJob'     =>'required|min:4',
            'FatherPhone'   =>'required|numeric',
            'MotherName'    =>'required',
            'MotherSsn'     =>'required|min:14|max:14',
            'MotherJob'     =>'required|min:4',
            'MotherPhone'   =>'required|numeric',

            'chronic'    =>'required',
            'disease_name'=>'required',
            'disease_degree'=>'required|numeric',
            'height'      =>'required|numeric',
            'weight'      =>'required|numeric',
            'extra_data' =>'required',


            'AcdYearId'    ,// =>'required|numeric',
            'LevelId'      ,//=>'required',
            'TermId'       ,// =>'required'

          ]);
        //    dd($info);

         $data = $request->except([
         '_token','chronic','disease_name','disease_degree', 'height','weight','extra_data'
         ,'AcdYearId','LevelId','TermId',]);
        //    dd($data);
         $ob =Affairs::where('StudentSsn',$request->StudentSsn)->update($data);

           $disease=StdHealth::where('StudentSsn',$request->StudentSsn)->update([
            'chronic'       =>$request->chronic ,
            'disease_name'  =>$request->disease_name,
            'disease_degree'=>$request->disease_degree,
            'height'        =>$request->height,
            'weight'        =>$request->weight,
            'extra_data'    =>$request->extra_data
           ]);

           return redirect(url('affair/index'))->with('success','student updated successfully');
    }

    public function destroy($StudentSsn)
    {
        $data = Affairs::where('StudentSsn', $StudentSsn)->delete();
        return redirect(url('affair/index'))->with('success','student deleted successfully');
    }

    // ---------------------------------------------------------------------------------------------------------------------------



// ----------------------------------------------
public function edit2($id)
{

    $data        = Affairs::find($id);
    $ssn = $data->StudentSsn;
    $edudata     = EduData1::where('StudentSsn','=',$ssn)->get();
    $year        = Year::get();
    $level       = EduLevel::get();
    $sub        = Sublevel::get();
    

    return view('StudentAffairs.affair_upgrade',[
      'edudata'     =>$edudata,
      'data'        =>$data,
      'year'        =>$year,
      'level'       =>$level,
      'sub'         =>$sub,
    ]);
}

public function store2(Request $request)
{
    $data2 = $request->validate ([
        'StudentSsn'    =>'required|min:14|max:14',
        'AcdYearId'  =>'required'  ,
        'LevelId'    =>'required'  ,

    ]);

    $edudata = EduData1::create([
        'StudentSsn'     =>$request->StudentSsn,
        'AcdYearId'      =>$request->AcdYearId,
        'LevelId'        =>$request->LevelId,
        'TermId'         =>1//=>$request->TermId
    ]);
    $edudata2 = EduData1::create([
        'StudentSsn'     =>$request->StudentSsn,
        'AcdYearId'      =>$request->AcdYearId,
        'LevelId'        =>$request->LevelId ,
        'TermId'         =>2//=>$request->TermId
    ]);

    // dd($edudata);

    return redirect(url('affair/index'))->with('success','Student is created successfull...');
}


// ----------------------------------------------

public function f1(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','one')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f2(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','two')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f3(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','three')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f4(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','four')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f5(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','five')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f6(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','six')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();
    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f7(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','seven')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();
    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f8(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','eight')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f9(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','nine')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f10(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','ten')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f11(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','elevenL')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}

public function f12(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','elevenS')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}
public function f13(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','twelveL')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}
public function f14(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','twelveSM')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}
public function f15(){
    $data = Affairs::join('gender','students.GenderId','=','gender.id')
    ->join('nationality','students.NationalityId','=','nationality.id')
    ->join('religion','students.ReligionId','=','religion.id')
    ->join('governorate', 'students.GovernorateId','=', 'governorate.id')
    ->join('town', 'students.TownId','=','town.id')
    ->join('district', 'students.DistrictId','=','district.id')
    ->join('education_data','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->where('sublevel.SubLevelName','twelveSS')
    ->where( 'academicyear.year', Carbon::today()->year)
    ->where('terms.TermName','first term')
    ->select('students.*','gender.Sex','nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName')
    ->orderby('id', 'asc')->get();

    return view('StudentAffairs.affair_index', ['data'=>$data]);
}


}

