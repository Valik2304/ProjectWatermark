<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>{{$title}}</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>

</head>
<body>

<header id="header_wrapper">
    <div class="section-title">
        <h2>{{'Інфа з Бази Даних'}}</h2>
    </div>


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</header>

<div style="margin:0px 50px 0px 50px;">

    @if($image)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Назва</th>
                <th>Картинка</th>
                <th>Текст</th>
                <th>Дата создания</th>

            </tr>
            </thead>
            <tbody>

            @foreach($image as $k => $img)
                <tr>
                    <td>{{ $img->id }}</td>
                    <td>{{ $img->name }}</td>
                    <td><img src="{{ asset($img->images) }}"></td>
                    <td>{{ $img->text }}</td>
                    <td>{{ $img->created_at }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif

    {!! Html::link(route('imagesAdd'),'Нова Інфа') !!}

</div>
</body>
</html>







