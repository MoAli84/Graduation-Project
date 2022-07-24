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

use Carbon\Carbon;

class DoctorController extends Controller
{
    public function doctorhome()
    {
        return view('Doctor.doctor_home');
    }

    public function login()
    {
        return view('Doctor.login');
    }
    public function dologin(Request $request)
    {
        $data=$request->validate([
            'username'=>'required|email',
            'password'=>'required'
        ]);

       if(auth()->guard('doctors')->attempt($data)) {
             return redirect(url('/doctorHome'));
       }else{
             return redirect(url('doctor/login'));
       }
    }
    public function logout()
    {
      auth()->guard('doctors')-> logout();
      return redirect(url('doctor/login'));
    }
//    --------------------------------------------
    public function index()
    {
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->orderby('id','asc')
        ->get();

        return view('Doctor.doctor_index',['data'=>$data]);
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
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->leftjoin('sublevel','sublevel.id','=','education_data.LevelId')
        ->leftjoin('educational_level','educational_level.id','=','sublevel.LevelId')
        ->leftjoin('student_disease','students.StudentSsn','=','student_disease.StudentSsn')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where( 'academicyear.year', Carbon::today()->year)
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

          return view('Doctor.doctor_show',['data'=>$data ]);
    }

    public function edit($id)
    {
        $data        =StdHealth::find($id);
        $ssn = $data->StudentSsn;
        $disease     = StdHealth::where('StudentSsn','=',$ssn)->get();
        $edudata     = EduData1::where('StudentSsn','=',$ssn)->get();

        return view('Doctor.doctor_edit',[
          'edudata'     =>$edudata,
          'data'        =>$data,
          'disease'     =>$disease,
        ]);
    }

    public function update(Request $request)
    {
        $info= $request->validate([
            'chronic'    =>'required',
            'disease_name'=>'required',
            'disease_degree'=>'required|numeric',
            'height'      =>'required|numeric',
            'weight'      =>'required|numeric',
            'extra_data' =>'required',
          ]);

         $data = $request->except([
         '_token','chronic','disease_name','disease_degree', 'height','weight','extra_data'
         ,'AcdYearId','LevelId','TermId']);

         $ob =Affairs::where('StudentSsn',$request->StudentSsn)->update($data);

           $disease=StdHealth::where('id','=',$request->id)->update([
            'chronic'       =>$request->chronic ,
            'disease_name'  =>$request->disease_name,
            'disease_degree'=>$request->disease_degree,
            'height'        =>$request->height,
            'weight'        =>$request->weight,
            'extra_data'    =>$request->extra_data
           ]);

           return redirect(url('doctor/index'))->with('success','student updated successfully');
    }

    // ------------------------------------------------------------------------------------------------

    public function d1(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where('sublevel.SubLevelName','one')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d2(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','two')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();


        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d3(){

        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','three')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d4(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','four')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d5(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','five')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d6(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','sex')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d7(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','seven')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d8(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','eight')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d9(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','nine')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d10(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','ten')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d11(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','eleven')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }

    public function d12(){
        $data = StdHealth::join('students','student_disease.StudentSsn','=','students.StudentSsn')
        ->join('education_data','education_data.StudentSsn','=','student_disease.StudentSsn')
        ->join('sublevel','education_data.LevelId','=','sublevel.id')
        ->join('educational_level','sublevel.LevelId','=','educational_level.id')
        ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
        ->join('gender','gender.id','students.GenderId')
        ->join('terms','education_data.TermId','=','terms.id')
        ->where('terms.TermName','first term')
        ->where('student_disease.chronic','Yes')
        ->where( 'academicyear.year', Carbon::today()->year)
        ->where('sublevel.SubLevelName','twelve')
        ->select('student_disease.*','gender.Sex','students.Name','students.FatherName','students.Surname','students.StudentSsn','educational_level.EduLevelName','sublevel.SubLevelName')
        ->get();

        return view('Doctor.doctor_index', ['data'=>$data]);
    }
}
