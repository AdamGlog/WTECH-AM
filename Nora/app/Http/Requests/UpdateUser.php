<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'meno' => 'required|string|max:20',
            'priezvisko' => 'required|string|max:20',
            'nickname' => 'required|string|max:30',
            'email' => ['required', 'email', 'max:30', Rule::unique('pouzivatelia', 'email')->ignore($this->route('user'))],
            'heslo' => 'nullable|string|min:8',
            'telefonne_cislo' => 'nullable|string|max:20',

            'ulica' => 'nullable|string|max:20',
            'cislo_domu' => 'nullable|string|max:10',
            
            'role' => 'required|integer|in:1,2', 
            'typ_clena' => 'required|integer|exists:urovne_clenov,id', 
            'mesto_psc' => 'nullable|integer|exists:mesta_s_psc,id', 
            
            'profilovka_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', 
        ];
    }
}
