<?php

namespace App\Http\Controllers;

use App\Iagsession;
use App\Iaguser;
use App\Podelenie;
use App\Signal;
use App\Signalfrom;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSignalRequest;
use Session;

class IagController extends Controller
{
    public function __construct(Request $request, Iagsession $iagsession)
    {

        $iaguser = $iagsession->find($request->sid);

        Session::put('iaguser', $iaguser);

        return $this->middleware('editor',['except'=>['index','home','show']]);
    }


    public function index()
    {
        return view('signali.iag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $sess = $request->session;
        $signalfrom = Signalfrom::lists('from','id');
        return view('signali.iag.create',compact('signalfrom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSignalRequest $request)
    {
        Signal::create($request->all());
        flash()->overlay('Сигналът е регистриран успешно !','Успешна регистрация');
        return redirect()->route('signali/iag/create');
//        return back();
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
//        dd($signal->podelenie());
        return view('signali.iag.show', compact('signal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $signal = Signal::findOrFail($id);
        $signalfrom = Signalfrom::lists('from','id');
        $podelenie = Podelenie::where('Pod_Id',$signal->pod_id)->lists('Pod_NameBg','Pod_Id');

        return view('signali.iag.edit', compact('signal','signalfrom','podelenie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSignalRequest $request, $id)
    {
        $signal = Signal::findOrFail($id);
        $signal->update($request->all());

//        return redirect()->route('signali.iag',[$signal->id, 'sid='.Session::get('iaguser')->ID]);

        flash()->overlay('Сигналът е редактиран успешно !','Успешна редакция !');
        return back();
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

    public function home()
    {
        return view('signali.iag.home');
    }
}
