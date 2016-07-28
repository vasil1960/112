<?php

namespace App;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades;
use App\Podelenie;
use App\Signalfrom;

class Signal extends Model
{
    protected $table = 'iag112.signali';

    protected $guarded = ['id, _token'];

    public $timestamps = false;


    public function podelenie()
    {
        return $this->hasOne('App\Podelenie','Pod_Id','pod_id');
    }

    public function RDG()
    {
        return $this->hasOne('App\Podelenie','Pod_Id','glav_pod');
    }

    public function signal_from()
    {
        return $this->hasOne('App\Signalfrom','id','signalfrom');
    }

    public function registrator()
    {
        return $this->hasOne(Iaguser::class, 'ID','slujitel_id');
    }

    public function otchetnik()
    {
        return $this->hasOne(Iaguser::class, 'ID','slujitel_rdg_id');
    }

    public function fullNameRegistrator()
    {
        return $this->registrator->Name . ' ' . $this->registrator->Familia;
    }

    public function  report()
    {
        return $this->hasOne(Report::class,'signal_id','id');
    }

//    public function fullNameOtchetnik()
//    {
//        if($this->otchetnik->Name && $this->otchetnik->Familia)
//        {
//            return $this->otchetnik->Name . ' ' . $this->otchetnik->Familia;
//        }
//        return 'Няма направен отчет';
//    }
}