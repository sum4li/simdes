<?php

namespace App\Http\Controllers;

use App\Hamlet;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HamletController extends Controller
{

    public function __construct()
    {
        $this->hamlet = new Hamlet();
    }

    public function index()
    {
        return view('backend.hamlet.index');
    }

    public function source(){
        $query= Hamlet::query();
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
            ->addColumn('action', 'backend.hamlet.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        return view('backend.hamlet.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->hamlet->create($request->all());
            DB::commit();
            return redirect()->route('hamlet.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function show($id)
    {
        $data = $this->hamlet->find($id);
        return $data;

    }

    public function edit($id)
    {
        $data = $this->hamlet->find($id);
        return view('backend.hamlet.edit',compact('data'));

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request = $request->merge(['slug'=>$request->name]);
            $this->hamlet->find($id)->update($request->all());
            DB::commit();
            return redirect()->route('hamlet.index')->with('success-message','Data telah d irubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function destroy($id)
    {
        $this->hamlet->destroy($id);
        return redirect()->route('hamlet.index')->with('success-message','Data telah dihapus');
    }

    public function getHamlet(Request $request){
        if ($request->has('search')) {
            $cari = $request->search;
    		$data = $this->hamlet->where('name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
    	}
    }

}
