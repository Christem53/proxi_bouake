<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {

        $prestataire = Auth::user()->prestataire;


        $notifications = Notification::where(
            'prestataire_id',
            $prestataire->id
        )
        ->latest()
        ->get();



        // Marquer les notifications comme lues
        Notification::where(
            'prestataire_id',
            $prestataire->id
        )
        ->where('lu', false)
        ->update([
            'lu' => true
        ]);



        return view(
            'notifications.index',
            compact('notifications')
        );

    }
}