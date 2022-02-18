@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <b>{{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}</b>
    </div>

    <div class="card-body">
        @foreach($user as $key => $u)
        <form method="POST" action="{{ route("admin.users.update", [$u->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="u->name">{{ trans('cruds.user.fields.username') }}</label>
                <input class="form-control {{ $errors->has('u->name') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('u->name', $u->name) }}" required>
                @if($errors->has('u->name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('u->name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="u->country">{{ trans('cruds.user.fields.country') }}</label>
                <input class="form-control {{ $errors->has('u->country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('u->country', $u->country) }}">
                @if($errors->has('u->country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('u->country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="u->occupation">{{ trans('cruds.user.fields.occupation') }}</label>
                <input class="form-control {{ $errors->has('u->occupation') ? 'is-invalid' : '' }}" type="text" name="occupation" id="occupation" value="{{ old('u->occupation', $u->occupation) }}">
                @if($errors->has('u->occupation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('u->occupation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.occupation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="u->age">{{ trans('cruds.user.fields.age') }}</label>
                <input class="form-control {{ $errors->has('u->age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('u->age', $u->age) }}">
                @if($errors->has('u->age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('u->age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
            <button class="btn btn-info" style="padding:6px 15px;" type="submit">
                    {{ trans('global.save') }}
                </button>
            <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.users.index') }}"> Return </a>
            </div>
        </form>
        @endforeach
    </div>
</div>


@endsection