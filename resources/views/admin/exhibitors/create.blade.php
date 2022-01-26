@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
        <b>{{ trans('global.create') }} {{ trans('cruds.exhibitor.title_singular') }}</b>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exhibitors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="exh_register">{{ trans('cruds.exhibitor.fields.exh_register') }}</label>
                <input class="form-control {{ $errors->has('exh_register') ? 'is-invalid' : '' }}" type="text" name="exh_register" id="exh_register" value="{{ old('exh_register', '') }}" required>
                @if($errors->has('exh_register'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_register') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_register_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_name">{{ trans('cruds.exhibitor.fields.exh_name') }}</label>
                <input class="form-control {{ $errors->has('exh_name') ? 'is-invalid' : '' }}" type="text" name="exh_name" id="exh_name" value="{{ old('exh_name', '') }}" required>
                @if($errors->has('exh_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_adr_1">{{ trans('cruds.exhibitor.fields.exh_adr_1') }}</label>
                <input class="form-control {{ $errors->has('exh_adr_1') ? 'is-invalid' : '' }}" type="text" name="exh_adr_1" id="exh_adr_1" value="{{ old('exh_adr_1', '') }}" required>
                @if($errors->has('exh_adr_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_adr_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_adr_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_adr_2">{{ trans('cruds.exhibitor.fields.exh_adr_2') }}</label>
                <input class="form-control {{ $errors->has('exh_adr_2') ? 'is-invalid' : '' }}" type="text" name="exh_adr_2" id="exh_adr_2" value="{{ old('exh_adr_2', '') }}" required>
                @if($errors->has('exh_adr_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_adr_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_adr_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_postcode">{{ trans('cruds.exhibitor.fields.exh_postcode') }}</label>
                <input class="form-control {{ $errors->has('exh_postcode') ? 'is-invalid' : '' }}" type="text" name="exh_postcode" id="exh_postcode" value="{{ old('exh_postcode', '') }}" required>
                @if($errors->has('exh_postcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_postcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_postcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_city">{{ trans('cruds.exhibitor.fields.exh_city') }}</label>
                <input class="form-control {{ $errors->has('exh_city') ? 'is-invalid' : '' }}" type="text" name="exh_city" id="exh_city" value="{{ old('exh_city', '') }}" required>
                @if($errors->has('exh_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_state">{{ trans('cruds.exhibitor.fields.exh_state') }}</label>
                <input class="form-control {{ $errors->has('exh_state') ? 'is-invalid' : '' }}" type="text" name="exh_state" id="exh_state" value="{{ old('exh_state', '') }}" required>
                @if($errors->has('exh_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_country">{{ trans('cruds.exhibitor.fields.exh_country') }}</label>
                <input class="form-control {{ $errors->has('exh_country') ? 'is-invalid' : '' }}" type="text" name="exh_country" id="exh_country" value="{{ old('exh_country', '') }}" required>
                @if($errors->has('exh_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_email">{{ trans('cruds.exhibitor.fields.exh_email') }}</label>
                <input class="form-control {{ $errors->has('exh_email') ? 'is-invalid' : '' }}" type="email" name="exh_email" id="exh_email" value="{{ old('exh_email') }}" required>
                @if($errors->has('exh_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_pic">{{ trans('cruds.exhibitor.fields.exh_pic') }}</label>
                <input class="form-control {{ $errors->has('exh_pic') ? 'is-invalid' : '' }}" type="text" name="exh_pic" id="exh_pic" value="{{ old('exh_pic', '') }}" required>
                @if($errors->has('exh_pic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_pic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_position">{{ trans('cruds.exhibitor.fields.exh_position') }}</label>
                <input class="form-control {{ $errors->has('exh_position') ? 'is-invalid' : '' }}" type="text" name="exh_position" id="exh_position" value="{{ old('exh_position', '') }}" required>
                @if($errors->has('exh_position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="exh_office">{{ trans('cruds.exhibitor.fields.exh_office') }}</label>
                <input class="form-control {{ $errors->has('exh_office') ? 'is-invalid' : '' }}" type="text" name="exh_office" id="exh_office" value="{{ old('exh_office', '') }}">
                @if($errors->has('exh_office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_office_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_mobile">{{ trans('cruds.exhibitor.fields.exh_mobile') }}</label>
                <input class="form-control {{ $errors->has('exh_mobile') ? 'is-invalid' : '' }}" type="text" name="exh_mobile" id="exh_mobile" value="{{ old('exh_mobile', '') }}" required>
                @if($errors->has('exh_mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exh_bcolor1">Booth Primary Colour</label>
                <input class="form-control {{ $errors->has('exh_bcolor1') ? 'is-invalid' : '' }}" type="text" name="exh_bcolor1" id="exh_bcolor1" value="{{ old('exh_bcolor1', '') }}" required>
                @if($errors->has('exh_bcolor1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_bcolor1') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="exh_bcolor2">Booth Secondary Colour</label>
                <input class="form-control {{ $errors->has('exh_bcolor2') ? 'is-invalid' : '' }}" type="text" name="exh_bcolor2" id="exh_bcolor2" value="{{ old('exh_bcolor2', '') }}" required>
                @if($errors->has('exh_bcolor2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_bcolor2') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="exh_logo">{{ trans('cruds.exhibitor.fields.exh_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('exh_logo') ? 'is-invalid' : '' }}" id="exh_logo-dropzone">
                </div>
                @if($errors->has('exh_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exh_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.exh_logo_helper') }}</span>
            </div>
            <div class="form-group">
            <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.exhibitors.index') }}"> Return </a>
                <button class="btn btn-info" style="padding:6px 15px;" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.exhLogoDropzone = {
    url: '{{ route('admin.exhibitors.storeMedia') }}',
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
      $('form').find('input[name="exh_logo"]').remove()
      $('form').append('<input type="hidden" name="exh_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="exh_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($exhibitor) && $exhibitor->exh_logo)
      var file = {!! json_encode($exhibitor->exh_logo) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="exh_logo" value="' + file.file_name + '">')
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