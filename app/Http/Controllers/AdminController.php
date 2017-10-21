<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Comment;
use App\Company;
use App\like;
use App\Post;
use App\Rate;
use App\Regular;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $companies = User::where(['role'=> 1, 'verified'=> 0])->get();
        $users = User::where('role','!=' , 2)->get();
        return view('admin.dashboard',compact('users','companies'));
    }

    public function Regulars()
    {
        $regulars = Regular::all();
        Return view('admin.Regular_User', compact('regulars'));
    }

    public function Companies()
    {
      $Companies = Company::all();
        return view('admin.Company',compact('Companies'));
    }

    public function admit()
    {
        return view('admin.admit');
    }

    public function admin()
    {
        return view('admin.layouts.admin_layout');
    }

    public function admins()
    {
        $users = User::where('role', 2)->get();
        return view('admin.Admins',compact('users'));
    }

    public function admin_login()
    {
      return view('admin.admin_login');
    }

    public function lock()
    {
        return view('admin.lockscreen');
    }

    public function AdminSignUp(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name' => 'required|max:120',
            'authority' => 'required|max:120',
        ]);

        $email = $request['email'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->verifyToken = 1;
        $user->verified = 1;
        $user->password = $password;
        $user->role = 2; // Regular = 0, Company - 1 , admin=2
        $user->save();

        $admin = new Admin();

        $admin_name = $request['name'];
        $authority = $request['authority'];
        $authority = $request['authority'];

        $admin->user_id = $user->id;
        $admin->admin_name = $admin_name;
        $admin->authority = $authority;
        $admin->save();

        return redirect()->route('admins');
    }

    public function ViewUser($id)
    {
        $User = User::where('id',$id)->first();
        if($User->role == 0){
            $user = Regular::where('user_id',$id)->first();
            $company = null;
        }else if($User->role == 1 ){
            $company = Company::where('user_id',$id)->first();
            $user = null;
        }
        $posts = Post::where('user_id',$id)->get();
        return view('admin.viewRegular',compact('user','posts','company'));
    }

    public function blockUser($id)
    {
        $user = User::where('id',$id)->first();
        $user->blocked = 1; // 1 for blocked user, 0 for unblocked
        $user->update();
        $success = "User blocked successfully !";
        return redirect()->route('dashboardd')->with('success',$success);
    }

    public function unblockUser($id)
    {
        $user = User::where('id',$id)->first();
        $user->blocked = 0; // 1 for blocked user, 0 for unblocked
        $user->update();
        $success = "User unblocked successfully !";
        return redirect()->route('dashboardd')->with('success',$success);

    }

    public function deleteUser($id)
    {
        $user = User::where('id',$id)->first();
        if($user->role == 0){
            $regular = Regular::where('user_id',$id)->first();
            $regular->delete();

        }else if($user->role == 1 ){
            $company = Company::where('user_id',$id)->first();
            $company->delete();
        }

        $user->delete();
        $posts_of_user = Post::where('user_id',$user->id);
        $posts_of_user->delete();

        $comments_of_user = Comment::where('user_id',$user->id);
        $comments_of_user->delete();

        $likes_of_user = like::where('user_id',$user->id);
        $likes_of_user->delete();
        $success = "User deleted successfully !";
        return redirect()->back()->with('success',$success);

    }

    public function Addkeywords()
    {
        $editkeyword = null;
        $keywords = Rate::orderBy('keyword', 'asc')->paginate(1000);;
        return view('admin.Add_new_keyword',compact('keywords','editkeyword'));
    }

    public function addword(Request $request)
    {
        $this->validate($request,[
            'keyword' => 'required|max:120',
            'weight' => 'required|integer|between:-5,5',
        ]);

        $keywords = new Rate();
        $keywords->keyword = $request['keyword'];
        $keywords->weight = $request['weight'];
        $keywords->save();
        $success = "Keyword add successfully";
        return redirect()->back()->with('success',$success);

    }

    public function editword($id)
    {
        $keywords = Rate::all();
        $editkeyword =  Rate::where('id',$id)->first();
        return view('admin.Add_new_keyword',compact('keywords','editkeyword'));

    }

    public function updateword(Request $request,$id)
    {
        $this->validate($request,[
            'keyword' => 'required|max:120',
            'weight' => 'required|integer|between:-5,5',
        ]);
        $keywords = Rate::where('id',$id)->first();
        $keywords->keyword = $request['keyword'];
        $keywords->weight = $request['weight'];
        $keywords->update();
        $success = "Keyword Updated Successfully !";
        return redirect()->route('Addkeywords')->with('success',$success);





    }

    public function deleteword($id)
    {
        $keyword =  Rate::where('id',$id)->first();
        $keyword->delete();
        return redirect()->back();

    }

    public function logicsubmit(Request $request)
    {
        $rate = (6/$request['weight'])*100;
        $rate= $rate+0;
        return 'Rate is '.$rate;
    }

    public function adminlogout()
    {
        \Auth::logout();
        return redirect('/admin-login');
    }

}
