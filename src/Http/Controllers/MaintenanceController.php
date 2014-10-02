<?php namespace Stevebauman\Maintenance\Http\Controllers;

use Illuminate\Support\Facades\View;
use Stevebauman\Maintenance\Services\SentryService;
use Stevebauman\Maintenance\Http\Controllers\AbstractController;

class MaintenanceController extends AbstractController {
	
	public function __construct(SentryService $sentry){
            $this->sentry = $sentry;
	}
	
	public function getIndex(){
		$this->layout = View::make('maintenance::dashboard.index');
		$this->layout->title = 'Dashboard';
	}
}