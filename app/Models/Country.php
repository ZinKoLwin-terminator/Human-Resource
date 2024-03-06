<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';

    static public function getRecord($request)
    {
        $return = self::select('countries.*')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $return;
    }
    public function region()
    {
        return $this->belongsTo(Region::class, "regions_id");
    }
}
