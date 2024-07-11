<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EquipmentsAddRequest;
use App\Http\Requests\EquipmentsRequest;
use App\Models\Equipments;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EquipmentCrudController
 *
 * @property-read CrudPanel $crud
 */
class EquipmentCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Equipments::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/equipments');
        CRUD::setEntityNameStrings('new', 'Equipments');
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     *
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id')->label('ID');
        CRUD::column('name')->label('Name')->searchLogic(
            function ($query, $column, $searchTerm) {
                $query->orWhere('name', 'ilike', '%' . $searchTerm . '%');
            }
        );
        CRUD::column('category_id')->label('Category')->type('select');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     *
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     *
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(EquipmentsRequest::class);
        CRUD::field('name')->label('Name')->type('text');
        CRUD::field('description')->label('Description')->type('textarea');
        CRUD::field('characters')->label('Characters')->type('textarea');
        CRUD::field(
            [
                'label' => "Category",
                'type' => 'select',
                'name' => 'category_id',
                'entity' => 'category',
            ]
        );

        CRUD::field('image')->label('Image')->type('style_image');
    }

}
