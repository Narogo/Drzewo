<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drzewo extends Model
{
protected $table = 'folders';

    public function parent()
    {
        return $this->belongsTo('App\Drzewo', 'id', 'Parent_id');
    }

    public function child()
    {
        return $this->hasMany( 'App\Drzewo','Parent_id', 'id');
    }

}
