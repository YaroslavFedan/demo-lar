<?php

namespace App\DataTables;

use App\Employee;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('photo', function ($data) {
                if($data->photo){
                    $url=asset($data->photo);
                    return '<img src='.$url.' border="0" width="45" class="img-circle" align="center" />';
                }else{
                    return '<div class="img-circle bg-grey" style="width: 45px; height: 45px;"></div>';
                }
            })
            ->addColumn('position', function ($data) {
                return $data->position->name;
            })
//            ->addColumn('employed_at', function ($data) {
//                return  Carbon::parse($data->employed_at)->format('d.m.y');
//            })
            ->addColumn('salary', function ($data) {
                return  '$' . number_format($data->salary, 3, ",",',');
            })
            ->addColumn('action', function($data){
                return $this->getActionColumn($data);
            })
            ->rawColumns(['photo', 'action']);
    }


    /**
     * Get query source of dataTable. return money_format('$%i', $value);
     *
     * @param Employee $model
     * @return \Illuminate\Database\Query\Builder
     */
    public function query(Employee $model)
    {
        return $model->with('position')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('employees-table')
                    ->pageLength(25)
                    ->lengthMenu([10, 25, 50, 100, 150, 200])
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("
                        <'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>
                        <'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>
                    ");

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id', 'id')
                ->title('#')
                ->visible(false),
            Column::make('photo','photo')
                ->title('Photo')
                ->searchable(false)
                ->orderable(false),
            Column::make('full_name','full_name')
                ->title('Name'),
            Column::make('position', 'position.name')
                ->title('Position'),
            Column::make('employed_at', 'employed_at')
                ->title('Date of employment'),
            Column::make('phone', 'phone')
                ->title('Phone number')
                ->className('text-nowrap'),
            Column::make('email', 'email')
                ->title('Email'),
            Column::make('salary', 'salary')
                ->title('Salary'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center text-nowrap'),
        ];
    }


    protected function getActionColumn($data)
    {
        $editUrl = route('admin.employee.edit', $data->id);
        $deleteUrl = route('admin.employee.destroy', $data->id);

        return "<a class='waves-effect mx-3' 
                    data-toggle='tooltip' 
                    title='Edit' 
                    data-value='{$data->id}' 
                    href='{$editUrl}'
                    >
                    <i class='fas fa-pencil-alt fs-m'></i>
                </a>
                <a class='waves-effect text-danger delete mx-3' 
                    data-toggle='tooltip' 
                    title='Delete' 
                    href='#' 
                    data-url='{$deleteUrl}'
                    >
                    <i class='fas fa-trash-alt fs-m'></i>
                </a>";
    }
}
