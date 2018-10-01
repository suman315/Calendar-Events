<?php

namespace App\Http\Controllers\Event;

trait FormatEventData
{

    /**
     * formats the date for the calender JSON
     *
     * @return collcetion
     */
    public function getformatedEventForCalender()
    {
        return $this->events->map(function ($event) {
            return [
                'id'    => $event->id,
                'title' => $event->title,
                'start' => $event->event_date,
            ];

        });
    }

}
