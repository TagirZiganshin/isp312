@extends("posts.main")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "Страница формирования заявления")</title>
</head>
<body>
    @section("form")
    @section("link")
    <li class="nav-item">
        <a href="{{ route('layout.app') }}" class="nav-link text-light" onclick="event.preventDefault(); document.getElementById('home-form').submit();">Страница заявлений</a>
                <form id="home-form" action="{{route ("layout.app")}}" method="POST" style="display: none;">
                    @csrf
                </form>
      </li>
    <li class="nav-item">
            <a href="{{ route('edit-post') }}" class="nav-link active text-primary" onclick="event.preventDefault(); document.getElementById('edit-post').submit();">Страница формирование заявления</a>
            <form id="edit-post" action="{{route ('edit-post') }}" method="POST" style="display: none;">
                @csrf
                </form>
      </li>
      <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link text-light" onclick="event.preventDefault(); document.getElementById('logout').submit();">Выйти из аккаунта</a>
            <form id="logout" action="{{route ('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
      </li>
    @endsection
    <div class="border border-dark border-3 container mt-5 p-3">
        <h2 class="text-center mt-3">Формирование Заявление</h2>
        <form action="create-post" method="POST" enctype="myltipart/form-data">
           {{ csrf_field() }}
        @csrf
        <input name="title" type="text" placeholder="Номер транспорта" minlength="6" class="form-control p-2 mt-3"  required>
        <textarea name="body" type="text" placeholder="Описание нарушения" minlength="6" class="form-control p-2 mt-3"  required></textarea>
        <label for="" class="mt-3">Фото и видео доказательства:</label>
        <input name="file" type="file" minlength="6" class="form-control p-2"  required>        
        <select name="status" style="display: none">
            <option value="pending" selected>Pending</option>
            <option value="approved" disabled>Approved</option>
            <option value="rejected" disabled>Rejected</option>
          </select>
        <button type="submit" class="btn btn-warning mt-3">Отправить</button>
        </form>
    </div>
    @endsection
</body>
</html>