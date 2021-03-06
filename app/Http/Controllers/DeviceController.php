<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use DataTables;
use App\Models\Device;
use App\Models\Graph;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function getData(){
        $query = DB::table('table_device')
            ->where('deleted_at', null)
            ->get();

        $datatable = Datatables::of($query);
            return $datatable
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="'.url('device/edit/'.$row->id).'" class="btn btn-icon submit" title="Edit"><i class="fa fa-edit"></i></a><a href ="#" type="delete" class="btn btn-icon js-sweetalert delete-data-device" title="Delete" data-id="'.$row->id.'" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></a>';
                })
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adddevice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $device = New Device;
        $device->code = $input['code'];
        $device->name = $input['name'];
        $device->status = $input['status'];
        $device->save();

        return response()->json([
            'status' => true,
            'redirect_url' => route('device'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::where('id', $id)->first();
        return view('editdevice', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        
        $device = Device::where('id', $id)->first();
        $device->code = $input['code'];
        $device->name = $input['name'];
        $device->status = $input['status'];
        $device->save();

        return response()->json([
            'status' => true,
            'redirect_url' => route('device'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::where('id', $id)->first();
        $device->deleted_at = date('Y-m-d H:i:s');
        $device->save();

        return response()->json([
            'status' => true,
            'redirect_url' => route('device'),
        ]);
    }
    public function chart()
    {
        return view('chart');
    }
    
    public function getchartData()
    {
        $data = Graph::all();
        dd($data[0]);
    }
}
