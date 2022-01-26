<?php

namespace App\Http\Requests;

use App\Models\Schedule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('schedule_create');
    }

    public function rules()
    {
        return [
            'sch_start_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'sch_end_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'sch_title' => [
                'string',
                'required',
            ],
            'sch_description' => [
                'string',
                'required',
            ],
            'sch_speaker' => [
                'string',
                'required',
            ],
            'sch_venue' => [
                'string',
                'required',
            ],
            'sch_price' => [
                'string',
                'nullable',
            ],
            'sch_max_pax' => [
                'string',
                'required',
            ],
        ];
    }
}
