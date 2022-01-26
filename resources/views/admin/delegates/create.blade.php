@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
        <b>{{ trans('global.create') }} {{ trans('cruds.delegate.title_singular') }}</b>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.delegates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="del_name">{{ trans('cruds.delegate.fields.del_name') }}</label>
                <input class="form-control {{ $errors->has('del_name') ? 'is-invalid' : '' }}" type="text" name="del_name" id="del_name" value="{{ old('del_name', '') }}" required>
                @if($errors->has('del_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_position">{{ trans('cruds.delegate.fields.del_position') }}</label>
                <input class="form-control {{ $errors->has('del_position') ? 'is-invalid' : '' }}" type="text" name="del_position" id="del_position" value="{{ old('del_position', '') }}" required>
                @if($errors->has('del_position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="del_office">{{ trans('cruds.delegate.fields.del_office') }}</label>
                <input class="form-control {{ $errors->has('del_office') ? 'is-invalid' : '' }}" type="text" name="del_office" id="del_office" value="{{ old('del_office', '') }}">
                @if($errors->has('del_office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_office_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_mobile">{{ trans('cruds.delegate.fields.del_mobile') }}</label>
                <input class="form-control {{ $errors->has('del_mobile') ? 'is-invalid' : '' }}" type="text" name="del_mobile" id="del_mobile" value="{{ old('del_mobile', '') }}" required>
                @if($errors->has('del_mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_email">{{ trans('cruds.delegate.fields.del_email') }}</label>
                <input class="form-control {{ $errors->has('del_email') ? 'is-invalid' : '' }}" type="text" name="del_email" id="del_email" value="{{ old('del_email', '') }}" required>
                @if($errors->has('del_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_adr_1">{{ trans('cruds.delegate.fields.del_adr_1') }}</label>
                <input class="form-control {{ $errors->has('del_adr_1') ? 'is-invalid' : '' }}" type="text" name="del_adr_1" id="del_adr_1" value="{{ old('del_adr_1', '') }}" required>
                @if($errors->has('del_adr_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_adr_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_adr_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_adr_2">{{ trans('cruds.delegate.fields.del_adr_2') }}</label>
                <input class="form-control {{ $errors->has('del_adr_2') ? 'is-invalid' : '' }}" type="text" name="del_adr_2" id="del_adr_2" value="{{ old('del_adr_2', '') }}" required>
                @if($errors->has('del_adr_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_adr_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_adr_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_postcode">{{ trans('cruds.delegate.fields.del_postcode') }}</label>
                <input class="form-control {{ $errors->has('del_postcode') ? 'is-invalid' : '' }}" type="text" name="del_postcode" id="del_postcode" value="{{ old('del_postcode', '') }}" required>
                @if($errors->has('del_postcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_postcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_postcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_city">{{ trans('cruds.delegate.fields.del_city') }}</label>
                <input class="form-control {{ $errors->has('del_city') ? 'is-invalid' : '' }}" type="text" name="del_city" id="del_city" value="{{ old('del_city', '') }}" required>
                @if($errors->has('del_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_state">{{ trans('cruds.delegate.fields.del_state') }}</label>
                <input class="form-control {{ $errors->has('del_state') ? 'is-invalid' : '' }}" type="text" name="del_state" id="del_state" value="{{ old('del_state', '') }}" required>
                @if($errors->has('del_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="del_country">{{ trans('cruds.delegate.fields.del_country') }}</label>
                <input class="form-control {{ $errors->has('del_country') ? 'is-invalid' : '' }}" type="text" name="del_country" id="del_country" value="{{ old('del_country', '') }}" required>
                @if($errors->has('del_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.delegate.fields.del_speaker') }}</label>
                @foreach(App\Models\Delegate::DEL_SPEAKER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('del_speaker') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="del_speaker_{{ $key }}" name="del_speaker" value="{{ $key }}" {{ old('del_speaker', 'Del_speaker_no') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="del_speaker_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('del_speaker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_speaker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_speaker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="del_twitter">{{ trans('cruds.delegate.fields.del_twitter') }}</label>
                <input class="form-control {{ $errors->has('del_twitter') ? 'is-invalid' : '' }}" type="text" name="del_twitter" id="del_twitter" value="{{ old('del_twitter', '') }}">
                @if($errors->has('del_twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="del_linkedin">{{ trans('cruds.delegate.fields.del_linkedin') }}</label>
                <input class="form-control {{ $errors->has('del_linkedin') ? 'is-invalid' : '' }}" type="text" name="del_linkedin" id="del_linkedin" value="{{ old('del_linkedin', '') }}">
                @if($errors->has('del_linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="del_facebook">{{ trans('cruds.delegate.fields.del_facebook') }}</label>
                <input class="form-control {{ $errors->has('del_facebook') ? 'is-invalid' : '' }}" type="text" name="del_facebook" id="del_facebook" value="{{ old('del_facebook', '') }}">
                @if($errors->has('del_facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('del_facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.delegate.fields.del_facebook_helper') }}</span>
            </div>
            <div class="form-group">
            <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.delegates.index') }}"> Return </a>
                <button class="btn btn-info" style="padding:6px 15px;" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection