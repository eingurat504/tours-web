<?php

namespace App\DataTables;


use App\Models\Booking;
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

class ActivitiesDataTable extends DataTable
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
        // dd(auth()->user()->userable->farmer_union_id);
    //     $this->user = $request->user();
   
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
                ->addColumn('category_id', function ($booking) {
                    return $booking->category->name ?? '';
                })
                ->addColumn('status', function ($delivery) {
                    if ($delivery->status == 1) {
                        return '<span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">UnPublished</span>';
                    } else {
                        return '<span class="inline-block bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">Published</span>';
                    }
                })
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d H:i:s'); // human readable format
                })
                ->editColumn('updated_at', function ($request) {
                    return $request->updated_at->format('Y-m-d H:i:s'); // human readable format
                })
                ->addColumn('actions', function ($booking) {
                    $actions = $this->buildActions($booking);

                    return '
                        <ul class="flex gap-2 list-none mb-0">
                           '.$actions.'
                        </ul>';
                })
                ->rawColumns(['actions','status','category_id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Booking $booking)
    {
        $query = $booking->newQuery();

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
                    ->setTableId('bookings-table')
                    ->columns($this->getColumns())
                    ->language([
                        'emptyTable' => "No bookings available",
                        'info' => "Showing _START_ to _END_ of _TOTAL_ bookings",
                        'infoEmpty' => "Showing 0 to 0 of 0 bookings",
                        'infoFiltered' => "(filtered from _MAX_ total bookings)",
                        'infoPostFix' => "",
                        'thousands' => ",",
                        'lengthMenu' => "Show _MENU_ bookings",
                        'search' => 'Search bookings:',
                        'zeroRecords' => 'No bookings match search criteria'
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
            Column::make('id'),
            Column::make('activity_name'),
            Column::make('duration'),
            Column::make('amount'),
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
        return 'bookings_' . date('YmdHis');
    }

        /**
     * Build actions.
     *
     * @param $resource
     * @return string
     */
    protected function buildActions($booking)
    {
        /*if ($this->user == null) {
            return '';
        }*/

        $routes = [
            'view' => route('bookings.show', $booking->id),
            'uploads' => route('bookings.uploads',$booking->id)
        ];

        $actions = ' ';

        // if ($this->user->can('view bookings')) {
            $actions .= '
            <li>
                <a href="' . $routes['view'] . '" class="bg-indigo-600 text-white px-2 py-1 rounded-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            </li>';
        // }

            // if ($this->user->can('view bookings')) {
            $actions .= '
            <li>
                <a href="' . $routes['uploads'] . '" class="bg-indigo-600 text-white px-2 py-1 rounded-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            </li>';      

        return $actions;
    }
}
