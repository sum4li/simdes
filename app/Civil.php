<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Civil extends Model
{
    use Uuids;
    use SoftDeletes;

    protected $table = 'civils';
    protected $dates = ['deleted_at'];
    protected $fillable = ['religion_id','hamlet_id','nkk','nik','name','birth_place','birth_date','sex','marital_status','address','rt','rw','death_status'];
    public $incrementing = false;

    public function religion()
    {
        return $this->belongsTo('App\Religion');
    }

    public function hamlet()
    {
        return $this->belongsTo('App\Hamlet');
    }
}
