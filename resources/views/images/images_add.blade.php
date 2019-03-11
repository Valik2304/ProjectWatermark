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
        {!! Form::label('watermark','Зображення:',['class'=>'col-xs-02 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('watermark',['class'=>'filestyle','data-buttonText'=>'Виберіть зображення - в якості знаку','data-buttonName'=>'btn-primary','data-placeholder'=>'Файлу немає']) !!}
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

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace('editor')
    </script>

</div>