<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = 'id';
    protected $table = "users";

    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }
}
