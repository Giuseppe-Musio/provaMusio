@include('front.esperto.valutazione.valuationMenu')

<script type="text/javascript" src="{{ URL::asset('assets/js/plugin/valuationMediaUtility.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/plugin/video/custom-skin.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/video/custom-skin.css')}}">

@include('front.esperto.valutazione.medias.mediaTable', ['button_name' => 'Video', 'medias' => $videos])

<div id="videoModal" class="modal" role="dialog" >
    <div class="modal-dialog" role="document" style="width: 90%; height: 90%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="glyphicon glyphicon-remove" style="color: white;" />
            </button>
        </div>
        <div class="modal-content" style="background-color: black;">
            <div class="modal-body" >
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
