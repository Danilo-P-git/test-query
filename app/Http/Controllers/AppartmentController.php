<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Appartment;

class AppartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function get()
    {
        return view('get');
    }
    public function post(Request $request)
    {
        $address = $request->search;
        // $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('https://api.tomtom.com/search/2/geocode/'.$address.'.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo');
        $output= json_decode($geocode);
        $lat = $output->results[0]->position->lat;
        $lon = $output->results[0]->position->lon;

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
    //   $appartments = Appartment::all();
      
      return view('result-search', compact('finder'));
    }
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
