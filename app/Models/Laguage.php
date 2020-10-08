<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laguage extends Model
{
    protected $table = 'languages' ;

    protected $fillable = [
          'id','abbr' , 'name' , 'direction' , 'active' , 'created_at' , 'updated_at'
        ] ;

    public function scopeActive($query){
        return $query -> where('active' , 1 ) ;
    }

    public function scopeSelection($query){
        return $query -> select('id','abbr','name' ,'direction', 'active' ) ;
    }

    public function getActiveAttribute($val){
        return $val == 1 ? 'Active' : 'NotActive' ;
    }

    public function getDirectionAttribute($val){
        return $val == 'rtl' ? 'From Right To Left ' : 'From Left To Right' ;
    }
}
