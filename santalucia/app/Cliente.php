<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $guarded = [];

    protected $table = 'cliente';

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

   
}