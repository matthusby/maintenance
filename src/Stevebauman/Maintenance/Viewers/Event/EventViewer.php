<?php

namespace Stevebauman\Maintenance\Viewers\Event;

use Stevebauman\CalendarHelper\Objects\Event;
use Stevebauman\Maintenance\Viewers\BaseViewer;

class EventViewer extends BaseViewer
{
    /**
     * Returns the API events profile view.
     *
     * @param Event $apiObject
     *
     * @return \Illuminate\View\View
     */
    public function profile(Event $apiObject)
    {
        return view('maintenance::viewers.event.profile', [
            'event' => $this->entity,
            'apiObject' => $apiObject,
        ]);
    }

    /**
     * Returns the API events recurrences
     * view with the specified recurrences.
     *
     * @return \Illuminate\View\View
     */
    public function recurrences()
    {
        return view('maintenance::viewers.event.recurrences', [
            'event' => $this->entity,
        ]);
    }

    /**
     * Returns the API events attendees view.
     *
     * @return \Illuminate\View\View
     */
    public function attendees()
    {
        return view('maintenance::viewers.event.attendees', [
            'event' => $this->entity,
        ]);
    }

    /**
     * Returns the API events recurrence warning view.
     *
     * @return \Illuminate\View\View
     */
    public function recurrenceWarning()
    {
        return view('maintenance::viewers.event.recurrence-warning', [
            'event' => $this->entity,
        ]);
    }

    /**
     * Presents the correct date timestamp depending if the event is all day.
     *
     * @param Event $apiObject
     *
     * @return string
     */
    public function startFormatted(Event $apiObject)
    {
        $start = new \DateTime();

        $start->setTimestamp(strtotime($apiObject->start));

        if ($apiObject->all_day) {
            return $start->format('M dS Y');
        } else {
            return $start->format('M dS Y - h:ia');
        }
    }

    /**
     * Presents the correct start date formatted for editing.
     *
     * @param Event $apiObject
     *
     * @return string
     */
    public function startDateFormatted(Event $apiObject)
    {
        $start = new \DateTime();

        $start->setTimestamp(strtotime($apiObject->start));

        return $start->format('m/d/Y');
    }

    /**
     * Presents the correct start time formatted for editing.
     *
     * @param Event $apiObject
     *
     * @return string|null
     */
    public function startTimeFormatted(Event $apiObject)
    {
        if (!$apiObject->all_day) {
            $start = new \DateTime();

            $start->setTimestamp(strtotime($apiObject->start));

            return $start->format('H:i A');
        }

        return null;
    }

    /**
     * Presents the correct date timestamp depending if the event is all day.
     *
     * @param Event $apiObject
     *
     * @return string
     */
    public function endFormatted(Event $apiObject)
    {
        $end = new \DateTime();

        $end->setTimestamp(strtotime($apiObject->end));

        if ($apiObject->all_day) {
            return $end->format('M dS Y');
        }

        return $end->format('M dS Y - h:ia');
    }

    /**
     * Presents the correct end date formatted for editing.
     *
     * @param Event $apiObject
     *
     * @return string
     */
    public function endDateFormatted(Event $apiObject)
    {
        $end = new \DateTime();

        $end->setTimestamp(strtotime($apiObject->start));

        return $end->format('m/d/Y');
    }

    /**
     * Presents the correct end time formatted for editing.
     *
     * @param Event $apiObject
     *
     * @return string|null
     */
    public function endTimeFormatted(Event $apiObject)
    {
        if (!$apiObject->all_day) {
            $end = new \DateTime();

            $end->setTimestamp(strtotime($apiObject->start));

            return $end->format('H:i A');
        }

        return null;
    }

    /**
     * Presents the API events recurrence frequency in a nicer format.
     *
     * @param Event $apiObject
     *
     * @return string
     */
    public function recurFrequencyFormatted(Event $apiObject)
    {
        if ($this->recurFrequency($apiObject)) {
            return ucfirst(strtolower($this->recurFrequency($apiObject)));
        }

        return 'None';
    }

