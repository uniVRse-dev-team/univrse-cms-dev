<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use DB;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Schedule::with(['created_by'])->select(sprintf('%s.*', (new Schedule())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'schedule_show';
                $editGate = 'schedule_edit';
                $deleteGate = 'schedule_delete';
                $crudRoutePart = 'schedules';

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

            $table->editColumn('sch_title', function ($row) {
                return $row->sch_title ? $row->sch_title : '';
            });
            $table->editColumn('sch_description', function ($row) {
                return $row->sch_description ? $row->sch_description : '';
            });
            $table->editColumn('sch_venue', function ($row) {
                return $row->sch_venue ? $row->sch_venue : '';
            });
            $table->editColumn('sch_price', function ($row) {
                return $row->sch_price ? $row->sch_price : '';
            });
            $table->editColumn('sch_max_pax', function ($row) {
                return $row->sch_max_pax ? $row->sch_max_pax : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.schedules.index');
    }

    public function create()
    {
        abort_if(Gate::denies('schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.schedules.create');
    }

    public function store(StoreScheduleRequest $request)
    {
        $mCount = Media::all()->count();

        $schedule = Schedule::create($request->all());

        return redirect()->route('admin.schedules.index');
    }

    public function edit(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->load('created_by');

        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index');
    }

    public function show(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->load('created_by');

        return view('admin.schedules.show', compact('schedule'));
    }

    public function destroy(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->delete();

        return back();
    }

    public function massDestroy(MassDestroyScheduleRequest $request)
    {
        Schedule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('schedule_create') && Gate::denies('schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Schedule();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function manageSpeaker(){
        /*
        $speaker = DB::select('select ss.sch_id, sch.sch_title, ss.speaker_id, u.name from schedule_speaker ss, schedules sch, users u
            WHERE ss.sch_id = sch.id AND ss.speaker_id = u.id');
            return view('admin.schedules.manageSpeaker',['speaker'=>$speaker]);
        */

        
    }

    public function removeSpeaker($sch_id,$speaker_id){
        $select = "DELETE FROM schedule_speaker WHERE sch_id=" . $sch_id . " AND speaker_id = " . $speaker_id;
        DB::delete($select);

        $speaker = DB::select('select ss.sch_id, sch.sch_title, ss.speaker_id, u.name from schedule_speaker ss, schedules sch, users u
            WHERE ss.sch_id = sch.id AND ss.speaker_id = u.id');
            return view('admin.schedules.manageSpeaker',['speaker'=>$speaker]);
    }

    public function addSpeaker(){
        $hall = DB::select('select * from schedules');
        $user = DB::select('select * from users ORDER BY name ASC');
        return view('admin.schedules.addSpeaker', ['hall'=>$hall, 'user'=>$user]);
    }

    public function addingSpeaker(Request $request){
        $request->validate([
            'sch_id' => 'required',
            'speaker_id' => 'required'
        ]);

        $check = "SELECT * FROM schedule_speaker WHERE sch_id=" . $request->sch_id . " AND speaker_id=" . $request->speaker_id;
        $query = DB::select($check);
        if($query == null) {
         
            DB::table('schedule_speaker')->insert([
                'sch_id' => $request->sch_id,
                'speaker_id' => $request->speaker_id
            ]);

        $speaker = DB::select('select * from schedule_speaker');
        return view('admin.schedules.manageSpeaker',['speaker'=>$speaker]);

        } else {
            $speaker = DB::select('select ss.sch_id, sch.sch_title, ss.speaker_id, u.name from schedule_speaker ss, schedules sch, users u
            WHERE ss.sch_id = sch.id AND ss.speaker_id = u.id');
            return view('admin.schedules.manageSpeaker',['speaker'=>$speaker]);
        }
    }
}
