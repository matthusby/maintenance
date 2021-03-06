<?php

namespace Stevebauman\Maintenance\Http\Controllers\WorkOrder;

use Stevebauman\Maintenance\Http\Requests\WorkOrder\StatusRequest;
use Stevebauman\Maintenance\Repositories\WorkOrder\StatusRepository;
use Stevebauman\Maintenance\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * @var StatusRepository
     */
    protected $status;

    /**
     * @param StatusRepository $status
     */
    public function __construct(StatusRepository $status)
    {
        $this->status = $status;
    }

    /**
     * Displays all of the work order statuses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('maintenance::work-orders.statuses.index');
    }

    /**
     * Displays the form for creating a new
     * work order status.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('maintenance::work-orders.statuses.create');
    }

    /**
     * Creates a new work order status.
     *
     * @param StatusRequest $request
     *
     * @return mixed
     */
    public function store(StatusRequest $request)
    {
        $status = $this->status->create($request);

        if($status) {
            $message = 'Successfully created status.';

            return redirect()->route('maintenance.work-orders.statuses.index')->withSuccess($message);
        } else {
            $message = 'There was an issue creating this status. Please try again.';

            return redirect()->route('maintenance.work-orders.statuses.create')->withErrors($message);
        }
    }

    /**
     * Displays the form for editing a
     * work order status.
     *
     * @param string|int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $status = $this->status->find($id);

        return view('maintenance::work-orders.statuses.edit', compact('status'));
    }

    /**
     * Updates the specified work order status.
     *
     * @param StatusRequest $request
     * @param string|int    $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(StatusRequest $request, $id)
    {
        $status = $this->status->update($request, $id);

        if($status) {
            $message = 'Successfully updated status.';

            return redirect()->route('maintenance.work-orders.statuses.show', [$status->id])->withSuccess($message);
        } else {
            $message = 'There was an issue updating this status. Please try again.';

            return redirect()->route('maintenance.work-orders.statuses.edit', [$id])->withErrors($message);
        }
    }

    /**
     * Deletes the specified work order status.
     *
     * @param string|int $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if($this->status->delete($id)) {
            $message = 'Successfully deleted status.';

            return redirect()->route('maintenance.work-orders.statuses.index')->withSuccess($message);
        } else {
            $message = 'There was an issue deleting this status. Please try again.';

            return redirect()->route('maintenance.work-orders.statuses.show', [$id])->withErrors($message);
        }
    }
}
