<?php

namespace App\Http\Requests;

use App\Models\Exhibitor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExhibitorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exhibitor_create');
    }

    public function rules()
    {
        return [
            'exh_register' => [
                'string',
                'required',
                'unique:exhibitors',
            ],
            'exh_name' => [
                'string',
                'required',
            ],
            'exh_adr_1' => [
                'string',
                'required',
            ],
            'exh_adr_2' => [
                'string',
                'required',
            ],
            'exh_postcode' => [
                'string',
                'required',
            ],
            'exh_city' => [
                'string',
                'required',
            ],
            'exh_state' => [
                'string',
                'required',
            ],
            'exh_country' => [
                'string',
                'required',
            ],
            'exh_email' => [
                'required',
            ],
            'exh_pic' => [
                'string',
                'required',
            ],
            'exh_position' => [
                'string',
                'required',
            ],
            'exh_office' => [
                'string',
                'min:11',
                'max:15',
                'nullable',
            ],
            'exh_mobile' => [
                'string',
                'required',
            ],
            'exh_logo' => [
                'required',
            ],
        ];
    }
}
