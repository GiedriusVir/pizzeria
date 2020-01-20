<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function productOfType() {
        return $this->hasMany('App\Product', 'type_id', 'id');
    }
}
