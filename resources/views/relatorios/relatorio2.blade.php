@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row no-print">
            <div class="col-md-12" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Filtros</h3>
                    <div class="box-body">
                        {!! Form::open(['route' => 'premium.store']) !!}
                            @include('relatorios.relatorio2_fields')
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
                                <div id="pessoa-genero" style="width:100%; height:400px;"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="pessoa-trabalho" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="pessoa-ano" style="width:100%; height:400px;"></div>
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
                                @include('relatorios.pessoa_files')
                            </div>
                        </div>
                        <table style="width:100%; visibility: collapse" class="print-only">
                            <tr>
                                <th class="id">id</th>
                                <th class="name">name</th> 
                                <th class="know_for_department">know_for_department</th>
                                <th class="place_of_birth">place_of_birth</th>
                                <th class="birthday">birthday</th>
                                <th class="deathday">deathday</th>
                                <th class="popularity">popularity</th>
                            </tr>
                            @foreach($people as $person)
                                <tr>
                                    <td class="id">{!! $person->id !!}</td>
                                    <td class="name">{!! $person->name !!}</td>
                                    <td class="know_for_department">{!! $person->know_for_department !!}</td>
                                    <td class="place_of_birth">{!! $person->place_of_birth !!}</td>
                                    <td class="birthday">{!! $person->birthday !!}</td>
                                    <td class="deathday">{!! $person->deathday !!}</td>
                                    <td class="popularity">{!! $person->popularity !!}</td>
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
    genderName = @json($gender_name_array);
    genderCount = @json($gender_count_array);
    departmentName = @json($department_name_array);
    departmentCount = @json($department_count_array);
    yearNumber = @json($year_number_array);
    yearCount = @json($year_count_array);

    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('pessoa-genero', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Quantidade de pessoas por gênero'
            },
            xAxis: {
                categories: genderName
            },
            yAxis: {
                title: {
                    text: 'Pessoas que se adequam aos filtros'
                }
            },
            series: [{
                name: "Quantidade",
                data: genderCount
            }]
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('pessoa-trabalho', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Quantidade de pessoas por área de atuação'
            },
            xAxis: {
                categories: departmentName
            },
            yAxis: {
                title: {
                    text: 'Pessoas que se adequam aos filtros'
                }
            },
            series: [{
                name: "Quantidade",
                data: departmentCount
            }]
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('pessoa-ano', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Quantidade de pessoas nascidas em cada ano'
            },
            xAxis: {
                categories: yearNumber
            },
            yAxis: {
                title: {
                    text: 'Pessoas que se adequam aos filtros'
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