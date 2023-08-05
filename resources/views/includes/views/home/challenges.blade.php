<div class="mil-blog-section">
    <div class="container mil-p-120-90">
        <div class="row justify-content-between mil-mb-120">
            <div class="col-xl-5">
                <h3 class="mil-link mil-appearance mil-accent mil-mb-30">Our challenges</h3>
                <h3 class="mil-mb-30 mil-appearance">Our Most popular challenges.</h3>
            </div>
            <div class="col-xl-6">
                <p class="mil-appearance mil-mt-55-adapt mil-mb-30">Learn about our latest challenges
                </p>
                <div class="mil-appearance">
                    <a href="all-challenges.php" class="mil-link-hover">View all</a>
                </div>

            </div>
        </div>
        <div class="row">
            @foreach ($challenges as $challenge)
                <div class="col-xl-4">
                    <a href="{{route('challenge.show',$challenge->id)}}"
                        class="mil-card-1 mil-icon-2-trigger mil-accent-trigger mil-appearance mil-mb-30">
                        <div class="mil-cover mil-square">
                            <div class="mil-image-frame">
                                <img src="pictures/challenges/{{$challenge->photo}}" alt="img">
                            </div>
                        </div>
                        <div class="mil-overlay mil-inside mil-gradient-overlay">
                            <div class="mil-description">
                                <div class="mil-post-info mil-mb-30">
                                    <span class="mil-accent mil-link">active</span>
                                    <span class="mil-dot-divider mil-link mil-accent">&#x2022;</span>
                                    <span class="mil-link mil-softened-30">{{$challenge->start_date}}</span>
                                </div>
                                <h5 class="mil-light">{{$challenge->title}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>
