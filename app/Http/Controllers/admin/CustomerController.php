<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Log;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models =Client::orderBy('id','DESC')->where('type','Customer')->get();
        return view('admin.customer.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.form');
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

          $customer =new Client;
          $customer->name =$request->name;
          $customer->email =$request->email;
          $customer->phone =$request->phone;
          $customer->address =$request->address;
          $customer->type =$request->type;
          $customer->save();

          $log['user_id'] = auth()->user()->id;
          $log['work'] = 'Add'.$request->name .'As a Customer';
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
        return view('admin.customer.form',compact('model'));
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

          $customer = Client::find($id);
          $customer->name =$request->name;
          $customer->email =$request->email;
          $customer->phone =$request->phone;
          $customer->address =$request->address;
          $customer->type =$request->type;
          $customer->save();

          $log['user_id'] = auth()->user()->id;
          $log['work'] = 'Update'.$request->name .'As a Customer';
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
        $customer=Client::find($id);
        $customer->delete();
        $log['user_id'] = auth()->user()->id;
        $log['work'] = 'Delete a Customer';
        Log::create($log);
        if ($customer) {
            return response()->json(['success' => true, 'status' => 'success', 'message' => 'Information Delete Successfully.','load'=>true]);
        }
    }
}
