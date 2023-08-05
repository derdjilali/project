<a data-fancybox data-no-swup href="https://www.youtube.com/watch?v=lgURXNd4ka0"
    class="mil-video-section mil-word-1-trigger mil-accent-trigger" style="min-height: 100vh;">
    @foreach ($presentationvedio as $item)
    <div class="mil-image-frame">
        <video class="mil-video-background mil-scale-img" data-value-1="1" data-value-2="1.1" autoplay="autoplay"
            loop="loop" muted="" playsinline="" oncontextmenu="return false;" preload="auto">
            <source src="pictures/Landingpage/{{$item->media}}">
        </video>
    </div>
    @endforeach

    <div class="mil-overlay-80"></div>
    <div class="mil-inner-text mil-text-center mil-p-120-120" style="padding-top: 270px;">
        <div class="container mil-relative">

            <div
                class="mil-button mil-button-lg mil-button-rounded mil-button-linear mil-button-light mil-icon mil-appearance mil-mb-30">
                <span><i class="fas fa-play" style="transform: translateX(2px)"></i></span>
            </div>
            <h3 class="mil-light mil-appearance mil-mb-30">Give live your <span class="mil-accent">ideas</span><br />
                Greate innovate <br />Accelerate</h3>
            <p class="mil-link mil-shortened-50 mil-softened-20 mil-appearance mx-auto">Watch our promo
                video</p>
        </div>
    </div>
</a>
