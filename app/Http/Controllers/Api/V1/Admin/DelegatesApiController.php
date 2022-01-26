<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDelegateRequest;
use App\Http\Requests\UpdateDelegateRequest;
use App\Http\Resources\Admin\DelegateResource;
use App\Models\Delegate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DelegatesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('delegate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DelegateResource(Delegate::with(['created_by'])->get());
    }

    public function store(StoreDelegateRequest $request)
    {
        $delegate = Delegate::create($request->all());

        return (new DelegateResource($delegate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Delegate $delegate)
    {
        abort_if(Gate::denies('delegate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DelegateResource($delegate->load(['created_by']));
    }

    public function update(UpdateDelegateRequest $request, Delegate $delegate)
    {
        $delegate->update($request->all());

        return (new DelegateResource($delegate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Delegate $delegate)
    {
        abort_if(Gate::denies('delegate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delegate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
