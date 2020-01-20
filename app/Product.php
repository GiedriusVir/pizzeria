<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productType() {
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }

    public function productGroup() {
        return $this->belongsTo('App\Group', 'group_id', 'id');
    }
    
    public function productIngridients() {
        return $this->hasMany('App\ProductIngridient', 'product_id', 'id');
    }
}
