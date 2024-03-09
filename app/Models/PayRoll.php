<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayRoll extends Model
{
    use HasFactory;
    protected $table = "payroll";

    static public function getRecord($request)
    {
        $return = self::select("payroll.*")
            ->orderBy("id", "desc")
            ->paginate(10);

        return $return;
    }

    public function get_employee_name_single()
    {
        return $this->belongsTo(User::class, "employee_id");
    }
}
