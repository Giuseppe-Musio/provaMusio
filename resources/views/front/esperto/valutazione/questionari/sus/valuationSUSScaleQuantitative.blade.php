@if(sizeof($susData) > 0)
    <div class="row" style="margin-left: 0px; margin-right: 0px;">
        <div class="text-center"><h3 align="center">Scale Qualitative</h3></div>
        <div style="width: 100%; margin-top: 40px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                 style="padding: 0;">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="height: 100%;">
                    <img src=" {{ URL::asset("assets/images/scaleQuantitative/susHeadLegends.png") }}"
                         style="width: 100%">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"
                     style="padding: 0;">
                    <img src=" {{ URL::asset("assets/images/scaleQuantitative/susHeadCenter.png") }}"
                         style="width: 100%">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"
                     style="padding: 0;">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                 style="height: 100%; padding: 0;">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"
                     style="padding-top: 5px;">
                    <img src=" {{ URL::asset("assets/images/scaleQuantitative/susMiddleLegends.png") }}"
                         style="width: 100%">
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9"
                     style="padding: 0;">
                    <img src=" {{ URL::asset("assets/images/scaleQuantitative/susMiddleTitles.png") }}"
                         style="width: 100%">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"
                     style="padding: 0;">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                 style="padding: 0;">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                </div>
                <div id="idLine" class="col-lg-8 col-md-8 col-sm-8 col-xs-8"
                     style="padding: 0;">
                    <img src=" {{ URL::asset("assets/images/scaleQuantitative/susLine.png") }}" style="width: 100%">
                    <h4 id="tacca">|</h4>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"
                     style="padding: 0;">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                 style="height: 100%; padding: 0;">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="height: 100%;">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"
                     style="height: 100%; padding: 0;">
                    <img src=" {{ URL::asset("assets/images/scaleQuantitative/susFooter.png") }}" style="width: 100%">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"
                     style="height: 100%; padding: 0;">
                </div>
            </div>

        </div>
    </div>
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif

<!-------------------------------------------------------------------------->

@if(sizeof($susData) > 0)
    <script type="text/javascript">
        $(document).ready(function () {
            var taccaPosition = parseFloat({{$susData['total_sus_score']}});
            $("#tacca").css('left', taccaPosition + "%");
        });
    </script>


    <style type="text/css">

        #tacca {
            position: absolute;
            top: 0;
            padding: 0;
            margin: 0;
            color: red;
            width: 100%;
            z-index: 100;
        }

        @media (min-width: 480px) {
            #tacca {
                font-size: 250%;
            }
        }

        @media (min-width: 768px) {
            #tacca {
                font-size: 400%;
            }
        }

        @media screen and (min-width: 1024px) {
            #tacca {
                font-size: 400%;
            }
        }

        @media screen and (min-width: 1200px) {
            #tacca {
                font-size: 300%;
            }
        }
    </style>
@endif