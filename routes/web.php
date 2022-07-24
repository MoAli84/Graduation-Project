<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\entryOfficerController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\DoctorController;
 use App\Http\Controllers\StudentAffairController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', 'adminController@login');
Route::post('admin/dologin', 'adminController@dologin');
Route::get('admin/register', 'adminController@register');


Route::group(['middleware' => 'AdminLogin'], function () {

    Route::get('adminHome', 'adminController@Adminhome');
    //---------------------------Accounts-------------------
    Route::get('admin/logout', 'adminController@logout');
    Route::post('admin/store/accounts', 'adminController@storeAccounts');
    //------Accounts-----------
    Route::get('admin/index/staff', 'adminController@adminindexAccou');
    Route::get('admin/show/staff/{id}', 'adminController@showadminAccou');
    Route::delete('admin/delete/accou/{id}', 'adminController@destroy_admin'); //
    //-----------------
    Route::get('affair/index/staff', 'adminController@affairindexAccou');
    Route::get('affair/show/staff/{id}', 'adminController@showaffairAccou');
    Route::delete('affair/delete/accou/{id}', 'adminController@destroy_affair'); //
    //-----------------
    Route::get('entry/officer/index/staff', 'adminController@entryindexAccou');
    Route::get('entry/show/staff/{id}', 'adminController@showentryAccou');
    Route::delete('entry/delete/accou/{id}', 'adminController@destroy_entry'); //
    //------------------
    Route::get('doctor/index/staff', 'adminController@doctorindexAccou');
    Route::get('doctor/show/staff/{id}', 'adminController@showdoctorAccou');
    Route::delete('doctor/delete/accou/{id}', 'adminController@destroy_doctor'); //
    //-------------------
    Route::get('manager/index/staff', 'adminController@managerindexAccou');
    Route::get('manager/show/staff/{id}', 'adminController@showamanagerAccou');
    Route::delete('manager/delete/accou/{id}', 'adminController@destroy_manager'); //
    //------------------
    Route::get('specialist/index/staff', 'adminController@specialistindexAccou');
    Route::get('specialist/show/staff/{id}', 'adminController@showspecialistAccou');
    Route::delete('specialist/delete/accou/{id}', 'adminController@destroy_specialist');
    //----------------

    //--------------------------End Accounts------------------------------


    //---------------------------Year----------------------------------------
    Route::get('admin/index/year', 'adminController@index_year');
    Route::get('admin/create/year', 'adminController@create_year');
    Route::post('admin/store/year', 'adminController@store_year');
    Route::get('admin/edit/year/{id}', 'adminController@edit_year');
    Route::post('admin/update/year', 'adminController@update_year');
    Route::delete('admin/delete/year/{id}', 'adminController@destroy_year');
    //--------------------------End Year-------------------------------------


    //---------------------------Education Level-------------------------
    Route::get('admin/index/level', 'adminController@index_level');
    Route::get('admin/create/level', 'adminController@create_level');
    Route::post('admin/store/level', 'adminController@store_level');
    Route::get('admin/edit/level/{id}', 'adminController@edit_level');
    Route::post('admin/update/level', 'adminController@update_level');
    Route::delete('admin/delete/level/{id}', 'adminController@destroy_level');


    //--------------------------end Education level--------------------------

    //---------------------------start Sublevel-----------------------------
    Route::get('admin/index/sublevel', 'adminController@index_sublevel');
    Route::get('admin/create/sublevel', 'adminController@create_sublevel');
    Route::post('admin/store/sublevel', 'adminController@store_sublevel');
    Route::get('admin/edit/sublevel/{id}', 'adminController@edit_sublevel');
    Route::post('admin/update/sublevel', 'adminController@update_sublevel');
    Route::delete('admin/delete/sublevel/{id}', 'adminController@destroy_sublevel');
    //----------------------------End sublevel----------------------------------


    //-------------------------------Start Nationality---------------------------
    Route::get('admin/index/nationality', 'adminController@index_nationality');
    Route::get('admin/create/nationality', 'adminController@create_nationality');
    Route::post('admin/store/nationality', 'adminController@store_nationality');
    Route::get('admin/edit/nationality/{id}', 'adminController@edit_nationality');
    Route::post('admin/update/nationality', 'adminController@update_nationality');
    Route::delete('admin/delete/nationality/{id}', 'adminController@destroy_nationality');
    // -------------------------------End Nationality----------------------------

    //--------------------------------Start Course------------------------------
    Route::get('admin/index/course', 'adminController@index_course');
    Route::get('admin/create/course', 'adminController@create_course');
    Route::post('admin/store/course', 'adminController@store_course');
    Route::get('admin/edit/course/{id}', 'adminController@edit_course');
    Route::post('admin/update/course', 'adminController@update_course');
    Route::delete('admin/delete/course/{id}', 'adminController@destroy_course');
    //---------------------------------End Course-----------------------------
    //---------------------------governorate----------------------------------------
    Route::get('admin/index/governorate', 'adminController@index_governorate');
    Route::get('admin/create/governorate', 'adminController@create_governorate');
    Route::post('admin/store/governorate', 'adminController@store_governorate');
    Route::get('admin/edit/governorate/{id}', 'adminController@edit_governorate');
    Route::post('admin/update/governorate', 'adminController@update_governorate');
    Route::delete('admin/delete/governorate/{id}', 'adminController@destroy_governorate');
    //--------------------------End governorate-------------------------------------

    //---------------------------Town----------------------------------------
    Route::get('admin/index/town', 'adminController@index_town');
    Route::get('admin/create/town', 'adminController@create_town');
    Route::post('admin/store/town', 'adminController@store_town');
    Route::get('admin/edit/town/{id}', 'adminController@edit_town');
    Route::post('admin/update/town', 'adminController@update_town');
    Route::delete('admin/delete/town/{id}', 'adminController@destroy_town');
    //--------------------------End Town-------------------------------------

    //---------------------------District----------------------------------------
    Route::get('admin/index/district', 'adminController@index_district');
    Route::get('admin/create/district', 'adminController@create_district');
    Route::post('admin/store/district', 'adminController@store_district');
    Route::get('admin/edit/district/{id}', 'adminController@edit_district');
    Route::post('admin/update/district', 'adminController@update_district');
    Route::delete('admin/delete/district/{id}', 'adminController@destroy_district');
    //--------------------------End district-------------------------------------

});



