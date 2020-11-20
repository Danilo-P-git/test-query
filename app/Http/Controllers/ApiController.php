<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appartment;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function get() {
      $lat = $_GET['lat'];
      $lon = $_GET['lon'];
      $radius = 5;
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

      return response()->json($finder);
    }
}
