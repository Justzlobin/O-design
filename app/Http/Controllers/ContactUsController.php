<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\User;
use App\Notifications\ContactUsFormNotification;
use Illuminate\Support\Str;

class ContactUsController extends Controller
{
    public function index(ContactUsRequest $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $firstName = Str::slug($request->get('first_name'), '_');
            $timestamp = now()->timestamp;
            $originalFileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $file->getClientOriginalExtension();

            $fileNameStore = "{$firstName}_{$timestamp}_{$originalFileName}.{$extension}";
            $filePath = $file->storeAs('uploads', $fileNameStore);
        }

        $admin = User::admin()->first();
        $admin->notify(new ContactUsFormNotification(
            $request->only(['first_name', 'e-mail', 'phone', 'comment']),
            $filePath ?? null
        ));

        return redirect()->route('home');
    }
}
