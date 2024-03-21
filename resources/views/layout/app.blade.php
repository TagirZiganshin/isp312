@extends(Auth::check() ? 'posts.main' : 'layout.main')
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', auth()->check() ? 'Страница заявлений' : 'Страница регистрации')</title>
</head>
<body>

    @auth
    @section("form")
    @section("link")
    <li class="nav-item">
        <a href="" class="nav-link active text-primary">Страница заявлений</a>
      </li>
    <li class="nav-item">
            <a href="{{ route('edit-post') }}" class="nav-link text-light" onclick="event.preventDefault(); document.getElementById('edit-post').submit();">Страница формирование заявления</a>
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
        
        
        @foreach ($posts as $post)
            <div class="container border border-3 border-primary mt-3 p-3 bg-dark text-center">
                <h2 class="mt-3 text-center text-light">Заявление</h2>

                <a href="#" class="nav-link text-light p-3 fs-5">Номер транспорта:</a>
            <h3 class="text-primary fs-5">{{$post['title']}}</h3>
            <a href="#" class="nav-link  text-light p-3 fs-5">Описание нарушения:</a>
            <p class="text-primary fs-5">{{$post["body"]}}</p>
            <a href="#" class="nav-link text-light p-3 fs-5">Фото и видео доказательства:</a>
            @if (pathinfo($post['file'], PATHINFO_EXTENSION) == 'jpg' || pathinfo($post['file'], PATHINFO_EXTENSION) == 'png')
            <img src="{{ asset($post['file']) }}" alt="{{$post['file']}}">
        @else
            <a href="{{ asset($post['file']) }}">{{$post['file']}}</a>
        @endif
        <a href="#" class="nav-link  text-light p-3 fs-5">Статус:</a>
        <p>
            @if ($post['status'] == 'pending')
                <a href="#"  class="nav-link text-warning">Новый</a>
            @elseif ($post['status'] == 'approved')
                <a href="#" class="nav-link text-success">Просморено</a>
            @else
                <a href="#" class="nav-link text-danger">Отклонено</a>
            @endif
        </p>
            </div>
        @endforeach
    </div>
    @endsection
    @else
    @section("content")
    @section("link-active")
    <li class="nav-item">
        <a href="{{ route('layout.app') }}"  class="nav-link active text-primary">Страница регистрации</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('layout.login') }}"  class="nav-link text-light">Страница авторизации</a>
      </li>
    @endsection

    <div class="container mt-5 border border-3 border-dark">
        <h2 class="mt-3 text-center">Форма регистрации</h2>
        <form action="index" method="POST" class="p-4">
            @csrf    
            <input name="name" type="text" placeholder="ФИО" minlength="6" class="form-control p-2"  required>
            <input input name="tel" type="tel" minlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="телефон" id="form_phone" class="form-control p-2 mt-4" required>
              <input name="email" type="email" minlength="6" placeholder="email" id="floatingInput" class="form-control p-2 mt-4"  required>
              <input name="login" type="text" minlength="6" placeholder="login"   id="floatingInput" class="form-control p-2 mt-4"  required>
              <input name="password" minlength="6" type="password" placeholder="password"  id="floatingPassword" placeholder="Номер телефона" class="form-control p-2 mt-4" id="validationTooltip01" required>
              <button type="submit" class="btn btn-warning mt-3">Зарегистрироваться</button>
        </form>
        </div>
    @endsection
        @endauth
        
</body>
</html>