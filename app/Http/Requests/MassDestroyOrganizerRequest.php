<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Organizer;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOrganizerRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('organizer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:organizers,id',
]
    
}

}