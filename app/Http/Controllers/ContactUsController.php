<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\User;
use App\Notifications\ContactUsFormNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactUsController extends Controller
{
    public function index(ContactUsRequest $request)
    {
        $admin = User::admin()->first();
        $admin->notify(new ContactUsFormNotification(
            $request->only(['name', 'e-mail', 'phone', 'comment']),
        ));

        return redirect()->route('home');
    }
}