    /**
     * Returns the API events actual recurrence frequency array.
     *
     * @param Event $apiObject
     *
     * @return array|null
     */
    public function recurFrequency(Event $apiObject)
    {
        if ($apiObject->rruleArray && array_key_exists('FREQ', $apiObject->rruleArray)) {
            $freq = $apiObject->rruleArray['FREQ'];

            return $freq;
        }

        return null;
    }

    /**
     * Returns the API events actual recurring days array.
     *
     * @return array|null
     */
    public function recurDays(Event $apiObject)
    {
        if ($apiObject->rruleArray && array_key_exists('BYDAY', $apiObject->rruleArray)) {
            $freq = $apiObject->rruleArray['BYDAY'];

            return $freq;
        }

        return null;
    }

    /**
     * Returns the events tags view.
     *
     * @return \Illuminate\View\View
     */
    public function tags()
    {
        /*
         * Make sure we pass in the parent event if this event is a recurrence
         * so we can use it's tags
         */
        if ($this->entity->parentEvent) {
            $event = $this->entity->parentEvent;
        } else {
            $event = $this->entity;
        }

        return view('maintenance::viewers.event.tags', [
            'event' => $event,
        ]);
    }

    /**
     * Returns the events report view.
     *
     * @return \Illuminate\View\View
     */
    public function report()
    {
        return view('maintenance::viewers.event.report', [
            'event' => $this->entity,
        ]);
    }

    /**
     * Returns the events report created label view.
     *
     * @return \Illuminate\View\View
     */
    public function lblReportCreated()
    {
        return view('maintenance::viewers.event.labels.report-created', [
            'event' => $this->entity,
        ]);
    }

    /**
     * Returns the API events recurring label view.
     *
     * @return \Illuminate\View\View
     */
    public function lblRecurring()
    {
        return view('maintenance::viewers.event.labels.recurring', ['event' => $this->entity]);
    }

    /**
     * Returns the API events all day label view.
     *
     * @return \Illuminate\View\View
     */
    public function lblAllDay()
    {
        return view('maintenance::viewers.event.labels.all-day', ['event' => $this->entity]);
    }

    /**
     * Returns events actions button view
     * for the specified eventable model.
     *
     * @param Model $eventable
     *
     * @return \Illuminate\View\View
     */
    public function btnEventableActions(Model $eventable)
    {
        return view('maintenance::viewers.event.buttons.eventable-actions', [
            'event' => $this->entity,
            'eventable' => $eventable,
        ]);
    }

    /**
     * Returns events edit button view
     * for the specified eventable model.
     *
     * @param Model $eventable
     *
     * @return \Illuminate\View\View
     */
    public function btnEventableEdit(Model $eventable)
    {
        return view('maintenance::viewers.event.buttons.eventable-edit', [
            'event' => $this->entity,
            'eventable' => $eventable,
        ]);
    }

    /**
     * Returns events actions delete button view
     * for the specified eventable model.
     *
     * @param Model $eventable
     *
     * @return \Illuminate\View\View
     */
    public function btnEventableDelete(Model $eventable)
    {
        return view('maintenance::viewers.event.buttons.eventable-delete', [
            'event' => $this->entity,
            'eventable' => $eventable,
        ]);
    }

    /**
     * Returns the events edit button view.
     *
     * @param string $url
     *
     * @return \Illuminate\View\View
     */
    public function btnEdit($url)
    {
        return view('maintenance::viewers.event.buttons.edit', [
            'event' => $this->entity,
            'url' => $url,
        ]);
    }

    /**
     * Returns the events delete button view.
     *
     * @param string $url
     *
     * @return \Illuminate\View\View
     */
    public function btnDelete($url)
    {
        return view('maintenance::viewers.event.buttons.delete', [
            'event' => $this->entity,
            'url' => $url,
        ]);
    }

    /**
     * Returns the events action buttons view.
     *
     * @return \Illuminate\View\View
     */
    public function btnActions()
    {
        return view('maintenance::viewers.event.buttons.actions', ['event' => $this->entity]);
    }
}
