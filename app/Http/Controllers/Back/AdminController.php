<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function UserDashboard()
    {
        $data['file'] = DB::table('files')->count();
        $data['group'] = DB::table('groups')->count();
        $data['contact'] = DB::table('contacts')->count();

        return view('back.dashboard', $data);
    }

    public function UserView()
    {
        $data['users'] = DB::table('users')->where('usertype', 'User')->get();
        return view('back.user.view_user', $data);
    }

    public function UserAdd()
    {
        return view('back.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->usertype = "User";
        $user->status = 1;

        $user->save();

        return redirect()->route('user.all')->with('success', 'User Added Successfully!');
    }

    public function UserEdit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('back.user.edit_user', compact('user'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('user.all')->with('success', 'User Updated Successfully!');
    }

    public function UserDelete(Request $request)
    {
        $user = User::find($request->id);

        $user->delete();
        return redirect()->route('user.all')->with('success', 'User Deleted Successfully!');
    }


    public function UserInactive($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = 0;
        $user->save();

        return redirect()->back()->with('success', 'User Inactive Successfully!');
    }


    public function UserActive($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User Active Successfully!');
    }


}
