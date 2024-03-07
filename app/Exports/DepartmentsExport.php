<?php

namespace App\Exports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Request;


class DepartmentsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{

    public function collection()
    {
        $request = Request::all();
        return Department::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        if ($user->manager_id == 1) {
            $manager_id = "Mg Mg";
        } else {
            $manager_id = "Zaw Zaw";
        }

        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        $updatedAtFormat = date('d-m-Y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->department_name,
            $manager_id,
            $user->street_address,
            $createdAtFormat,
            $updatedAtFormat

        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Department Name',
            'Manager Name',
            'Location Name',
            'Created At',
            'Updated At'

        ];
    }
}
