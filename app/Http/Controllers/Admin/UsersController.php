<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = DB::select('select * from users');

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        /* 
        $user->roles()->sync($request->input('roles', []));
        DB::table('role_user')->insert([
            'user_id' => $request->id,
            'role_id' => 2
        ]);
        */

        return redirect()->route('admin.users.index');
    }

    public function createAdmin(){
        return view('admin.users.create_admin');
    }

    public function createExh(){

        return view('admin.users.create_exh');

    }

    public function edit($id)
    {
        
        // abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $query = "SELECT * FROM users WHERE id=".$id;
        $user = DB::select($query);
        
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $uname = $request->username;
        $ucount = $request->country;
        $uocc = $request->occupation;
        $uage = $request->age;
        
        DB::table('users')->where('id', $id)->update([
            'username' => $uname,
            'country' => $ucount,
            'occupation' => $uocc,
            'age' => $uage
        ]);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        // abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        // abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
