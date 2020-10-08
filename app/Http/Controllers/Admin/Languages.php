<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\languageRequest;
use App\Models\Laguage;
use Illuminate\Http\Request;

class Languages extends Controller
{
    public function getLang(){
        $counter = 0 ;
        $languages = Laguage::selection() -> paginate(PAGINATE_COUNT) ;
        return view('admin.languages.index' , compact(['languages','counter'])) ;
    }

    public function createLangView(){
        return view('admin.languages.create') ;
    }

    public function createLang(LanguageRequest $request){
        try {
//            return $request ;
            Laguage::create($request -> except(['_token']));
            return redirect() -> route('admin.lang') -> with(['success' => 'Language added successfully']) ;
        }catch (\Exception $ex){
            return redirect() -> back() -> with(['error' => 'thar is an error try again later']);
        }

    }

    public function updateLangView($idLang){
      $lang = Laguage::findOrFail($idLang) ;
      return view('admin.languages.update',compact('lang')) ;
    }

    public function updateLang(LanguageRequest $request){
        try {
            Laguage::findOrFail($request->langId)->update($request->except(['_token']));
            return redirect()->back()->with(['success' => 'Language Updated successfully']);
        }catch (\Exception $ex){

            redirect()->back()->status(404) ;
        }
    }

    public function deleteLang($idLang){
        Laguage::findOrFail($idLang) -> delete() ;
        return redirect()->back()->with(['success' => 'Language Deleted successfully']) ;
    }


}
