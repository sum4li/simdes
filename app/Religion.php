<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Religion extends Model
{
    use Uuids;
    use SoftDeletes;

    protected $table="religions";
    protected $dates="deletes_at";
    protected $fillable=['name','slug'];
    public $incrementing=false;

}
