<?php

use Illuminate\Support\Facades\Config;

function get_active_lang(){
    return \App\Models\Laguage::active() -> selection() -> get() ;
} // get all languages where active == 1

function get_locale_lang(){
   return config::get('app.locale') ;
} // return local language

function uploadAdminImages($folder,$image){
//    $image -> store('/',$folder) ;
    $newName = $image -> hashName();
    $path = 'images/admin/'.$folder;
    $image -> move($path,$newName);
    return $path .'/'.$newName  ;
} // upload admin images
