

<section class="slider">

    <div class="container" style="top: 50px;">

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                @foreach(\App\Models\Slider::orderBy("order","asc")->get() as $k=>$v)
                    <div class="carousel-item @if($v->order==1) active @endif">
                        <img src="{{asset($v->img)}}" class="d-block w-75 float-end" alt="...">
                        <div class="carousel-caption1 ">
                            <h2 class="carousel-header">{{mb_strtoupper($v->title)}}</h2>
                            <h3 class="carousel-vertical">{{mb_strtoupper($v->subTitle)}}</h3>
                            <p>{{mb_strtoupper($v->text)}}</p>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev1  " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <img src="{{asset('assets/img/btn_prev_passive.png')}}" alt="">
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next1  " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <img src="{{asset('assets/img/btn_next_ACTIVE.png')}}" alt="">
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>