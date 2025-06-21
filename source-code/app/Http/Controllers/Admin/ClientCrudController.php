<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation {update as traitUpdate;}

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Client::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/clients');
        CRUD::setEntityNameStrings('', 'Клиенты');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id')->label('ID');
        CRUD::column('fio')->label('ФИО')->searchLogic(
            function ($query, $column, $searchTerm) {
                $query->orWhere('fio', 'ilike', '%' . $searchTerm . '%');
            }
        );
        CRUD::column('email')->label('Почта')->searchLogic(
            function ($query, $column, $searchTerm) {
                $query->orWhere('email', 'ilike', '%' . $searchTerm . '%');
            }
        );
        CRUD::column('age')->label('Возраст')->searchLogic(
            function ($query, $column, $searchTerm) {
                $query->orWhere('age', $searchTerm);
            }
        );
    }


    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(ClientRequest::class);

        $employee = $this->crud->getCurrentEntry();

        CRUD::field('fio')->label('ФИО')->type('text');
        CRUD::field('email')->label('Почта')->type('email');
        CRUD::field('password')->label('Пароль')->type('password')->default($employee->password);
        CRUD::field('age')->label('Возраст')->type('number');
        CRUD::field('phone')->label('Телефон')->type('field_phone');
        CRUD::field( [
            'name'  => 'sex',
            'label' => 'Пол',
            'type'  => 'enum',
            'enum_function' => 'readableText',
            'enum_class' => 'App\Enums\Gender'
        ]);
    }

    public function update()
    {
        CRUD::setRequest(CRUD::validateRequest());

        /** @var \Illuminate\Http\Request $request */
        $request = CRUD::getRequest();

        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        CRUD::setRequest($request);
        CRUD::unsetValidation();
        $response = $this->traitUpdate();
        return $response;
    }
}
