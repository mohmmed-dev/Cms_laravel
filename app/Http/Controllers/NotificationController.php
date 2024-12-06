<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function allNotification() {
        $notifications = Notification::where([
            ['user_id','!=', auth()->user()->id],
            ['post_userId','=', auth()->user()->id]
        ])->orderBy('created_at','desc')->paginate(10);
        $title = __("All Notification");

        return view('notifications.all',compact('notifications','title'));
    }
}
