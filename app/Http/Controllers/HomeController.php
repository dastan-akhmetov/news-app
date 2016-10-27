<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {

            $users = User::all();
            return view('/home/admin', compact('users'));

        } 
        else if (Auth::user()->role == 'editor') {

            return view('/home/editor');

        }
        else if (Auth::user()->role == 'viewer') {

            return view('/home/viewer');

        }

        return view('home');
    }

    /**
     * Admin's Dashboard.
     * Changes a role of users in the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_role(Request $request)
    {
        // Only for admin
        if (Auth::user()->role == 'admin') {

            $data = array();

            $parameters = $request->all();

            foreach($parameters as $key => $value) {

                $user_id = (int) substr($key, 3); // integer
                $pattern = substr($key, 0, 3); // find requests with `id_` pattern

                if ($pattern == 'id_') {

                    $user = User::find($user_id);

                    // if role has been changed from the dashboard, 
                    // update it in the database
                    if ($user->role != $value) {

                         DB::table('users')
                            ->where('id', $user_id)
                            ->update(['role' => $value]);
                        
                        // Message
                        $data[] = 'A user with an id: `' . $user_id . '` has been changed to `' . $value . '`';

                    }

                }

            }

            $users = User::all();
            return view('/home/admin', array('responses' => $data, 'users' => $users));

        }
        else {

            $data[] = 'You do not have an access to this page!';
            return view('/home' . Auth::user()->role, array('responses' => $data));

        }
    }
}
