<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Sponsor;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySponsorRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('sponsor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:sponsors,id',
]
    
}

}