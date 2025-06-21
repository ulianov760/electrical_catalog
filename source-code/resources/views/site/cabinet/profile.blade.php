@extends('site/layout/layout_cabinet')
@section('title') {{"Профиль"}} @endsection
@section('main_content')
<div class="app-body flex-grow-1 px-2">
    <main class="main">
        <div class="container-fluid animated fadeIn">

            <div class="row">
                <div class="col-lg-8">
                    <form class="form" action="{{'/edit-user'}}" method="post">
                      @csrf
                        <div class="card padding-10">
                            <ul>
                                @foreach($errors->all() as $message)
                                    <li style="color: red">{{$message}}</li>
                                @endforeach
                            </ul>
                            <div class="card-header">
                                Информация о пользователе
                            </div>
                            <input  class="form-control" type="hidden" name="id" value="{{$client->id}}">
                            <div class="card-body backpack-profile-form bold-labels">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="required">ФИО</label>
                                        <input required="" class="form-control" type="text" name="fio" value="{{$client->fio}}">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="required">Почта</label>
                                        <input required="" class="form-control" type="email" name="email" value="{{$client->email}}">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="required">Возраст</label>
                                        <input required="" class="form-control" type="number" name="age" value="{{$client->age}}">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="required">Телефон</label>
                                        <input required="" class="form-control" type="text" name="phone" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" value="{{$client->phone}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="required">Пол</label>
                                        <div>
                                        <input type="radio"  name="gender" value="MALES" {{($client->sex == 'MALES')? 'checked' : '' }}> Мужской<br>
                                        </div>
                                        <input type="radio" name="gender" value="WOMAN" {{($client->sex == 'WOMAN')? 'checked' : '' }}> Женский<br>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"> Сохранить</button>
                                <a href="{{'/cabinet'}}" class="btn">Отменить</a>
                            </div>
                        </div>

                    </form>
                </div>


                <div class="col-lg-8">
                    <form class="form" action="{{'/edit-user-password'}}" method="post">

                        @csrf
                        <div class="card padding-10">

                            <div class="card-header">
                                Изменить пароль
                            </div>
                            <input  class="form-control" type="hidden" name="id" value="{{$client->id}}">
                            <div class="card-body backpack-profile-form bold-labels">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label class="required">Новый пароль</label>
                                        <input autocomplete="password" required="" class="form-control" type="password" name="password" id="password" value="">
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="required">Потвердите пароль</label>
                                        <input autocomplete="new-password" required="" class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"> Изменить пароль</button>
                                <a href="{{'/cabinet'}}" class="btn">Отменить</a>
                            </div>

                        </div>

                    </form>
                </div>

            </div>


        </div>

    </main>

</div>
@endsection
