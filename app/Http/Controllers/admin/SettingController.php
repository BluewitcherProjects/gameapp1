<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Language;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public $route = 'admin.setting';
    public function index()
    {
        $data = Setting::find(1);
       // return view('admin.pages.setting.index', compact('data'));
    $data = Setting::find(1);
        //$timezones = json_decode(file_get_contents(resource_path('views/admin/partials/timezone.json')));
        $paymentMethod = PaymentMethod::where(['open_payout' => 1, 'status' => 'active'])->get();
       // $languages = Language::where(['status' => 1])->get();
        return view('admin.pages.setting.index', compact('data', 'paymentMethod'));
    }

    public function insert_or_update(Request $request)
    {
        $model = Setting::findOrFail(1);
        $model->withdraw_charge = $request->withdraw_charge;
        $model->minimum_withdraw = $request->minimum_withdraw;
        $model->maximum_withdraw = $request->maximum_withdraw;
        $model->w_time_status = $request->w_time_status;
        $model->checkin = $request->checkin;
        $model->registration_bonus = $request->registration_bonus;
        $model->total_member_register_reword_amount = $request->total_member_register_reword_amount;
        $model->total_member_register_reword = $request->total_member_register_reword;
        $model->telegram = $request->telegram;
        $model->whatsapp = $request->whatsapp;
        $model->auto_deposit = $request->auto_deposit;
        $model->auto_transfer = $request->auto_transfer;
        $model->auto_transfer_default = $request->auto_transfer_default;

        $model->open_deposit = $request->open_deposit;
        $model->open_transfer = $request->open_transfer;

        $model->update();
        return redirect()->route($this->route.'.index')->with('success', 'Settings Updated Successfully.');
    }
}
