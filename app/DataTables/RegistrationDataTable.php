<?php

namespace App\DataTables;

use App\Models\GeoDistrict;
use App\Models\GeoDivision;
use App\Models\GeoUnion;
use App\Models\GeoUpazila;
use App\User;
use Yajra\DataTables\Services\DataTable;

// models
use App\Models\Registration;

class RegistrationDataTable extends DataTable
{
    public function __construct()
    {
        //
    }

    // Build datatable.
    public function dataTable($query)
    {
        $datatable = datatables($query)
            ->addColumn('action', function($data) {
                return view('admin.registration._action', compact('data'))->render();
            })
            ->editColumn('approved',  function($data) {
                return $data->approved == 1 ? 'Yes' : 'No';
            })
            ->editColumn('payment',  function($data) {
                return $data->payment == 1 ? 'Paid' : 'Due';
            })
            ->editColumn('reg_code',  function($data) {
                if ($data->type == 2) {
                    if (empty($data->reg_code)) {
                        return !empty($data->code) ? $data->code : 'N/A';
                    } else {
                        return !empty($data->reg_code) ? $data->reg_code : 'N/A';
                    }
                } else {
                    return !empty($data->reg_code) ? $data->reg_code : 'N/A';
                }
            })
            ->editColumn('type',  function($data) {
                if ($data->type == 0) {
                    return 'Online';
                } else if ($data->type == 1) {
                    return 'Offline';
                } else {
                    return 'Data Entry';
                }
            })
            ->editColumn('field_admin',  function($data) {
                if ($data->field_admin != '') {
                    return $data->field_admin;
                } else {
                    return 'N/A';
                }
            });
            if (auth()->check()) {
                if(auth()->user()->type == 0 && auth()->user()->type == 2) {
                    $datatable->editColumn('amount',  function($data) {
                        return $data->amount ? $data->amount : 0;
                    });
                }
            }
        return $datatable;
    }

    // Query source of datatable.
    public function query(Registration $model)
    {
        $model = $model->newQuery();
        if (request()->has('filter')) {
            $model->newQuery()->where('approved', request()->get('filter'));
        }
        if (auth()->user()->type == 3 || auth()->user()->type == 4) {
            $model->where('created_by', auth()->user()->id);
        }
        if (request()->has('round')) {
            $model->newQuery()->where('round', request()->get('round'));
        }
        if(auth()->user()->type == 5){
            if(auth()->user()->geo_division_id && (auth()->user()->geo_district_id==null && auth()->user()->geo_district_id==null )){
                $model->where('geo_division_id',auth()->user()->geo_division_id);
            }
            if(auth()->user()->geo_district_id && (auth()->user()->geo_upazila_id==null && auth()->user()->geo_upazila_id==null )){
                $model->where('geo_district_id',auth()->user()->geo_district_id);
            }
            if(auth()->user()->geo_upazila_id && (auth()->user()->geo_union_id==null && auth()->user()->geo_union_id==null )){
                $model->where('geo_upazila_id',auth()->user()->geo_upazila_id);
            }
            if(auth()->user()->geo_union_id){
                $model->where('geo_union_id',auth()->user()->geo_union_id);
            }

            if(auth()->user()->group_select){
                $select_data = '%"group":"'.auth()->user()->group_select.'"%';
                $model->where('data','like',$select_data);
            }

        }
        
        
        if (request()->has('group_select') && request()->get('group_select') != '') {
            $select_data = '%"group":"'.request()->get('group_select').'"%';
            $model->where('data','like',$select_data);
        }
        if (request()->has('geo_division_id') && request()->get('geo_division_id') != '') {
            $model->where('geo_division_id', request()->get('geo_division_id'));
        }
        if (request()->has('geo_district_id') && request()->get('geo_district_id') != '') {
            $model->where('geo_district_id', request()->get('geo_district_id'));
        }
        if (request()->has('geo_upazila_id') && request()->get('geo_upazila_id') != '') {
            $model->where('geo_upazila_id', request()->get('geo_upazila_id'));
        }
        if (request()->has('geo_union_id') && request()->get('geo_union_id') != '') {
            $model->where('geo_union_id', request()->get('geo_union_id'));
        }
        if (request()->has('field_admin_id') && request()->get('field_admin_id') != '') {
            $model->where('field_admin', request()->get('field_admin_id'));
        }
        if (request()->has('created_by') && request()->get('created_by') != '') {
            $model->where('created_by', request()->get('created_by'));
        }
        if (request()->has('reg_type') && request()->get('reg_type') != '') {
            $model->where('type', request()->get('reg_type'));
        }
        $model->orderBy('created_at', 'desc');
        return $model->select('id', 'name', 'reg_code', 'code', 'payment', 'amount', 'approved', 'type','round', 'field_admin');
    }

    // Html builder.
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->parameters($this->getBuilderParameters());
    }

    // Get columns
    protected function getColumns()
    {
        if (auth()->check()) {
            if(auth()->user()->type == 0 && auth()->user()->type == 2) {
                return [
                    'name',
                    'reg_code',
                    'type',
                    'field_admin',
                    'payment',
                    'amount',
                    'approved',
                ];
            }
        }
        if (auth()->check()) {
            if(auth()->user()->type == 5) {
                return [
                    'name',
                    'reg_code',
                ];
            }
        }
        return [
            'name',
            'reg_code',
            'type',
            'field_admin',
            'payment',
            'approved',
        ];
    }

    // Get filename for export.
    protected function filename()
    {
        return 'Registration_' . date('YmdHis');
    }
}
