<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    use CrudTrait;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'amount',
        'date',
        'order_id',
        'type_payment_id',
        'status_id',
    ];

    public function setDatetimeAttribute($value) {
        $this->attributes['datetime'] = \Carbon\Carbon::parse($value);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(TypePayment::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusPayment::class);
    }
}
