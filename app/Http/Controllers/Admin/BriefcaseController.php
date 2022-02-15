<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ViewBriefcaseRequest;
use Spatie\MediaLibrary\Models\Media;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BriefcaseController extends Controller
{
    public function index(Request $request)
    {
        $media = DB::select('select * from media');
        return view('admin.briefcase.index',['media'=>$media]);      
    }

    public function massDestroy(Request $request)
    {
        Media::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function viewFile($id) {
        $select = "SELECT * FROM media WHERE id=".$id;
        $media = DB::select($select);

        foreach($media as $md)
        $files = $md->file_name;

        return view('admin.briefcase.viewfile', ['files' => $files]);
    }

    public function viewPdfFile($id) {
        $select = "SELECT * FROM media WHERE id=".$id;
        $media = DB::select($select);

        foreach($media as $md)
        $files = $md->file_name;

        return view('admin.briefcase.viewpdffile', ['files' => $files]);
    }

    public function download($id) {

        $media = Media::find($id);

        $url = 'media/' . $media->file_name;
        $pathtoFile = public_path($url);
        return response()->download($pathtoFile);
    }

    public function remove($id){
        $select = "DELETE FROM media WHERE id=" . $id;
        DB::delete($select);

        $media = DB::select('select * from media');
        
        return view('admin.briefcase.index',['media'=>$media]);  
    }

}
