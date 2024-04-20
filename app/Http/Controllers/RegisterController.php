<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Attendees;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; 


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'occupation' => 'required|string|max:255',
        'school' => 'nullable|string|max:255',
        'employer' => 'nullable|string|max:255',
        'email' => 'required|string|email|unique:attendees,email|max:255',
        'password' => 'required|string|min:8',
        'valid_id' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);
        $attendees = new Attendees();
        $attendees->fname = $validatedData['fname'];
        $attendees->lname = $validatedData['lname'];
        $attendees->country = $validatedData['country'];
        $attendees->occupation = $validatedData['occupation'];
        $attendees->school = $validatedData['school'];
        $attendees->employer = $validatedData['employer'];
        $attendees->email = $validatedData['email'];
        $attendees->password = Hash::make($validatedData['password']);
        $attendees->unique_code = Str::lower(Str::random(6)); //generate random lowercase unique code
        // Handle file upload
        if ($request->hasFile('valid_id')) {
            $file = $request->file('valid_id');

            // Check if the file is valid
            if ($file->isValid()) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->StoreAs('valid_ids', $fileName);

                // Save file path in the database
                $attendees->valid_id = $filePath;

            } else {
                return "Invalid file.";
            }
        }

        try {
            $attendees->save();
        } catch (\Exception $e) {
            Log::error('Database operation failed: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Database operation failed. Please try again later.']);
        }
        return redirect()->route('forms.UserLogIn');
    }
    

}
