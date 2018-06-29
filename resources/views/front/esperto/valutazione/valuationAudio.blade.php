@include('front.esperto.valutazione.valuationMenu')

<script type="text/javascript" src="{{ URL::asset('assets/js/plugin/valuationMediaUtility.js') }}"></script>

<!-------------------------------------------------------------------------------------->

@include('front.esperto.valutazione.medias.mediaTable', ['button_name' => 'Audio', 'medias' => $audios])
<!--
  Don't use the "5-unsafe" CDN version in your own code. It will break on you.
  Instead go to videojs.com and copy the CDN urls for the latest version.
-->

<div id="audioModal" class="modal" role="dialog" style="vertical-align: middle;">
    <div class="modal-dialog" role="document" style="width: 50%; height: 50%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="glyphicon glyphicon-remove" style="color: white;" />
            </button>
        </div>
        <div class="modal-content" style="background-color: black;">
            <div class="modal-body">
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>