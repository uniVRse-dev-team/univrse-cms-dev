<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExhibitorRequest;
use App\Http\Requests\StoreExhibitorRequest;
use App\Http\Requests\UpdateExhibitorRequest;
use App\Models\Exhibitor;
use DB;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ExhibitorController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('exhibitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Exhibitor::with(['created_by'])->select(sprintf('%s.*', (new Exhibitor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'exhibitor_show';
                $editGate = 'exhibitor_edit';
                $deleteGate = 'exhibitor_delete';
                $crudRoutePart = 'exhibitors';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('exh_name', function ($row) {
                return $row->exh_name ? $row->exh_name : '';
            });
            $table->editColumn('exh_adr_1', function ($row) {
                return $row->exh_adr_1 ? $row->exh_adr_1 : '';
            });
            $table->editColumn('exh_adr_2', function ($row) {
                return $row->exh_adr_2 ? $row->exh_adr_2 : '';
            });
            $table->editColumn('exh_postcode', function ($row) {
                return $row->exh_postcode ? $row->exh_postcode : '';
            });
            $table->editColumn('exh_city', function ($row) {
                return $row->exh_city ? $row->exh_city : '';
            });
            $table->editColumn('exh_state', function ($row) {
                return $row->exh_state ? $row->exh_state : '';
            });
            $table->editColumn('exh_country', function ($row) {
                return $row->exh_country ? $row->exh_country : '';
            });
            $table->editColumn('exh_email', function ($row) {
                return $row->exh_email ? $row->exh_email : '';
            });
            $table->editColumn('exh_pic', function ($row) {
                return $row->exh_pic ? $row->exh_pic : '';
            });
            $table->editColumn('exh_mobile', function ($row) {
                return $row->exh_mobile ? $row->exh_mobile : '';
            });
            $table->editColumn('exh_bcolor1', function ($row) {
                return $row->exh_bcolor1 ? $row->exh_bcolor1 : '';
            });
            $table->editColumn('exh_bcolor2', function ($row) {
                return $row->exh_bcolor2 ? $row->exh_bcolor2 : '';
            });
            $table->editColumn('exh_logo', function ($row) {
                return $row->exh_logo ? '<a href="' . $row->exh_logo->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('exh_video', function ($row) {
                return $row->exh_video ? '<a href="' . $row->exh_video->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->rawColumns(['actions', 'placeholder', 'exh_logo']);

            return $table->make(true);
        }

        return view('admin.exhibitors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('exhibitor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exhibitors.create');
    }

    public function manageMember() {
        abort_if(Gate::denies('exhibitor_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $select = "SELECT r.user_id, u.name FROM role_user r, users u WHERE r.user_id = u.id AND r.role_id = 4";
        $exhs = DB::select($select);

        $select2 = "SELECT e.id, e.exh_name FROM exhibitors e";
        $exhs2 = DB::select($select2);

        return view('admin.exhibitors.mngMember', ['exhs'=>$exhs], ['exhs2'=>$exhs2]);
    }

    public function viewMember() {     
        $select = "SELECT u.id, u.name, e.exh_name, e.id as eid
        FROM role_user r, users u, exhibitor_user eu, exhibitors e WHERE r.user_id = u.id AND r.role_id = 4
        AND eu.member_id = u.id AND eu.exh_id = e.id";
        $exhlist = DB::select($select);

        return view('admin.exhibitors.viewMember', ['exhlist'=>$exhlist]);
    }

    public function removeMember($e_id, $u_id) {
        $select = "DELETE FROM exhibitor_user WHERE exh_id=" . $e_id . " AND member_id = " . $u_id;
        DB::delete($select);

        $select2 = "SELECT u.id, u.name, e.exh_name, e.id as eid
        FROM role_user r, users u, exhibitor_user eu, exhibitors e WHERE r.user_id = u.id AND r.role_id = 4
        AND eu.member_id = u.id AND eu.exh_id = e.id";
        $exhlist = DB::select($select2);

        return view('admin.exhibitors.viewMember', ['exhlist'=>$exhlist]);
    }

    public function addMember(Request $request) {

        $request->validate([
            'exh_id' => 'required',
            'member_id' => 'required'
        ]);
         
        if($request->has('member_id')){
            DB::table('exhibitor_user')->insert([
                'exh_id' => $request->exh_id,
                'member_id' => $request->member_id
            ]);
        }

        $select2 = "SELECT u.id, u.name, e.exh_name, e.id as eid
        FROM role_user r, users u, exhibitor_user eu, exhibitors e WHERE r.user_id = u.id AND r.role_id = 4
        AND eu.member_id = u.id AND eu.exh_id = e.id ORDER BY u.id ASC";
        $exhlist = DB::select($select2);

        return redirect()->route('admin.exhibitors.viewMember', ['exhlist'=>$exhlist]);
    }

    public function upload(){
        abort_if(Gate::denies('media_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $exhibitors = DB::select('select * from exhibitors ORDER BY exh_name ASC');


        return view('admin.exhibitors.uploadMedia',['exhibitors'=>$exhibitors]);
    }

    public function sendMedia(Request $request){
        $mCount = Media::all()->count();

        $request->validate([
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


                // Save info to db
                $media = new Media();
                $media->model_type = "App\Models\Exhibitor";
                $media->model_id = $request->input('model_id');
                $media->collection_name = "exh_poster";
                $media->name = $postername;
                $media->file_name = $poster->getClientOriginalName();
                    $ext = pathinfo($poster->getClientOriginalName(), PATHINFO_EXTENSION);
                $media->mime_type = "image/" . $ext;
                $media->disk = "public";
                $media->size = $poster->getSize();
                $media->manipulations = "[]";
                $media->custom_properties = "[]";
                $media->responsive_images = "[]";
                $media->order_column = "1";
                $media->save();

                 // Save file to media folder
                 $poster = $request->file('exh_poster');
                 $path = public_path('/media');
                 $poster->move($path, $poster->getClientOriginalName());

                }

            if($request->hasFile('exh_article')){

            // Save info to db
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

            // Save file to media folder
            $article = $request->file('exh_article');
            $path = public_path('/media');
            $article->move($path, $article->getClientOriginalName());

            }

            if($request->hasFile('exh_brochure')){

                // Save info to db
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

                // Save file to media folder
                $brochure = $request->file('exh_brochure');
                $path = public_path('/media');
                $brochure->move($path, $brochure->getClientOriginalName());
                                
                }
    
            return redirect()->back();
        
    }

    public function store(StoreExhibitorRequest $request)
    {
        $mCount = Media::all()->count();

        $exhibitor = Exhibitor::create($request->all());

        if ($request->input('exh_logo', false)) {
            $exhibitor->addMedia(storage_path($mCount . basename($request->input('exh_logo'))))->toMediaCollection('exh_logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exhibitor->id]);
        }

        return redirect()->route('admin.exhibitors.index');
    }

    public function edit(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor->load('created_by');

        return view('admin.exhibitors.edit', compact('exhibitor'));
    }

    public function update(UpdateExhibitorRequest $request, Exhibitor $exhibitor)
    {
        $exhibitor->update($request->all());

        if ($request->input('exh_logo', false)) {
            if (!$exhibitor->exh_logo || $request->input('exh_logo') !== $exhibitor->exh_logo->file_name) {
                if ($exhibitor->exh_logo) {
                    $exhibitor->exh_logo->delete();
                }
                $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('exh_logo'))))->toMediaCollection('exh_logo');
            }
        } elseif ($exhibitor->exh_logo) {
            $exhibitor->exh_logo->delete();
        }

        if ($request->input('exh_poster', false)) {
            if (!$exhibitor->exh_poster || $request->input('exh_poster') !== $exhibitor->exh_poster->file_name) {
                if ($exhibitor->exh_poster) {
                    $exhibitor->exh_poster->delete();
                }
                $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('exh_poster'))))->toMediaCollection('exh_poster');
            }
        } elseif ($exhibitor->exh_poster) {
            $exhibitor->exh_poster->delete();
        }

        if ($request->input('exh_article', false)) {
            if (!$exhibitor->exh_article || $request->input('exh_article') !== $exhibitor->exh_article->file_name) {
                if ($exhibitor->exh_article) {
                    $exhibitor->exh_article->delete();
                }
                $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('exh_article'))))->toMediaCollection('exh_article');
            }
        } elseif ($exhibitor->exh_article) {
            $exhibitor->exh_article->delete();
        }

        if ($request->input('exh_brochure', false)) {
            if (!$exhibitor->exh_brochure || $request->input('exh_brochure') !== $exhibitor->exh_brochure->file_name) {
                if ($exhibitor->exh_brochure) {
                    $exhibitor->exh_brochure->delete();
                }
                $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('exh_brochure'))))->toMediaCollection('exh_brochure');
            }
        } elseif ($exhibitor->exh_brochure) {
            $exhibitor->exh_brochure->delete();
        }

        return redirect()->route('admin.exhibitors.index');
    }

    public function show(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor->load('created_by');

        return view('admin.exhibitors.show', compact('exhibitor'));
    }

    public function destroy(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor->delete();

        return back();
    }

    public function massDestroy(MassDestroyExhibitorRequest $request)
    {
        Exhibitor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('exhibitor_create') && Gate::denies('exhibitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Exhibitor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
