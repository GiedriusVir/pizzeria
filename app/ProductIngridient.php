<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductIngridient extends Model
{
    public function ingridientsTitle() {
        return $this->belongsTo('App\Ingridient', 'ingridient_id', 'id');
    }
}
