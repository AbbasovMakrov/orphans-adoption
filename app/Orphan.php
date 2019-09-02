<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Orphan
 *
 * @property-read \App\Adoption $adoption
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Orphan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Orphan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Orphan withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $location
 * @property string|null $other_details
 * @property string|null $image
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereOtherDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Orphan whereUserId($value)
 */
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
