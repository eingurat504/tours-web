<?php

namespace App\Http\Controllers;

use App\Models\Permission;
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

        $this->authorize('viewAny', [Permission::class]);

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

       /**
     * Show create user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Request $request, $permissionId)
    {

        $this->authorize('update', [Permission::class, $permissionId]);

        $permission = Permission::findOrfail($permissionId);

        return view('permissions.edit',[
            'permission' => $permission
        ]);

    }

    /**
     * Update Permission
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $permissionId)
    {
        // $this->authorize('update', [Permission::class, $permissionId]);

        $this->validate($request, [
            'name' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $permission = Permission::findOrfail($permissionId);

        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();

        flash("{$permission->name} updated.")->success();

        return redirect()->route('permissions.index');

    }


    /**
     * Remove the specified role from storage.
     *
     * @param int $roleId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($permissionId)
    {
        // $this->authorize('delete', [Permission::class]);

        $permission = Permission::findOrFail($permissionId);

        $permission->delete();

        flash('Permission has been deleted.')->error()->important();

        return redirect()->route('permissions.index');
    }
}
