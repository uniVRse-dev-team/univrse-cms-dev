<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Http\Resources\Admin\SponsorResource;
use App\Models\Sponsor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SponsorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sponsor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SponsorResource(Sponsor::with(['created_by'])->get());
    }

    public function store(StoreSponsorRequest $request)
    {
        $sponsor = Sponsor::create($request->all());

        if ($request->input('spo_logo', false)) {
            $sponsor->addMedia(storage_path('tmp/uploads/' . basename($request->input('spo_logo'))))->toMediaCollection('spo_logo');
        }

        return (new SponsorResource($sponsor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SponsorResource($sponsor->load(['created_by']));
    }

    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        $sponsor->update($request->all());

        if ($request->input('spo_logo', false)) {
            if (!$sponsor->spo_logo || $request->input('spo_logo') !== $sponsor->spo_logo->file_name) {
                if ($sponsor->spo_logo) {
                    $sponsor->spo_logo->delete();
                }
                $sponsor->addMedia(storage_path('tmp/uploads/' . basename($request->input('spo_logo'))))->toMediaCollection('spo_logo');
            }
        } elseif ($sponsor->spo_logo) {
            $sponsor->spo_logo->delete();
        }

        return (new SponsorResource($sponsor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sponsor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
