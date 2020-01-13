<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Log;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models =Client::orderBy('id','DESC')->where('type','Supplier')->get();
        return view('admin.supplier.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'=>'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'address' => 'nullable',
        ]);

          $supplier =new Client;
          $supplier->name =$request->name;
          $supplier->email =$request->email;
          $supplier->phone =$request->phone;
          $supplier->address =$request->address;
          $supplier->type =$request->type;
          $supplier->save();

          $log['user_id'] = auth()->user()->id;
          $log['work'] = 'Add '.$request->name .' As a Supplier';
          Log::create($log);


     return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Information Created'),'load'=>true]);
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
        $model =Client::find($id);
        return view('admin.supplier.form',compact('model'));
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
         $validator = $request->validate([
            'name'=>'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'address' => 'nullable',
         ]);

          $supplier = Client::find($id);
          $supplier->name =$request->name;
          $supplier->email =$request->email;
          $supplier->phone =$request->phone;
          $supplier->address =$request->address;
          $supplier->type =$request->type;
          $supplier->save();

          $log['user_id'] = auth()->user()->id;
          $log['work'] = 'Update'.$request->name .'As a Supplier';
          Log::create($log);


     return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Information Update'), 'load' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=Client::find($id);
        $supplier->delete();
        $log['user_id'] = auth()->user()->id;
        $log['work'] = 'Delete a Supplier';
        Log::create($log);
        if ($supplier) {
            return response()->json(['success' => true, 'status' => 'success', 'message' => 'Information Delete Successfully.','load'=>true]);
        }
    }
}
