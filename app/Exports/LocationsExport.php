<?php

namespace App\Exports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Request;


class LocationsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{

    public function collection()
    {
        $request = Request::all();
        return Location::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($user->created_at));
        $updatedAtFormat = date('d-m-Y', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->street_address,
            $user->postal_code,
            $user->city,
            $user->state_provice,
            $user->country_name,
            $createdAtFormat,
            $updatedAtFormat

        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Street Address',
            'Postal Code',
            'City',
            'State Provice',
            'Country Name',
            'Created At',
            'Updated At'

        ];
    }
}
