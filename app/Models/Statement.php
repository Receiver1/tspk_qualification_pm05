<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'user_id',
        'license_plate',
        'description',
        'status'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
