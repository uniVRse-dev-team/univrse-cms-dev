<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDelegateRequest;
use App\Http\Requests\StoreDelegateRequest;
use App\Http\Requests\UpdateDelegateRequest;
use App\Models\Delegate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DelegatesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('delegate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Delegate::with(['created_by'])->select(sprintf('%s.*', (new Delegate())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'delegate_show';
                $editGate = 'delegate_edit';
                $deleteGate = 'delegate_delete';
                $crudRoutePart = 'delegates';

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
            $table->editColumn('del_name', function ($row) {
                return $row->del_name ? $row->del_name : '';
            });
            $table->editColumn('del_position', function ($row) {
                return $row->del_position ? $row->del_position : '';
            });
            $table->editColumn('del_office', function ($row) {
                return $row->del_office ? $row->del_office : '';
            });
            $table->editColumn('del_mobile', function ($row) {
                return $row->del_mobile ? $row->del_mobile : '';
            });
            $table->editColumn('del_email', function ($row) {
                return $row->del_email ? $row->del_email : '';
            });
            $table->editColumn('del_adr_1', function ($row) {
                return $row->del_adr_1 ? $row->del_adr_1 : '';
            });
            $table->editColumn('del_adr_2', function ($row) {
                return $row->del_adr_2 ? $row->del_adr_2 : '';
            });
            $table->editColumn('del_postcode', function ($row) {
                return $row->del_postcode ? $row->del_postcode : '';
            });
            $table->editColumn('del_city', function ($row) {
                return $row->del_city ? $row->del_city : '';
            });
            $table->editColumn('del_state', function ($row) {
                return $row->del_state ? $row->del_state : '';
            });
            $table->editColumn('del_country', function ($row) {
                return $row->del_country ? $row->del_country : '';
            });
            $table->editColumn('del_speaker', function ($row) {
                return $row->del_speaker ? Delegate::DEL_SPEAKER_RADIO[$row->del_speaker] : '';
            });
            $table->editColumn('del_twitter', function ($row) {
                return $row->del_twitter ? $row->del_twitter : '';
            });
            $table->editColumn('del_linkedin', function ($row) {
                return $row->del_linkedin ? $row->del_linkedin : '';
            });
            $table->editColumn('del_facebook', function ($row) {
                return $row->del_facebook ? $row->del_facebook : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.delegates.index');
    }

    public function create()
    {
        abort_if(Gate::denies('delegate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delegates.create');
    }

    public function store(StoreDelegateRequest $request)
    {
        $delegate = Delegate::create($request->all());

        return redirect()->route('admin.delegates.index');
    }

    public function edit(Delegate $delegate)
    {
        abort_if(Gate::denies('delegate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delegate->load('created_by');

        return view('admin.delegates.edit', compact('delegate'));
    }

    public function update(UpdateDelegateRequest $request, Delegate $delegate)
    {
        $delegate->update($request->all());

        return redirect()->route('admin.delegates.index');
    }

    public function show(Delegate $delegate)
    {
        abort_if(Gate::denies('delegate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delegate->load('created_by');

        return view('admin.delegates.show', compact('delegate'));
    }

    public function destroy(Delegate $delegate)
    {
        abort_if(Gate::denies('delegate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delegate->delete();

        return back();
    }

    public function massDestroy(MassDestroyDelegateRequest $request)
    {
        Delegate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
