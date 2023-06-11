<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectObserver
{
    public function updated(Project $project)
    {
        if ($project->isDirty('bg')) {
            Storage::disk('public')->delete($project->getOriginal('bg'));
        }
        if ($project->isDirty('photo')) {
            Storage::disk('public')->delete($project->getOriginal('photo'));
        }
        if ($project->isDirty('profile')) {
            Storage::disk('public')->delete($project->getOriginal('profile'));
        }
        if ($project->isDirty('qr')) {
            Storage::disk('public')->delete($project->getOriginal('qr'));
        }
    }

    public function deleted(Project $project)
    {
        if ($project->isDirty('bg')) {
            Storage::disk('public')->delete($project->getOriginal('bg'));
        }
        if ($project->isDirty('photo')) {
            Storage::disk('public')->delete($project->getOriginal('photo'));
        }
        if ($project->isDirty('profile')) {
            Storage::disk('public')->delete($project->getOriginal('profile'));
        }
        if ($project->isDirty('qr')) {
            Storage::disk('public')->delete($project->getOriginal('bg'));
        }
    }
}
