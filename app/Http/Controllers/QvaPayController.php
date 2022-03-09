<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Order;
use App\Models\Campain;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MovementsBalancePending;

class QvaPayController extends Controller
{
    public function webhook(Request $request)
    {
        DB::beginTransaction();
        $movement = MovementsBalancePending::find($request->remote_id);

        if ($movement->type == 'service' || $movement->type == 'order') {
            OrderController::orderPaid($movement->model_id);
        }
        DB::commit();

        return redirect()->route('home');
    }

    public function cancel(Request $request)
    {
        $movement = MovementsBalancePending::find($request->remote_id);
        $movement->delete();

        return redirect('/home');
    }

    public static function payWithQvaPay($type, $model, $modelID, $amount)
    {
        $newMovement = new MovementsBalancePending();
        $newMovement->via = 'qvapay';
        $newMovement->amount = $amount;
        $newMovement->type = $type;
        $newMovement->model = $model;
        $newMovement->model_id = $modelID;
        $code = 'C-'.random_int(100, 10000);
        while (MovementsBalancePending::where('code', $code)->first()) {
            $code = 'C-'.random_int(100, 10000);
        }
        $newMovement->code = $code;
        $newMovement->save();
        $id = $newMovement->id;
        $amount = $amount;
        $description = 'Invoice';
        $appID = Setting::first()->qvapay_app_id;
        $app_secret = Setting::first()->qvapay_app_secret;

        $query = "https://qvapay.com/api/v1/create_invoice?app_id=$appID&app_secret=$app_secret&amount=$amount&description=$description&remote_id=$id&signed=0";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $query);

        $result = curl_exec($curl);

        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($http_status != 200) {
            return '500';
        } else {
            $json = json_decode($result);
            $url = $json->{'url'};
            //Save the url

            $newMovement->url = $url;
            $newMovement->update();

            return $url;
        }
    }
}
