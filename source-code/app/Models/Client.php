<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'id',
        'fio',
        'email',
        'password',
        'phone',
        'age',
        'sex',
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class, 'client_id');
    }

    public function delete()
    {
        if($this->order()->where('client_id',$this->attributes['id'])->exists()){
            return false;
        }
        Client::where('id',$this->attributes['id'])->delete();
        return true;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            //'sex' => SexSelect::class,
        ];
    }
}
