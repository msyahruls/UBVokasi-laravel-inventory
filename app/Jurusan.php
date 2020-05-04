<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = ['name', 'fakultas_id'];

    public function fakultas()
    {
    	return $this->belongsTo('App\Fakultas', 'fakultas_id','id');
    }

    public function ruangan()
    {
    	return $this->hasMany('App\Ruangan','jurusan_id','id');
    }
}
