@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row no-print">
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
            <div class="row no-print">
        @else
            <div class="row no-print" style="display:none">
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

        @if(Request::is('*relatorios*'))
            <div class="row">
        @else
            <div class="row" style="display:none">
        @endif
            <div class="col-md-12" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">PDF Tabelar</h3>
                    <div class="box-body">
                        <div class="row no-print">
                            <div class="col-md-12">
                                @include('relatorios.filme_files')
                            </div>
                        </div>
                        <table style="width:100%!important; visibility: collapse" class="print-only">
                            <tr>
                                <th class="id">id</th>
                                <th class="title">title</th> 
                                <th class="original_language">original_language</th>
                                <th class="runtime">runtime</th>
                                <th class="release_date">release_date</th>
                                <th class="status">status</th>
                                <th class="revenue">revenue</th>
                                <th class="budget">budget</th>
                                <th class="popularity">popularity</th>
                                <th class="vote_average">vote_average</th>
                                <th class="id_collection">id_collection</th>
                            </tr>
                            @foreach($movies as $movie)
                                <tr>
                                    <td class="id">{!! $movie->id !!}</td>
                                    <td class="title">{!! $movie->title !!}</td>
                                    <td class="original_language">{!! $movie->original_language !!}</td>
                                    <td class="runtime">{!! $movie->runtime !!}</td>
                                    <td class="release_date">{!! $movie->release_date !!}</td>
                                    <td class="status">{!! $movie->status !!}</td>
                                    <td class="revenue">{!! $movie->revenue !!}</td>
                                    <td class="budget">{!! $movie->budget !!}</td>
                                    <td class="popularity">{!! $movie->popularity !!}</td>
                                    <td class="vote_average">{!! $movie->vote_average !!}</td>
                                    <td class="id_collection">{!! $movie->id_collection !!}</td>

                                </tr>
                            @endforeach
                        </table>
                        <div class="row no-print" style="padding-top:3%">
                            <div class="col-md-12">
                                <a class="btn btn-success" id="print-button">Imprimir</a>
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

    $('#print-button').click(function(){
        window.print();
        return false;
    });

    $('.checkbox-filter').click(function(){
        name = $(this).attr("name");
        checked = $(this).is(":checked");
        if(checked == false){
            $("."+name).addClass("no-print");
        }else{
            $("."+name).removeClass("no-print");
        }
    });
</script>
@endpush