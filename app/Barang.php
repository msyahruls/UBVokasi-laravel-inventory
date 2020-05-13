<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = ['name', 'ruangan_id', 'total', 'broken', 'image', 'created_by', 'updated_by'];

    public function ruangan()
    {
    	return $this->belongsTo('App\Ruangan', 'ruangan_id', 'id');
    }
    public function create_by()
    {
    	return $this->belongsTo('App\User', 'created_by', 'id');
    }
    public function update_by()
    {
    	return $this->belongsTo('App\User', 'updated_by', 'id');
    }
}
