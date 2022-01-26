@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <b><h3>Add Speaker</h3></b>
    </div>

    <div class="card-body">

        <form method="POST" action=" {{ route("admin.schedules.addingSpeaker") }}" enctype="multipart/form-data">
            @csrf 
            <div class="form-group"><i class="fa-fw fas fa-home"></i><label><b>&nbsp; Event Name</b> </label><br>
            <select style="width:300px;" class="form-select" name="sch_id">
            @foreach ($hall as $h)
            <option value="{{ $h->id }}">{{ $h->sch_title }}</option>
            @endforeach
            </select></div><br>
            <hr>


            <div class="form-group"><i class="fa-fw fas fa-user-circle"></i><label><b>&nbsp; User</b> </label><br>
            <select style="width:300px;" class="form-select" name="speaker_id">
          
            @foreach ($user as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
            </select></div><br>
            <hr>

          <div class="form-group">
          <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.schedules.manageSpeaker') }}"> Return </a>
          <input type="submit" class="btn btn-info" name="Upload"></div>
        </form>

    </div>
</div>



<!--

@endsection

@section('scripts')
<script>
    Dropzone.options.exhVideoDropzone = {
    url: '{{ route('admin.exhibitors.sendMedia') }}',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="exh_video"]').remove()
      $('form').append('<input type="hidden" name="exh_video" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="exh_video"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($exhibitor) && $exhibitor->exh_video)
      var file = {!! json_encode($exhibitor->exh_video) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="exh_video" value="' + file.file_name + '">')
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
