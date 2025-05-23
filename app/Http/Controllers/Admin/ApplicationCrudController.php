<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ApplicationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Program;

/**
 * Class ApplicationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ApplicationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Application::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/application');
        CRUD::setEntityNameStrings('заявку на обучение', 'заявки на обучение');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // set columns from db columns.

        CRUD::column('name')->label('Имя');
        CRUD::column('email')->label('Email');
        CRUD::column('phone')->label('Телефон');
        CRUD::column('degree')->label('Образование')
            ->type('select_from_array')
            ->options([
                'college' => 'Колледж',
                'bachelor' => 'Бакалавриат',
                'master' => 'Магистратура',
                'training' => 'Переподготовка'
            ]);
        CRUD::column('program_id')->label('Программа')
            ->type('relationship')
            ->attribute('title');
        CRUD::column('status')
            ->label('Статус')
            ->type('select_from_array')
            ->options([
                'new' => 'Новая',
                'in_progress' => 'В обработке',
                'completed' => 'Завершена',
                'cancelled' => 'Отменена'
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
        CRUD::setValidation(ApplicationRequest::class);
        //CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::field('name')->label('Имя');
        CRUD::field('email')->label('Email');
        CRUD::field('phone')->label('Телефон');
        CRUD::field('degree')
            ->label('Образование')
            ->type('select_from_array')
            ->options([
                'college' => 'Колледж',
                'bachelor' => 'Бакалавриат',
                'master' => 'Магистратура',
                'training' => 'Переподготовка'
            ]);
        CRUD::field('program_id')
            ->label('Программа')
            ->type('select')
            ->entity('program')
            ->attribute('title')
            ->model(Program::class);
        CRUD::field('message')->label('Сообщение')->type('textarea');
        CRUD::field('status')
            ->label('Статус')
            ->type('select_from_array')
            ->options([
                'new' => 'Новая',
                'in_progress' => 'В обработке',
                'completed' => 'Завершена',
                'cancelled' => 'Отменена'
            ])
            ->default('new');
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
