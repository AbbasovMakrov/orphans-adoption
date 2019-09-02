<?php

namespace App\Observers;

use App\Adoption;
use App\Orphan;


class AdoptionObserver
{
    public function created(Adoption $adoption)
    {
        try {
            Orphan::findOrFail($adoption->orphan_id)->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleted(Adoption $adoption)
    {
        Orphan::withTrashed()->findOrFail($adoption->orphan_id)->restore();
    }
}
