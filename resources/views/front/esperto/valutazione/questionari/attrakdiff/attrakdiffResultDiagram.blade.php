@if(sizeof($attrakdiffData) > 0 && $attrakdiffData[7] != 0 && $attrakdiffData[8] != 0)
    @php
        $diagramma = URL::asset('assets/images/diagram.png');
        $p = URL::asset('assets/images/p.png');

        $diagramma_size=getimagesize($diagramma);
        $p_size=getimagesize($p);

        $dest = imagecreatetruecolor($diagramma_size[0], $diagramma_size[1]);

        //RETTANGOLO CONFIDENZA ---------------------------------------
        $rettangolo_confidenza=imagecreatetruecolor($attrakdiffData[7], $attrakdiffData[8]);

        // Turn off alpha blending and set alpha flag

        imagealphablending($rettangolo_confidenza, false);
        imagesavealpha($rettangolo_confidenza, true);

        for ($x=0;$x<$attrakdiffData[7];$x++){
          $opacity = (int) (127.0/30 * 12);
          $color = imagecolorallocatealpha($rettangolo_confidenza, 255, 191, 127, $opacity);
          imageline  ( $rettangolo_confidenza  , $x , 0  , $x  , $attrakdiffData[8]-1  , $color  );
        }
        //----------------------------------------------------------

        $sfondo = imagecreatefrompng($diagramma);
        $icona  = imagecreatefrompng($p);

        imagecopy($dest, $sfondo, 0, 0, 0, 0, $diagramma_size[0], $diagramma_size[1]);
        imagecopy($dest, $rettangolo_confidenza, $attrakdiffData[5]-($attrakdiffData[7]/2)+(($attrakdiffData[7]/14)/2), $attrakdiffData[6]-($attrakdiffData[8]/2)+(($attrakdiffData[8]/14)/2), 0, 0, $attrakdiffData[7], $attrakdiffData[8]);
        imagecopy($dest, $icona, $attrakdiffData[5]-($attrakdiffData[7]/2)+(($attrakdiffData[7]-14)/2), $attrakdiffData[6]-($attrakdiffData[8]/2)+(($attrakdiffData[8]-14)/2), 0, 0, $p_size[0], $p_size[1]);
        header("Content-type: image/png");
        ob_start();
        imagepng($dest);
        $imagedata = ob_get_contents();
        ob_end_clean();
        $base64 = base64_encode($imagedata);
        echo '<img src="data:image/png;base64,'.$base64.'"/>';
    @endphp
@else
    @include('front.esperto.valutazione.questionari.attrakdiff.errorAttrakdiffData')
@endif
