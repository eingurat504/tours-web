<?php

namespace App\DataTables;


use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Auth\Access\HandlesAuthorization;
use illuminate\Http\Request;
use Illuminate\Support\Str;

class RolesDataTable extends DataTable
{


        /**
     * Currently authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Access\Authorizable
     */
    protected $user;

    // protected $request;

        /**
     * Constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->user = $request->user();
   
    }
    
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable($query)
    {
        return datatables()
                ->eloquent($query)
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d H:i:s'); // human readable format
                })
                ->editColumn('updated_at', function ($request) {
                    return $request->updated_at->format('Y-m-d H:i:s'); // human readable format
                })
                ->addColumn('actions', function ($role) {
                    $actions = $this->buildActions($role);

                    return '
                        <ul class="flex gap-2 list-none mb-0">
                           '.$actions.'
                        </ul>';
                })
                ->rawColumns(['actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $role)
    {
        $query = $role->newQuery();

        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {

        return $this->builder()
                    ->setTableId('roles-table')
                    ->columns($this->getColumns())
                    ->language([
                        'emptyTable' => "No Roles available",
                        'info' => "Showing _START_ to _END_ of _TOTAL_ Roles",
                        'infoEmpty' => "Showing 0 to 0 of 0 Roles",
                        'infoFiltered' => "(filtered from _MAX_ total Roles)",
                        'infoPostFix' => "",
                        'thousands' => ",",
                        'lengthMenu' => "Show _MENU_ Roles",
                        'search' => 'Search Roles:',
                        'zeroRecords' => 'No Roles match search criteria'
                    ])
                    ->minifiedAjax()
                    // ->addCheckbox()
                    ->orderBy(4, 'desc')
                    // ->pageLength(10)
                    ->responsive()
                    ->parameters([
                        "responsive" => true,
                        'buttons' => ['excel', 'print', 'pdf'],
                    ])
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [    
            Column::make('name'),
            Column::make('guard_name'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('actions')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Roles_' . date('YmdHis');
    }

        /**
     * Build actions.
     *
     * @param $resource
     * @return string
     */
    protected function buildActions($role)
    {
        /*if ($this->user == null) {
            return '';
        }*/

        $routes = [
            'edit' => route('roles.edit',$role->id),
            'permissions' => route('roles.permissions', $role->id),
        ];

        $actions = ' ';

        if (Auth::user()->can('Update Roles')) {
            $actions .= '
            <li>
                <a href="' . $routes['edit'] . '" class="bg-indigo-600 text-white px-2 py-1 rounded-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 15l3.536 3.536 7.071-7.071-3.536-3.536L9 15zM4 20l4-1-3-3-1 4z" />
                    </svg>
                </a>
            </li>';
        }

            if (Auth::user()->can('Sync-Permissions Roles')) {
            $actions .= '
            <li>
                <a href="' . $routes['permissions'] . '" class="bg-green-600 text-white px-2 py-1 rounded-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 15l3.536 3.536 7.071-7.071-3.536-3.536L9 15zM4 20l4-1-3-3-1 4z" />
                    </svg>
                </a>
            </li>';      

            }

        return $actions;
    }
}
