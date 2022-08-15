<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\MovementsBalance;
use Illuminate\Support\Facades\DB;
use App\Models\MovementsBalancePending;

class MovementsBalanceController extends Controller
{
    public static function new_movement_pending($refer, $type, $model_id, $amount, $via, $concept)
    {
        $newMovement = new MovementsBalancePending();
        $newMovement->refer = $refer;
        $newMovement->refer_id = $model_id;
        $newMovement->details = $concept;
        $newMovement->via = $via;
        $newMovement->amount = $amount;
        $newMovement->type = $type;

        $code = 'C-'.random_int(100, 10000);
        while (MovementsBalancePending::where('code', $code)->first()) {
            $code = 'C-'.random_int(100, 10000);
        }

        $newMovement->code = $code;
        $newMovement->save();
    }

    public static function new_movement($for, $type, $model_id, $concept, $amount, $onlyRegister, $of = null, $via = 'qvapay')
    {
        $movement = new MovementsBalance();
        $movement->via = $via;
        $movement->type = $type;
        $movement->for = $for;
        if ($onlyRegister == 'No') {
            switch ($for) {
                case 'user':
                    $movement->user_id = $model_id;
                    self::operate_amount('user', $model_id, $type, $amount);
                    // code...
                    break;
            }
        }
        $movement->concept = $concept;
        $movement->details = $concept;
        $movement->amount = $amount;
        $movement->save();

        return $movement;
    }

    public static function operate_amount($model, $id, $type, $amount)
    {
        switch ($model) {
            case 'user':
                $m = User::find($id);
                break;
        }

        if ($type == 'earning') {
            $m->amount = $m->amount + $amount;
        } elseif ($type == 'expence') {
            $m->amount = $m->amount - $amount;
        }

        $m->update();
    }
}
