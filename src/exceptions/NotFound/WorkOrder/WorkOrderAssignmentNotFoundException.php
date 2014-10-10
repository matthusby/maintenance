<?php namespace Stevebauman\Maintenance\Exceptions;

use Illuminate\Support\Facades\App;
use Stevebauman\Maintenance\Exceptions\AbstractException;

class WorkOrderAssignmentNotFoundException extends AbstractException {
    
    public function __construct(){
        $this->message = trans('maintenance::errors.not-found', array('resource'=>'Work Order Assignment'));
        $this->messageType = 'danger';
        $this->redirect = route('maintenance.work-orders.show', $this->getRouteParameter('work_orders'));
    }
    
}

App::error(function(WorkOrderAssignmentNotFoundException $e, $code, $fromConsole){
    return $e->response();
});