//-------------------------StudentAffairs--------------------------

Route::get('affair/login', 'StudentAffairController@login');
Route::post('affair/dologin','StudentAffairController@dologin');
Route::group(['middleware'=>'AffairLogin'], function(){

    Route::get('affair/logout', 'StudentAffairController@logout');
    Route::get('affair/home', 'StudentAffairController@affairHome');
    Route::get('affair/index', 'StudentAffairController@index');
    Route::get('affair/create', 'StudentAffairController@create');
    // Route::post('affair/create3', 'StudentAffairController@create3');

    Route::get('affair/upgrade/{id}', 'StudentAffairController@edit2');
    Route::post('affair/store2', 'studentAffairController@store2');


    Route::post('affair/store', 'studentAffairController@store');
    Route::get('affair/edit/{id}','studentAffairController@edit');
    Route::post('affair/update','studentAffairController@update');
    Route::delete('affair/delete/{studentSsn}','studentAffairController@destroy');
    Route::get('affair/show/{StudentSsn}','studentAffairController@show');
    Route::get('affair/index/one', 'studentAffairController@f1');
    Route::get('affair/index/two', 'studentAffairController@f2');
    Route::get('affair/index/three', 'studentAffairController@f3');
    Route::get('affair/index/four', 'studentAffairController@f4');
    Route::get('affair/index/five', 'studentAffairController@f5');
    Route::get('affair/index/sex', 'studentAffairController@f6');
    Route::get('affair/index/seven', 'studentAffairController@f7');
    Route::get('affair/index/eight', 'studentAffairController@f8');
    Route::get('affair/index/nine', 'studentAffairController@f9');
    Route::get('affair/index/ten', 'studentAffairController@f10');
    Route::get('affair/index/elevenL', 'studentAffairController@f11');
    Route::get('affair/index/elevenS', 'studentAffairController@f12');
    Route::get('affair/index/twelveL', 'studentAffairController@f13');
    Route::get('affair/index/twelveSM', 'studentAffairController@f14');
    Route::get('affair/index/twelveSS', 'studentAffairController@f15');


});

