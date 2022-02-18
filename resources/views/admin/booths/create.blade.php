@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <b>{{ trans('global.create') }} {{ trans('cruds.booth.title_singular') }}</b>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.booths.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="boothId">{{ trans('cruds.booth.fields.boothId') }}</label>
                <input class="form-control {{ $errors->has('boothId') ? 'is-invalid' : '' }}" type="text" name="boothId" id="boothId" value="{{ old('boothId', '') }}" required>
                @if($errors->has('boothId'))
                    <div class="invalid-feedback">
                        {{ $errors->first('boothId') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booth.fields.boothId_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="boothName">{{ trans('cruds.booth.fields.boothName') }}</label>
                <input class="form-control {{ $errors->has('boothName') ? 'is-invalid' : '' }}" type="text" name="boothName" id="boothName" value="{{ old('boothName', '') }}" required>
                @if($errors->has('boothName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('boothName') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booth.fields.boothName_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="boothManager">{{ trans('cruds.booth.fields.boothManager') }}</label>
                <input class="form-control {{ $errors->has('boothManager') ? 'is-invalid' : '' }}" type="text" name="boothManager" id="boothManager" value="{{ old('boothManager', '') }}" required>
                @if($errors->has('boothManager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('boothManager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booth.fields.boothManager_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="boothColor">{{ trans('cruds.booth.fields.boothColor') }}</label>
                <input class="form-control {{ $errors->has('boothColor') ? 'is-invalid' : '' }}" type="text" name="boothColor" id="boothColor" value="{{ old('boothColor', '') }}" required>
                @if($errors->has('boothColor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('boothColor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booth.fields.boothColor_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-info" style="padding:6px 15px;" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.booths.index') }}"> Return </a>
            </div>
        </form>
    </div>
</div>



@endsection