<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Organizer;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ViewBriefcaseRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('briefcase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    
}

}