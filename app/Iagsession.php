<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Iagsession extends Model
{
    protected $table = 'nug.sessions';
    protected $primaryKey = 'ID';
    protected $fillable = ['ID'];

    public function podelenie()
    {
        return $this->hasOne('App\Podelenie','Pod_Id','AccessPodelenia');
    }

    public function iaguser()
    {
        return $this->hasOne(Iaguser::class,'ID','userId');
    }


}
