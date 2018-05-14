<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpRequest;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       //lista.
         //paginacion
         $users=User::orderBy('id','ASC')->paginate(5);
         return view('admin.users.index')->with('users',$users);

     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('admin.users.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(UserRequest $request)
     {
       //  dd($request->all());
       //crear
           $user = new User($request->all());
           $user ->password=bcrypt($request->password);
           $user->save();

         // Flash::success("se a registrado". $user->name." de forma exitosa");
           return redirect()->route('users.index');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
       $user=User::find($id);
       return view('admin.users.edit')->with('user',$user);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UserUpRequest $request, $id)
     {
         $user=User::find($id);
         $user->name  = $request->name;
         $user->email = $request->email;
         $user->type  = $request->type;
         $user->save();
         return redirect()->route('users.index');

         //dd($request->all());
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $user=User::find($id);
         $user->delete();
         return redirect()->route('users.index');
     }
}
