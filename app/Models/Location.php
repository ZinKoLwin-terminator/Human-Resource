<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Location extends Model
{
    use HasFactory;
    protected $table = "locations";

    static public function getRecord($request)
    {
        $return = self::select('locations.*')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $return;
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "countries_id");
    }
}
