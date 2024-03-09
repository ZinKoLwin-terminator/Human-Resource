<?php

namespace App\Exports;

use App\Models\Position;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Request;

class PositionExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{

    public function collection()
    {
        $request = Request::all();
        return Position::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y H:s:i', strtotime($user->created_at));
        $updatedAtFormat = date('d-m-Y H:s:i', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->position_name,
            $user->daily_rate,
            $user->monthly_rate,
            $user->working_days_per_month,
            $createdAtFormat,
            $updatedAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            '$.No',
            'Table Id',
            'Position Name',
            'Daily Rate',
            'Monthly Rate',
            'Working Days Per Month',
            'Created At',
            'Updated At'
        ];
    }
}
