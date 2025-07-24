<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ImportUserController extends Controller
{
    public function showForm()
    {
        return view('import-users');
    }

    public function import(Request $request)
    {
       // $request->validate([
        //    'xml_file' => 'required|mimes:xml|max:2048',
       // ]);

        $file = $request->file('xml_file');
        $xmlContent = file_get_contents($file->getRealPath());

        try {
            $xml = new \SimpleXMLElement($xmlContent);
        } catch (\Exception $e) {
            return back()->with('error', 'Invalid XML format.');
        }

        $imported = 0;
    
     //print_r($xml->contact);

        foreach ($xml->contact as $user) {
           // dd($user->name, $user->phone);
            User::create([
                'name' => (string) $user->name,
                'phone' => (string) $user->phone,
            ]);
            $imported++;
        }

        return back()->with('success', "$imported users imported successfully!");
    }
}
