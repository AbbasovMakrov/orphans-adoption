<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Adoption extends Model
{
    protected $fillable = [
        "orphan_id",
        "user_id"
    ];
    public function orphan()
    {
        return $this->belongsTo(Orphan::class,"orphan_id","id")->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

}
