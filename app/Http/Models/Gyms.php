<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gyms extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'gid';
    protected $table = "gyms";
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function scopeActive($query)
    {
        return $query->whereNull("deleted_at");
    }
}
