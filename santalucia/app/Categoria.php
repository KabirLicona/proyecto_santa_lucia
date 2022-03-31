<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $guarded = [];

    protected $table = 'categoria';

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
}
