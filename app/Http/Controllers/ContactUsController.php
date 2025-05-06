<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\User;
use App\Notifications\ContactUsFormNotification;

class ContactUsController extends Controller
{
    public function index(ContactUsRequest $request)
    {
        try {
            $admin = User::admin()->first();
            $admin->notify(new ContactUsFormNotification(
                $request->only(['name', 'e-mail', 'phone', 'comment']),
            ));

            return redirect()->route('home')->with('success', __('contact-us.form.success_message'));

        } catch (\Throwable $e) {
            return redirect()->back()->with('error', __('contact-us.form.error_message'));
        }
    }
}
