<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreGameSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user();
    }

    public function rules()
    {
        return [
            'game_project_id'   => 'required|exists:game_projects,id',
            'title'             => 'required'
        ];
    }
}
