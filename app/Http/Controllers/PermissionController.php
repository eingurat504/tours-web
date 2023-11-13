<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PermissionController extends Controller
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
     * Get all permissions
     */
    public function index(PermissionsDataTable $dataTable){

        // $this->authorize('viewAny', [Permission::class]);
        // dd($dataTable->render());

        return $dataTable->render('permissions.index');
    }

        /**
     * Get Permission
     */
    public function show($permissionId){

        $this->authorize('view', [Permission::class, $permissionId]);

        $permission = Permission::findOrfail($permissionId);
        
        return view('permissions.show',[
            'permission' => $permission
        ]);
    }


        /**
     * Show create permission
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {

        // $this->authorize('create', [Permission::class]);
    
        return view('permissions.create',[
            // 'roles' => $roles
        ]);

    }

      /**
     * Create Permission
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        // $this->authorize('create', [Permission::class]);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'sometimes',
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();

        // flash("{$permission->name} created.")->success();

        return redirect()->route('permissions.index');

    }
}
