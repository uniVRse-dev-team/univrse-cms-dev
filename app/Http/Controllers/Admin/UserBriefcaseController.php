<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ViewUserBriefcaseRequest;
use Spatie\MediaLibrary\Models\Media;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UserBriefcaseController extends Controller
{
    public function index(Request $request)
    {
        $userbc = DB::select('select * from user_briefcase');
        return view('admin.userbriefcase.index',['userbc'=>$userbc]);      
    }

    public function create(Request $request) {

        $userbc1 = DB::select('select * from users ORDER BY id ASC');
        $userbc2 = DB::select('select * from media WHERE mime_type != "url" ORDER BY file_name ASC');

        return view('admin.userbriefcase.create', ['userbc1'=>$userbc1], ['userbc2'=>$userbc2]);
    }

    public function massDestroy(Request $request)
    {
        $feeds = DB::table('user_briefcase')->whereIn('user_id',request('id'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function add(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'media_id' => 'required'
        ]);
         
        if($request->has('member_id')){
            DB::table('exhibitor_user')->insert([
                'exh_id' => $request->exh_id,
                'member_id' => $request->member_id
            ]);
        }
    }

    public function viewFile($id) {
        $select = "SELECT * FROM media WHERE id=".$id;
        $media = DB::select($select);

        foreach($media as $md)
        $files = $md->id . "/" . $md->file_name;

        return view('admin.briefcase.viewfile', ['files' => $files]);
    }

    public function viewPdfFile($id) {
        $select = "SELECT * FROM media WHERE id=".$id;
        $media = DB::select($select);

        foreach($media as $md)
        $files = $md->id . "/" . $md->file_name;

        return view('admin.briefcase.viewpdffile', ['files' => $files]);
    }

    public function download($id) {

        $media = Media::find($id);

        $url = 'Storage/' . $media->id . '/' . $media->file_name;
        $pathtoFile = public_path($url);
        return response()->download($pathtoFile);
    }

    public function remove($id){
        $select = "DELETE FROM user_briefcase WHERE id=" . $id;
        DB::delete($select);

        $userbc = DB::select('select * from user_briefcase');
        
        return view('admin.userbriefcase.index',['userbc'=>$userbc]);  
    }

}
