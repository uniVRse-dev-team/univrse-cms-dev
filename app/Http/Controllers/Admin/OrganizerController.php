<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOrganizerRequest;
use App\Http\Requests\StoreOrganizerRequest;
use App\Http\Requests\UpdateOrganizerRequest;
use App\Models\Organizer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrganizerController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('organizer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Organizer::with(['created_by'])->select(sprintf('%s.*', (new Organizer())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'organizer_show';
                $editGate = 'organizer_edit';
                $deleteGate = 'organizer_delete';
                $crudRoutePart = 'organizers';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('org_name', function ($row) {
                return $row->org_name ? $row->org_name : '';
            });
            $table->editColumn('org_adr_1', function ($row) {
                return $row->org_adr_1 ? $row->org_adr_1 : '';
            });
            $table->editColumn('org_adr_2', function ($row) {
                return $row->org_adr_2 ? $row->org_adr_2 : '';
            });
            $table->editColumn('org_postcode', function ($row) {
                return $row->org_postcode ? $row->org_postcode : '';
            });
            $table->editColumn('org_city', function ($row) {
                return $row->org_city ? $row->org_city : '';
            });
            $table->editColumn('org_state', function ($row) {
                return $row->org_state ? $row->org_state : '';
            });
            $table->editColumn('org_country', function ($row) {
                return $row->org_country ? $row->org_country : '';
            });
            $table->editColumn('org_email', function ($row) {
                return $row->org_email ? $row->org_email : '';
            });
            $table->editColumn('org_pic', function ($row) {
                return $row->org_pic ? $row->org_pic : '';
            });
            $table->editColumn('org_mobile', function ($row) {
                return $row->org_mobile ? $row->org_mobile : '';
            });
            $table->editColumn('org_logo', function ($row) {
                return $row->org_logo ? '<a href="' . $row->org_logo->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'org_logo']);

            return $table->make(true);
        }

        return view('admin.organizers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('organizer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organizers.create');
    }

    public function store(StoreOrganizerRequest $request)
    {
        $organizer = Organizer::create($request->all());

        if ($request->input('org_logo', false)) {
            $organizer->addMedia(storage_path('tmp/uploads/' . basename($request->input('org_logo'))))->toMediaCollection('org_logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $organizer->id]);
        }

        return redirect()->route('admin.organizers.index');
    }

    public function edit(Organizer $organizer)
    {
        abort_if(Gate::denies('organizer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizer->load('created_by');

        return view('admin.organizers.edit', compact('organizer'));
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

        return redirect()->route('admin.organizers.index');
    }

    public function show(Organizer $organizer)
    {
        abort_if(Gate::denies('organizer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizer->load('created_by');

        return view('admin.organizers.show', compact('organizer'));
    }

    public function destroy(Organizer $organizer)
    {
        abort_if(Gate::denies('organizer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizer->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganizerRequest $request)
    {
        Organizer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('organizer_create') && Gate::denies('organizer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Organizer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