//--------------------------- End StudentAffair------------------------------------

//-------------------------Doctor--------------------------

    Route::get('doctor/login', 'DoctorController@login');
    Route::post('doctor/dologin', 'DoctorController@dologin');
    Route::group(['middleware'=>'DoctorLogin'], function(){

    Route::get('doctor/logout', 'DoctorController@logout');
    Route::get('doctorHome', 'DoctorController@doctorhome');
    Route::get('doctor/index', 'DoctorController@index');
    Route::get('doctor/edit/{id}', 'DoctorController@edit');
    Route::post('doctor/update', 'DoctorController@update');
    // Route::delete('doctor/delete/{id}', 'DoctorController@destroy');
    Route::get('doctor/show/{StudentSsn}', 'DoctorController@show');
    Route::get('doctor/index/one', 'DoctorController@d1');
    Route::get('doctor/index/two', 'DoctorController@d2');
    Route::get('doctor/index/three', 'DoctorController@d3');
    Route::get('doctor/index/four', 'DoctorController@d4');
    Route::get('doctor/index/five', 'DoctorController@d5');
    Route::get('doctor/index/sex', 'DoctorController@d6');
    Route::get('doctor/index/seven', 'DoctorController@d7');
    Route::get('doctor/index/eight', 'DoctorController@d8');
    Route::get('doctor/index/nine', 'DoctorController@d9');
    Route::get('doctor/index/ten', 'DoctorController@d10');
    Route::get('doctor/index/eleven', 'DoctorController@d11');
    Route::get('doctor/index/twelve', 'DoctorController@d12');
 });
//--------------------------- End Doctor------------------------------------

// ----------------------------   Specialist  ------------------------------

    Route::get('specialist/login', 'SpecialistController@login');
    Route::post('specialist/dologin', 'SpecialistController@dologin');
    Route::group(['middleware'=>'SpecialistLogin'], function(){

    Route::get('specialist/home', 'SpecialistController@special')->name('specialist.home');
    // Route::get('specialist/levels/{id}', 'SpecialistController@S1')->name('e.S1');
    Route::get('specialist/logout', 'SpecialistController@logout');

    // Route::get('specialist/levels/{id}', [SpecialistController::class, 'S1'])->name('e.S1');
    Route::get('specialist/levels/{id}', 'SpecialistController@S1')->name('e.S1');
    Route::get('specialist/matrials/{id}',  'SpecialistController@materials')->name('s.materials');
    Route::get('specialist/activity/{id}','SpecialistController@activity' )->name('s.activity');
    Route::get('specialist/behavior/{id}', 'SpecialistController@behavior')->name('s.behavior');
    Route::get('specialist/attend/{id}', 'SpecialistController@attendant')->name('s.attend');

 });

// ----------------------------   End Specialist  --------------------------
//-------------------------entry officer--------------------------


