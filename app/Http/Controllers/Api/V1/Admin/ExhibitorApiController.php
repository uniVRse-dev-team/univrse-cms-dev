<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreExhibitorRequest;
use App\Http\Requests\UpdateExhibitorRequest;
use App\Http\Resources\Admin\ExhibitorResource;
use App\Models\Exhibitor;
use Spatie\MediaLibrary\Models\Media;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExhibitorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('exhibitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExhibitorResource(Exhibitor::with(['created_by'])->get());
    }

    public function store(StoreExhibitorRequest $request)
    {
        $exhibitor = Exhibitor::create($request->all());

        if ($request->input('exh_logo', false)) {
            $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('exh_logo'))))->toMediaCollection('exh_logo');
        }

        return (new ExhibitorResource($exhibitor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExhibitorResource($exhibitor->load(['created_by']));
    }

    public function getMedia($id){
        header("Content-Type: JSON");
        $host = "http://localhost:8000/";
        $response = DB::table('media')->where('id', $id)->first();
        if($response == null){
            $reply = array('response' => "Media not found");
            return json_encode($reply);
        } else {
        if($response->mime_type == "url"){
            $mediaurl = array('file_name' => $response->file_name);
        } else {
            $mediaurl = array('file_name' => $host . "storage/" . $id . "/" . $response->file_name);
        }

        return json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
       }
    }

    public function uploadMedia(Request $request){
        $request->validate([
            'model_id' => 'required',
            'exh_video' => 'nullable|url',
            'exh_poster' => 'mimes:png,jpeg',
            'exh_article' => 'mimes:pdf',
            'exh_brochure' => 'mimes:pdf'            
        ]);

        if($request->hasFile('exh_poster')){
            $poster = $request->file('exh_poster');
            $pname = $poster->getClientOriginalName();
            $ext = pathinfo($request->file('exh_poster')->getClientOriginalName(), PATHINFO_EXTENSION);
            $postername = str_replace($ext,"", $pname);
            } else {
                $postername = "";
            }
        
        if($request->hasFile('exh_article')){
        $article = $request->file('exh_article');
        $aname = $article->getClientOriginalName();
        $articlename = str_replace(".pdf","", $aname);
        } else {
            $articlename = "";
        }

        if($request->hasFile('exh_brochure')){
            $brochure = $request->file('exh_brochure');
            $bname = $brochure->getClientOriginalName();
            $brochurename = str_replace(".pdf","", $bname);
            } else {
                $brochurename = "";
            }

        if($request->exh_video == null){
            
        } else {
        $media = new Media();
        $media->model_type = "App\Models\Exhibitor";
        $media->model_id = $request->input('model_id');
        $media->collection_name = "exh_video";
        $media->name = $request->input('exh_video');
        $media->file_name = $request->input('exh_video');
        $media->mime_type = "url";
        $media->disk = "public";
        $media->size = 0;
        $media->manipulations = "[]";
        $media->custom_properties = "[]";
        $media->responsive_images = "[]";
        $media->order_column = "1";
        $media->save();
        }

        if($request->hasFile('exh_poster')){
            $request->file('exh_poster')->storeAs($mCount, $request->file('exh_poster')->getClientOriginalName());
            $media = new Media();
            $media->model_type = "App\Models\Exhibitor";
            $media->model_id = $request->input('model_id');
            $media->collection_name = "exh_poster";
            $media->name = $postername;
            $media->file_name = $request->file('exh_poster')->getClientOriginalName();
                $ext = pathinfo($request->file('exh_poster')->getClientOriginalName(), PATHINFO_EXTENSION);
            $media->mime_type = "image/" . $ext;
            $media->disk = "public";
            $media->size = $request->file('exh_poster')->getSize();
            $media->manipulations = "[]";
            $media->custom_properties = "[]";
            $media->responsive_images = "[]";
            $media->order_column = "1";
            $media->save();
            }

        if($request->hasFile('exh_article')){
        $request->file('exh_article')->storeAs($mCount, $request->file('exh_article')->getClientOriginalName());
        $media = new Media();
        $media->model_type = "App\Models\Exhibitor";
        $media->model_id = $request->input('model_id');
        $media->collection_name = "exh_article";
        $media->name = $articlename;
        $media->file_name = $request->file('exh_article')->getClientOriginalName();
        $media->mime_type = "file/pdf";
        $media->disk = "public";
        $media->size = $request->file('exh_article')->getSize();
        $media->manipulations = "[]";
        $media->custom_properties = "[]";
        $media->responsive_images = "[]";
        $media->order_column = "1";
        $media->save();
        }

        if($request->hasFile('exh_brochure')){
            $request->file('exh_brochure')->storeAs($mCount, $request->file('exh_brochure')->getClientOriginalName());
            $media = new Media();
            $media->model_type = "App\Models\Exhibitor";
            $media->model_id = $request->input('model_id');
            $media->collection_name = "exh_brochure";
            $media->name = $brochurename;
            $media->file_name = $request->file('exh_brochure')->getClientOriginalName();
            $media->mime_type = "file/pdf";
            $media->disk = "public";
            $media->size = $request->file('exh_brochure')->getSize();
            $media->manipulations = "[]";
            $media->custom_properties = "[]";
            $media->responsive_images = "[]";
            $media->order_column = "1";
            $media->save();
            }

        $response = "Success.";

        return response($response, 201);
    }

    
    public function removeMedia($id){
        $media=Media::find($id);
        $media->delete();

        $response = [
            'response' => "deleted"
        ];

        return response($response,201);
    }

    public function customizeBooth(Request $request){
        $booth = Exhibitor::find($request->id);
        $booth->exh_bcolor1 = $request->exh_bcolor1;
        $booth->exh_bcolor2 = $request->exh_bcolor2;
        $booth->exh_template = $request->exh_template;
        $result = $booth->save();

        if($result){
            $response = "Update successful";
        } else {
            $response = "Update failed.";
        }

        return $response;
    }

    public function update(UpdateExhibitorRequest $request, Exhibitor $exhibitor)
    {
        $mCount = Media::all()->count();

        $exhibitor->update($request->all());

        if ($request->input('exh_logo', false)) {
            if (!$exhibitor->exh_logo || $request->input('exh_logo') !== $exhibitor->exh_logo->file_name) {
                if ($exhibitor->exh_logo) {
                    $exhibitor->exh_logo->delete();
                }
                $exhibitor->addMedia(storage_path($mCount . basename($request->input('exh_logo'))))->toMediaCollection('exh_logo');
            }
        } elseif ($exhibitor->exh_logo) {
            $exhibitor->exh_logo->delete();
        }

        return (new ExhibitorResource($exhibitor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
