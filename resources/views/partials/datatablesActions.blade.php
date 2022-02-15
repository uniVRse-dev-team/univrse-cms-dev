<div style="display: flex;">
@can($viewGate)
    <a style="margin-right:10px;" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
        <img width=25 height=25 src="{{ url('/icon/viewfile.png') }}">
    </a>
@endcan
@can($editGate)
    <a style="margin-right:10px;" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
        <img width=25 height=25 src="{{ url('/icon/edit.png') }}">
    </a>
@endcan
@can($deleteGate)
    <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="image" style="margin-right:10px;" width=25 height=25 src="{{ url('/icon/delete.png') }}" value="{{ trans('global.delete') }}">
    </form>
@endcan
</div>