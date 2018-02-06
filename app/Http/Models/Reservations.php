<?php

namespace App\Http\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservations extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'rid';
    protected $table = "reservations";
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function scopeActive($query) 
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeValid($query)
    {
        $today = Carbon::today();
        return $query->where("rdate", ">=", $today);
    }
}
