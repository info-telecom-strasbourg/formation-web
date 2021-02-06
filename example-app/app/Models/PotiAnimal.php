<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotiAnimal extends Model
{
    use HasFactory;

    /**
     * Get the type of the poti animal.
     */
    public function type()
    {
        return $this->belongsTo(PotiAnimauxType::class);
    }
}
