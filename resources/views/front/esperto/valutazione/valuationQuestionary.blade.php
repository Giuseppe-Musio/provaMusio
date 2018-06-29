@include ('front.esperto.valutazione.valuationMenu')

<div class="row" style="margin-top: 30px;">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="panel">
            <div class="panel-body">
                <div id="questionaryMenu" class="row" style="text-align: center;">
                    <div style="width: 400px; margin: 0 auto;">
                        <ul class="nav nav-pills">
                            <li id="liAttrakdiff" role="presentation" class="active"><a id="questionaryAttrakdiff" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Attrakdiff</a></li>
                            <li id="liNasatlx" role="presentation"><a id="questionaryNasatlx" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Nasatlx</a></li>
                            <li id="liNPS" role="presentation" class="dropdown">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">NPS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li id="liNPSScore"><a id="questionaryNPSScore" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Score</a></li>
                                    <li id="liNPSDiagram"><a id="questionaryNPSDiagram" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Diagramma</a></li>
                                </ul>
                            </li>
                            <li id="liSUS" role="presentation" class="dropdown">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">SUS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li id="liSUSGeneralScore"><a id="questionarySUSGeneralScore" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Punteggio Generale</a></li>
                                    <li id="liSUSLearnbility"><a id="questionarySUSLearnbility" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Apprendibilità</a></li>
                                    <li id="liSUSUsability"><a id="questionarySUSUsability" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Usabilità</a></li>
                                    <li id="liSUSGraphicBoxPlot"><a id="questionarySUSGraphicBoxPlot" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Grafico Box Plot</a></li>
                                    <li id="liSUSScaleQuantitative"><a id="questionarySUSScaleQuantitative" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Scale Qualitative</a></li>
                                    <li id="liSUSGraphicDetailUsers"><a id="questionarySUSGraphicDetailUsers" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Grafico Dettaglio Utenti</a></li>
                                </ul>
                            </li>
                            <li id="liUmux" role="presentation" class="dropdown">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">Umux <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li id="liUmuxScore"><a id="questionaryUmuxScore" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Score</a></li>
                                    <li id="liUmuxBoxchart"><a id="questionaryUmuxBoxchart" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Boxchart</a></li>
                                    <li id="liUmuxHistogram"><a id="questionaryUmuxHistogram" onclick="showQuestionaryValuation(this)" style="cursor: pointer;">Histogram</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px;">
                    <div id="questionaryContent">
                        <div id="contentAttrakdiff" class="show">
                            @include('front.esperto.valutazione.questionari.attrakdiff.valuationAttrakdiff')
                        </div>
                        <div id="contentNasatlx" class="hide">
                            @include('front.esperto.valutazione.questionari.nasatlx.valuationNasatlx')
                        </div>
                        <div id="contentNPSScore" class="hide">
                            @include('front.esperto.valutazione.questionari.nps.valuationNPSScore')
                        </div>
                        <div id="contentNPSDiagram" class="hide">
                            @include('front.esperto.valutazione.questionari.nps.valuationNPSDiagram')
                        </div>
                        <div id="contentSUSGeneralScore" class="hide">
                            @include('front.esperto.valutazione.questionari.sus.valuationSUSGeneralScore')
                        </div>
                        <div id="contentSUSLearnability" class="hide">
                            @include('front.esperto.valutazione.questionari.sus.valuationSUSLearnbility')
                        </div>
                        <div id="contentSUSUsability" class="hide">
                            @include('front.esperto.valutazione.questionari.sus.valuationSUSUsability')
                        </div>
                        <div id="contentSUSGraphicBoxPlot" class="hide">
                            @include('front.esperto.valutazione.questionari.sus.valuationSUSGraphicBoxPlot')
                        </div>
                        <div id="contentSUSScaleQuantitative" class="hide">
                            @include('front.esperto.valutazione.questionari.sus.valuationSUSScaleQuantitative')
                        </div>
                        <div id="contentSUSGraphicDetailUsers" class="hide">
                            @include('front.esperto.valutazione.questionari.sus.valuationSUSGraphicDetailUsers')
                        </div>
                        <div id="contentUmuxScore" class="hide">
                            @include('front.esperto.valutazione.questionari.umux.valuationUmuxScore')
                        </div>
                        <div id="contentUmuxBoxchart" class="hide">
                            @include('front.esperto.valutazione.questionari.umux.valuationUmuxBoxchart')
                        </div>
                        <div id="contentUmuxHistogram" class="hide">
                            @include('front.esperto.valutazione.questionari.umux.valuationUmuxHistogram')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('assets/js/plugin/questionary.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugin/dropdown.js') }}"></script>

