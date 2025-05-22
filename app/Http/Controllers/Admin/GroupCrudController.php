<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GroupRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GroupCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GroupCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Group::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/group');
        CRUD::setEntityNameStrings('группу', 'группы');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name')->label('Название');
        CRUD::column('program_id')
            ->label('Программа')
            ->type('select')
            ->entity('program')
            ->attribute('title');
        CRUD::column('start_date')
            ->label('Дата начала')
            ->type('date');
        CRUD::column('end_date')
            ->label('Дата окончания')
            ->type('date');
        CRUD::column('max_students')
            ->label('Макс. студентов')
            ->type('number');
        CRUD::column('is_active')
            ->label('Активно')
            ->type('boolean')
            ->options([0 => 'Нет', 1 => 'Да']);
        CRUD::column('created_at')->label('Дата создания');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(GroupRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('name')->label('Название');
        CRUD::field('program_id')
            ->label('Программа')
            ->type('select')
            ->entity('program')
            ->attribute('title')
            ->model('App\Models\Program');
        CRUD::field('start_date')
            ->label('Дата начала')
            ->type('date');
        CRUD::field('end_date')
            ->label('Дата окончания')
            ->type('date');
        CRUD::field('max_students')
            ->label('Макс. студентов')
            ->type('number')
            ->attributes(['min' => 1]);
        CRUD::field('is_active')
            ->label('Активно')
            ->type('boolean')
            ->default(true);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
