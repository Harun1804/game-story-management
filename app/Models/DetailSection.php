<?php

namespace App\Models;

use App\Models\GameSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_section_id',
        'part',
        'type',
        'description',
        'dialog_with',
        'status'
    ];

    public function gameSection()
    {
        return $this->belongsTo(GameSection::class);
    }
}
