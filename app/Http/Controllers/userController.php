<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Company;
use App\Follower;
use App\Followers;
use App\like;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\verifyEmail;
use App\Rate;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Picture;
use App\Post;
use App\Regular;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class userController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function userSignUp(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:users|max:120',
            'password' => 'required|min:6',
            'name' => 'required|max:120',
            'username' => 'required|max:120',
            'phone_number' => 'required|min:11|max:14',
            'gender' => 'required',
            'country' => 'required'
        ]);

        $email = $request['email'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->role = 0; // Regular = 0, Company - 1
        $user->verifyToken = Str::random(40);
        $user->save();

        $name = $request['name'];
        $username = $request['username'];
        $phone_number = $request['phone_number'];
        $gender = $request['gender'];
        $country = $request['country'];

        $regular_user = new Regular();
        $regular_user->user_id = $user->id;
        $regular_user->name = $name;
        $regular_user->username = $username;
        $regular_user->phone_number = $phone_number;
        $regular_user->gender = $gender;
        $regular_user->country = $country;

        $regular_user->save();

        $posts = Post::all();

        $thisUser = User::where('id',$user->id)->first();
        $this->sendEmail($thisUser);


        $message = 'Your have registered successfully! Verify Email to activate your account';
        return redirect()->route('home')->with('message',$message);
    }

    public function verifyExtract($user_id)
    {
        $thisUser = User::where('id',$user_id)->first();
        $this->sendEmail($thisUser);
        $success = 'Account verified successfully';
        return redirect()->back()->with('success',$success);
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst()
    {
     return view('verifyEmailFirst');
    }

    public function sendemailDone($email,$verifyToken)
    {
       $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if ($user){
            $user->verified = 1;
            $user->verifyToken= null;
            $user->update();
            $message = 'Account Verified Successfully ! ';
            return redirect()->route('home')->with('message',$message);

        }else{
            $message = 'User Not Found , Try Again';
            return redirect()->route('home')->with('message',$message);
        }
    }




    public function SignIn(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $email = $request['email'];
        $user = User::where("email",$email)->first();

        if(Auth::attempt(['email' => $request['email'],'password' => $request['password']]))
        {
            if ($user['verified'] == 1){
                if ($user['role'] == 2) {
                    return redirect()->route('dashboardd');

                }
                else if($user['role'] == 0 && $user['blocked'] == 1 ){
                    $message = 'Your account has been blocked by admin';
                    return redirect()->back()->with('message',$message);

                }else if($user['role'] == 1 && $user['blocked'] == 1 ){
                    $message = 'Your account has been blocked by admin';
                    return redirect()->back()->with('message',$message);
                }
                else{
                    return redirect()->route('news-feed');
//                return view('frontend.layouts.user_login_layout',compact('posts','comments','keywords','regular'));
                }
            }
            else
            {
                $message = 'Account not verified! Verify Email to activate your account';
                return redirect()->route('home')->with('message',$message);
            }

        }else{
            $message = 'Wrong Credentials , Try Again !  ';
            return redirect()->back()->with('message',$message);
        }
    }

    public function userProfile()
    {
        $user_id = Auth::user()->id;
        $role = Auth::user()->role;
        if($role == 0){
            $user2 = Regular::where('user_id',$user_id)->first();
            $Companies = null;
        }else{
            $Companies = Company::where('user_id',$user_id)->first();
            $user2 = null;
        }
        $user1 = User::where('id',$user_id)->first();
        $comments = Comment::all();
        $regular = Regular::all();
        $posts = Post:: where('id', $user_id)->orderBy('id', 'DESC')->paginate(5);
        $likes = like::all();
        return view('frontend.layouts.Profile',compact('user1','user2','posts','Companies','comments','likes','regular'));
    }

    public function upload(Request $request)
    {
       $this->validate($request,[
            'image' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();
        $user_image = $user['currentimage'];
        if($user_image == null){

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/account/' . $filename);
                Image::make($image)->resize(600, 400)->save($location);

                $user = User::where('id', $user_id)->first();
                $user->currentimage = $filename;
                $user->update();
            }

        }else {
            $picture = new Picture();
            $picture->image =$user_image;
            $picture->user_id = $user_id;
            $picture->save();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/account/' . $filename);
                Image::make($image)->resize(600, 400)->save($location);

                $user = User::where('id', $user_id)->first();
                $user->currentimage = $filename;
                $user->update();
            }
        }
        $success = "Profile picture changed successfully";
        return redirect()->back()->with('success',$success);

    }


    public function userSettings()
    {
        $user_id = Auth::user()->id;
        $user1 = User::where('id',$user_id)->first();
        $user2 = Regular::where('user_id',$user_id)->first();
        $user3 = Company::where('user_id',$user_id)->first();

       return view('frontend.layouts.settings',compact('user1','user2','user3'));
    }

    public function ChangePass()
    {
       return view('frontend.Layouts.ChangePassword');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $oldpassword = $request['oldPassword'];

        if (Hash::check($oldpassword, $user->password)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->newPassword)
            ])->save();

            $request->session()->flash('success', 'Your password has been changed.');

            return back();
        }

        $request->session()->flash('failure', 'Wrong old password ! Try again.');

        return back();


    }

    public function UpdateUser(Request $request,$id)
    {

        $user = User::where('id',$id)->first();
        $user->email = $request['email'];
        $user->update();

        $regular = Regular::where('user_id',$id)->first();
        $regular->name = $request['name'];
        $regular->username = $request['username'];
        $regular->phone_number = $request['phone_number'];
        $regular->gender = $request['gender'];
        $regular->country = $request['country'];
        $regular->update();
        $success = "Profile updated successfully!";
        return redirect("/profile")->with('success',$success);

    }

    public function UpdateCompany(Request $request,$id)
    {

        $user = User::where('id',$id)->first();
        $user->email = $request['email'];
        $user->update();

        $company = Company::where('user_id',$id)->first();
        $company->company_name = $request['company_name'];
        $company->owner_name = $request['owner_name'];
        $company->phone_number = $request['phone_number'];
        $company->company_type = $request['company_type'];
        $company->country = $request['country'];
        $company->description = $request['description'];
        $company->update();
        $success = "Profile updated successfully!";
        return redirect("/profile")->with('success',$success);


    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        return view('frontend/user');
    }


    public function find()
    {
        $users = User::where('role','!=' , 2)->get();
        return view('frontend/layouts/find_friends',compact('users'));

    }

    public function addfollower($id)
    {
        $follower = new Follower();
        $follower->user_id = Auth::user()->id;
        $follower->follower = $id;
        $follower->Save();
        return redirect()->route('list');
    }

    public function lists()
    {
        $userid = Auth::user()->id;
        $users = User::all();
        $follower = Follower::where('user_id',$userid)->get();
        return view('frontend/layouts/Friends-list',compact('follower','users'));
    }

    public function photos()
    {
        $user_id = Auth::user()->id;
        $photos = Picture::where('user_id',$user_id)->get();
        return view('frontend/layouts/photos', compact('photos'));
    }

    public function setDp($id)
    {
        $image = Picture::where('user_id',$id)->first();
        $user = User::where('id',$id)->first();
        $user_image = $user->currentimage;
        $picture = new Picture();
        $picture->image =$user_image;
        $picture->user_id = $user->id;
        $picture->save();
        $user->currentimage = $image['image'];
        $user->update();

        $success = "Profile picture changed successfully";
        return redirect()->route('profile')->with('success',$success);

    }

    public function Delldp($id)
    {
        $image = Picture::where('id',$id)->first();
        $image->delete();
        $success = "Profile picture deleted successfully!";
        return redirect()->back()->with('success',$success);
    }

    public function showallnotifiactions()
    {
//        $notifications = No::where('id',$user->id)->first();
        return view('frontend.layouts.showallnotifications');
    }

    public function pagenotfound()
    {
        return view('errors.503');
    }
}
