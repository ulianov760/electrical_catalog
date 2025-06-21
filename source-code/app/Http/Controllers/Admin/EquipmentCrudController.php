<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EquipmentsAddRequest;
use App\Http\Requests\EquipmentsRequest;
use App\Models\ElectricalEquipment;
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
class  EquipmentCrudController extends CrudController
{
    use CreateOperation;
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
        CRUD::setModel(ElectricalEquipment::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/equipments');
        CRUD::setEntityNameStrings('оборудование', 'Электрооборудование');
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
        CRUD::column('name')->label('ФИО')->searchLogic(
            function ($query, $column, $searchTerm) {
                $query->orWhere('name', 'ilike', '%' . $searchTerm . '%');
            }
        );
        CRUD::column('category_id')->label('Ктаегория')->type('select');
        CRUD::column('count')->label('Количество')->type('number');
        CRUD::column('discount')->label('Скидка')->type('number');
        CRUD::column('cost')->label('Стоимость')->type('numeric');
        CRUD::column('is_deleted')->label('Удалено')->type('boolean');
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
        CRUD::field('name')->label('Название')->type('text');
        CRUD::field('description')->label('Описание')->type('textarea');
        CRUD::field('characters')->label('Характеристики')->type('textarea');
        CRUD::field(
            [
                'label' => "Категория",
                'type' => 'select',
                'name' => 'category_id',
                'entity' => 'category',
            ]
        );
        CRUD::field('count')->label('Количество')->type('number')->default(0);
        CRUD::field('discount')->label('Скидка')->type('number')->default(0);
        CRUD::field('cost')->label('Стоимость')->type('number')->default(10);
        CRUD::field('image')->label('Картинка')->type('style_image');
        CRUD::field('is_deleted')->label('Удалено')->type('boolean')->default(false);
    }

}
