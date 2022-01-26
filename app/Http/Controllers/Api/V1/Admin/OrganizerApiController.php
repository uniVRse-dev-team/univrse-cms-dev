<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOrganizerRequest;
use App\Http\Requests\UpdateOrganizerRequest;
use App\Http\Resources\Admin\OrganizerResource;
use App\Models\Organizer;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('organizer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizerResource(Organizer::with(['created_by'])->get());
    }

    public function store(StoreOrganizerRequest $request)
    {
        $organizer = Organizer::create($request->all());

        if ($request->input('org_logo', false)) {
            $organizer->addMedia(storage_path('tmp/uploads/' . basename($request->input('org_logo'))))->toMediaCollection('org_logo');
        }

        return (new OrganizerResource($organizer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Organizer $organizer)
    {
        abort_if(Gate::denies('organizer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizerResource($organizer->load(['created_by']));
    }

    public function update(UpdateOrganizerRequest $request, Organizer $organizer)
    {
        $organizer->update($request->all());

        if ($request->input('org_logo', false)) {
            if (!$organizer->org_logo || $request->input('org_logo') !== $organizer->org_logo->file_name) {
                if ($organizer->org_logo) {
                    $organizer->org_logo->delete();
                }
                $organizer->addMedia(storage_path('tmp/uploads/' . basename($request->input('org_logo'))))->toMediaCollection('org_logo');
            }
        } elseif ($organizer->org_logo) {
            $organizer->org_logo->delete();
        }

        return (new OrganizerResource($organizer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Organizer $organizer)
    {
        abort_if(Gate::denies('organizer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function addSpeaker(Request $request){
        $query = "INSERT INTO schedule_speaker VALUES('" . $request->sch_id . "', '" . $request->speaker_id . "')";
        DB::insert($query);

        $response = "Success.";
        return $response;
    }
}
