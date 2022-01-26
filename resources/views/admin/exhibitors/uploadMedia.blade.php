@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h3>Upload Materials</h3>
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route("admin.exhibitors.sendMedia") }}" enctype="multipart/form-data">
            @csrf    
            <div class="form-group"><i class="fa-fw fas fa-home"></i><label><b>&nbsp; Exhibition Name</b> </label><br>
            <select style="width:300px;" class="form-select" name="model_id">
                @foreach ($exhibitors as $exh)
                <option value="{{ $exh->id }}">{{ $exh->exh_name }}</option>
                @endforeach
            </select></div>
            <hr>
          <div class="form-group"><i class="fa-fw fas fa-video-camera"></i><label><b>&nbsp; Video</b> (YouTube URL) </label><br><input style="width:250px;" type="text" name="exh_video"><br><br></div>
          <div class="form-group"><i class="fa-fw fas fa-file-image-o"></i><label><b>&nbsp; Poster</b> </label><br><input type="file" name="exh_poster"><br><br></div>
          <div class="form-group"><i class="fa-fw fas fa-newspaper-o"></i><label><b>&nbsp; Article</b> </label><br><input type="file" name="exh_article"><br><br></div>
          <div class="form-group"><i class="fa-fw fas fa-file-pdf-o"></i><label><b>&nbsp; Brochure</b> </label><br><input type="file" name="exh_brochure"><br><br></div>
          <div class="form-group">
            <div style="float:left;"><input type="reset" class="btn btn-warning" style="width: 70px; color: white;" name="Reset" value="Clear">
          <input type="submit" class="btn btn-info" name="Upload">
</div><div style="float:right;"><a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.exhibitors.index') }}"> Return </a>
</div></div>
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
