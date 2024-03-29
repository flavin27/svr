<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agf extends Model
{
    use HasFactory;

    protected $table = 'agfs';

    protected $fillable = [
        'name',
    ];

    public function Sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
