<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StatusPayment extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class,'status_id');
    }

    public function delete()
    {
        if($this->payment()->where('status_id',$this->attributes['id'])->exists()){
            return false;
        }
        StatusPayment::where('id',$this->attributes['id'])->delete();
        return true;
    }
}
