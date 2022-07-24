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
use App\Models\StdMaterial;
use App\Models\edumatrial;
use App\Models\stuactivity;
use App\Models\eduactivity;

use App\Models\stu;

use Carbon\Carbon;


class SpecialistController extends Controller
{
    public function specialisthome()
    {
        return view('Specialist.specialist_home');
    }

    public function login()
    {
        return view('Specialist.login');
    }
    public function dologin(Request $request)
    {
        $data=$request->validate([
            'username'=>'required|email',
            'password'=>'required'
        ]);

    //    if(auth()->guard('specialist')->attempt($data)) {
    //    return redirect(url('specialist/home'));
    //    }else{
    //     return redirect(url('specialist/login'));

    //    }
    if(auth()->guard('specialist')->attempt($data)) {
        return redirect(url('specialist/home'));
  }else{
        return redirect(url('specialist/dologin'));
  }
    }
    public function logout()
    {
      auth()->guard('specialist')-> logout();
      return redirect(url('specialist/login'));
    }

    //-------------------------home--------------------------
    public function special()
    {
        $p=sublevel::where('sublevel.LevelId',1)
        ->get(['sublevel.id']);

        $pre=sublevel::where('sublevel.LevelId',2)
        ->get(['sublevel.id']);

        $sec=sublevel::where('sublevel.LevelId',3)
        ->get(['sublevel.id']);

        return view('Specialist.specialist_home',['p'=>$p,'pre'=>$pre,'sec'=>$sec]);
    }
//----------------------------------------------------------------------

public function special1()
{
    $p=sublevel::where('sublevel.LevelId',1)
    ->get(['sublevel.id']);

    $pre=sublevel::where('sublevel.LevelId',2)
    ->get(['sublevel.id']);

    $sec=sublevel::where('sublevel.LevelId',3)
    ->get(['sublevel.id']);

    return view('Specialist.specialist-levels',['p'=>$p,'pre'=>$pre,'sec'=>$sec]);
}


// Route::get('specialist/home', 'SpecialistController@special')->name('specialist.home');
// Route::get('specialist/levels/{id}', 'SpecialistController@special1')->name('e.S1');
// // Route::get('specialist/levels/{id}', [SpecialistController::class, 'special1'])->name('e.l1');


// Route::get('specialist/matrials/{id}', [SpecialistController::class, 'materials'])->name('s.materials');
// Route::get('specialist/activity/{id}', [SpecialistController::class, 'activity'])->name('s.activity');
// Route::get('specialist/behavior/{id}', [SpecialistController::class, 'behavior'])->name('s.behavior');
// Route::get('specialist/attend/{id}', [SpecialistController::class, 'attendant'])->name('s.attend');


//-------------------------index--------------------------
public function S1($id){

    $d7=Term::get(['terms.TermName']);

    $p=sublevel::where('sublevel.LevelId',1)
    ->get(['sublevel.id']);

    $pre=sublevel::where('sublevel.LevelId',2)
    ->get(['sublevel.id']);

    $sec=sublevel::where('sublevel.LevelId',3)
    ->get(['sublevel.id']);

    $data = StdMaterial::join('education_data','student_material.StudentSsn','=','education_data.StudentSsn')
    ->join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('gender','gender.id','students.GenderId')
    ->join('edumaterial','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->select('students.*','gender.Sex',//'nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName',
     'student_material.Score','materials.MaterialName',)
    ->get();

    $d2=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
    ->where('academicyear.year',Carbon::today()->year)
    ->orderby('Name')
    ->get(['students.id','students.Name']);

    $d4=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
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
    ->where('terms.TermName','first term')
    ->where('academicyear.year',Carbon::today()->year)
    ->get(['materials.MaterialName','student_material.Score','students.Name','materials.totalScore']);

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->where('academicyear.year',Carbon::today()->year)
    ->orderby('Name')
    ->get(['students.id','students.Name']);

    $d3=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
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
    ->where('terms.TermName','second term')
    ->where('academicyear.year',Carbon::today()->year)
    ->get(['materials.MaterialName','student_material.Score','students.Name','materials.totalScore']);



    return view('Specialist.specialist-levels',['id'=>$id,'d7'=>$d7,'p'=>$p,'pre'=>$pre,'sec'=>$sec ,'d2'=>$d2,'d4'=>$d4,'d6'=>$d6,'d1'=>$d1,'d3'=>$d3,'d5'=>$d5,'data'=>$data]);
}
//----------------------------------------------------------------------

// ------------------------ Materials ----------------------------------
public function materials($id){

    $d7=Term::get(['terms.TermName']);

    $p=sublevel::where('sublevel.LevelId',1)
    ->get(['sublevel.id']);

    $pre=sublevel::where('sublevel.LevelId',2)
    ->get(['sublevel.id']);

    $sec=sublevel::where('sublevel.LevelId',3)
    ->get(['sublevel.id']);

    $data = StdMaterial::join('education_data','student_material.StudentSsn','=','education_data.StudentSsn')
    ->join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('gender','gender.id','students.GenderId')
    ->join('edumaterial','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->select('students.*','gender.Sex',//'nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName',
     'student_material.Score','materials.MaterialName',)
    ->get();

    $d2=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
    ->where('academicyear.year',Carbon::today()->year)
    ->orderby('Name')
    ->get(['students.id','students.Name']);

    $d4=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
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
    ->where('terms.TermName','first term')
    ->where('academicyear.year',Carbon::today()->year)
    ->get(['materials.MaterialName','student_material.Score','students.Name','materials.totalScore']);

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->where('academicyear.year',Carbon::today()->year)
    ->orderby('Name')
    ->get(['students.id','students.Name']);

    $d3=edumatrial::join('educational_level','edumaterial.EduLevelId','=','educational_level.id')
    ->join('sublevel','edumaterial.LevelId','=','sublevel.id')
    ->join('terms','edumaterial.TermId','=','terms.id')
    ->join('materials','edumaterial.MaterialId','=','materials.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
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
    ->where('terms.TermName','second term')
    ->where('academicyear.year',Carbon::today()->year)
    ->get(['materials.MaterialName','student_material.Score','students.Name','materials.totalScore']);



    return view('Specialist.specialist-materials',['id'=>$id,'d7'=>$d7,'p'=>$p,'pre'=>$pre,'sec'=>$sec ,'d2'=>$d2,'d4'=>$d4,'d6'=>$d6,'d1'=>$d1,'d3'=>$d3,'d5'=>$d5,'data'=>$data]);
}
// --------------------------------------------------------------------

// ------------------ Activity -------------------------------
public function activity($id){

    $d7=Term::get(['terms.TermName']);

    $p=sublevel::where('sublevel.LevelId',1)
    ->get(['sublevel.id']);

    $pre=sublevel::where('sublevel.LevelId',2)
    ->get(['sublevel.id']);

    $sec=sublevel::where('sublevel.LevelId',3)
    ->get(['sublevel.id']);

    $data = stuactivity::join('education_data','student_activity.StudentSsn','=','education_data.StudentSsn')
    ->join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->leftjoin('academicyear','academicyear.id','=','education_data.AcdYearId')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('gender','gender.id','students.GenderId')
    ->join('eduactivity','eduactivity.TermId','=','terms.id')
    ->join('activities','eduactivity.ActivityId','=','activities.id')
    ->select('students.*','gender.Sex',//'nationality.Nation','religion.ReligName','governorate.GovName','town.TownName','district.DistrictName',
     'student_activity.Score','activities.ActivityName',)
    ->get();

    $d2=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
    ->where('academicyear.year',Carbon::today()->year)
    ->orderby('Name')
    ->get(['students.id','students.Name','students.FatherName']);

    $d4=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
    ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
    ->join('terms','eduactivity.TermId','=','terms.id')
    ->join('activities','eduactivity.ActivityId','=','activities.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','first term')
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
    ->where('terms.TermName','first term')
    ->where('academicyear.year',Carbon::today()->year)
    ->get(['activities.ActivityName','student_activity.Score','students.Name','activities.totalScore']);

    $d1=edudata::join('students','education_data.StudentSsn','=','students.StudentSsn')
    ->join('sublevel','education_data.LevelId','=','sublevel.id')
    ->join('terms','education_data.TermId','=','terms.id')
    ->join('academicyear','education_data.AcdYearId','=','academicyear.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->where('academicyear.year',Carbon::today()->year)
    ->orderby('Name')
    ->get(['students.id','students.Name','students.FatherName']);

    $d3=eduactivity::join('educational_level','eduactivity.EduLevelId','=','educational_level.id')
    ->join('sublevel','eduactivity.LevelId','=','sublevel.id')
    ->join('terms','eduactivity.TermId','=','terms.id')
    ->join('activities','eduactivity.ActivityId','=','activities.id')
    ->where('sublevel.id',$id)
    ->where('terms.TermName','second term')
    ->get(['activities.ActivityName']);

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
    ->where('terms.TermName','second term')
    ->where('academicyear.year',Carbon::today()->year)
    ->get(['activities.ActivityName','student_activity.Score','students.Name','activities.totalScore']);



    return view('Specialist.specialist-activity',['id'=>$id,'d7'=>$d7,'p'=>$p,'pre'=>$pre,'sec'=>$sec ,'d2'=>$d2,'d4'=>$d4,'d6'=>$d6,'d1'=>$d1,'d3'=>$d3,'d5'=>$d5,'data'=>$data]);
}

// -------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
