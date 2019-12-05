<?php

namespace Bpocallaghan\LogActivity\Models\Traits;

use ReflectionClass;
use Bpocallaghan\LogActivity\Models\LogModelActivity;

trait LogModelActivities
{
    protected $before = null;

    protected $after = null;

    /**
     * Register the necessary event listeners.
     *
     * @return void
     */
    protected static function bootLogModelActivities()
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->logActivity($event);
            });
        }

        // when updating - update the before and after
        static::updating(function ($model) {
            $model->updateDiff();
        });
    }

    /**
     * Record activity for the model.
     *
     * @param string $event
     * @return void
     * @throws \ReflectionException
     */
    public function logActivity($event)
    {
        if (user()->id <= 0) {
            return;
        }

        LogModelActivity::create([
            'subject_id'   => $this->id,
            'subject_type' => get_class($this),
            'name'         => $this->getActivityName($this, $event),
            'before'       => $this->before,
            'after'        => $this->after,
            'user_id'      => user()->id,
        ]);
    }

    /**
     * Prepare the appropriate activity name.
     *
     * @param mixed  $model
     * @param string $action
     * @return string
     * @throws \ReflectionException
     */
    protected function getActivityName($model, $action)
    {
        $name = strtolower((new ReflectionClass($model))->getShortName());

        return "{$action}_{$name}";
    }

    /**
     * Get the model events to record activity for.
     *
     * @return array
     */
    protected static function getModelEvents()
    {
        return static::$recordEvents ?? [
                'created',
                'deleted',
                'updated'
            ];
    }

    /**
     * Fetch a diff for the model's current state.
     */
    protected function updateDiff()
    {
        $changed = $this->getDirty();
        $this->before = json_encode(array_intersect_key($this->fresh()->toArray(), $changed));
        $this->after = json_encode($changed);
    }
}