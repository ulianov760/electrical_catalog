@extends('site/layout/layout')
@section('title') {{"Авторизация"}} @endsection
@section('main_content')
    <main class="main">
        <!-- Authorization :: Start-->
        <div class="auth">
            <div class="container-fluid">
                <div class="auth__head">
                    <h1 class="auth__title">Авторизация</h1>
                    <div class="auth__control">
                        <span class="is-md-visible">У вас уже нет аккаунта?</span>
                        <a class="ui-btn ui-btn--36 ui-btn--primary" href="{{'/register'}}" style="background-color: orange">Регистрация</a>
                    </div>
                </div>
                <div class="auth__body">
                    <div class="auth__form">
                        <form action="{{'/login'}}" method="post">
                            @csrf
                            <ul>
                                @foreach($errors->all() as $message)
                                    <li style="color: red">{{$message}}</li>
                                @endforeach
                            </ul>
                            <fieldset id="account" class="ui-fieldset">
                                <div class="form-group">
                                    <label class="ui-label required">E-mail</label>
                                    <div class="ui-field">
                                        <input class="ui-input" type="text" name="email" value="" placeholder="E-mail" id="email" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="ui-fieldset">
                                <legend class="ui-legend">Пароль</legend>
                                <div class="form-group">
                                    <label class="ui-label required" for="input-password">Пароль</label>
                                    <div class="ui-field">
                                        <input class="ui-input" type="password" name="password" placeholder="Пароль" value="" id="password">

                                    </div>
                                </div>
                            </fieldset>

                            <button type="submit" class="ui-btn ui-btn--primary ui-btn--60 ui-btn--fullwidth" style="background-color: orange">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- Authorization :: End-->
    </main>
@endsection