Route::get('entry/login', 'entryOfficerController@login');
Route::post('entry/dologin', 'entryOfficerController@dologin');
Route::group(['middleware'=>'EntryLogin'], function(){

    Route::get('entry/logout', 'entryOfficerController@logout');
Route::get('entry/home', [entryOfficerController::class, 'entry'])->name('entry.home');
Route::get('entry/levels/{id}',[entryOfficerController::class, 'l1'])->name('e.l1');

//-------------------------matrials First term-----------------------------------
Route::get('entry/matrialsF/{id}', [entryOfficerController::class, 'matrialsF'])->name('e.matrialsF');
Route::post('entry/gradesF/{id}',action:[entryOfficerController::class,'gradesF'])->name('e.gradesF');

//-------------------------matrials second term----------------------------------
Route::get('entry/matrialsS/{id}', [entryOfficerController::class, 'matrialsS'])->name('e.matrialsS');
Route::post('entry/gradesS/{id}',action:[entryOfficerController::class,'gradesS'])->name('e.gradesS');

//-------------------------activites First term-----------------------------------
Route::get('entry/activitesF/{id}', [entryOfficerController::class, 'activitesF'])->name('e.activitesF');
Route::post('entry/scoresF/{id}',action:[entryOfficerController::class,'scoresF'])->name('e.scoresF');

//-------------------------activites second term----------------------------------
Route::get('entry/activitesS/{id}', [entryOfficerController::class, 'activitesS'])->name('e.activitesS');
Route::post('entry/scoresS/{id}',action:[entryOfficerController::class,'scoresS'])->name('e.scoresS');

//-------------------------absence First term-----------------------------------
Route::get('entry/absenceF/{id}', [entryOfficerController::class, 'absenceF'])->name('e.absenceF');
Route::post('entry/storeF/{id}',action:[entryOfficerController::class,'storeF'])->name('e.storeF');

//-------------------------absence second term----------------------------------
Route::get('entry/absenceS/{id}', [entryOfficerController::class, 'absenceS'])->name('e.absenceS');
Route::post('entry/storeS/{id}',action:[entryOfficerController::class,'storeS'])->name('e.storeS');

//-------------------------behavior First term--------------------------
Route::get('entry/behaviorF/{id}', [entryOfficerController::class, 'behaviorF'])->name('e.behaviorF');
Route::get('entry/behaviorF1/{id}',action:[entryOfficerController::class,'behaviorF1'])->name('e.behaviorF1');
Route::get('entry/searchF/{id}',action:[entryOfficerController::class,'searchF'])->name('e.searchF');

//-------------------------behavior second term--------------------------
Route::get('entry/behaviorS/{id}', [entryOfficerController::class, 'behaviorS'])->name('e.behaviorS');
Route::get('entry/behaviorS1/{id}',action:[entryOfficerController::class,'behaviorS1'])->name('e.behaviorS1');
Route::get('entry/searchS/{id}',action:[entryOfficerController::class,'searchS'])->name('e.searchS');

//-------------------------end entry officer--------------------------
});
// });


Route::get('manager/login', 'managerController@login');
Route::post('manager/dologin', 'managerController@dologin');
Route::group(['middleware'=>'ManagerLogin'], function(){

//-------------------------manager--------------------------
Route::get('manager/home',[managerController::class, 'home'])->name('m.home');
Route::get('manager/logout', 'managerController@logout');
/* Route::get('manager/indexAnalysis/{id}',[managerController::class, 'indexAnalysis'])->name('m.indexAnalysis'); */
Route::get('manager/indexReport/{id}',[managerController::class, 'indexReport'])->name('m.indexReport');
Route::get('manager/search/{id}',[managerController::class, 'search'])->name('m.search');

//-------------------------reports--------------------------
Route::get('manager/educationStageReport/{id}',[managerController::class, 'ESR'])->name('m.ESR');
Route::get('manager/semesterReport1/{id}',[managerController::class, 'semesterReport1'])->name('m.SR1');
Route::get('manager/semesterReport2/{id}',[managerController::class, 'semesterReport2'])->name('m.SR2');
Route::get('manager/academicYearReport/{id}',[managerController::class, 'academicYearReport'])->name('m.AYR');

Route::get('manager/history/{id}',[managerController::class, 'history'])->name('m.history');
Route::get('manager/searchYear/{id}',[managerController::class, 'searchYear'])->name('m.searchYear');

Route::get('manager/educationStageReportOld/{id}/{year}',[managerController::class, 'ESROld'])->name('m.ESROld');
Route::get('manager/semesterReport1Old/{id}/{year}',[managerController::class, 'semesterReport1Old'])->name('m.SR1Old');
Route::get('manager/semesterReport2Old/{id}/{year}',[managerController::class, 'semesterReport2Old'])->name('m.SR2Old');
Route::get('manager/academicYearReportOld/{id}/{year}',[managerController::class, 'academicYearReportOld'])->name('m.AYROld');
});
//-------------------------end manager--------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
