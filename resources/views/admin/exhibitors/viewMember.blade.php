@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h3>Manage Exhibition Members</h3>
    </div>

    <div class="card-body">
        <a class="btn btn-success" style="margin-bottom: 10px;" href="{{ route('admin.exhibitors.mngMember') }}">Add Member</a>

        <center>
        <table class="table">
           <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col-6">Exhibitors</th>
                <th scope="col">Exhibition</th>
                <th scope="col">Action</th>
            </tr>
           </thead>
           </tbody>
           @foreach ($exhlist as $exhlist)
           <tr>
               <td>{{ $exhlist->id }}</td>
               <td>{{ $exhlist->name }}</td>
               <td>{{ $exhlist->exh_name }}</td>
               <td><a href="{{ route('admin.exhibitors.removeMember',['e_id'=>$exhlist->eid,'u_id'=>$exhlist->id] )}}" class="btn btn-danger" style="padding: 0 10px;">Delete</td>
           </tr>
           @endforeach
           </tbody>
        </table>
       </center>

<a href="{{ route('admin.exhibitors.index') }}" class="btn btn-danger" style="color:white;">Return</a>

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
