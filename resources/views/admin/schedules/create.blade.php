@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-clock-o c-sidebar-nav-icon"></i>
        <b>{{ trans('global.create') }} {{ trans('cruds.schedule.title_singular') }}</b>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.schedules.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="sch_start_time">{{ trans('cruds.schedule.fields.sch_start_time') }}</label>
                <input class="form-control datetime {{ $errors->has('sch_start_time') ? 'is-invalid' : '' }}" type="text" name="sch_start_time" id="sch_start_time" value="{{ old('sch_start_time') }}" required>
                @if($errors->has('sch_start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sch_start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.schedule.fields.sch_start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sch_end_time">{{ trans('cruds.schedule.fields.sch_end_time') }}</label>
                <input class="form-control datetime {{ $errors->has('sch_end_time') ? 'is-invalid' : '' }}" type="text" name="sch_end_time" id="sch_end_time" value="{{ old('sch_end_time') }}" required>
                @if($errors->has('sch_end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sch_end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.schedule.fields.sch_end_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sch_title">{{ trans('cruds.schedule.fields.sch_title') }}</label>
                <input class="form-control {{ $errors->has('sch_title') ? 'is-invalid' : '' }}" type="text" name="sch_title" id="sch_title" value="{{ old('sch_title', '') }}" required>
                @if($errors->has('sch_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sch_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.schedule.fields.sch_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sch_description">{{ trans('cruds.schedule.fields.sch_description') }}</label>
                <input class="form-control {{ $errors->has('sch_description') ? 'is-invalid' : '' }}" type="text" name="sch_description" id="sch_description" value="{{ old('sch_description', '') }}" required>
                @if($errors->has('sch_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sch_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.schedule.fields.sch_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sch_pic">{{ trans('cruds.schedule.fields.sch_pic') }}</label>
                <input class="form-control {{ $errors->has('sch_pic') ? 'is-invalid' : '' }}" type="text" name="sch_pic" id="sch_pic" value="{{ old('sch_pic', '') }}" required>
                @if($errors->has('sch_pic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sch_pic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.schedule.fields.sch_pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sch_venue">{{ trans('cruds.schedule.fields.sch_venue') }}</label>
                <input class="form-control {{ $errors->has('sch_venue') ? 'is-invalid' : '' }}" type="text" name="sch_venue" id="sch_venue" value="{{ old('sch_venue', '') }}" required>
                @if($errors->has('sch_venue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sch_venue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.schedule.fields.sch_venue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sch_price">{{ trans('cruds.schedule.fields.sch_price') }}</label>
                <input class="form-control {{ $errors->has('sch_price') ? 'is-invalid' : '' }}" type="text" name="sch_price" id="sch_price" value="{{ old('sch_price', '') }}">
                @if($errors->has('sch_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sch_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.schedule.fields.sch_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sch_max_pax">{{ trans('cruds.schedule.fields.sch_max_pax') }}</label>
                <input class="form-control {{ $errors->has('sch_max_pax') ? 'is-invalid' : '' }}" type="text" name="sch_max_pax" id="sch_max_pax" value="{{ old('sch_max_pax', '') }}" required>
                @if($errors->has('sch_max_pax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sch_max_pax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.schedule.fields.sch_max_pax_helper') }}</span>
            </div>
            <div class="form-group">
            <button class="btn btn-info" style="padding:6px 15px;" type="submit">
                    {{ trans('global.save') }}
                </button>
            <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.schedules.index') }}"> Return </a>

            </div>
        </form>
    </div>
</div>



@endsection