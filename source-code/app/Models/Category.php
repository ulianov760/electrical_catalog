<?php


namespace App\Models;


use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function equipment(): HasOne
    {
        return $this->hasOne(ElectricalEquipment::class);
    }

    public function delete()
    {
        if($this->equipment()->where('category_id',$this->attributes['id'])->exists()){
            return false;
        }
        Category::where('id',$this->attributes['id'])->delete();
        return true;
    }
}
