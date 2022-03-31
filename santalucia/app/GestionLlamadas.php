<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $guarded = [];

    protected $table = 'empresa';

    public function cliente()
    {
        return $this->hasMany(Cliente::class);
    }
}
