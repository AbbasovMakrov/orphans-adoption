<?php

// @formatter:on
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
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
 */
	class Orphan extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \App\Adoption $adoption
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Orphan[] $orphan
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Adoption
 *
 * @property-read \App\Orphan $orphan
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Adoption query()
 */
	class Adoption extends \Eloquent {}
}

