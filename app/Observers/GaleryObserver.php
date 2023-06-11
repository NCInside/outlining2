<?php

namespace App\Observers;

use App\Models\Galery;
use Illuminate\Support\Facades\Storage;

class GaleryObserver
{
    public function updated(Galery $galery): void
    {
        if ($galery->isDirty('image')) {
            Storage::disk('public')->delete($galery->getOriginal('image'));
        }
    }
 
    public function deleted(Galery $galery): void
    {
        if (! is_null($galery->image)) {
            Storage::disk('public')->delete($galery->image);
        }
    }
}
