<?php

namespace App\Models;

use App\Traits\HasImage;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElectricalEquipment extends Model
{
    use HasImage;
    use CrudTrait;
    use HasFactory;

    protected $table = 'electrical_equipments';


    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'characters',
        'category_id',
        'discount',
        'count',
        'cost',
        'is_deleted',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function setImageAttribute(?string $image)
    {
        $newImage = $image;

        if (str_starts_with($image, 'data:image')) {
            $newImage = $this->uploadImage(
                $image,
                'equipments',
                $this,
                'image'
            );
        }

        $this->attributes['image'] = $newImage;
    }

}
