@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="">
        </div>
        <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon"></i>
        <b>Briefcase</b>
    </div>

    <div class="card-body">
        <table class=" table table-sm table-bordered table-striped table-hover ajaxTable datatable datatable-Exhibitor">
            <thead>
                <tr style="text-align:center;">
                    <th scope="col">
                        ID
                    </th>
                    <th scope="col">
                        Model Type
                    </th>
                    <th scope="col">
                        Model ID
                    </th>
                    <th scope="col">
                        Collection Name
                    </th>
                    <th scope="col-6">
                        Name
                    </th>
                    <th scope="col-6">
                        File Name
                    </th>
                    <th scope="col-6">
                        Mime Type
                    </th>
                    <th scope="col">
                        Disk
                    </th>
                    <th scope="col">
                        Size
                    </th>
                    <th scope="col">
                        Actions
                    </th>
                    <th scope="col">
                        &nbsp;
                    </th>
                </tr>
            </thead>
            @foreach ($media as $md)
            <tr style="text-align: center;">
                <td><b>{{ $md->id }}</b></td>
                <td>{{ $md->model_type }}</td>
                <td>{{ $md->model_id }}</td>
                <td>{{ $md->collection_name }}</td>
                <td>{{ $md->name }}</td>
                <td>{{ $md->file_name }}</td>
                <td>{{ $md->mime_type }}</td>
                <td>{{ $md->disk }}</td>
                <td>{{ $md->size }}</td>
                    @if ( $md->mime_type == "url" )
                    <td><a style="padding: 0 20px;" class="btn btn-primary" target="_blank" href="{{ $md->file_name }}">View</a><a style="padding: 0 15px;" href="{{ route('admin.briefcase.remove', $md->id) }}" class="btn btn-danger">Delete</a></td>
                    @elseif ( $md->mime_type == "file/pdf")
                    <td><a style="padding: 0 20px;" class="btn btn-primary" target="_self" href="{{ route('admin.briefcase.viewpdffile', $md->id) }}">View</a><br><a style="padding: 0 4px;" class="btn btn-info" href="{{ route('admin.briefcase.download', $md->id) }}">Download</a><a style="padding: 0 15px;" href="{{ route('admin.briefcase.remove', $md->id) }}" class="btn btn-danger">Delete</a></td>
                    @else 
                    <td><a style="padding: 0 20px;" class="btn btn-primary" target="_self" href="{{ route('admin.briefcase.viewfile', $md->id) }}">View</a><br><a style="padding: 0 4px;" class="btn btn-info" href="{{ route('admin.briefcase.download', $md->id) }}">Download</a><a style="padding: 0 15px;" href="{{ route('admin.briefcase.remove', $md->id) }}" class="btn btn-danger">Delete</a></td>
                    @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.briefcase.index') }}",
    columns: [
{ data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'model_type', name: 'model_type' },
{ data: 'model_id', name: 'model_id' },
{ data: 'collection_name', name: 'collection_name' },
{ data: 'name', name: 'name' },
{ data: 'file_name', name: 'file_name' },
{ data: 'mime_type', name: 'mime_type' },
{ data: 'disk', name: 'disk' },
{ data: 'size', name: 'size' }
    ],
  });
  
});

</script>
@endsection