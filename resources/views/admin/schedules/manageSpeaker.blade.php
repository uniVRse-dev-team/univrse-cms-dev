@extends('layouts.admin')
@section('content')
<!--
@can('organizer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.organizers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.organizer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
-->
<div style="margin-bottom: 10px;" class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.schedules.addSpeaker') }}">
               Add Speakers
            </a>
</div>

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user-tie c-sidebar-nav-icon"></i>
    <b>Speakers in Events</b>
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organizer">
            <thead>
                <tr>
                    <th>
                        Schedule
                    </th>
                    <th>
                        Speakers
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                
                @foreach ($speaker as $sp)
                <tr>
                    <td>
                        {{$sp->sch_title}}
                    </td>
                    <td>
                        {{$sp->name}}
                    </td>
                    <td><a href="{{ route('admin.schedules.removeSpeaker',['sc_id'=>$sp->sch_id,'sp_id'=>$sp->speaker_id] )}}" class="btn btn-danger" style="padding: 0 10px;">Delete</td>

                </tr>
                @endforeach
            </thead>
        </table>
        <a class="btn btn-danger" href="{{ route('admin.schedules.index') }}">Return</a>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script>

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.schedules.index') }}",
    columns: [
{ data: 'sch_id', name: 'sch_id' },
{ data: 'speaker_id', name: 'speaker_id' }
    ],
  });
  
});

</script>
@endsection