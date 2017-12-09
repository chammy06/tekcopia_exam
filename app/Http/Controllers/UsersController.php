<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all()->toArray();
        return view('users.home', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|string|max:160',
            'lname' => 'required|string|max:160',
            'address' => 'required|string|max:160',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'string|max:160',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('image')) {
            $photoName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $photoName);
        }

        $post = $request->all();
        $post['image'] = $photoName;

        User::create($post);
        return redirect('users')->with('success','User created successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = Users::where('user_id', $user_id)->where('is_deleted', 0)->first();
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = Users::where('user_id', $user_id)->first();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $this->validate($request, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'image_file' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $post = $request->all();
        $post['password'] = Hash::make($post['password']);

        if($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $fileName = $image->getClientOriginalName();
            $fileExtension =  $image->getClientOriginalExtension();
            $post['image_file'] =  time() . '.' . $fileExtension;

            $image->move('uploads', $post['image_file']);
        }


        Users::find($user_id)->update($post);
        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        Users::where('user_id', $user_id)->update(['is_deleted' => 1]);
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}