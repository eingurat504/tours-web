<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Display bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('roles.index');

    }

    
    /**
     * Get user
     */
    public function show($roleId){

        // $this->authorize('view', [Role::class, $roleId]);

        $role = Role::findOrfail($roleId);
        
        return view('roles.show',[
            'role' => $role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', [Booking::class]);

        return view('roles.create');
    }


          /**
     * Create Role
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        // $this->authorize('create', [Role::class]);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'sometimes',
        ]);

        $role = new Role();
        $role->name = $request->name;
        // $role->description = $request->description;
        $role->save();

        // flash("{$role->name} created.")->success();

        return redirect()->route('roles.index');

    }


}
