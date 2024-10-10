<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap/bootstrap4.6.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <title>Горки</title>

        <!-- Fonts -->
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../image001.jpeg" width="240" height="80" class="d-inline-block align-top" alt="ТРК ГОРКИ">
        </a>

        <div class="navbar-nav">
        <a class="nav-link" href="{{route('home')}}">Главная</a>
        <a class="nav-link" href="{{route('index')}}">Пользователи</a>
        <!-- Authentication -->
        <form class="nav-link ml-4" method="POST" action="{{ route('logout') }}">
        @csrf
        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Выйти') }}
        </x-responsive-nav-link>
        </form>
        </div>
        </nav>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <main class="container-fluid content-wrapper p-2 m-2">
                <form method="post" action="{{route('update', $bron->id)}}">
                @csrf
                    <h2>Изменить бронь<a class="h3 mb-3 font-weight-normal p-2" href="{{route('index')}}" role="button">Все брони</a></h2>
                    
                    <div class="form-group">
                    <label for="formGroupExampleInput">id</label>
                    <input type="text" class="form-control" id="id" value="{{$bron->id}}" readonly>
                    </div>
                    <div class="form-group">
                    <label for="formGroupExampleInput">Пользователь</label>
                    <input type="text" class="form-control" id="id_user" value="{{$bron->id_user}}" readonly>
                        <small class="form-text text-muted">Пользователь.</small>
                    </div>
                    <div class="form-group ">
                    <label>Дата и время создания записи</label>
                    <input type="datetime" id="date_time_szapisi" value="{{$bron->date_time_szapisi}}" class="form-control" readonly>
                    <small class="form-text text-muted">Нельзя изменять.</small>
                    </div>
                    <div class="form-group ">
                    <label>Дата заезда</label>
                    <input type="date" id="date_zaezda" name="date_zaezda" value="{{$bron->date_zaezda}}" class="form-control">
                    </div>
                    <div class="form-group ">
                    <label for="statys_broni">Статус брони:</label>
                    <select id="statys_broni" name="statys_broni" value="{{$bron->statys_broni}}" class="form-control">
                    <option value = "Не подтверждена"  @if($bron['statys_broni'] == 'Не подтверждена') selected @endif>Не подтверждена</option>
                        <option value = "Подтверждена" @if($bron['statys_broni'] == 'Подтверждена') selected @endif>Подтверждена</option>
                    </select>
                    </div>
                    <div class="form-group ">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </main>
        </div>

        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        <hr>
        <div class="row text-center"> 
            <div class="col-12"> <p> 2024 &copy; ГОРКИ</p>
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})  
            <hr>
            <p class="py-16 text-center text-sm">Автор: bulatmyhamatyllin@gmail.com</p>
            <p class="py-16 text-center text-sm">Avito: https://www.avito.ru/chelyabinsk/rezume/programmist_4128794248</p>
            </div>
        </div>
        </footer>
        </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<style src="/bootstrap/bootstrap4.6.0/js/bootstrap.bundle.js"></style>
<style src="/bootstrap/bootstrap4.6.0/js/bootstrap.bundle.min.js"></style>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
@stack('scripts')
    </body>
</html>
