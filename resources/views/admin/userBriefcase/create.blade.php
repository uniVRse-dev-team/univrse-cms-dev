<div class="card">
    <div class="card-header">
        <b><h3>Add Member</h3></b>
    </div>

    <div class="card-body">

        <form method="POST" action=" {{ route('admin.userbriefcase.add') }}" enctype="multipart/form-data">
            @csrf 
            <div class="form-group"><i class="fa-fw fas fa-home"></i><label><b>&nbsp; User</b> </label><br>
            <select style="width:300px;" class="form-select" name="exh_id">
            @foreach ($userbc1 as $ubc1)
            <option value="{{ $ubc1->id }}">{{ $ubc1->name }}</option>
            @endforeach
            </select></div><br>
            <hr>
              
            <div class="form-group"><i class="fa-fw fas fa-user-circle"></i><label><b>&nbsp; Media</b> </label><br>
            <select style="width:300px;" class="form-select" name="member_id">

            @foreach ($userbc2 as $ubc2)
                <option value="{{ $ubc2->id }}">{{ $ubc2->file_name }}</option>
            @endforeach
            </select></div><br>
            <hr>
          
          <div class="form-group">
          <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.userbriefcase.index') }}"> Return </a>
          <input type="submit" class="btn btn-info" name="Upload"></div>
        </form>
</div></div></div>
