<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\ElectricalEquipment;
use App\Services\UserDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::select(['id', 'name'])->with('equipment', function ($query) {
            $query->select('category_id', 'image')->whereNotNull('image')->where('is_deleted', false);
        })->whereHas('equipment', function ($query){
         return   $query->select('category_id', 'image')->whereNotNull('image')->where('is_deleted', false);
        })->get()->toArray();

        $equipmentsSearch = ElectricalEquipment::select(['id', 'name'])
            ->where('is_deleted', false)
            ->get()
            ->all();

        return view('site/index',
            ['categories' => $categories, 'equipmentsSearch' => json_encode(['search', $equipmentsSearch])]);
    }

    public function category(Request $request)
    {
        $equipmentsSearch = ElectricalEquipment::select(['id', 'name'])
            ->where('is_deleted', false)
            ->get()
            ->all();
        $request->validate([
            'id' => 'required|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1|max:100'
        ]);

        $currentCategory = Category::select(['name', 'id'])->where('id', $request['id'])->first();

        if (is_null($currentCategory)) {
            return redirect('/');
        }

        $equipments = ElectricalEquipment::where('category_id', $request['id'])
            ->where('is_deleted', false)
            ->paginate(10);
        $categories = Category::select(['id', 'name'])->whereHas('equipment', function ($query){
            return   $query->select('category_id', 'image')->whereNotNull('image')->where('is_deleted', false);
        })->get();

        return view('site/equipments/index', [
            'currentCategory' => $currentCategory,
            'categories' => $categories,
            'equipments' => $equipments,
            'equipmentsSearch' => json_encode(['search', $equipmentsSearch])
        ]);
    }

    public function equipment(int $id)
    {
        $equipment = ElectricalEquipment::where('id', $id)->first();
        $equipmentsSearch = ElectricalEquipment::select(['id', 'name'])
            ->where('is_deleted', false)
            ->get()
            ->all();

        if (is_null($equipment)) {
            return redirect('/');
        }
        $category = Category::select(['name', 'id'])->where('id', $equipment->category_id)->first();
        $categories = Category::select(['id', 'name'])->whereHas('equipment', function ($query){
            return   $query->select('category_id', 'image')->whereNotNull('image')->where('is_deleted', false);
        })->get();

        return view('site/equipments/equipment', [
            'equipment' => $equipment,
            'category' => $category,
            'categories' => $categories,
            'equipmentsSearch' => json_encode(['search', $equipmentsSearch])
        ]);
    }

    public function login(){
        $equipmentsSearch = ElectricalEquipment::select(['id', 'name'])
            ->where('is_deleted', false)
            ->get()
            ->all();
        return view('site/equipments/sign_in',
            [
                'equipmentsSearch' => json_encode(['search', $equipmentsSearch]),
            ]);
    }

    public function logOut(){
        Auth::logout();

        return redirect('/');
    }

    public function register(){
        $equipmentsSearch = ElectricalEquipment::select(['id', 'name'])
            ->where('is_deleted', false)
            ->get()
            ->all();
        return view('site/equipments/register',
        [
            'equipmentsSearch' => json_encode(['search', $equipmentsSearch]),
        ]);
    }

    public function registerUser(RegisterRequest $request){
          $clientDto = UserDTO::fromRequest($request);
          Client::create($clientDto->toArray());
          return redirect('/login');
    }

    public function loginUser(LoginRequest $request){
        if(! Auth::attempt(array_slice($request->toArray(),1))){
           throw ValidationException::withMessages([
               'email' => 'Ошибка неверный логин или пароль'
           ]);
        }

        if(!session()->exists('carts')) {
            session()->put('carts', []);
        }
         return redirect('/cabinet');
    }

    public function search(Request $request)
    {
        $equipmentsSearch = ElectricalEquipment::select(['id', 'name'])
            ->where('is_deleted', false)
            ->get()
            ->all();
        $request->validate([
            'id' => 'nullable|integer|min:1|max:1000',
            'name' => 'nullable|string|min:1|max:100',
            'page' => 'nullable|integer|min:1|max:100',
        ]);
        if ($request->has('id')) {
            $equipment = ElectricalEquipment::where('id', $request['id'])->first();

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
            $equipments = ElectricalEquipment::where('name', 'ilike', '%' . $request['name'] . '%')->where('is_deleted', false)->paginate(10);

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
