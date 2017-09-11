<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $primaryKey = 'pid';
    protected $table = "participants";
    public $timestamps = false;
}
