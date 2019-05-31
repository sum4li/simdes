<?php

namespace App\Http\Controllers;

use App\Mortality;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Civil;

class MortalityController extends Controller
{

    public function __construct()
    {
        $this->mortality = new Mortality();
        $this->civil = new Civil();
    }

    public function index()
    {
        return view('backend.mortality.index');
    }

    public function source(){
        $query= Mortality::query();
        return DataTables::eloquent($query)
        ->filter(function ($query) {
            if (request()->has('search')) {
                $query->whereHas('civil',function ($q) {
                    $q->where('name', 'LIKE', '%' . request('search')['value'] . '%');
                });
            }
            })
            ->addColumn('nik', function ($data) {
                return $data->civil->nik;
            })
            ->addColumn('name', function ($data) {
                return title_case($data->civil->name);
            })
            ->addColumn('date', function ($data) {
                return Carbon::parse($data->date)->format('d-m-Y');

            })
            ->addIndexColumn()
            ->addColumn('action', 'backend.mortality.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        return view('backend.mortality.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->mortality->create($request->all());
            $this->civil->find($request->civil_id)->update(['death_status'=>'mati']);
            DB::commit();
            return redirect()->route('mortality.index')->with('success-message','Data telah disimpan');
            // return $request->all();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function show($id)
    {
        $data = $this->mortality->find($id);
        return view('backend.mortality.show',compact(['data']));

    }

    public function edit($id)
    {
        $data = $this->mortality->find($id);
        return view('backend.mortality.edit',compact('data'));

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request = $request->merge(['slug'=>$request->name]);
            $this->mortality->find($id)->update($request->all());
            DB::commit();
            return redirect()->route('mortality.index')->with('success-message','Data telah d irubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function destroy($id)
    {
        $this->mortality->destroy($id);
        return redirect()->route('mortality.index')->with('success-message','Data telah dihapus');
    }

    public function getMortality(Request $request){
        if ($request->has('search')) {
            $cari = $request->search;
    		$data = $this->mortality->where('name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
    	}
    }

}
