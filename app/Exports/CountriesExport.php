<?php

namespace App\Exports;

use App\Models\Country;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Request;


class CountriesExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{

    public function collection()
    {
        $request = Request::all();
        return Country::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($user->created_at));
        $updatedAtFormat = date('d-m-Y', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->country_name,
            $user->region_name,
            $createdAtFormat,
            $updatedAtFormat,

        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Country Name',
            'Region Name',
            'Created At',
            'Updated At'

        ];
    }
}
