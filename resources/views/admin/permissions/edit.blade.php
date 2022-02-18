@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <b>{{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}</b>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.permissions.update", [$permission->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.permission.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $permission->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
            <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.permissions.index') }}"> Return </a>
                <button class="btn btn-info" style="padding:6px 15px;" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.permissions.index') }}"> Return </a>
            </div>
        </form>
    </div>
</div>



@endsection