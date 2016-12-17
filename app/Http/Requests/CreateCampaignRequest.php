<?php

namespace DoeSangue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:60',
            'expires' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
        'title.required' => 'Por favor informe o titulo',
        'expires.required' => 'Por favor informe a data de expiração',
        ];
    }
}
