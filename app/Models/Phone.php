<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;


class Phone extends Model
{
    use HasFactory;
    use HasCompositeKey;

    protected $primaryKey = ['code', 'number'];

    protected $fillable = [
        'code', 'number'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
