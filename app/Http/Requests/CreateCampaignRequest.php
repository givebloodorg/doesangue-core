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
            'title' => 'required|string|unique:campaigns',
            'expires' => 'required|date|after:created_at',
        //           'id_user' => 'required|integer:exists:users',
        ];
    }

    public function messages()
    {
        return [
        'title.required' => 'Please provide a campaign tite!',
        'title.unique' => 'Already exists a campaign with this title!',
        'expires.required' => 'Please provide a date when the campaign will expire!',
        'id_user' => 'Looks like the author is not recognized!',
        ];
    }
}
