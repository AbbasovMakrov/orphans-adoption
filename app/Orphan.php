<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orphan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "name",
        "age",
        "other_details",
        "image",
        "user_id",
        "location"
    ];
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function adoption()
    {
       return $this->hasOne(Adoption::class,"orphan_id","id");
    }
    //protected $dates = ['deleted_at'];
}
