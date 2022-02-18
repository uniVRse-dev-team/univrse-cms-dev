<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booth;
use Gate;
use DB;
use Symfony\Component\HttpFoundation\Response;

class BoothController extends Controller
{

    public function index()
    {
        $booth = DB::select('select * from booths');

        return view('admin.booths.index', compact('booth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.booths.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Booth::create($request->all());
        
        return redirect()->route('admin.booths.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = "SELECT * FROM booths WHERE boothId=" . $id;
        $booth = DB::select($query);

        return view('admin.booths.show', compact('booth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($boothId)
    {
        $query = "SELECT * FROM booths WHERE boothId=".$boothId;
        $booth = DB::select($query);
        
        return view('admin.booths.edit', compact('booth'));
    }

    public function update(Request $request, $boothId)
    {
        $bid = $request->boothId;
        $bname = $request->boothName;
        $bmng = $request->boothManager;
        $bcolor = $request->boothColor;
        
        DB::table('booths')->where('boothId', $boothId)->update([
            'boothId' => $bid,
            'boothName' => $bname,
            'boothManager' => $bmng,
            'boothColor' => $bcolor
        ]);

        return redirect()->route('admin.booths.index');
    }

    public function destroy($boothId)
    {
        $booth = DB::table('booths')->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
