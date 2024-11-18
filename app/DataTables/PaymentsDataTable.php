<?php

namespace App\DataTables;

use App\Models\Payment;
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

class PaymentsDataTable extends DataTable
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
                ->addColumn('booking_id', function ($payment) {
                    return $payment->booking->booking_no ?? '';
                })
                ->addColumn('status', function ($delivery) {
                    if ($delivery->status == 1) {
                        return '<span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">fully paid</span>';
                    } else {
                        return '<span class="inline-block bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">paid</span>';
                    }
                })
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d H:i:s'); // human readable format
                })
                ->editColumn('updated_at', function ($request) {
                    return $request->updated_at->format('Y-m-d H:i:s'); // human readable format
                })
                ->addColumn('actions', function ($payment) {
                    $actions = $this->buildActions($payment);

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
    public function query(Payment $payment)
    {
        $query = $payment->newQuery();

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
                    ->setTableId('payments-table')
                    ->columns($this->getColumns())
                    ->language([
                        'emptyTable' => "No Payments available",
                        'info' => "Showing _START_ to _END_ of _TOTAL_ Payments",
                        'infoEmpty' => "Showing 0 to 0 of 0 Payments",
                        'infoFiltered' => "(filtered from _MAX_ total Payments)",
                        'infoPostFix' => "",
                        'thousands' => ",",
                        'lengthMenu' => "Show _MENU_ Payments",
                        'search' => 'Search Payments:',
                        'zeroRecords' => 'No Payments match search criteria'
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
            Column::make('payment_reference_no'),
            Column::make('mode_of_payment'),
            Column::make('booking_id')->title('Booking No'),
            Column::make('status'),
            Column::make('amount'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('actions')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Payments_' . date('YmdHis');
    }

        /**
     * Build actions.
     *
     * @param $resource
     * @return string
     */
    protected function buildActions($payment)
    {
        /*if ($this->user == null) {
            return '';
        }*/

        $routes = [
            'approve' => route('payments.approve', $payment->id),
            // 'destroy' => route('payments.destroy',$payment->id)
        ];

        $actions = ' ';
 

        return $actions;
    }
}
