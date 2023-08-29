<?php

// app/Http/Controllers/VerificationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

class VerificationController extends Controller
{
    public function sendVerificationEmail(Request $request)
    {
        // Logic to generate verification token and associate it with the user
        
        $user = auth()->user(); // Change this to how you retrieve the authenticated user
        
        // Generate and save verification token to user
        
        // Send verification email
        Mail::to($user->email)->send(new VerificationEmail($user));

        return redirect()->back()->with('message', 'Verification email sent!');
    }
}

