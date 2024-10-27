<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Equipments;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

        $categories = Category::select(['id','name'])->with('equipment',function ($query){
            $query->select('category_id','image')->whereNotNull('image');
        })->get()->toArray();

        return view('site/index',['categories' => $categories]);
    }

    public function category(Request $request){
         $request->validate([
            'id' => 'required|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1|max:100'
            ]);

        $currentCategory = Category::select(['name','id'])->where('id',$request['id'])->first();

        if(is_null($currentCategory)){
            return  redirect('/');
        }

       $equipments = Equipments::where('category_id', $request['id'])->paginate(1);

        return view('site/equipments/index',['currentCategory' => $currentCategory,'categories' => Category::all(),'equipments' => $equipments]);
    }

    public function equipment(int $id){
           $equipment = Equipments::where('id', $id)->first();

           if(is_null($equipment)){
               return  redirect('/');
           }
        $category = Category::select(['name','id'])->where('id',$equipment->category_id)->first();

           return view('site/equipments/equipment',['equipment' => $equipment,'category' => $category,'categories' => Category::all()]);
    }

    public function search(Request $request){

    }
}
