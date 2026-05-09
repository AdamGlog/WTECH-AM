<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'meno' => 'required|string|max:255',
            'kategoria_id' => 'required|integer',
            'cena' => 'required|numeric',
            'hodnotenie' => 'nullable|numeric|between:0,5',
            'pocet_na_sklade' => 'required|integer',
            'popis' => 'nullable|string',
            'info' => 'nullable|string',
            'doplnkove_info' => 'nullable|string',
            'typ' => 'nullable|string|max:30',
            'obrazky.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
            'odstranit_obrazky' => 'nullable|array', // Povolíme pole ID-čiek na zmazanie
            'odstranit_obrazky.*' => 'exists:produkt_obrazky,id', // Každé ID musí existovať v DB
        ];
    }
}
