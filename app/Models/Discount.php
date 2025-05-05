<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'type',
        'value',
        'start_date',
        'end_date',
        'status'
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

   
    public function isActive()
    {
        $now = now();
        return $this->status && (!$this->start_date || $this->start_date <= $now) && (!$this->end_date || $this->end_date >= $now);
    }

    // app/Models/Discount.php

    public function scopeActive($query)
    {
        $now = now();

        return $query->where('status', 1)
            ->where(function ($q) use ($now) {
                $q->whereNull('start_date')->orWhere('start_date', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('end_date')->orWhere('end_date', '>=', $now);
            });
    }


}
