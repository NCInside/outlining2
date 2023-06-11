<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryObserver
{
    public function updated(Category $category): void
    {
        if ($category->isDirty('logo')) {
            Storage::disk('public')->delete($category->getOriginal('logo'));
        }
        if ($category->isDirty('bg')) {
            Storage::disk('public')->delete($category->getOriginal('bg'));
        }
    }
 
    public function deleted(Category $category): void
    {
        if (! is_null($category->logo)) {
            Storage::disk('public')->delete($category->logo);
        }
        if (! is_null($category->bg)) {
            Storage::disk('public')->delete($category->bg);
        }
    }
}
