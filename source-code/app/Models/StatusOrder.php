<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StatusOrder extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class,'status_id');
    }

    public function delete()
    {
        if($this->order()->where('status_id',$this->attributes['id'])->exists()){
            return false;
        }
        StatusOrder::where('id',$this->attributes['id'])->delete();
        return true;
    }
}
