<?php

namespace App\Http\Controllers;

use App\Models\PaymentLog;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
  
          /**
     * Display users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show create page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $this->authorize('create', [Booking::class]);
        $roles = Role::get();
    
        return view('users.create',[
            'roles' => $roles
        ]);
    }

    /**
     * Create User
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        // $this->authorize('create', [User::class]);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'sometimes',
            'email' => 'sometimes|email',
            'gender' => 'sometimes|boolean',
            'roles' => 'required|exists:roles,id',
            'phone_number' => 'sometimes|max:255',
            'address' => 'sometimes|max:255',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->assignRole([$request->roles]);
        $user->email = $request->email;
        // $user->phone_number = $request->phone_number;
        // $user->gender = $request->gender;
        // $user->username = $request->username;
        $user->password = Hash::make("$request->first_name"."$request->last_name");
        // $user->address = $request->address;
        $user->save();

        // flash("{$user->name} created.")->success();

        return redirect()->route('users.index');

    }

    
    /**
     * Create User
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $userId)
    {

        // $this->authorize('create', [User::class]);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'sometimes',
            'email' => 'sometimes|email',
            'gender' => 'sometimes|boolean',
            'roles' => 'required|exists:roles,id',
            'phone_number' => 'sometimes|max:255',
            'address' => 'sometimes|max:255',
        ]);

        $user = User::findorfail($userId);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->assignRole([$request->roles]);
        $user->email = $request->email;
        $user->password = Hash::make("$request->first_name"."$request->last_name");
        $user->save();

        // flash("{$user->name} created.")->success();

        return redirect()->route('users.index');

    }


        /**
     * Get user
     */
    public function show($userId){

        // $this->authorize('view', [User::class, $userId]);

        $user = User::findOrfail($userId);
        
        return view('users.show',[
            'user' => $user
        ]);
    }

       /**
     * Show create user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Request $request, $userId)
    {

        // $this->authorize('update', [User::class, $userId]);

        $user = User::findOrfail($userId);

        $roles = Role::get();

        return view('users.edit',[
            'user' => $user,
            'roles' =>$roles  
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        // $this->authorize('force-delete', [User::class, $userId]);

        $user = User::withTrashed()->findOrFail($userId);

        $user->forceDelete();

        Toastr::error($user->name, 'Deleted', ['closeButton' => true, 'timeOut' => 5000]);

        return redirect()->route('users.index');
    }
}
