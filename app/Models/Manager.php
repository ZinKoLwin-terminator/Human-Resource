<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    protected $table = "manager";

    static public function getRecord($request)
    {
        $return = self::select('manager.*')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $return;
    }
}
