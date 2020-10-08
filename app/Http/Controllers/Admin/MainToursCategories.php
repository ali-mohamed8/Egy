<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoriesRequest;
use App\Models\MainTourCategory;
use Illuminate\Http\Request;
use DB;


class MainToursCategories extends Controller
{
    public function index(){
        try {
            $counter = 0;
            $categories = MainTourCategory::activated()->selection()->get();
            return view('admin.mainCategories.index', compact(['categories', 'counter']));
        }catch (\Exception $ex){
            return 'try again later';
        }
    }

    public function createCatView(){
        $active_lang=get_active_lang();
//        $local_lang= get_active_lang();
        return view('admin.mainCategories.create',compact('active_lang')) ;
    }

    public function createCat(MainCategoriesRequest $request ){
        try {
            if ($request -> has('photo')){
                $cat_image = uploadAdminImages('mainCategories',$request-> photo);
            }else{
                $cat_image = asset('images/default/category_default.png');
            }
            $main_cat = collect($request->category);

            $filter_cat = $main_cat->filter(function ($value, $key) {
                return $value['translation_lang'] == get_locale_lang();
            });

            $main_cat_main_lang = array_values($filter_cat->all()) [0];
            DB::beginTransaction();
            $insert = [
                'name' => $main_cat_main_lang  ['name'],
                'translation_lang' => $main_cat_main_lang  ['translation_lang'],
                'translation_of' => 0,
                'photo' => $cat_image,
                'active' => $main_cat_main_lang ['active'],
                'slug' => $main_cat_main_lang ['name'],
            ];

            $main_id = MainTourCategory::insertGetId($insert);

            $filter_cat_notMain = $main_cat->filter(function ($val, $key) {
                return $val['translation_lang'] !== get_locale_lang();
            });

            if (isset($filter_cat_notMain) && $filter_cat_notMain->count() > 0) {
                $categories = array();
                foreach ($filter_cat_notMain as $category) {
                    $categories[] = [
                        'name' => $category['name'],
                        'translation_lang' => $category['translation_lang'],
                        'translation_of' => $main_id,
                        'photo' => $cat_image,
                        'active' => $category['active'],
                        'slug' => $category['name'],
                    ];
                }
            }
            MainTourCategory::insert($categories);
            DB::commit();
            return redirect() -> route('admin.main-category') -> with(['success' => 'Category Added Successfully']);
        }catch (\Exception $ex){
            DB::rollback();
            return redirect() -> route('admin.main-category') -> with(['error' => 'thar are an error try again later']);
        }

    }

    public function edit($mainCat_id){
        try {
            $category = MainTourCategory::selection()->findOrFail($mainCat_id);
            return view('admin.mainCategories.update', compact('category'));
        }catch (\Exception $ex){
            return redirect() -> route('admin.main-category') -> with(['error' => 'Invalid Id']);
        }
    }

    public function update(MainCategoriesRequest $request){
        return $request ;
    }


}
