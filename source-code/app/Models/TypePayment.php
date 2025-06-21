<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TypePayment extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function delete()
    {
        if($this->payment()->where('type_payment_id',$this->attributes['id'])->exists()){
            return false;
        }
        TypePayment::where('id',$this->attributes['id'])->delete();
        return true;
    }
}
