<?php

namespace App\DataTables;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('created_at', function ($request) {
            return $request->created_at->format('Y-m-d H:i:s'); // human readable format
        })
        ->editColumn('updated_at', function ($request) {
            return $request->updated_at->format('Y-m-d H:i:s'); // human readable format
        })
        ->addColumn('actions', function ($booking) {
            $actions = $this->buildActions($booking);

            return '
            <div class="dropdown show">
                <div class="text-muted" data-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-more-horizontal">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                </div>
                <div class="dropdown-menu">'.$actions.'</div>
            </div>';
        })
        ->rawColumns(['actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Activity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Activity $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('activities-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
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
            Column::computed('actions')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('activity_name'),
            Column::make('duration'),
            Column::make('amount'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Activities_' . date('YmdHis');
    }

            /**
     * Build actions.
     *
     * @param $resource
     * @return string
     */
    protected function buildActions($activity)
    {
        /*if ($this->user == null) {
            return '';
        }*/

        $routes = [
            'view' => route('activities.show', $activity->id),
            'edit' => route('activities.edit', $activity->id),
            // 'destroy' => route('projects.projects.destroy',$project->id),
        ];

        $actions = '';

        // if ($this->user->can('view activities')) {
            $actions .= '
            <a class="dropdown-item d-flex" href="' . $routes['view'] . '">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-eye">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <span class="ml-2">View<span>
            </a>';
        // }

        // if ($this->user->can('update activities')) {
            $actions .= '
            <a class="dropdown-item d-flex" href="' . $routes['edit'] . '">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-edit">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                <span class="ml-2">Edit</span>
            </a>';
        // }

        // if ($this->user->can('delete activities')) {
        //     $actions .= '
        //      <a class="dropdown-item d-flex" href="#" data-id="'.$booking->id.'"
        //          data-title="'.$booking->title.'" data-route="'.$routes['destroy'].'"
        //          data-toggle="modal" data-target="#destroy-entity-modal">
        //          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
        //              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        //              class="feather feather-trash">
        //              <polyline points="3 6 5 6 21 6"></polyline>
        //              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
        //          </svg>
        //          <span class="ml-2">Delete</span>
        //      </a>';
        // }

        return $actions;
    }
}
