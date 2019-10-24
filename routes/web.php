<?php

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

use App\AdditionalHelpers\ControllerHelpers;
use App\Orphan;
use Illuminate\Support\Facades\Route;

Route::get('/', ControllerHelpers::Action("Orphan"));

Auth::routes(['verify' => false]);
Route::prefix("orphans")->group(function ()
{
    Route::get("index", ControllerHelpers::Action("Orphan"))->name("orphan.all");
    Route::get("create",ControllerHelpers::Action("Orphan","create"))->name("orphan.create");
    Route::post("store",ControllerHelpers::Action("Orphan","store"))->name("orphan.store");
    Route::get("show/{id}",ControllerHelpers::Action("Orphan","show"))->name("orphan.show");
    Route::get("edit/{id}",ControllerHelpers::Action("Orphan","edit"))->name("orphan.edit");
    Route::put("update/{id}",ControllerHelpers::Action("Orphan","update"))->name("orphan.update");
    Route::delete("delete/{id}",ControllerHelpers::Action("Orphan","destroy"))->name("orphan.destroy");
    Route::get("orphansFrom/{profileId?}",ControllerHelpers::Action("Orphan","myOrphans"))->name("orphan.my");
    Route::options("restore/{id}",ControllerHelpers::Action("Orphan","restore"))->name("orphan.restore");

});
Route::prefix("adoptions")->group(function()
{
    Route::post("adoption/{orphanId}",ControllerHelpers::Action("Adoption","adoption"))->name("adoption.adopt");
    Route::delete("cancel/{adoptId}",ControllerHelpers::Action("Adoption","cancel"))->name("adoption.cancel");
    Route::get("my-adoptions",ControllerHelpers::Action("Adoption","myAdoptions"))->name("adoptions.my");
});
Route::view("profile","profile")->name("profile")->middleware("auth");
Route::post('profile/submit', ControllerHelpers::Action("Auth\Account","submit"))->name("profile.update");
Route::view("dashboard","dashboard",['orphans' => Orphan::whereUserId(auth()->id())])->name("dashboard")->middleware("auth");
