<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $primaryKey = 'id';

    protected $guarded = ['id','_token','signal_id'];

    public  function signal()
    {
        return $this->belongsTo(Signal::class,'signal_id','id');
    }

    public function reporter()
    {
        return $this->belongsTo(Iaguser::class,'slujitel_id','ID');
    }

}

