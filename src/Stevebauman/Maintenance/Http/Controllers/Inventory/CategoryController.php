<?php

namespace Stevebauman\Maintenance\Http\Controllers\Inventory;

use Stevebauman\Maintenance\Repositories\Inventory\CategoryRepository;
use Stevebauman\Maintenance\Http\Controllers\NestedSetController;

class CategoryController extends NestedSetController
{
    /**
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;

        $this->resource = 'Inventory Category';

        $this->routes = [
            'index' => 'maintenance.inventory.categories.index',
            'create' => 'maintenance.inventory.categories.create',
            'create-node' => 'maintenance.inventory.categories.nodes.create',
            'store' => 'maintenance.inventory.categories.store',
            'edit' => 'maintenance.inventory.categories.edit',
            'update' => 'maintenance.inventory.categories.update',
            'destroy' => 'maintenance.inventory.categories.destroy',
            'grid' => 'maintenance.api.v1.inventory.categories.grid',
            'move' => 'maintenance.api.v1.inventory.categories.move',
        ];
    }
}
