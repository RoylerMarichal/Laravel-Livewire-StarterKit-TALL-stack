<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Notifica;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class NotificaController extends Controller
{
    public static function Notifica($user_id, $type, $mensaje)
    {
        $notifica = new Notifica();
        $notifica->user_id = $user_id;
        $notifica->type = $type;
        $notifica->data = $mensaje;
        $notifica->save();
    }

    public static function NotificaAdmin($type, $mensaje, $canal = 'All')
    {
        if ($canal == 'All') {
            $admins = Admin::pluck('user_id')->toArray();
            foreach (User::whereIn('id', $admins)->get() as $admin) {
                $notifica = new Notifica();
                $notifica->user_id = $admin->id;
                $notifica->type = $type;
                $notifica->data = $mensaje;
                $notifica->save();
            }
        }
    }

    public static function NotificaAll($type, $mensaje)
    {
        foreach (User::all() as $admin) {
            $notifica = new Notifica();
            $notifica->user_id = $admin->id;
            $notifica->type = $type;
            $notifica->data = $mensaje;
            $notifica->save();
        }
    }

    public static function getNotifica()
    {
        $notificaciones2 = Notifica::where('user_id', auth()->user()->id)->where('view', 0)->orderBy('created_at', 'DESC')->get();

        return $notificaciones2;
    }

    public function leido(Request $request)
    {
        if ($request->ajax()) {
            $notifica = Notifica::find($request->id);
            $notifica->leido = 1;
            $notifica->save();
        }
    }

    public static function cntNotifica()
    {
        return Notifica::where('user_id', auth()->user()->id)->where('leido', 0)->get()->count('id');
    }
}
