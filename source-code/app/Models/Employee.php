<?php

namespace App\Models;

use App\Enums\SexSelect;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
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
        'post_id',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class, 'order_id');
    }


    public function employee_roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'employee_roles', 'employee_id', 'role_id');
    }

    public function hasRoles(array $roles): bool
    {
        foreach ($roles as $role) {
            if($this->employee_roles()->where('name', $role)->exists()){
                return true;
            }
        }
        return false;
    }

    public function delete()
    {
        if($this->order()->where('employee_id',$this->attributes['id'])->exists()){
            return false;
        }
        Employee::where('id',$this->attributes['id'])->delete();
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
        ];
    }
}
