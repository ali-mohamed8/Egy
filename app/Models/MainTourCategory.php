<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainTourCategory extends Model
{

    protected $table = 'main-tours-categories' ;

    protected $fillable = [
        'id','translation_lang', 'translation_of', 'name', 'slug', 'photo', 'active', 'created_at', 'updated_at'
    ] ;



    public function scopeActivated($query){
        return $query -> where('translation_lang',get_locale_lang()) ;
    }

    public function scopeSelection($query){
       return $query ->  select('id' , 'translation_of' ,'translation_lang' , 'name' , 'slug' ,'photo','active') ;
    }

    public function getActiveAttribute($val){
        return $val == 1 ? 'active' : 'not active' ;
    }

}
