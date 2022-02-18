@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user-tie c-sidebar-nav-icon"></i>
    <b>{{ trans('global.create') }} {{ trans('cruds.organizer.title_singular') }}</b>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.organizers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="org_register">{{ trans('cruds.organizer.fields.org_register') }}</label>
                <input class="form-control {{ $errors->has('org_register') ? 'is-invalid' : '' }}" type="text" name="org_register" id="org_register" value="{{ old('org_register', '') }}" required>
                @if($errors->has('org_register'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_register') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_register_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_name">{{ trans('cruds.organizer.fields.org_name') }}</label>
                <input class="form-control {{ $errors->has('org_name') ? 'is-invalid' : '' }}" type="text" name="org_name" id="org_name" value="{{ old('org_name', '') }}" required>
                @if($errors->has('org_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_adr_1">{{ trans('cruds.organizer.fields.org_adr_1') }}</label>
                <input class="form-control {{ $errors->has('org_adr_1') ? 'is-invalid' : '' }}" type="text" name="org_adr_1" id="org_adr_1" value="{{ old('org_adr_1', '') }}" required>
                @if($errors->has('org_adr_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_adr_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_adr_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_adr_2">{{ trans('cruds.organizer.fields.org_adr_2') }}</label>
                <input class="form-control {{ $errors->has('org_adr_2') ? 'is-invalid' : '' }}" type="text" name="org_adr_2" id="org_adr_2" value="{{ old('org_adr_2', '') }}" required>
                @if($errors->has('org_adr_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_adr_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_adr_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_postcode">{{ trans('cruds.organizer.fields.org_postcode') }}</label>
                <input class="form-control {{ $errors->has('org_postcode') ? 'is-invalid' : '' }}" type="text" name="org_postcode" id="org_postcode" value="{{ old('org_postcode', '') }}" required>
                @if($errors->has('org_postcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_postcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_postcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_city">{{ trans('cruds.organizer.fields.org_city') }}</label>
                <input class="form-control {{ $errors->has('org_city') ? 'is-invalid' : '' }}" type="text" name="org_city" id="org_city" value="{{ old('org_city', '') }}" required>
                @if($errors->has('org_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_state">{{ trans('cruds.organizer.fields.org_state') }}</label>
                <input class="form-control {{ $errors->has('org_state') ? 'is-invalid' : '' }}" type="text" name="org_state" id="org_state" value="{{ old('org_state', '') }}" required>
                @if($errors->has('org_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_country">{{ trans('cruds.organizer.fields.org_country') }}</label>
                <input class="form-control {{ $errors->has('org_country') ? 'is-invalid' : '' }}" type="text" name="org_country" id="org_country" value="{{ old('org_country', '') }}" required>
                @if($errors->has('org_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_email">{{ trans('cruds.organizer.fields.org_email') }}</label>
                <input class="form-control {{ $errors->has('org_email') ? 'is-invalid' : '' }}" type="email" name="org_email" id="org_email" value="{{ old('org_email') }}" required>
                @if($errors->has('org_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_pic">{{ trans('cruds.organizer.fields.org_pic') }}</label>
                <input class="form-control {{ $errors->has('org_pic') ? 'is-invalid' : '' }}" type="text" name="org_pic" id="org_pic" value="{{ old('org_pic', '') }}" required>
                @if($errors->has('org_pic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_pic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_position">{{ trans('cruds.organizer.fields.org_position') }}</label>
                <input class="form-control {{ $errors->has('org_position') ? 'is-invalid' : '' }}" type="text" name="org_position" id="org_position" value="{{ old('org_position', '') }}" required>
                @if($errors->has('org_position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="org_office">{{ trans('cruds.organizer.fields.org_office') }}</label>
                <input class="form-control {{ $errors->has('org_office') ? 'is-invalid' : '' }}" type="text" name="org_office" id="org_office" value="{{ old('org_office', '') }}">
                @if($errors->has('org_office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_office_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_mobile">{{ trans('cruds.organizer.fields.org_mobile') }}</label>
                <input class="form-control {{ $errors->has('org_mobile') ? 'is-invalid' : '' }}" type="text" name="org_mobile" id="org_mobile" value="{{ old('org_mobile', '') }}" required>
                @if($errors->has('org_mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="org_logo">{{ trans('cruds.organizer.fields.org_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('org_logo') ? 'is-invalid' : '' }}" id="org_logo-dropzone">
                </div>
                @if($errors->has('org_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('org_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizer.fields.org_logo_helper') }}</span>
            </div>
            <div class="form-group">

                <button class="btn btn-info" style="padding:6px 15px;" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.organizers.index') }}"> Return </a>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.orgLogoDropzone = {
    url: '{{ route('admin.organizers.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="org_logo"]').remove()
      $('form').append('<input type="hidden" name="org_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="org_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($organizer) && $organizer->org_logo)
      var file = {!! json_encode($organizer->org_logo) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="org_logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection