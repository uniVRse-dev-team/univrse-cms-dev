<?php

namespace App\Http\Requests;

use App\Models\Organizer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrganizerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organizer_create');
    }

    public function rules()
    {
        return [
            'org_register' => [
                'string',
                'required',
                'unique:organizers',
            ],
            'org_name' => [
                'string',
                'required',
            ],
            'org_adr_1' => [
                'string',
                'required',
            ],
            'org_adr_2' => [
                'string',
                'required',
            ],
            'org_postcode' => [
                'string',
                'required',
            ],
            'org_city' => [
                'string',
                'required',
            ],
            'org_state' => [
                'string',
                'required',
            ],
            'org_country' => [
                'string',
                'required',
            ],
            'org_email' => [
                'required',
            ],
            'org_pic' => [
                'string',
                'required',
            ],
            'org_position' => [
                'string',
                'required',
            ],
            'org_office' => [
                'string',
                'min:11',
                'max:15',
                'nullable',
            ],
            'org_mobile' => [
                'string',
                'required',
            ],
            'org_logo' => [
                'required',
            ],
        ];
    }
}
