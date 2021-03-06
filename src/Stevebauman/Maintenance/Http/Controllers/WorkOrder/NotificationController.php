<?php

namespace Stevebauman\Maintenance\Http\Controllers\WorkOrder;

use Stevebauman\Maintenance\Validators\WorkOrder\NotificationValidator;
use Stevebauman\Maintenance\Services\WorkOrder\WorkOrderService;
use Stevebauman\Maintenance\Services\WorkOrder\NotificationService;
use Stevebauman\Maintenance\Http\Controllers\Controller as BaseController;

class NotificationController extends BaseController
{
    /**
     * @var NotificationService
     */
    protected $workOrderNotification;

    /**
     * @var NotificationValidator
     */
    protected $workOrderNotificationValidator;

    /**
     * @var WorkOrderService
     */
    protected $workOrder;

    /**
     * Constructor.
     *
     * @param WorkOrderService               $workOrder
     * @param NotificationService            $workOrderNotification
     * @param NotificationValidator          $workOrderNotificationValidator
     */
    public function __construct(
        WorkOrderService $workOrder,
        NotificationService $workOrderNotification,
        NotificationValidator $workOrderNotificationValidator
    ) {
        $this->workOrderNotification = $workOrderNotification;
        $this->workOrderNotificationValidator = $workOrderNotificationValidator;
        $this->workOrder = $workOrder;
    }

    /**
     * Creates a new notification for the specified work order.
     *
     * @param string|int $workOrder_id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store($workOrder_id)
    {
        if ($this->workOrderNotificationValidator->passes()) {
            $workOrder = $this->workOrder->find($workOrder_id);

            $data = $this->inputAll();
            $data['work_order_id'] = $workOrder->id;

            $this->workOrderNotification->setInput($data)->create();

            $this->message = 'Successfully updated notifications';
            $this->messageType = 'success';
            $this->redirect = route('maintenance.work-orders.show', [$workOrder->id]);
        } else {
            $this->errors = $this->workOrderNotificationValidator->getErrors();
            $this->redirect = route('maintenance.work-orders.show', [$workOrder_id]);
        }

        return $this->response();
    }

    /**
     * Updates the specified notification for the specified work order.
     *
     * @param string|int $workOrder_id
     * @param string|int $notification_id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update($workOrder_id, $notification_id)
    {
        if ($this->workOrderNotificationValidator->passes()) {
            $workOrder = $this->workOrder->find($workOrder_id);

            $notifications = $this->workOrderNotification->find($notification_id);

            $data = $this->inputAll();
            $data['work_order_id'] = $workOrder->id;

            $this->workOrderNotification->setInput($data)->update($notifications->id);

            $this->message = 'Successfully updated notifications';
            $this->messageType = 'success';
            $this->redirect = route('maintenance.work-orders.show', [$workOrder->id]);
        } else {
            $this->errors = $this->workOrderNotificationValidator->getErrors();
            $this->redirect = route('maintenance.work-orders.show', [$workOrder_id]);
        }

        return $this->response();
    }
}
