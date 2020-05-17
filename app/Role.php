<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** 
     * Join Many to Many with Pivot Table
     * belongsToMany() : get Many to Many Relations
     * withPivot() : get additional pivot column
     * model_type : additional pivot column
    */ 
    public function users(){
        return $this->belongsToMany('App\User','model_has_roles','role_id','model_id')
                    ->withPivot('model_type');
    }
}
