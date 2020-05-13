<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

    protected $fillable = ['name','jurusan_id'];

    public function jurusan()
    {
    	return $this->belongsTo('App\Jurusan', 'jurusan_id', 'id');
    }

    public function barang()
    {
    	return $this->hasMany('App\Barang','ruangan_id','id');
    }
}
