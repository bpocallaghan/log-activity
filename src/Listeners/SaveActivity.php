<?php

namespace Bpocallaghan\LogActivity\Listeners;

use Illuminate\Support\Facades\Auth;
use Bpocallaghan\LogActivity\Models\LogActivity;
use Bpocallaghan\LogActivity\Events\LogActivity as LogActivityEvent;

class SaveActivity
{
    /**
     * Handle the event.
     *
     * @param LogActivityEvent $event
     */
    public function handle(LogActivityEvent $event)
    {
        $name = $event->name;
        if (strlen($name) < 2) {
            $name = str_replace(['App\\', 'Models\\'], '', get_class($event->eloquent));
        }

        $subject = null;
        if ($event->eloquent !== null) {
            $subject = get_class($event->eloquent);
        }
        $subjectId = $event->eloquent ? $event->eloquent->id : null;

        // log adjustment
        LogActivity::create([
            'name'         => $name,
            'description'  => $event->description,
            'subject_id'   => $subjectId,
            'subject_type' => $subject,
            'user_id'      => (Auth::guard()->user()? Auth::guard()->user()->id : 0),
        ]);
    }
}
