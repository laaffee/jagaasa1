<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';
 
    protected $guarded = [];
    
    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/slide/' . $value),
        );
    }
}
