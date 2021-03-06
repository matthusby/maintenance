<?php

namespace Stevebauman\Maintenance\Http\Controllers\WorkOrder;

use Stevebauman\Maintenance\Repositories\WorkOrder\CategoryRepository;
use Stevebauman\Maintenance\Http\Controllers\NestedSetController;

class CategoryController extends NestedSetController
{
    /**
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;

        $this->resource = 'Work Order Category';

        $this->routes = [
            'index' => 'maintenance.work-orders.categories.index',
            'create' => 'maintenance.work-orders.categories.create',
            'create-node' => 'maintenance.work-orders.categories.nodes.create',
            'store' => 'maintenance.work-orders.categories.store',
            'edit' => 'maintenance.work-orders.categories.edit',
            'update' => 'maintenance.work-orders.categories.update',
            'destroy' => 'maintenance.work-orders.categories.destroy',
            'grid' => 'maintenance.api.v1.work-orders.categories.grid',
            'move' => 'maintenance.api.v1.work-orders.categories.move',
        ];
    }
}
