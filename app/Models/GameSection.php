<?php

namespace App\Models;

use App\Models\GameProject;
use App\Models\DetailSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_project_id',
        'part',
        'title',
        'status'
    ];

    public function gameProject()
    {
        return $this->belongsTo(GameProject::class);
    }

    public function details()
    {
        return $this->hasMany(DetailSection::class);
    }

    public function scopeFinishSection($query)
    {
        return $query->where('status',2);
    }
}
