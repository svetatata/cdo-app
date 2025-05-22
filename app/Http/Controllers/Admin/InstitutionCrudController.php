<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InstitutionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InstitutionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InstitutionCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Institution::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/institution');
        CRUD::setEntityNameStrings('заведение', 'заведения');
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
        CRUD::column('type')
            ->label('Тип')
            ->type('select_from_array')
            ->options([
                'university' => 'Университет',
                'college' => 'Колледж'
            ]);
        CRUD::column('email')->label('Email');
        CRUD::column('phone')->label('Телефон');
        CRUD::column('person')->label('Контактное лицо');
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
        CRUD::setValidation(InstitutionRequest::class);

        CRUD::field('name')->label('Название');
        CRUD::field('slug')->label('Slug')->hint('Автоматически генерируется из названия');
        CRUD::field('type')
            ->label('Тип')
            ->type('select_from_array')
            ->options([
                'university' => 'Университет',
                'college' => 'Колледж'
            ]);
        CRUD::field('description')
            ->label('Описание')
            ->type('textarea');
        CRUD::field('logo')
            ->label('Изображение')
            ->type('upload')
            ->withFiles([
                'disk' => 'public',
                'path' => 'institutions/images',
                'deleteWhenEntryIsDeleted' => true
            ]);
        CRUD::field('email')->label('Email');
        CRUD::field('phone')->label('Телефон');
        CRUD::field('person')->label('Контактное лицо');
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

    protected function setupDeleteOperation()
    {
        CRUD::field('logo')->type('upload')->withFiles();
    }
}
