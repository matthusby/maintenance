<?php

namespace Stevebauman\Maintenance\Viewers\WorkOrder;

use Illuminate\Database\Eloquent\Collection;
use Stevebauman\Maintenance\Viewers\BaseViewer;

class WorkOrderViewer extends BaseViewer
{
    /**
     * The work order profile view.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        return view('maintenance::viewers.work-order.profile', ['workOrder' => $this->entity]);
    }

    /**
     * The work order work request view.
     *
     * @return \Illuminate\View\View
     */
    public function workRequest()
    {
        return view('maintenance::viewers.work-order.work-request', ['workOrder' => $this->entity]);
    }

    /**
     * The work order calendar view.
     *
     * @return \Illuminate\View\View
     */
    public function calendar()
    {
        return view('maintenance::viewers.work-order.calendar', ['workOrder' => $this->entity]);
    }

    /**
     * The work order report view.
     *
     * @return \Illuminate\View\View
     */
    public function report()
    {
        return view('maintenance::viewers.work-order.report', ['workOrder' => $this->entity]);
    }

    /**
     * The work order sessions view.
     *
     * @return \Illuminate\View\View
     */
    public function sessions(Collection $sessions)
    {
        return view('maintenance::viewers.work-order.sessions', [
                'workOrder' => $this->entity,
                'sessions' => $sessions,
            ]
        );
    }

    /**
     * The work order attachments view.
     *
     * @return \Illuminate\View\View
     */
    public function attachments()
    {
        return view('maintenance::viewers.work-order.attachments', ['workOrder' => $this->entity]);
    }

    /**
     * The work order parts view.
     *
     * @return \Illuminate\View\View
     */
    public function parts()
    {
        return view('maintenance::viewers.work-order.parts', ['workOrder' => $this->entity]);
    }

    /**
     * The work order updates view.
     *
     * @return \Illuminate\View\View
     */
    public function updates()
    {
        return view('maintenance::viewers.work-order.updates', ['workOrder' => $this->entity]);
    }

    /**
     * The work order started at formatted string.
     *
     * @return null|string
     */
    public function startedAtFormatted()
    {
        if ($this->entity->started_at) {
            $date = new \DateTime();

            $date->setTimestamp(strtotime($this->entity->started_at));

            return $date->format('M dS Y - h:ia');
        }

        return null;
    }

    /**
     * The work order completed at formatted string.
     *
     * @return null|string
     */
    public function completedAtFormatted()
    {
        if ($this->entity->completed_at) {
            $date = new \DateTime();

            $date->setTimestamp(strtotime($this->entity->completed_at));

            return $date->format('M dS Y - h:ia');
        }

        return null;
    }

    /**
     * The work order edit button.
     *
     * @return \Illuminate\View\View
     */
    public function btnEdit()
    {
        return view('maintenance::viewers.work-order.buttons.edit', ['workOrder' => $this->entity]);
    }

    /**
     * The work order delete button.
     *
     * @return \Illuminate\View\View
     */
    public function btnDelete()
    {
        return view('maintenance::viewers.work-order.buttons.delete', ['workOrder' => $this->entity]);
    }

    /**
     * The work order delete button for the archive.
     *
     * @return \Illuminate\View\View
     */
    public function btnDeleteArchive()
    {
        return view('maintenance::viewers.work-order.buttons.delete-archive', ['workOrder' => $this->entity]);
    }

    /**
     * The work order events button.
     *
     * @return \Illuminate\View\View
     */
    public function btnEvents()
    {
        return view('maintenance::viewers.work-order.buttons.events', ['workOrder' => $this->entity]);
    }

    /**
     * The work order check in button.
     *
     * @return \Illuminate\View\View
     */
    public function btnCheckIn()
    {
        return view('maintenance::viewers.work-order.buttons.check-in', ['workOrder' => $this->entity]);
    }

    /**
     * The work order workers button.
     *
     * @return \Illuminate\View\View
     */
    public function btnWorkers()
    {
        return view('maintenance::viewers.work-order.buttons.workers', ['workOrder' => $this->entity]);
    }

    /**
     * The work order notifications button.
     *
     * @return \Illuminate\View\View
     */
    public function btnNotifications()
    {
        return view('maintenance::viewers.work-order.buttons.notifications', ['workOrder' => $this->entity]);
    }

    /**
     * The work order complete button.
     *
     * @return \Illuminate\View\View
     */
    public function btnComplete()
    {
        return view('maintenance::viewers.work-order.buttons.complete', ['workOrder' => $this->entity]);
    }

    /**
     * The work order parts button.
     *
     * @return \Illuminate\View\View
     */
    public function btnParts()
    {
        return view('maintenance::viewers.work-order.buttons.parts', ['workOrder' => $this->entity]);
    }

    /**
     * The work order add parts button.
     *
     * @return \Illuminate\View\View
     */
    public function btnAddParts()
    {
        return view('maintenance::viewers.work-order.buttons.add-parts', ['workOrder' => $this->entity]);
    }

    /**
     * The work order add attachments button.
     *
     * @return \Illuminate\View\View
     */
    public function btnAddAttachments()
    {
        return view('maintenance::viewers.work-order.buttons.add-attachments', ['workOrder' => $this->entity]);
    }

    /**
     * The work order event tag button.
     *
     * @return \Illuminate\View\View
     */
    public function btnEventTag()
    {
        return view('maintenance::viewers.work-order.buttons.event-tag', [
            'workOrder' => $this->entity,
        ]);
    }

    /**
     * The work order restore button.
     *
     * @return \Illuminate\View\View
     */
    public function btnRestore()
    {
        return view('maintenance::viewers.work-order.buttons.restore', ['workOrder' => $this->entity]);
    }

    /**
     * The work order actions button.
     *
     * @return \Illuminate\View\View
     */
    public function btnActions()
    {
        return view('maintenance::viewers.work-order.buttons.actions', ['workOrder' => $this->entity]);
    }

    /**
     * The work order archive actions button.
     *
     * @return \Illuminate\View\View
     */
    public function btnActionsArchive()
    {
        return view('maintenance::viewers.work-order.buttons.actions-archive', ['workOrder' => $this->entity]);
    }

    /**
     * The work order started at label.
     *
     * @return \Illuminate\View\View
     */
    public function lblStartedAt()
    {
        return view('maintenance::viewers.work-order.labels.started-at', ['workOrder' => $this->entity]);
    }

    /**
     * The work order completed at label.
     *
     * @return \Illuminate\View\View
     */
    public function lblCompletedAt()
    {
        return view('maintenance::viewers.work-order.labels.completed-at', ['workOrder' => $this->entity]);
    }

    /**
     * The work order completed check mark at label.
     *
     * @return \Illuminate\View\View
     */
    public function lblCheckCompleted()
    {
        return view('maintenance::viewers.work-order.labels.check-completed', ['workOrder' => $this->entity]);
    }

    /**
     * The work order priority label.
     *
     * @return \Illuminate\View\View
     */
    public function lblPriority()
    {
        return view('maintenance::viewers.work-order.labels.priority', ['workOrder' => $this->entity])->render();
    }

    /**
     * The work order status label.
     *
     * @return \Illuminate\View\View
     */
    public function lblStatus()
    {
        return view('maintenance::viewers.work-order.labels.status', ['workOrder' => $this->entity])->render();
    }
}
