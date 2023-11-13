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
}
