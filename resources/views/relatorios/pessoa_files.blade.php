<div class="row">
    <div class="col-md-12">
        {!! Form::label("people", "Visualizar:") !!}
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        {!! Form::label("all", "Tudo:") !!}
        {!! Form::checkbox("all[]", "all", true) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label("name", "Nome:") !!}
        {!! Form::checkbox("name[]", "name") !!}
    </div>
    <div class="col-md-4">
        {!! Form::label("birthday", "Data de nascimento:") !!}
        {!! Form::checkbox("birthday[]", "birthday") !!}
    </div>
</div>