<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TaskRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TaskCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TaskCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Task::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/task');
        CRUD::setEntityNameStrings('задание', 'задания');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title')->label('Название');
        CRUD::column('program_id')
            ->label('Программа')
            ->type('select')
            ->entity('program')
            ->attribute('title');
        CRUD::column('teacher_id')
            ->label('Преподаватель')
            ->type('select')
            ->entity('teacher')
            ->attribute('name');
        CRUD::column('due_date')
            ->label('Срок сдачи')
            ->type('date');
        CRUD::column('max_score')
            ->label('Макс. балл')
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
        CRUD::setValidation(TaskRequest::class);

        CRUD::field('title')->label('Название');
        CRUD::field('program_id')
            ->label('Программа')
            ->type('select')
            ->entity('program')
            ->attribute('title')
            ->model('App\Models\Program');
        CRUD::field('teacher_id')
            ->label('Преподаватель')
            ->type('select')
            ->entity('teacher')
            ->attribute('name')
            ->model('App\Models\User')
            ->where('role', 'teacher');
        CRUD::field('due_date')
            ->label('Срок сдачи')
            ->type('date');
        CRUD::field('max_score')
            ->label('Макс. балл')
            ->type('number')
            ->attributes(['min' => 1]);
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
