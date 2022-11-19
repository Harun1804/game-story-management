<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreGameProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user();
    }

    public function rules()
    {
        return [
            'title'     => 'required|unique:game_projects,title',
            'thumbnail' => 'required|mimes:png,jpg,jpeg|image|max:2048'
        ];
    }
}
