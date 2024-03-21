
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", "Страница авторизации")</title>
</head>
<body>
    @extends("layout.main")
    @section("content")
    @section("link-active")
    <li class="nav-item">
        <a href="{{ route('layout.app') }}"  class="nav-link text-light">Страница регистрации</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('layout.login') }}"  class="nav-link active text-primary">Страница авторизации</a>
      </li>
    @endsection
    <div class="container mt-5 p-3 border border-3 border-dark">
        <h2 class="text-center">Форма авторизации</h2>
        <form action="admin" method="POST">
            @csrf
            <input name="sublogin" type="text" minlength="6" placeholder="login"   id="floatingInput" class="form-control p-2 mt-4"  required>
            <input name="subpassword" minlength="6" type="password" placeholder="password"  id="floatingPassword" placeholder="Номер телефона" class="form-control p-2 mt-4" id="validationTooltip01" required>
            <button type="submit" class="btn btn-warning mt-3">Войти</button>
          </form>
        </div>
        @endsection
</body>
</html>