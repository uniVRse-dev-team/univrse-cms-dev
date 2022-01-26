<?php

namespace App\Http\Requests;

use App\Models\Delegate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDelegateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('delegate_create');
    }

    public function rules()
    {
        return [
            'del_name' => [
                'string',
                'required',
            ],
            'del_position' => [
                'string',
                'required',
            ],
            'del_office' => [
                'string',
                'min:11',
                'max:15',
                'nullable',
            ],
            'del_mobile' => [
                'string',
                'min:11',
                'max:15',
                'required',
            ],
            'del_email' => [
                'string',
                'required',
            ],
            'del_adr_1' => [
                'string',
                'required',
            ],
            'del_adr_2' => [
                'string',
                'required',
            ],
            'del_postcode' => [
                'string',
                'required',
            ],
            'del_city' => [
                'string',
                'required',
            ],
            'del_state' => [
                'string',
                'required',
            ],
            'del_country' => [
                'string',
                'required',
            ],
            'del_twitter' => [
                'string',
                'nullable',
            ],
            'del_linkedin' => [
                'string',
                'nullable',
            ],
            'del_facebook' => [
                'string',
                'nullable',
            ],
        ];
    }
}
