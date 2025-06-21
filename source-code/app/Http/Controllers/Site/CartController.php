<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCartRequest;
use App\Http\Requests\CartRequest;
use App\Http\Requests\DeleteCartRequest;
use App\Http\Requests\EditCartRequest;
use App\Models\ElectricalEquipment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function index(){
        $equipmentsSearch = ElectricalEquipment::select(['id', 'name'])
            ->where('is_deleted', false)
            ->get()
            ->all();
        return view('site/equipments/carts',
            [
                'equipmentsSearch' => json_encode(['search', $equipmentsSearch]),
            ]);
    }

    public function add(AddCartRequest $request){
        $carts = [];

        if(!$request->session()->exists('carts')){
            $equipment = ElectricalEquipment::query()->where('id', $request->id)->get()->toArray();

            $carts[] = [
                'id' => $request->id,
                'cost' => $request->cost-$request->cost*($request->discount/100),
                'count' => 1,
                'image' => $equipment[0]['image'],
                'name' => $equipment[0]['name'],
                'start_cost' => $request->cost-$request->cost*($request->discount/100),
            ];
            $request->session()->put('carts', $carts);
            return redirect()->back();
        }
        $carts = $request->session()->get('carts');
        $equipment = ElectricalEquipment::query()->where('id', $request->id)->get()->toArray();
        $carts[] = [
            'id' => $request->id,
            'cost' => $request->cost-$request->cost*($request->discount/100),
            'count' => 1,
            'image' => $equipment[0]['image'],
            'name' => $equipment[0]['name'],
            'start_cost' => $request->cost-$request->cost*($request->discount/100),
        ];
        $request->session()->put('carts', $carts);
        return redirect()->back();
    }

    public function delete(DeleteCartRequest $request){

          if(array_search($request->id,array_column(session()->get('carts'),'id')) === false){
              return redirect()->back();
          }

          $carts = session()->get('carts');
          foreach ($carts as $index => $data) {
              if($data['id'] == $request->id) {
                  unset($carts[$index]);
              }
          }
          session()->put('carts', $carts);

        return  redirect()->back();
    }

    public function edit(EditCartRequest $request){
        if(array_search($request->id,array_column(session()->get('carts'),'id')) === false){
            return redirect()->back();
        }


        $carts = session()->get('carts');
        foreach ($carts as $index => $data) {
            if($data['id'] == $request->id) {
                if($request->type == 'left' && $data['count'] - 1 == 0) {
                    unset($carts[$index]);
                    continue;
                }
                $data['count'] = ($request->type == 'right')? $data['count']+1 : $data['count']-1;

                $data['cost'] = $data['start_cost'] * $data['count'];
                $carts[$index] = $data;
            }
        }
        session()->put('carts', $carts);

        return  redirect()->back();
    }

    public function buyCarts(CartRequest $request){
        if(! Order::buyCarts($request->total)){
            throw ValidationException::withMessages([
                'name' => 'Ошибка при оформление заказа'
            ]);
        }

        return redirect('/');
    }
}
