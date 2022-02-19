<style>
    .bottomright {
        position: absolute;
        bottom: 8px;
        right: 16px;
        font-size: 18px;
    }

    .container {
        position: relative;
    }

    .carousel-control-next1 {
        position: absolute;
        top: 80% !important;
        bottom: 100% !important;
        right: 0 !important;
        padding: 0;
        margin: 0;
        z-index: 1;
        opacity: .5;
        border: none;
        transition: opacity .15s ease;
    }

    .carousel-control-prev1 {
        position: absolute;
        top: 90% !important;
        bottom: 100% !important;
        right: 0 !important;
        padding: 0;
        margin: 0;
        z-index: 1;
        opacity: .5;
        transition: opacity .15s ease;
        border: none;
    }
</style>

<section>

    <div class="container  " style="top: 50px;">

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('assets/img/1.png')}}" class="d-block w-75 float-end" alt="...">
                    <div class="carousel-caption1 ">
                        <h2 class="carousel-header">KENDİNİ SINA</h2>
                        <h3 class="carousel-vertical">First slide label</h3>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/img/1.png')}}" class="d-block w-75 float-end" alt="...">
                    <div class="carousel-caption1  ">
                        <h2 class="carousel-header">KENDİNİ SINA</h2>
                        <h3 class="carousel-vertical">First slide label</h3>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/img/1.png')}}" class="d-block w-75 float-end" alt="...">
                    <div class="carousel-caption1 ">
                        <h2 class="carousel-header">KENDİNİ SINA</h2>
                        <h3 class="carousel-vertical">First slide label</h3>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
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