<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SubjectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SubjectCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Subject::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/subject');
        CRUD::setEntityNameStrings('предмет', 'предметы');
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
        CRUD::column('course')
            ->label('Курс')
            ->type('number');
        CRUD::column('theory_hours')
            ->label('Теор. часы')
            ->type('number');
        CRUD::column('practice_hours')
            ->label('Практ. часы')
            ->type('number');
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
        CRUD::setValidation(SubjectRequest::class);

        CRUD::field('name')->label('Название');
        CRUD::field('slug')->label('Slug')->hint('Автоматически генерируется из названия');
        CRUD::field('program_id')
            ->label('Программа')
            ->type('select')
            ->entity('program')
            ->attribute('title')
            ->model('App\Models\Program');
        CRUD::field('course')
            ->label('Курс')
            ->type('number')
            ->attributes(['min' => 1]);
        CRUD::field('theory_hours')
            ->label('Теор. часы')
            ->type('number')
            ->attributes(['min' => 0]);
        CRUD::field('practice_hours')
            ->label('Практ. часы')
            ->type('number')
            ->attributes(['min' => 0]);
        CRUD::field('description')
            ->label('Описание')
            ->type('textarea');
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
