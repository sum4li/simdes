<?php

namespace App\Http\Controllers;

use App\Religion;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReligionController extends Controller
{

    public function __construct()
    {
        $this->religion = new Religion();
    }

    public function index()
    {
        return view('backend.religion.index');
    }

    public function source(){
        $query= Religion::query();
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
            ->addColumn('action', 'backend.religion.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        return view('backend.religion.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->religion->create($request->all());
            DB::commit();
            return redirect()->route('religion.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function show($id)
    {
        $data = $this->religion->find($id);
        return $data;

    }

    public function edit($id)
    {
        $data = $this->religion->find($id);
        return view('backend.religion.edit',compact('data'));

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request = $request->merge(['slug'=>$request->name]);
            $this->religion->find($id)->update($request->all());
            DB::commit();
            return redirect()->route('religion.index')->with('success-message','Data telah d irubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function destroy($id)
    {
        $this->religion->destroy($id);
        return redirect()->route('religion.index')->with('success-message','Data telah dihapus');
    }

    public function getReligion(Request $request){
        if ($request->has('search')) {
            $cari = $request->search;
    		$data = $this->religion->where('name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
    	}
    }

}
