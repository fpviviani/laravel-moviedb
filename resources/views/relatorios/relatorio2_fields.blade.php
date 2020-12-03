<div class="row">
    <div class="form-group col-md-6">
        <div class="row">
            <div class="col-md-12">
                {!! Form::label("gender", "Gênero:") !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                {!! Form::label("gender", "Todos:") !!}
                {!! Form::checkbox("gender[]", "all", true) !!}
            </div>
            <div class="col-md-4">
                {!! Form::label("gender", "Masculino:") !!}
                {!! Form::checkbox("gender[]", "2") !!}
            </div>
            <div class="col-md-4">
                {!! Form::label("gender", "Feminino:") !!}
                {!! Form::checkbox("gender[]", "1") !!}
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="row">
            <div class="col-md-12">
                {!! Form::label("department", "Trabalha com:") !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                {!! Form::label("department", "Ambos:") !!}
                {!! Form::checkbox("department[]", "all", true) !!}
            </div>
            <div class="col-md-4">
                {!! Form::label("department", "Atuação:") !!}
                {!! Form::checkbox("department[]", "Acting") !!}
            </div>
            <div class="col-md-4">
                {!! Form::label("department", "Produção:") !!}
                {!! Form::checkbox("department[]", "else") !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        <div class="row">
            <div class="col-md-12">
                {!! Form::label("year", "Nascidos entre:") !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! Form::number("birth_start", "1950", ["class" => "form-control"]) !!}
            </div>
            <div class="col-md-6">
                {!! Form::number("birth_end", "2020", ["class" => "form-control"]) !!}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
