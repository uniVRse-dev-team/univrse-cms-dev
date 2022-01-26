<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySponsorRequest;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Models\Sponsor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SponsorController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sponsor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sponsor::with(['created_by'])->select(sprintf('%s.*', (new Sponsor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sponsor_show';
                $editGate = 'sponsor_edit';
                $deleteGate = 'sponsor_delete';
                $crudRoutePart = 'sponsors';

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
            $table->editColumn('spo_name', function ($row) {
                return $row->spo_name ? $row->spo_name : '';
            });
            $table->editColumn('spo_adr_1', function ($row) {
                return $row->spo_adr_1 ? $row->spo_adr_1 : '';
            });
            $table->editColumn('spo_adr_2', function ($row) {
                return $row->spo_adr_2 ? $row->spo_adr_2 : '';
            });
            $table->editColumn('spo_postcode', function ($row) {
                return $row->spo_postcode ? $row->spo_postcode : '';
            });
            $table->editColumn('spo_city', function ($row) {
                return $row->spo_city ? $row->spo_city : '';
            });
            $table->editColumn('spo_state', function ($row) {
                return $row->spo_state ? $row->spo_state : '';
            });
            $table->editColumn('spo_country', function ($row) {
                return $row->spo_country ? $row->spo_country : '';
            });
            $table->editColumn('spo_email', function ($row) {
                return $row->spo_email ? $row->spo_email : '';
            });
            $table->editColumn('spo_pic', function ($row) {
                return $row->spo_pic ? $row->spo_pic : '';
            });
            $table->editColumn('spo_mobile', function ($row) {
                return $row->spo_mobile ? $row->spo_mobile : '';
            });
            $table->editColumn('spo_package', function ($row) {
                return $row->spo_package ? Sponsor::SPO_PACKAGE_SELECT[$row->spo_package] : '';
            });
            $table->editColumn('spo_amount', function ($row) {
                return $row->spo_amount ? $row->spo_amount : '';
            });
            $table->editColumn('spo_logo', function ($row) {
                return $row->spo_logo ? '<a href="' . $row->spo_logo->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'spo_logo']);

            return $table->make(true);
        }

        return view('admin.sponsors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sponsor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sponsors.create');
    }

    public function store(StoreSponsorRequest $request)
    {
        $sponsor = Sponsor::create($request->all());

        if ($request->input('spo_logo', false)) {
            $sponsor->addMedia(storage_path('tmp/uploads/' . basename($request->input('spo_logo'))))->toMediaCollection('spo_logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sponsor->id]);
        }

        return redirect()->route('admin.sponsors.index');
    }

    public function edit(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sponsor->load('created_by');

        return view('admin.sponsors.edit', compact('sponsor'));
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

        return redirect()->route('admin.sponsors.index');
    }

    public function show(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sponsor->load('created_by');

        return view('admin.sponsors.show', compact('sponsor'));
    }

    public function destroy(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sponsor->delete();

        return back();
    }

    public function massDestroy(MassDestroySponsorRequest $request)
    {
        Sponsor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sponsor_create') && Gate::denies('sponsor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Sponsor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
