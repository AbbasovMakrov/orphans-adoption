<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
AdditionalHelpers\ControllerHelpers::Action("طيز_مختار","كسة_الاحمر");


/**
 * App\Adoption
 *
 * @property-read \App\Orphan $orphan
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $orphan_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption whereOrphanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption whereUserId($value)
 */
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
