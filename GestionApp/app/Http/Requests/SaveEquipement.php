<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEquipement extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'equipement' => 'required',
            'serialnumber' => 'required',
            'productnumber' => 'required',
            'equipementtype' => 'required',
            'location_id' => 'required',
            'site_id' => 'required',
            'state_id' => 'required',
            'available' => 'required',
            'feedback' => 'required',
            'observation' => 'required'
        ];
    }
}
