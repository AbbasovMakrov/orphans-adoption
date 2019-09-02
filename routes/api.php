<?php

use App\AdditionalHelpers\ControllerHelpers;
use App\Location;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Cache;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("locations/get",function()
{
    $cache = Cache::get("locations");
    if (empty($cache))
    {
        if (!Cache::forever("locations",Location::get()))
        {
            $cache = Location::get();
        }
    }
   return response()->json([
      "locations" => $cache
   ]);
});
Route::get("search/user/{keyword}",ControllerHelpers::Action("Auth\Account","search"));
Route::get("search/orphan/{keyword}",ControllerHelpers::Action("Orphan","search"));
