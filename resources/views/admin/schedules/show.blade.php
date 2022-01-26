@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-clock-o c-sidebar-nav-icon"></i>
        <b>{{ trans('global.show') }} {{ trans('cruds.schedule.title') }}</b>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.id') }}
                        </th>
                        <td>
                            {{ $schedule->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.sch_start_time') }}
                        </th>
                        <td>
                            {{ $schedule->sch_start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.sch_end_time') }}
                        </th>
                        <td>
                            {{ $schedule->sch_end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.sch_title') }}
                        </th>
                        <td>
                            {{ $schedule->sch_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.sch_description') }}
                        </th>
                        <td>
                            {{ $schedule->sch_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.sch_pic') }}
                        </th>
                        <td>
                            {{ $schedule->sch_pic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.sch_venue') }}
                        </th>
                        <td>
                            {{ $schedule->sch_venue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.sch_price') }}
                        </th>
                        <td>
                            {{ $schedule->sch_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.schedule.fields.sch_max_pax') }}
                        </th>
                        <td>
                            {{ $schedule->sch_max_pax }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-link" href="{{ route('admin.schedules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection