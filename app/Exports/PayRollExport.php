<?php

namespace App\Exports;

use App\Models\PayRoll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Request;


class PayRollExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{

    public function collection()
    {
        $request = Request::all();
        return PayRoll::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y H:s:i', strtotime($user->created_at));
        $updatedAtFormat = date('d-m-Y H:s:i', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->name,
            $user->number_of_day_work,
            $user->bonus,
            $user->overtime,
            $user->gross_salary,
            $user->cash_advance,
            $user->late_hours,
            $user->absent_days,
            $user->sss_contribution,
            $user->philhealth,
            $user->total_deductions,
            $user->netpay,
            $user->payroll_monthly,
            $createdAtFormat,
            $updatedAtFormat

        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Employee Name',
            'Number Of Day Work',
            'Bonus',
            'Overtime',
            'Gross Salary',
            'Cash Advance',
            'Late Hours',
            'Absent Days',
            'SSS Contribution',
            'Philhealth',
            'Total Deductions',
            'NetPay',
            'PayRoll Monthly',
            'Created At',
            'Updated At'

        ];
    }
}
