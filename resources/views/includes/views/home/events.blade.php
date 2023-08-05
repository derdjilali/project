<div class="mil-team-section">
    <div class="container mil-p-120-90">
        <div class="row justify-content-between mil-mb-">
            <div class="col-xl-12 text-center">
                <h3 class="mil-link mil-accent mil-mb-30">Algeria Venture</h3>
                <h3 class="mil-mb-30 mil-appearance">Our events</h3>
            </div>
        </div>
    </div>
</div>
<div class="container mil-p-120-90">
    <div class="row">
        @foreach ($events as $event)
            <div class="col-xl-4">
                <a href="{{route('event.show',$event->id)}}"
                    class="mil-card-1 mil-icon-2-trigger mil-accent-trigger mil-appearance mil-mb-30">
                    <div class="mil-cover mil-square">
                        <div class="mil-image-frame">
                            <img src="pictures/events/{{$event->photo}}" alt="img">
                        </div>
                    </div>
                    <div class="mil-overlay mil-inside mil-gradient-overlay">
                        <div class="mil-description">
                            <div class="mil-post-info mil-mb-30">

                                <span class="mil-dot-divider mil-link mil-accent">&#x2022;</span>
                                <span class="mil-link mil-softened-30">{{$event->start_date}}</span>
                            </div>
                            <h5 class="mil-light">{{$event->title}}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>
