<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUser;
use App\Http\Requests\updateUser;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //
    public function index()
    {
        $this->authorize('viewAny',User::class);
            $users=User::get();
            return view('users/list',compact('users'));
    }

    public function remove(Request $request)
    {
        $user=User::findOrFail($request->id);
        $this->authorize('delete',$user);
        $user->delete();
        return redirect()->back();
    }

    public function create()
    {
        $this->authorize('create',User::class);
        return view('users.create');
    }

    public function store(createUser $request)
    {
         $request->validated();
//         dd($request->all());
        if ($request->password === $request->repass){
            User::query()->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'type'=>$request->type,
        ])->markEmailAsVerified();
           return redirect()->route('allUsers');
        }else{
          return  redirect()->back()->with('password','خطای پسورد');
        }
    }

    public function edit($id)
    {
        $user=User::findOrFail($id);
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }

    public function update(updateUser $request)
    {
        $user=User::findOrFail($request->id);
        $this->authorize('update',$user);
//        dd($user);
        $user->name=$request->name;
        $user->type=$request->type;
        $user->save();
        return redirect()->route('allUsers');
    }
}

