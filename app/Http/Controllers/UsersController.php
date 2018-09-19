<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login']);
        $this->middleware('administrator')->only(['index', 'create', 'delete']);
        $this->middleware('guest')->only(['login']);
    }
    
    public function index(){
        $data = User::notdeleted()->get();
        
        return view('admin.users.index', compact('data'));
    }
    
    public function login(){
        
        // if request is post validate login form 
        if(request()->isMethod('post')){
            
            // this is post request
            // login form submit
            
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            
            // if valalidation is TRUE (SUCCESS)
            // try to login user
            if( Auth::attempt([
                'email' => request('email'), 
                'password' => request('password'),
                'active' => 1,
                'deleted' => 0
                ]) ){
                // login is success
                // redirect to '/welcome' route 
                // with message
                return redirect()->intended(route('users-welcome'));
            } else {
                // credentials are wrong
                // return back (redirect) with CUSTOM message
                // 'Email or password does not match records!!!'
                
                return back()
                        ->withErrors([
                            'email' => 'Email or password does not match records!!!'
                            ])
                        ->withInput([
                            'email' => request('email')
                        ]);
            }
            
            
        }
        
        // this is view for get request
        return view('admin.users.login');
    }
    
    public function welcome(){
        
        return view('admin.users.welcome');
    }
    
    public function create(){
        if(request()->isMethod('post')){
            $this->validate(request(), [
                'name' => 'required|string|max:191',
                'phone' => 'required|string|max:191',
                'address' => 'required|string|max:191',
                'email' => 'required|string|email|max:191|unique:users',
                'password' => 'required|string|min:5|confirmed',
                'password_confirmation' => 'required',
                'role' => 'required|string|in:administrator,moderator'
            ]);
            
            $newRow = new User();
            $newRow->name = request('name');
            $newRow->phone = request('phone');
            $newRow->address = request('address');
            $newRow->email = request('email');
            $newRow->role = request('role');
            $newRow->password = bcrypt(request('password'));
            $newRow->active = 1;

            $newRow->save();
            
            // set message
            session()->flash('message-type', "success");
            session()->flash('message', "User $newRow->name has been created successfully!!!");
            
            
//            session()->flash('message', [
//                'type' => 'success',
//                'text' => "User $newRow->name has been created successfully!!!"
//            ]);
            
            return redirect( route('users') );
        }
        
        return view('admin.users.create');
    }
    
    public function edit(User $user){
        
        if( auth()->user()->role != 'administrator' && auth()->user()->id != $user->id ){
            abort(401, 'Unauthorized action.');
        }
        
        if(request()->isMethod('post')){
            $this->validate(request(), [
                'name' => 'required|string|max:191',
                'phone' => 'required|string|max:191',
                'address' => 'required|string|max:191',
                //'email' => "required|string|email|max:191|unique:users,email,$user->id",
                'role' => 'required|string|in:administrator,moderator'
            ]);
            
            $user->name = request('name');
            $user->phone = request('phone');
            $user->address = request('address');
            //$user->email = request('email');
            
            
            if( auth()->user()->role != 'administrator' && auth()->user()->role != request('role') ){
                abort(401, 'Unauthorized action.');
            } else {
                $user->role = request('role');
            }

            $user->save();
            
            // set message
            session()->flash('message-type', "success");
            session()->flash('message', "User $user->name edited successfully!!!");
            
            if( auth()->user()->role == 'administrator' ){
                return redirect( route('users') );
            } else {
                return redirect( route('users-welcome') );
            }
            
            
        }
        
        return view('admin.users.edit', compact('user'));
    }
    
    public function changePassword(User $user){
        
        if( auth()->user()->role != 'administrator' && auth()->user()->id != $user->id ){
            abort(401, 'Unauthorized action.');
        }
        
        if(request()->isMethod('post')){
            $this->validate(request(), [
                'password' => 'required|string|min:5|confirmed',
                'password_confirmation' => 'required',
            ]);
            
            
            
            $user->password = bcrypt(request('password'));
            $user->save();
            
            // set message
            session()->flash('message-type', "success");
            session()->flash('message', "$user->name password edited successfully!!!");
            
            if( auth()->user()->role == 'administrator' ){
                return redirect( route('users') );
            } else {
                return redirect( route('users-welcome') );
            }
            
            
        }
        
        return view('admin.users.change-password', compact('user'));
    }
    
    public function delete(User $user){
        $user->deleted = 1;
        $user->deleted_by = auth()->user()->id;
        $user->save();
        
        // set message
        session()->flash('message-type', "success");
        session()->flash('message', "User $user->name deleted successfully!!!");
            
        
        return redirect( route('users') );
    }
    
    public function logout(){
        Auth::logout();
        
        // set message
        session()->flash('message-type', "success");
        session()->flash('message', "Thank you!!! Come again!!!");
        
        return redirect( route('users-login') );
    }
}
