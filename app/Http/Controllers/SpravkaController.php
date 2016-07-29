<?php

namespace App\Http\Controllers;

use App\Signal;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class SpravkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signali = Signal::select(['glav_pod',
            DB::raw('count(*) as signal_count'),
            DB::raw('sum(reports.falshiv) as falshiv_count'),

            DB::raw('sum(reports.s_dobiv) as s_dobiv_count'),
            DB::raw('sum(reports.s_transport) as s_transport_count'),
            DB::raw('sum(reports.s_store) as s_store_count'),
            DB::raw('sum(reports.s_hunt) as s_hunt_count'),
            DB::raw('sum(reports.s_fire) as s_fire_count'),

            DB::raw('sum(reports.n_dobiv) as n_dobiv_count'),
            DB::raw('sum(reports.n_transport) as n_transport_count'),
            DB::raw('sum(reports.n_store) as n_store_count'),
            DB::raw('sum(reports.n_hunt) as n_hunt_count'),
            DB::raw('sum(reports.n_fire) as n_fire_count'),

            DB::raw('sum(reports.a_dobiv) as a_dobiv_count'),
            DB::raw('sum(reports.a_transport) as a_transport_count'),
            DB::raw('sum(reports.a_store) as a_store_count'),
            DB::raw('sum(reports.a_hunt) as a_hunt_count'),
            DB::raw('sum(reports.a_fire) as a_fire_count'),
          ])
            ->join('reports','reports.signal_id','=','signali.id')
//            ->where('glav_pod','>',1)
            ->groupBy('glav_pod')
            ->get();


        $signali_sum = Signal::select(['glav_pod',
            DB::raw('count(*) as signal_count'),
            DB::raw('sum(reports.falshiv) as falshiv_count'),

            DB::raw('sum(reports.s_dobiv) as s_dobiv_count'),
            DB::raw('sum(reports.s_transport) as s_transport_count'),
            DB::raw('sum(reports.s_store) as s_store_count'),
            DB::raw('sum(reports.s_hunt) as s_hunt_count'),
            DB::raw('sum(reports.s_fire) as s_fire_count'),

            DB::raw('sum(reports.n_dobiv) as n_dobiv_count'),
            DB::raw('sum(reports.n_transport) as n_transport_count'),
            DB::raw('sum(reports.n_store) as n_store_count'),
            DB::raw('sum(reports.n_hunt) as n_hunt_count'),
            DB::raw('sum(reports.n_fire) as n_fire_count'),

            DB::raw('sum(reports.a_dobiv) as a_dobiv_count'),
            DB::raw('sum(reports.a_transport) as a_transport_count'),
            DB::raw('sum(reports.a_store) as a_store_count'),
            DB::raw('sum(reports.a_hunt) as a_hunt_count'),
            DB::raw('sum(reports.a_fire) as a_fire_count'),
        ])
            ->join('reports','reports.signal_id','=','signali.id')
//            ->where('glav_pod','>',1)
//            ->groupBy('glav_pod')
            ->get();
//        dd($signali);

        return view('signali.spravki.index',compact('signali','signali_sum'));
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
