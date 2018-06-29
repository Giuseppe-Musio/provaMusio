<ul class="nav nav-tabs nav-justified">
    @if($title == "Audio")
        <li role="presentation" class="active"><a>Audio</a></li>
    @else
        <li role="presentation"><a
                    href="{{ route('valutazione.audio', ['study' => $study, 'user' => $user]) }}">Audio</a></li>
    @endif

    @if($title == "Video")
        <li role="presentation" class="active"><a>Video</a></li>
    @else
        <li role="presentation"><a
                    href="{{ route('valutazione.video', ['study' => $study, 'user' => $user]) }}">Video</a></li>
    @endif

    @if($title == "Attività Mouse")
        <li role="presentation" class="active"><a>Attività Mouse</a></li>
    @else
        <li role="presentation"><a
                    href="{{ route('valutazione.mouseActivity', ['study' => $study, 'user' => $user]) }}">Attività
                Mouse</a></li>
    @endif

    @if($title == "Heatmap")
        <li role="presentation" class="active"><a>Heatmap</a></li>
    @else
        <li role="presentation"><a href="{{ route('valutazione.heatmap', ['study' => $study, 'user' => $user]) }}">Heatmap</a>
        </li>
    @endif

    @if($title == "Clickmap")
        <li role="presentation" class="active"><a>Clickmap</a></li>
    @else
        <li role="presentation"><a href="{{ route('valutazione.clickmap', ['study' => $study, 'user' => $user]) }}">Clickmap</a>
        </li>
    @endif

    @if($title == "Questionari")
        <li role="presentation" class="active"><a>Questionari</a></li>
    @else
        <li role="presentation"><a href="{{ route('valutazione.questionary', ['study' => $study, 'user' => $user]) }}">Questionari</a>
        </li>
    @endif
</ul>