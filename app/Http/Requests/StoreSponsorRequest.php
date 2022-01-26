<?php

namespace App\Http\Requests;

use App\Models\Sponsor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSponsorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sponsor_create');
    }

    public function rules()
    {
        return [
            'spo_register' => [
                'string',
                'required',
                'unique:sponsors',
            ],
            'spo_name' => [
                'string',
                'required',
            ],
            'spo_adr_1' => [
                'string',
                'required',
            ],
            'spo_adr_2' => [
                'string',
                'required',
            ],
            'spo_postcode' => [
                'string',
                'required',
            ],
            'spo_city' => [
                'string',
                'required',
            ],
            'spo_state' => [
                'string',
                'required',
            ],
            'spo_country' => [
                'string',
                'required',
            ],
            'spo_email' => [
                'string',
                'required',
            ],
            'spo_pic' => [
                'string',
                'required',
            ],
            'spo_position' => [
                'string',
                'required',
            ],
            'spo_office' => [
                'string',
                'min:11',
                'max:15',
                'nullable',
            ],
            'spo_mobile' => [
                'string',
                'min:11',
                'max:15',
                'required',
            ],
            'spo_package' => [
                'required',
            ],
            'spo_amount' => [
                'string',
                'required',
            ],
            'spo_logo' => [
                'required',
            ],
        ];
    }
}
