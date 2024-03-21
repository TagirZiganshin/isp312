<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark p-3">
        <div class="container">
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <a class="navbar-brand text-light fs-4" href="#">Нарушениям.Нет</a>
            <ul class="navbar-nav">
                @yield("link")
            </ul>
          </div>
        </div>
      </nav>
      @yield('form')
</body>
</html>