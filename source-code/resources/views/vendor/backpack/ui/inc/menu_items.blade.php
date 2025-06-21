{{-- This file is used for menu items by any Backpack v6 theme --}}
@include('backpack.language-switcher::language-switcher')
@if (backpack_user()->hasRoles([App\Helpers\Helper::ADMIN,App\Helpers\Helper::SUPER_MANAGER]))
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('posts') }}"><i class="la la-cog"></i>Должности</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('status-orders') }}"><i class="la la-cog"></i>Статусы Заказов</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('status-payments') }}"><i class="la la-cog"></i>Статусы Оплаты</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('type-payments') }}"><i class="la la-cog"></i>Типы Оплаты</a></li>
@endif
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('') }}"><i class="la la-file"></i> Категории</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('equipments') }}"><i class="la la-cog"></i>Электрооборудование</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('clients') }}"><i class="la la-cog"></i>Заказы</a></li>
@if (backpack_user()->hasRoles([App\Helpers\Helper::ADMIN,App\Helpers\Helper::SUPER_MANAGER]))
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('employees') }}"><i class="la la-cog"></i>Сотрудники</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('clients') }}"><i class="la la-cog"></i>Клиенты</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('clients') }}"><i class="la la-cog"></i>Опалаты</a></li>
@endif
@if (backpack_user()->hasRoles([App\Helpers\Helper::ADMIN]))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('roles') }}"><i class="la la-cog"></i>Роли</a></li>
@endif
