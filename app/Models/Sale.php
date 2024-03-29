<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'agf_id',
        'date',
        'expiration_date',
        'nf'
    ];

    protected $casts = [
        'date' => 'datetime',
        'expiration_date' => 'datetime'
    ];

    public function products(): belongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function agf(): BelongsTo
    {
        return $this->belongsTo(Agf::class);
    }
}
