<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'position';

    static public function getRecord($request)
    {

        $return = self::select('position.*')
            ->orderBy("position.id", 'desc')
            ->paginate(20);

        return $return;
    }
}
