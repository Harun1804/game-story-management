<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateGameProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user();
    }

    public function rules()
    {
        return [
            'title'     => ["required","unique:game_projects,title,".$this->game_project->id],
            'thumbnail' => 'nullable|mimes:png,jpg,jpeg|image|max:2048'
        ];
    }
}
