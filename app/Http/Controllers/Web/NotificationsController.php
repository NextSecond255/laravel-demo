<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $notifications = Auth::user()->notifications()->paginate(20);

        //通知标记为衣服
        Auth::user()->markAsRead();

        return view('web.notifications.index', compact('notifications'));
    }
}
