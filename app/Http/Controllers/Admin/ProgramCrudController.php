<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProgramRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProgramCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProgramCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Program::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/program');
        CRUD::setEntityNameStrings('программу', 'программы');
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
        CRUD::column('institution_id')
            ->label('Заведение')
            ->type('select')
            ->entity('institution')
            ->attribute('name');
        CRUD::column('study_field_id')
            ->label('Направление')
            ->type('select')
            ->entity('studyField')
            ->attribute('name');
        CRUD::column('degree')
            ->label('Степень')
            ->type('select_from_array')
            ->options([
                'college' => 'Колледж',
                'bachelor' => 'Бакалавр',
                'master' => 'Магистр',
                'training' => 'Курсы'
            ]);
        CRUD::column('study_form')
            ->label('Форма обучения')
            ->type('select_from_array')
            ->options([
                'full-time' => 'Очно-заочная',
                'part-time' => 'Заочная',
                'distance' => 'Дистанционная'
            ]);
        CRUD::column('duration_months')
            ->label('Длительность (мес.)')
            ->type('number');
        CRUD::column('price')
            ->label('Стоимость')
            ->type('number')
            ->decimals(2);
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
        CRUD::setValidation(ProgramRequest::class);

        CRUD::field('title')->label('Название');
        CRUD::field('slug')->label('Slug')->hint('Автоматически генерируется из названия');
        CRUD::field('image')
            ->label('Изображение')
            ->type('upload')
            ->withFiles([
                'disk' => 'public',
                'path' => 'programs/images',
                'deleteWhenEntryIsDeleted' => true
            ]);
        CRUD::field('institution_id')
            ->label('Заведение')
            ->type('select')
            ->entity('institution')
            ->attribute('name')
            ->model('App\Models\Institution');
        CRUD::field('study_field_id')
            ->label('Направление')
            ->type('select')
            ->entity('studyField')
            ->attribute('name')
            ->model('App\Models\StudyField');
        CRUD::field('degree')
            ->label('Степень')
            ->type('select_from_array')
            ->options([
                'college' => 'Колледж',
                'bachelor' => 'Бакалавр',
                'master' => 'Магистр',
                'training' => 'Курсы'
            ]);
        CRUD::field('study_form')
            ->label('Форма обучения')
            ->type('select_from_array')
            ->options([
                'full-time' => 'Очно-заочная',
                'part-time' => 'Заочная',
                'distance' => 'Дистанционная'
            ])
            ->default('distance');
        CRUD::field('duration_months')
            ->label('Длительность (мес.)')
            ->type('number')
            ->attributes(['min' => 1]);
        CRUD::field('price')
            ->label('Стоимость')
            ->type('number')
            ->attributes(['step' => '0.01', 'min' => 0]);
        CRUD::field('description')
            ->label('Описание')
            ->type('textarea');
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
        CRUD::field('image')->type('upload')->withFiles();
    }
}
