<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all(); 
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function home()
    {
        $products = Product::paginate(3);
       
        if (Auth::user()) {
            $user = auth()->user();

            $count = cart::where('name',$user->name)->count();
            return view('user.home', compact('products','count'));
        }else{
            return view('user.home', compact('products'));
        }
       
            
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();

        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required',
            'role' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request['password']);
        $user->remember_token = Str::random(40);
        $user->save();
    }

    public function api(Request $request)
    {
        $users = User::all();
        $datatables = datatables()->of($users)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
         $this->validate($request,[
            'name' => 'required',
            'email'=> 'required',
            'role' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

         $user->name = $request->name;
         $user->email = $request->email;
         $user->role = $request->role;
         $user->password = $request->password;
         $user->save();

         return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect('users');
    }
}
