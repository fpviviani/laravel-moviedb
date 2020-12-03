@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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
</script>
@endpush