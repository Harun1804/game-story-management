<?php

namespace App\Models;

use App\Models\GameSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'status'
    ];

    public function thumbnail():Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('/storage/games/'.$value)
        );
    }

    public function sections()
    {
        return $this->hasMany(GameSection::class);
    }
}
