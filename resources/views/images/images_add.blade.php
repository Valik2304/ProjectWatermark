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
        <h2>{{'Нова інфа'}}</h2>
    </div>


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</header>

<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('imagesAdd'),'class'=>'form-horizontal', 'method' =>'POST','enctype'=>'multipart/from-data','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name','Назва:',['class' =>'col-xs-02 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'),['class'=>'form-control','placeholder'=>'Введіть назву ']) !!}
        </div>
    </div>



    <div class="form-group">
        {!! Form::label('images','Зображення:',['class'=>'col-xs-02 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images',['class'=>'filestyle','data-buttonText'=>'Виберіть зображення','data-buttonName'=>'btn-primary','data-placeholder'=>'Файлу немає']) !!}
        </div>
    </div>





    <div class="form-group">
        {!! Form::label('text','Текст:',['class'=>'col-xs-02 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'),['id'=>'editor','class'=>'form-control','placeholder'=>'Введіть текст ']) !!}
        </div>
    </div>



    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Зберегти',['class'=>'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::open(['url'=>route('imagesAdd'),'class'=>'form']) !!}
    <p><b>Вибір водяного знаку:</b></p>
    <p><label><input type="radio" name="my_radio" value="1" checked>Зображення</label><Br>
        <label><input type="radio" name="my_radio" value="2">Текст</label></p><Br>
        <Br>
    {!! Form::close() !!}

    {!! Form::close() !!}



</div>

</body>
</html>






