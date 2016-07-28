<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Iagsession;
use App\Report;
use App\Signal;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ReportController extends Controller
{

   public function __construct(Request $request)
   {
       return $this->middleware('editor',['except'=>['index','home','show']]);
   }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $signal = Signal::find($request->sigid);
        return view('signali.report.create',compact('signal','userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReportRequest $request, Report $report)
    {

        $report->result = $request->result;
        $report->onsignalplace_date = $request->onsignalplace_date;
        $report->signal_id = $request->signal_id;

        $report->s_dobiv = $request->s_dobiv;
        $report->s_transport = $request->s_transport;
        $report->s_store = $request->s_store;
        $report->s_hunt = $request->s_hunt;
        $report->s_fire = $request->s_fire;

        $report->n_dobiv = $request->n_dobiv;
        $report->n_transport = $request->n_transport;
        $report->n_store = $request->n_store;
        $report->n_hunt = $request->n_hunt;
        $report->n_fire = $request->n_fire;

        $report->a_dobiv = $request->a_dobiv;
        $report->a_transport = $request->a_transport;
        $report->a_store = $request->a_store;
        $report->a_hunt = $request->a_hunt;
        $report->a_fire = $request->a_fire;

        $report->note = $request->note;

        $report->otcheten = $request->otcheten;

        $report->proveren = $request->proveren;
        $report->falshiv = $request->falshiv;

        $report->slujitel_id = Session::get('iaguser')->userId;

        $report->save();

//        flash()->overlay('Отчетът е регистриран успешно !','Успешна регистрация');

        flash('Отчетът е регистриран успешно !');

        return redirect('signali/report/'.$request->signal_id.'/?sid='. Session::get('iaguser')->ID);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $signal = Signal::find($id);
        $report = Report::where('signal_id', $id)->first();

        return view('signali.report.show', compact('report','signal'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('signali.report.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//        dd($request->all());
        $report = Report::findOrFail($id);
        $report->update($request->all());

//        redirect()->back();
        flash('Отчетът е редактиран успешно !');
        return redirect('/signali/report/'.$report->signal_id.'/?sid='. Session::get('iaguser')->ID);

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
