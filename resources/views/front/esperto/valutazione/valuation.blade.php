@extends('front.master')

@section('content')
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/loader.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/loader45.2.js') }}" ></script>
    <link id="load-css-0" rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/charts/tootip.css') }}">
    <link id="load-css-0" rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/charts/tootip45.2.css') }}">
    <link id="load-css-0" rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/charts/util.css') }}">
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/jsapi_compiled_format_module.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/jsapi_compiled_default_module.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/jsapi_compiled_ui_module.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/jsapi_compiled_corechart_module.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/jsapi_compiled_fw_module.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/dygraph-tickers-combined.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/webfont.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/jsapi_compiled_bar_module.js') }}" ></script>
    <script type="text/javascript" src=" {{ URL::asset('assets/js/charts/engine/jsapi_compiled_gauge_module.js') }}" ></script>

    @php
        $studio = array();
        $studio = $array[key($array)];
    @endphp

    <div class="row">
        <div class="col-lg-8 col-sm-12 col-md-12 col-xs-12 col-lg-offset-2 col-xs-offset-0 col-sm-offset-0 col-md-offset-0">
            <div>
                <div id="valuationTitle" class="panel text-center"><h1>{{ $title }}</h1></div>
                <div class="">
                    <div id="goalTitle"
                         class="bg-primary text-light text-center col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <h4>{{ $studio["goal"] }}</h4></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; margin-bottom: 40px;">
        <div class="col-lg-8 col-sm-12 col-md-12 col-xs-12 col-xs-offset-0 col-lg-offset-2 col-sm-offset-0 col-md-offset-0">
            @switch($title)
                @case("Audio")
                <div id="valuationAudio" style="display: block">
                    @include ('front.esperto.valutazione.valuationAudio')
                </div>
                @break

                @case("Video")
                <div id="valuationVideo" style="display: block">
                    @include ('front.esperto.valutazione.valuationVideo')
                </div>
                @break

                @case("Attività Mouse")
                <div id="valuationMouseActivity" style="display: block">
                    @include ('front.esperto.valutazione.valuationMouseActivity')
                </div>
                @break

                @case("Heatmap")
                <div id="valuationHeatmap" style="display: block">
                    @include ('front.esperto.valutazione.valuationHeatmap')
                </div>
                @break

                @case("Clickmap")
                <div id="valuationClickmap" style="display: block">
                    @include ('front.esperto.valutazione.valuationClickmap')
                </div>
                @break

                @case("Questionari")
                <div id="valuationQuestionary" style="display: block">
                    @include ('front.esperto.valutazione.valuationQuestionary')
                </div>
                @break
            @endswitch

        </div>
    </div>
@endsection

@section('navbar')
    @include('front.navbar')
@endsection