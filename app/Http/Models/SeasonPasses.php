<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2017. 09. 23.
 * Time: 23:34
 */

namespace App\Http\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeasonPasses extends Model
{

    use SoftDeletes;

    protected $primaryKey = 'rid';
    protected $table = "season_tickets";
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeValid($query)
    {
        $today = Carbon::today();
        $query->where('valid_from','<',$today)
        ->where('valid_to','>',$today);
    }
}