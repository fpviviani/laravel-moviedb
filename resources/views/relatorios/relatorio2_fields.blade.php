<div class="row">
    <div class="form-group col-md-6">
        <div class="row">
            <div class="col-md-12">
                {!! Form::label("year", "Lançados entre:") !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! Form::number("year_start", "1950", ["class" => "form-control"]) !!}
            </div>
            <div class="col-md-6">
                {!! Form::number("year_end", "2020", ["class" => "form-control"]) !!}
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="row">
            <div class="col-md-12">
                {!! Form::label("language", "Idioma original:") !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("language", "Todos:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("language[]", "all", true) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("language", "Espanhol:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("language[]", "es") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("language", "Francês:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("language[]", "fr") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("language", "Inglês:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("language[]", "en") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("language", "Japonês:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("language[]", "jp") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("language", "Português:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("language[]", "pt") !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        <div class="row">
            <div class="col-md-12">
                {!! Form::label("genre", "Gêneros:") !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Todos:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "all", true) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Ação:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "28") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Aventura:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "12") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Animação:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "16") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Comédia:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "35") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Crime:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "80") !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Documentário:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "99") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Drama:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "18") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Família:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "10751") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Fantasia:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "14") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Histórico:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "36") !!}
                    </div>
                </div>
            </div>            
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Horror:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "27") !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Musical:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "10402") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Romance:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "10749") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Ficção científica:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "878") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Suspense:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "53") !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Guerra:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "10752") !!}
                    </div>
                </div>
            </div>            
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label("genre", "Faroeste:") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::checkbox("genre[]", "37") !!}
                    </div>
                </div>
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
