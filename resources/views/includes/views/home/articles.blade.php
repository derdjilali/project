@foreach ($articles as $item)
<div class="container mil-p-120-0">
    <div class="row justify-content-between align-items-center">
        <div class="mil-12 col-xl-5 mil-mb-120">

            <h3 class="mil-link mil-softened-60 mil-appearance mil-mb-30">Algeria Venture</h3>
            <h3 class="mil-appearance mil-mb-30">{{$item->title}}</h3>
            <p class="mil-appearance mil-mb-30">
                {{$item->desc}}
            </p>

            <!-- buttons -->
            <div class="mil-appearance">
                <a href="about.php"
                    class="mil-button mil-button-lg mil-scale-down-trigger mil-buttons-space"><span>view more</span></a>

            </div>
            <!-- buttons end -->

        </div>
        <div class="mil-12 col-xl-6 mil-mb-120">

            <!-- collage -->
            <div class="mil-collage-1">
               
                <div class="mil-image-1 mil-appearance">
                    <div class="mil-just-image mil-image-square">
                        <!-- back image -->
                        <img src="pictures/Landingpage/{{$item->media}}" alt="img" class="mil-scale-img"
                            data-value-1="1" data-value-2="1.2">
                    </div>
                </div>
                <div class="mil-image-2 mil-appearance">
                    <div class="mil-just-image">
                        <!-- front image -->
                        <!--img src="img/home.jpeg" alt="img" style="object-position: right"-->
                    </div>
                </div>
            </div>
            <!-- collage end -->

        </div>
    </div>
</div>
@endforeach

