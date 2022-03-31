<?php
/*=============================================
	SEGUNDO PASO CREAR LOS MODELOS(MODEL) 
	=============================================*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $guarded = [];

    protected $table = 'producto';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
