<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "Панель администратора")</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

</head>
<body>
    <div class="bg-dark">

        <div class="d-flex justify-content-between container p-3">
            <div class="text-light fs-4">Наушений.Нет</div>
            <div style="display: flex; padding: 0 30px; column-gap: 5px">
                <div>
                    <a href="{{ route('logout') }}"  class="nav-link text-light mt-1" onclick="event.preventDefault(); document.getElementById('logout').submit();">Выйти из аккаунта</a>
                    <form id="logout" action="{{route ('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                </div>
            </div>
    </div>
    </div>

    @foreach ($posts as $post)
    <div class="container border border-3 border-primary mt-3 p-3 bg-dark text-center">
        <h2 class="mt-3 text-center text-light">Заявление <a href="{{ route('update', ['post' => $post->id]) }}" onclick="event.preventDefault(); document.getElementById('update_').submit();" class="text-danger fs-5">изментить</a>
            <form id="update_" action="{{ route('update', ['post' => $post->id]) }}" method="POST" style="display: none;">
                @csrf
                </form></h2>

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
        <a href="#"  class="nav-link text-warning">Новый </a>
        
    @elseif ($post['status'] == 'approved')
        <a href="#" class="nav-link text-success">Просморено</a>
    @else
        <a href="#" class="nav-link text-danger">Отклонено</a>
    @endif
</p>
    </div>
@endforeach

</body>
</html>