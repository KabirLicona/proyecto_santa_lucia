<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $guarded = [];

    protected $table = 'genero';

    public function Genero()
    {
        return $this->hasMany(Genero::class);
    }
}
