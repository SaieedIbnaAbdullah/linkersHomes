<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrationExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $model = (new Registration)->newQuery();
        if (request()->has('filter')) {
            $model->newQuery()->where('approved', request()->get('filter'));
        }
        if (auth()->user()->type == 3 || auth()->user()->type == 4) {
            $model->where('created_by', auth()->user()->id);
        }
        if (request()->has('group_select') && request()->get('group_select') != '') {
            $select_data = '%"group":"'.request()->get('group_select').'"%';
            $model->where('data','like',$select_data);
        }
        if (request()->has('round')) {
            $model->newQuery()->where('round', request()->get('round'));
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
        $model->orderBy('code', 'asc');
        $list = $model->get();
        $registration_array = [];
        foreach ($list as $item) {
            $data = json_decode($item->data);
            $type = 0;
            $created_by = 'N/A';
            if ($item->type == 0) {
                $type = 'Online';
            } else if ($item->type == 1) {
                $type = 'Field';
                $created_by = $item->field_admin ?: 'N/A';
            } else if ($item->type == 2) {
                $type = 'Data Entry';
                $created_by = $item->field_admin ?: 'N/A';
            }
            $registration = [
                'registration_code' => $item->reg_code ?: 'N/A',
                'name' => $data->name,
                'school_college' => $data->school_college ?: 'N/A',
                'group' => $data->group ?: 'N/A',
                'player_mobile' => $data->player_mobile ?: 'N/A',
                'guardian_mobile' => $data->guardian_mobile ?: 'N/A',
                'division' => $data->geo_division_id ?: 'N/A',
                'district' => $data->geo_district_id ?: 'N/A',
                'upazila' => $data->geo_upazila_id ?: 'N/A',
                'payment' => $item->payment ? 'Paid' : 'Due',
                'approved' => $item->approved ? 'Yes' : 'No',
                'type' => $type ?: 'N/A',
                'registration_date' => $item->created_at ? $item->created_at->format('d/m/Y') : 'N/A',
                'created_by' => $created_by
            ];
            array_push($registration_array, $registration);
        }
        return collect($registration_array);
    }

    public function headings(): array
    {
        return [
            'Registration Code',
            'Name',
            'School',
            'Group',
            'Player Mobile',
            'Guardian Mobile',
            'Division',
            'District',
            'Upazila',
            'Payment',
            'Approved',
            'Type',
            'Registration Date',
            'Field Admin Id',
        ];
    }
}
