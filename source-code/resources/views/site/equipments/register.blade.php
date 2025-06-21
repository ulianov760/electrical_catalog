@extends('site/layout/layout')
@section('title') {{"Регистрация"}} @endsection
@section('main_content')
    <main class="main">
        <!-- Authorization :: Start-->
        <div class="auth">
            <div class="container-fluid">
                <div class="auth__head">
                    <h1 class="auth__title">Регистрация</h1>
                    <div class="auth__control">
                        <span class="is-md-visible">У вас уже есть аккаунт?</span>
                        <a class="ui-btn ui-btn--36 ui-btn--primary" href="{{'/login'}}" style="background-color: orange">Авторизация </a>
                    </div>
                </div>
                <div class="auth__body">
                    <div class="auth__form">
                        <form action="{{'/register'}}" method="post">
                            @csrf
                            <fieldset id="account" class="ui-fieldset">
                                <legend class="ui-legend">Контактные данные</legend>
                                <ul>
                                    @foreach($errors->all() as $message)
                                        <li style="color: red">{{$message}}</li>
                                    @endforeach
                                </ul>
                                <div class="form-group">
                                    <label class="ui-label required">ФИО</label>
                                    <div class="ui-field">
                                        <input class="ui-input" type="text" name="fio" value="" placeholder="ФИО" id="fio" required minlength="3" maxlength="250">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="ui-label required">Возраст</label>
                                    <div class="ui-field">
                                        <input class="ui-input" type="number" name="age"  id="age" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="ui-label required">Пол</label>
                                    <div class="ui-field">
                                        <input type="radio" name="gender" value="MALES" checked="checked"> Мужской<br>
                                        <input type="radio" name="gender" value="WOMAN"> Женский<br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="ui-label required">Телефон</label>
                                    <div class="ui-field">
                                        <input class="ui-input" type="text" name="phone" value="" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" placeholder="Телефон" id="phone" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="ui-label required">E-mail</label>
                                    <div class="ui-field">
                                        <input class="ui-input" type="text" name="email" value="" placeholder="E-mail" id="email" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="ui-fieldset">
                                <legend class="ui-legend">Ваш пароль</legend>
                                <div class="form-group">
                                    <label class="ui-label required" for="input-password">Пароль</label>
                                    <div class="ui-field">
                                        <input class="ui-input" type="password" name="password" placeholder="Пароль" value="" id="input-password" minlength="8">

                                    </div>
                                </div>
                            </fieldset>

                            <button type="submit" class="ui-btn ui-btn--primary ui-btn--60 ui-btn--fullwidth" style="background-color: orange">Продолжить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- Authorization :: End-->
    </main>
@endsection
