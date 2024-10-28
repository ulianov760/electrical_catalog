<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Equipments;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::select(['id', 'name'])->with('equipment', function ($query) {
            $query->select('category_id', 'image')->whereNotNull('image');
        })->get()->toArray();
        $equipmentsSearch = Equipments::select(['id', 'name'])->get()->all();

        return view('site/index',
            ['categories' => $categories, 'equipmentsSearch' => json_encode(['search', $equipmentsSearch])]);
    }

    public function category(Request $request)
    {
        $equipmentsSearch = Equipments::select(['id', 'name'])->get()->all();
        $request->validate([
            'id' => 'required|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1|max:100'
        ]);

        $currentCategory = Category::select(['name', 'id'])->where('id', $request['id'])->first();

        if (is_null($currentCategory)) {
            return redirect('/');
        }

        $equipments = Equipments::where('category_id', $request['id'])->paginate(10);

        return view('site/equipments/index', [
            'currentCategory' => $currentCategory,
            'categories' => Category::all(),
            'equipments' => $equipments,
            'equipmentsSearch' => json_encode(['search', $equipmentsSearch])
        ]);
    }

    public function equipment(int $id)
    {
        $equipment = Equipments::where('id', $id)->first();
        $equipmentsSearch = Equipments::select(['id', 'name'])->get()->all();

        if (is_null($equipment)) {
            return redirect('/');
        }
        $category = Category::select(['name', 'id'])->where('id', $equipment->category_id)->first();

        return view('site/equipments/equipment', [
            'equipment' => $equipment,
            'category' => $category,
            'categories' => Category::all(),
            'equipmentsSearch' => json_encode(['search', $equipmentsSearch])
        ]);
    }


    public function search(Request $request)
    {
        $equipmentsSearch = Equipments::select(['id', 'name'])->get()->all();
        $request->validate([
            'id' => 'nullable|integer|min:1|max:1000',
            'name' => 'nullable|string|min:1|max:100',
            'page' => 'nullable|integer|min:1|max:100',
        ]);
        if ($request->has('id')) {
            $equipment = Equipments::where('id', $request['id'])->first();

            if (is_null($equipment)) {
                return redirect('/');
            }
            $category = Category::select(['name', 'id'])->where('id', $equipment->category_id)->first();
            return view('site/equipments/equipment', [
                'equipment' => $equipment,
                'category' => $category,
                'categories' => Category::all(),
                'equipmentsSearch' => json_encode(['search', $equipmentsSearch])
            ]);
        }
        if ($request->has('name')) {
            $equipments = Equipments::where('name', 'ilike', '%' . $request['name'] . '%')->paginate(10);

            return view('site/equipments/index', [
                'currentCategory' => "Поиск",
                'categories' => Category::all(),
                'equipments' => $equipments,
                'equipmentsSearch' => json_encode(['search', $equipmentsSearch]),
                'searchName' => $request['name']
            ]);
        }
        return redirect('/');
    }
}
