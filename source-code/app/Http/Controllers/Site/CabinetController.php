<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditClientRequest;
use App\Http\Requests\PasswordClientRequest;
use App\Models\Client;
use App\Models\Order;
use App\Models\StatusOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CabinetController extends Controller
{
    public function index() {
        $client = Auth::getUser();

        return view('site/cabinet/profile', [
            'client' => $client
        ]);
    }

    public function editUser(EditClientRequest $request){
        $client = Client::find($request->id);
        $client->update([
            'fio' => $request->fio,
            'email' => $request->email,
            'age' => $request->age,
            'phone' => $request->phone,
            'sex'  => $request->gender,
        ]);

        return redirect()->back();
    }

    public function editPassword(PasswordClientRequest $request){
        $client = Client::find($request->id);
        $client->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back();
    }

    public function orders(){
        $client = Auth::getUser();
        $orders = Order::query()->with('equipment_orders', function ($query) {
            $query->select('image')->whereNotNull('image')->where('is_deleted', false)->first();
        })->withSum('equipment_order', 'cost')->where('client_id', $client->id)->with('status')->get()->toArray();

        return  view('site/cabinet/orders', [
          'orders' => $orders,
        ]);
    }

}
