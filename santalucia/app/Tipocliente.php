<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipocliente extends Model
{
    protected $guarded = [];

    protected $table = 'tipocliente';

    public function cliente()
    {
        return $this->hasMany(Cliente::class);
    }
}
