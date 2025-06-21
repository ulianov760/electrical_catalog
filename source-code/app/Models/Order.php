<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class Order extends Model
{
    use HasFactory;
    use CrudTrait;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'date_create',
        'date_finish',
        'client_id',
        'employee_id',
        'status_id',
    ];

    public function setDatetimeAttribute($value) {
        $this->attributes['datetime'] = \Carbon\Carbon::parse($value);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function equipment_orders(): BelongsToMany
    {
        return $this->belongsToMany(ElectricalEquipment::class, EquipmentOrders::class, 'order_id', 'equipment_id');
    }

    public function equipment_order(): HasMany
    {
        return $this->hasMany(EquipmentOrders::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusOrder::class, 'status_id');
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class, 'order_id');
    }

    public function delete()
    {
        if($this->payment()->where('order_id',$this->attributes['id'])->exists()
            || $this->equipment_order()->where('order_id',$this->attributes['id'])->exists()){
            return false;
        }
        Order::where('id',$this->attributes['id'])->delete();
        return true;
    }

    public static function buyCarts($total){
        try {
            $client = Auth::getUser();
            $managers = Employee::select('id')->get()->toArray();
            $statusOrder = StatusOrder::where('name', 'Оплачено')->select('id')->value('id');
            $statusPayment = StatusPayment::where('name', 'Успешно')->select('id')->value('id');
            $typePayments = TypePayment::select('id')->get()->toArray();
            $numbPayment = mt_rand(0, count($typePayments) - 1);
            $numb = mt_rand(0, count($managers) - 1);

            $order = Order::create([
                'client_id' => $client->id,
                'employee_id' => $managers[$numb]['id'],
                'status_id' => $statusOrder
            ]);
            Payment::create([
                'amount' => $total,
                'order_id' => $order->id,
                'status_id' => $statusPayment,
                'type_payment_id' => $typePayments[$numbPayment]['id'],
            ]);
            $data = [];
            foreach (session()->get('carts') as $cart) {
                $data[] = [
                    'cost' => $cart['cost'],
                    'count' => $cart['count'],
                    'order_id' => $order->id,
                    'equipment_id' => $cart['id'],
                ];
            }
            EquipmentOrders::insert($data);
            session()->put('carts', []);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
