<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGameSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user();
    }

    public function rules()
    {
        return [
            'game_project_id'   => 'required|exists:game_projects,id',
            'title'             => 'required',
            'part'              => 'required|integer'
        ];
    }
}
