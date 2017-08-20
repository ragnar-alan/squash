<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2017. 08. 20.
 * Time: 1:32
 */

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
}
