<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('search/lat={lat}&lon={lon}', function($lat, $lon){
  $radius = 20;
  $finder = DB::table('appartments')
               ->selectRaw("id, address, lat, lon,
                ( 6371 * acos( cos( radians(?) ) *
                  cos( radians( lat ) )
                  * cos( radians( lon ) - radians(?)
                  ) + sin( radians(?) ) *
                  sin( radians( lat ) ) )
                ) AS distance", [$lat, $lon, $lat])
   ->having("distance", "<", $radius)
   ->orderBy("distance",'asc')
   ->offset(0)
   ->limit(20)
   ->get();
   dd($finder);
  return response()->json($finder);
});
