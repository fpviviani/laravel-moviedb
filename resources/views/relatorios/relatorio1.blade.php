@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Filtros</h3>
                    <div class="box-body">
                        {!! Form::open(['route' => 'comum.store']) !!}
                            @include('relatorios.relatorio1_fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @if(Request::is('*relatorios*'))
            <div class="row">
        @else
            <div class="row" style="display:none">
        @endif
            <div class="col-md-12" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Gráficos</h3>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="filme-genero" style="width:100%; height:400px;"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="filme-linguagem" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="filme-ano" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<!-- Custom Scripts -->
<script type="text/javascript">
    genreName = @json($genre_name_array);
    genreCount = @json($genre_count_array);
    languageName = @json($language_name_array);
    languageCount = @json($language_count_array);
    yearNumber = @json($year_number_array);
    yearCount = @json($year_count_array);

    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('filme-genero', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Quantidade de filmes por gênero'
            },
            xAxis: {
                categories: genreName
            },
            yAxis: {
                title: {
                    text: 'Filmes que se adequam aos filtros'
                }
            },
            series: [{
                name: "Quantidade",
                data: genreCount
            }]
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('filme-linguagem', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Quantidade de filmes por idioma'
            },
            xAxis: {
                categories: languageName
            },
            yAxis: {
                title: {
                    text: 'Filmes que se adequam aos filtros'
                }
            },
            series: [{
                name: "Quantidade",
                data: languageCount
            }]
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('filme-ano', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Quantidade de filmes por ano'
            },
            xAxis: {
                categories: yearNumber
            },
            yAxis: {
                title: {
                    text: 'Filmes que se adequam aos filtros'
                }
            },
            series: [{
                name: "Quantidade",
                data: yearCount
            }]
        });
    });
</script>
@endpush