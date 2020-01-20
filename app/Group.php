<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function groupProducts() {
        return $this->hasMany('App\Product', 'group_id', 'id');
    }
}
