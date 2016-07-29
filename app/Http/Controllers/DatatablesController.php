<?php

namespace App\Http\Controllers;

use App\Iagsession;
use App\Signal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Yajra\Datatables\Datatables;

use App\Http\Requests;

class DatatablesController extends Controller
{
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signaliData(Request $request, Iagsession $iagsession)
    {

        $var= $iagsession->find($request->sid)->AccessPodelenia;

        //IAG
        if ( $var == 1 )
        {
            $signali = Signal::leftjoin('nug.podelenia as dgs','dgs.Pod_Id','=','signali.pod_id')
                ->leftjoin('nug.podelenia as rdg','dgs.Glav_Pod','=','rdg.Pod_Id')
                ->leftjoin('iag112.reports as reports', 'signali.id','=','reports.signal_id')
                ->select(['signali.id','signali.signalfrom','signali.signaldate','signali.pod_id','signali.glav_pod','dgs.Pod_NameBg as DGS',
                    'rdg.Pod_NameBg as RDG','signali.name','signali.phone','signali.opisanie','reports.proveren as proveren'])
                ->orderBy('id','desc');
        }

        //RDG + podelenia + obshtini
        if ( $var > 100 && $var < 117 )
        {
//            @$signali = Signal::where('signali.pod_id', '=', $var)
//                ->orWhereBetween('signali.pod_id',[$var.'00', $var.'99'])
//                ->get();
//                dd($signali);
            $signali = Signal::leftjoin('nug.podelenia as dgs', 'dgs.Pod_Id', '=', 'signali.pod_id')
                ->leftjoin('nug.podelenia as rdg', 'dgs.Glav_Pod', '=', 'rdg.Pod_Id')
                ->leftjoin('iag112.reports as reports', 'signali.id','=','reports.signal_id')
                ->select(['signali.id', 'signali.signalfrom', 'signali.signaldate', 'signali.pod_id', 'signali.glav_pod', 'dgs.Pod_NameBg as DGS',
                    'rdg.Pod_NameBg as RDG', 'signali.name', 'signali.phone', 'signali.opisanie','reports.proveren as proveren'])
                ->where('signali.pod_id', '=', $var )
                ->orWhereBetween('signali.pod_id',[$var.'00', $var.'99'])
                ->orderBy('id', 'desc');
        }

        //DP + podelenia
        if ( $var > 200 && $var < 207 )
        {
            $signali = Signal::leftjoin('nug.podelenia as dgs', 'dgs.DP_ID', '=', 'signali.pod_id')
                ->leftjoin('nug.podelenia as rdg', 'dgs.Glav_Pod', '=', 'rdg.Pod_Id')
                ->leftjoin('iag112.reports as reports', 'signali.id','=','reports.signal_id')
                ->select(['signali.id', 'signali.signalfrom', 'signali.signaldate', 'signali.pod_id', 'signali.glav_pod', 'dgs.Pod_NameBg as DGS',
                    'rdg.Pod_NameBg as RDG', 'signali.name', 'signali.phone', 'signali.opisanie','reports.proveren as proveren'])
                ->where('signali.pod_id', '=', $var )
                ->orWhereBetween('signali.pod_id',[$var.'00', $var.'20'])
                ->orderBy('id', 'desc');
        }

//        return $signali;
        return Datatables::of($signali)

             //edit columns
             ->editColumn('signalfrom', function ($signal) {
                 return $signal->signalfrom < 2 ? '112' : '0800 20 800';
             })

             ->editColumn('signaldate', function ($signal) {
                return Carbon::parse($signal->signaldate)->format('d.m.Y') ;
             })

             ->editColumn('name', function ($signal) {

                 if($signal->name == '' || $signal->name == 'Анонимен')
                 {
                     return '<i style="color: #990224">Анонимен</i>';
                 }
                 return $signal->name;
             })

             ->editColumn('pod_id', function($signal){
                 return $signal->DGS;
             })

             ->editColumn('glav_pod', function($signal){
                 return $signal->RDG;
             })

            //add columns

             ->addColumn('edit_action', function ($signal) {
                if((Session::get('iaguser')->Access112 == 2 && Session::get('iaguser')->AccessPodelenia == 1) ||
                    (Session::get('iaguser')->Access112 == 2 && Session::get('iaguser')->AccessPodelenia == 115))
                {
                    return '<a href="/signali/iag/' . $signal->id . '/edit?sid=' . request('sid') . '" class="btn btn-xs btn-primary">
                              <i class="glyphicon glyphicon-edit"></i>
                        </a>';
                }
             })

             ->addColumn('show_action', function ($signal) {
                 return '<a href="/signali/iag/'.$signal->id.'/?sid='.request('sid').'" class="btn btn-xs btn-primary">
                             <i class="glyphicon glyphicon-option-horizontal"></i>
                         </a>';
             })

             ->addColumn('report_action', function ($signal) {
                 if((Session::get('iaguser')->Access112 == 2 && Session::get('iaguser')->AccessPodelenia == 1) ||
                     (Session::get('iaguser')->Access112 == 2 && Session::get('iaguser')->AccessPodelenia == 115))
                 {
                     return '<a href="/signali/report/create/?sid='.request('sid').'&sigid='.$signal->id.'" class="btn btn-xs btn-primary">
                             <i class="glyphicon glyphicon-pencil"></i>
                         </a>';
                 }

             })

            ->addColumn('otchet_action', function ($signal) {

                return $signal->proveren == 1 ? '<a href="/signali/report/'. $signal->id .'/?sid='.request('sid').'" class="btn btn-xs btn-primary">
                             <i class="glyphicon glyphicon-list-alt"></i>
                         </a>' : '';
            })

            ->setRowClass( function ($signal) {

                return $signal->proveren == 1 ? 'alert-success' : 'alert-warning';
            })


             ->make(true);
    }

}
