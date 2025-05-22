{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-dropdown title="Организация" icon="la la-sitemap">
    <x-backpack::menu-dropdown-item title="Заведения" icon="la la-university" :link="backpack_url('institution')" />
    <x-backpack::menu-dropdown-item title="Направления" icon="la la-map-signs" :link="backpack_url('study-field')" />
    <x-backpack::menu-dropdown-item title="Программы" icon="la la-list-alt" :link="backpack_url('program')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Обучение" icon="la la-graduation-cap">
    <x-backpack::menu-dropdown-item title="Группы" icon="la la-users" :link="backpack_url('group')" />
    <x-backpack::menu-dropdown-item title="Предметы" icon="la la-book" :link="backpack_url('subject')" />
    <x-backpack::menu-dropdown-item title="Расписания" icon="la la-calendar" :link="backpack_url('schedule')" />
    <x-backpack::menu-dropdown-item title="Задания" icon="la la-tasks" :link="backpack_url('task')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Заявки" icon="la la-envelope">
    <x-backpack::menu-dropdown-item title="На обучение" icon="la la-file-text" :link="backpack_url('application')" />
    <x-backpack::menu-dropdown-item title="На звонок" icon="la la-phone" :link="backpack_url('call-request')" />
</x-backpack::menu-dropdown>
<x-backpack::menu-dropdown title="Пользователи и права" icon="la la-cog">
    <x-backpack::menu-dropdown-item title="Пользователи" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Роли" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Права доступа" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>