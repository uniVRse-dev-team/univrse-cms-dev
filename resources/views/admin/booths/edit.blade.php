@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <b>{{ trans('global.edit') }} {{ trans('cruds.booth.title_singular') }}</b>
    </div>

    <div class="card-body">@foreach ($booth as $key => $b)
        <form method="POST" action="{{ route("admin.booths.update", [$b->boothId]) }}" enctype="multipart/form-data">
            @endforeach
        @method('PUT')
            @csrf
            <div class="form-group">
                @foreach ($booth as $key => $b)
                <label class="required" for="b->boothId">{{ trans('cruds.booth.fields.boothId') }}</label>
                <input class="form-control {{ $errors->has('b->boothId') ? 'is-invalid' : '' }}" type="text" name="boothId" id="boothId" value="{{ old('b->boothId', $b->boothId) }}" required>
                @if($errors->has('b->boothId'))
                    <div class="invalid-feedback">
                        {{ $errors->first('b->boothId') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booth.fields.boothId_helper') }}</span>
            </div>
            @endforeach
            <div class="form-group">
                <label class="required" for="boothName">{{ trans('cruds.booth.fields.boothName') }}</label>
                <input class="form-control {{ $errors->has('b->boothName') ? 'is-invalid' : '' }}" type="text" name="boothName" id="boothName" value="{{ old('b->boothName', $b->boothName) }}" required>
                @if($errors->has('b->boothName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('b->boothName') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booth.fields.boothName_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="boothManager">{{ trans('cruds.booth.fields.boothManager') }}</label>
                <input class="form-control {{ $errors->has('b->boothManager') ? 'is-invalid' : '' }}" type="text" name="boothManager" id="boothManager" value="{{ old('b->boothManager', $b->boothManager) }}" required>
                @if($errors->has('b->boothManager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('b->boothManager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booth.fields.boothManager_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="boothColor">{{ trans('cruds.booth.fields.boothColor') }}</label>
                <input class="form-control {{ $errors->has('b->boothColor') ? 'is-invalid' : '' }}" type="text" name="boothColor" id="boothColor" value="{{ old('b->boothColor', $b->boothColor) }}" required>
                @if($errors->has('b->boothColor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('b->boothColor') }}
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
