<?php

namespace App\Http\Controllers;

use App\Harmlet;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HarmletController extends Controller
{

    public function __construct()
    {
        $this->harmlet = new Harmlet();
    }

    public function index()
    {
        return view('backend.harmlet.index');
    }

    public function source(){
        $query= Harmlet::query();
        return DataTables::eloquent($query)
        ->filter(function ($query) {
            if (request()->has('search')) {
                $query->where(function ($q) {
                    $q->where('name', 'LIKE', '%' . request('search')['value'] . '%');
                });
            }
            })
            ->addColumn('name', function ($data) {
                return title_case($data->name);
            })
            ->addIndexColumn()
            ->addColumn('action', 'backend.harmlet.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        return view('backend.harmlet.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->harmlet->create($request->all());
            DB::commit();
            return redirect()->route('harmlet.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function show($id)
    {
        $data = $this->harmlet->find($id);
        return $data;

    }

    public function edit($id)
    {
        $data = $this->harmlet->find($id);
        return view('backend.harmlet.edit',compact('data'));

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request = $request->merge(['slug'=>$request->name]);
            $this->harmlet->find($id)->update($request->all());
            DB::commit();
            return redirect()->route('harmlet.index')->with('success-message','Data telah d irubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function destroy($id)
    {
        $this->harmlet->destroy($id);
        return redirect()->route('harmlet.index')->with('success-message','Data telah dihapus');
    }

    public function getHarmlet(Request $request){
        if ($request->has('search')) {
            $cari = $request->search;
    		$data = $this->harmlet->where('name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
    	}
    }

}
