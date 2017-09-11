<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservations extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'rid';
    protected $table = "Reservations";
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function scopeActive($query) 
    {
        return $query->whereNull('deleted_at');
    }
}
