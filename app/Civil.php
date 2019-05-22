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
    protected $dates = 'deleted_at';
    protected $fillable = ['religion_id','harmlet_id','nkk','nik','name','birth_date','sex','marital_status','address','rt','rw','death_status'];
    public $incrementing = false;

    public function religion()
    {
        return $this->belongsTo('App\Religion');
    }

    public function harmlet()
    {
        return $this->belongsTo('App\Harmlet');
    }
}
