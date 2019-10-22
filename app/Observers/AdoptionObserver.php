<?php

namespace App\Observers;

use App\Adoption;
use App\Orphan;


class AdoptionObserver
{
    /**
     * @param Adoption $adoption
     * @throws \Exception
     */
    public function created(Adoption $adoption)
    {
        Orphan::findOrFail($adoption->orphan_id)->delete();
    }

    public function deleted(Adoption $adoption)
    {

        Orphan::withTrashed()->findOrFail($adoption->orphan_id)->restore();
    }
}
