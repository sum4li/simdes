<?php

namespace App\Http\Controllers;

use App\Civil;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CivilController extends Controller
{

    public function __construct()
    {
        $this->civil = new Civil();
    }

    public function index()
    {
        return view('backend.civil.index');
    }

    public function source(){
        $query= Civil::query();
        $query->where('death_status','hidup');
        return DataTables::eloquent($query)
        ->filter(function ($query) {
            if (request()->has('search')) {
                $query->where(function ($q) {
                    $q->where('name', 'LIKE', '%' . request('search')['value'] . '%');
                });
            }
            })
            ->addColumn('nik', function ($data) {
                return $data->nik;
            })
            ->addColumn('name', function ($data) {
                return title_case($data->name);
            })
            ->addColumn('address', function ($data) {
                return title_case($data->address);
            })
            ->addColumn('hamlet', function ($data) {
                return title_case($data->hamlet->name);
            })
            ->addIndexColumn()
            ->addColumn('action', 'backend.civil.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        return view('backend.civil.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->merge(['slug'=>$request->name,'death_status'=>'hidup']);
            $this->civil->create($request->all());
            DB::commit();
            return redirect()->route('civil.index')->with('success-message','Data telah disimpan');
            // return $request->all();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function show($id)
    {
        $data = $this->civil->find($id);
        return view('backend.civil.show',compact(['data']));

    }

    public function edit($id)
    {
        $data = $this->civil->find($id);
        return view('backend.civil.edit',compact('data'));

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request = $request->merge(['slug'=>$request->name]);
            $this->civil->find($id)->update($request->all());
            DB::commit();
            return redirect()->route('civil.index')->with('success-message','Data telah d irubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function destroy($id)
    {
        $this->civil->destroy($id);
        return redirect()->route('civil.index')->with('success-message','Data telah dihapus');
    }

    public function getCivil(Request $request){
        if ($request->has('search')) {
            $cari = $request->search;
    		$data = $this->civil->where('death_status','hidup')->where('name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
    	}
    }

}
