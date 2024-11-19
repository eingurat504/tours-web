<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  
          /**
     * Display users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        $this->authorize('viewAny', [User::class]);

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
        $this->authorize('create', [User::class]);
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

        $this->authorize('create', [User::class]);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'roles' => 'required',
        ]);

        $user = new User();
        $numericRoleArray = [];
        foreach($request->roles as $role) {
            $numericRoleArray[] = intval($role);
        }

        $user->syncRoles($numericRoleArray);
        $user->name = $request->name;
        $user->status = 'active';
        $user->email = $request->email;
        $user->password = Hash::make("$request->password");
        $user->save();

        flash("{$user->name} created.")->success();

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

        $this->authorize('update', [User::class]);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'sometimes|email',
            'roles' => 'required|exists:roles,id',
        ]);

        $user = User::findorfail($userId);

        $user->name = $request->name;
        $user->assignRole([$request->roles]);
        $user->email = $request->email;
        $user->password = Hash::make("$request->first_name"."$request->last_name");
        $user->save();

        flash("{$user->name} updated.")->success();

        return redirect()->route('users.index');

    }


        /**
     * Get user
     */
    public function show($userId){

        $this->authorize('view', [User::class, $userId]);

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

        $this->authorize('update', [User::class, $userId]);

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
        $this->authorize('delete', [User::class, $userId]);

        $user = User::withTrashed()->findOrFail($userId);

        $user->forceDelete();

        return redirect()->route('users.index');
    }
}
