<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PaymentMethodController extends Controller
{
    public $route = 'admin.method';
    public function index()
    {
        $methods = PaymentMethod::get();
        return view('admin.pages.method.index', compact('methods'));
    }
    public function create($id=null)
    {
        $data = null;
        if ($id){
            $data = PaymentMethod::find($id);
            $parameters = collect(json_decode($data->settings));
        }
        return view('admin.pages.method.insert', compact('data','parameters'));
    }

    public function insert_or_update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'channel'=> 'required',
            'receiver'=> 'required',
            'type'=> 'required',
            'address'=> 'required',
            'minimum'=> 'required|numeric',
            'maximum'=> 'required|numeric',
        ]); 


        if ($request->id){
            $model = PaymentMethod::findOrFail($request->id);
            $parameters = collect(json_decode($model->settings));

            foreach ($parameters as $key => $pram) {
                $parameters[$key]->value = $request->global[$key];
            }

            $model->settings = json_encode($parameters);
            $model->status = $request->status;
        }else{
            $model = new PaymentMethod();
        }
        $model->type = $request->type;
        $model->channel = $request->channel;
        $model->address = $request->address;
        $model->minimum = $request->minimum;
        $model->receiver = $request->receiver;
        $model->maximum = $request->maximum;

        $model->save();
        return redirect()->route($this->route.'.index')->with('success', $request->id ? 'Payment method Updated Successful.' : 'Package Created Successful.');
    }

    public function delete($id)
    {
        $model = PaymentMethod::find($id);
        deleteImage($model->photo);
        $model->delete();
        return redirect()->route($this->route.'.index')->with('success','Item Deleted Successful.');
    }
}
