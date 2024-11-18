<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\DataTables\RolesDataTable;

class RoleController extends Controller
{

    /**
     * Display Roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('roles.index');

    }

    
    /**
     * Get role
     */
    public function show($roleId){

        $this->authorize('view', [Role::class, $roleId]);

        $role = Role::findOrfail($roleId);
        
        return view('roles.show',[
            'role' => $role
        ]);
    }


        /**
     * Get role
     */
    public function edit($roleId){

        $this->authorize('update', [Role::class, $roleId]);

        $role = Role::findOrfail($roleId);
        
        return view('roles.edit',[
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
        $this->authorize('create', [Role::class]);

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

        $this->authorize('create', [Role::class]);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'sometimes',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->save();

        flash("{$role->name} created.")->success();

        return redirect()->route('roles.index');

    }

    /**
     * Update Role
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $roleId)
    {
        $this->authorize('update', [Role::class, $roleId]);

        $this->validate($request, [
            'name' => 'sometimes',
        ]);

        $role = Role::findOrfail($roleId);

        $role->name = $request->input('name', $role->name);
        $role->save();

        flash("{$role->name} updated.")->success();

        return redirect()->route('roles.index');

    }

       /**
     * Remove Role.
     *
     * @param int $roleId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($roleId)
    {
        $this->authorize('delete', [Role::class]);

        $role = Role::findOrFail($roleId);

        $role->delete();

        flash('Role has been deleted.')->error()->important();

        return redirect()->route('roles.index');
    }

      /**
     * Get permissions granted to a role.
     *
     * @param int $roleId
     *
     * @return \Illuminate\Support\Collection
     */
    protected function permissionGranted($roleId)
    {
        $query = Permission::query();

        $query->leftJoin('role_has_permissions', function ($join) use ($roleId) {
            $join->on('permissions.id', '=', 'role_has_permissions.permission_id');
            $join->where('role_has_permissions.role_id', '=', $roleId);
        });

        $query->select([
            'permissions.id',
            'permissions.name',
            'role_has_permissions.role_id',
        ]);

        $permissions = $query->get();

        $permissions = $permissions->map(function ($permission) {
            return [
                'id' => $permission->id,
                'name' => $permission->name,
                'granted' => ! is_null($permission->role_id),
            ];
        });

        return $permissions;
    }

    /**
     * Show the form for editing the specified role permissions.
     *
     * @param int $roleId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\View\View
     */
    public function permissions($roleId)
    {
        $this->authorize('syncPermissions', [Role::class, $roleId]);

        $role = Role::findOrFail($roleId);

        $role->permissions = $this->permissionGranted($roleId);

        return view('roles.permissions', [
            'role' => $role,
        ]);
    }

        /**
     * Synchronize permissions granted to a specified role.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $roleId
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function syncPermissions(Request $request, $roleId)
    {
        $this->authorize('syncPermissions', [Role::class, $roleId]);

        $role = Role::findOrFail($roleId);

        $this->validate($request, [
            'permissions' => 'required|array',
            'permissions.*' => 'required|integer',
        ]);

        $role->permissions()->sync($request->permissions, true);

        flash("{$role->name} permissions updated.")->success();

        return redirect()->route('roles.index');
    }


}
