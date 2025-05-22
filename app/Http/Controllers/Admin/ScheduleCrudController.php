<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ScheduleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ScheduleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ScheduleCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Schedule::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/schedule');
        CRUD::setEntityNameStrings('расписание', 'расписания');
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
        CRUD::column('start_time')
            ->label('Время начала')
            ->type('datetime');
        CRUD::column('end_time')
            ->label('Время окончания')
            ->type('datetime');
        CRUD::column('type')
            ->label('Тип')
            ->type('select_from_array')
            ->options([
                'lecture' => 'Лекция',
                'consultation' => 'Консультация',
                'practice' => 'Практика',
                'exam' => 'Экзамен'
            ]);
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
        CRUD::setValidation(ScheduleRequest::class);

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
        CRUD::field('start_time')
            ->label('Время начала')
            ->type('datetime');
        CRUD::field('end_time')
            ->label('Время окончания')
            ->type('datetime');
        CRUD::field('type')
            ->label('Тип')
            ->type('select_from_array')
            ->options([
                'lecture' => 'Лекция',
                'consultation' => 'Консультация',
                'practice' => 'Практика',
                'exam' => 'Экзамен'
            ]);
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
