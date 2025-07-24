<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserImportController extends Controller
{
    public function showForm()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'xml_file' => 'required|file|mimes:xml',
        ]);

        $xmlContent = file_get_contents($request->file('xml_file')->getRealPath());

        $xml = simplexml_load_string($xmlContent);
        if (!$xml) {
            return back()->with('error', 'Invalid XML file.');
        }

        foreach ($xml->user as $userData) {
            User::updateOrCreate(
                ['email' => (string)$userData->email],
                [
                    'name' => (string)$userData->name,
                    'password' => Hash::make((string)$userData->password),
                ]
            );
        }

        return back()->with('success', 'Users imported successfully!');
    }
}

