<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mortality extends Model
{
    use Uuids;
    use SoftDeletes;

    protected $table = 'mortalities';
    protected $dates = ['deleted_at'];
    protected $fillable = ['civil_id','date','description'];
    public $incrementing = false;

    public function civil()
    {
        return $this->belongsTo('App\Civil');
    }
}
