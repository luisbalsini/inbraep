<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    protected $fillable = ['nome','usuarios_id','comentario','estados_id'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario','usuarios_id','id');   
    }
    
    public function estado()
    {
        return $this->belongsTo('App\Estado','estados_id','id');
    }

};


