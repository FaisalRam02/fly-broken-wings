<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('user'),
            'password' => $this->route('user') ? 'nullable|min:8' : 'required|min:8',
            'gender' => 'nullable|in:male,female,other', // Validasi jenis kelamin
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto
        ];
    }    
}
