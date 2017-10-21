<?php

namespace App\Http\Controllers;

use App\Company;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function companySignUp(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email|unique:users|max:120',
            'company_name' => 'required|max:120',
            'owner_name' => 'required|max:120',
            'country'   => 'required',
            'phone_number' => 'required|min:11|max:14',
            'company_type' => 'required',
            'path' => 'required',
            'description' => 'required',
            'password1' => 'required|min:6',

        ]);

        $email = $request['email'];
        $password = bcrypt($request['password1']);

        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->role = 1; // Regular = 0, Company = 1
        $user->verifyToken = Str::random(40);
        $user->save();

        $company_name = $request['company_name'];
        $owner_name = $request['owner_name'];
        $country = $request['country'];
        $phone_number = $request['phone_number'];
        $company_type = $request['company_type'];
        $description = $request['description'];

        $company = new Company();
        $company->user_id = $user->id;
        $company->company_name = $company_name;
        $company->owner_name = $owner_name;
        $company->phone_number = $phone_number;
        $company->company_type = $company_type;
        $company->country = $country;
        $company->description = $description;
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
//            $location = public_path('extracts/'. $filename);
            $request->file('path')->move(public_path("/extracts/"), $filename);
//            Storage::put('extracts/'. $filename,file_get_contents($request->file('path')->getRealPath()));
            $company->path = $filename;

        }

        $company->save();
        $message = 'You have successfully registered , Your registration extracts is under process , check your verification email after 5 to 6 hours.';
        return redirect()->route('home')->with('message',$message);
    }
}
