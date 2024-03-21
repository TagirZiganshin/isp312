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
    <div class="container border border-3 border-dark mt-3 p-3">

        <h2 class="mt-5 text-center">Изменить заявление</h1>
        <form action="{{route('update-post', ['post' => $post->id] )}}" method="POST" class="mt-5">
            @csrf
            @method("PUT")
            <input type="text" name="title" value='{{$post->title}}' required class="form-control mt-3">
            <textarea name="body" placeholder="body content" required class="form-control mt-3">{{$post->body}}</textarea>
            <input type="file" name="file" value="{{$post->file}}" required class="form-control mt-3">
            <select name="status" required class="form-control mt-3">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
              </select>
            <button type="submit" class="btn btn-warning mt-3">Сохронить изменение</button>
            @if (isset($message))
    <div class="alert alert-success mt-3">
        {{ $message }}
    </div>
@endif
        </form>
    </div>
</body>
</html>