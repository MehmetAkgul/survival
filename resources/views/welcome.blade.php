<!doctype html>
<html lang="en">
<head>
    @include('body.head')
</head>

<body>
<div class="container">

@include('body.navbar')
@include('body.slider')

        <section>

        <div class="content">
            <h1>h1 başlık</h1>
            <h2>h2 başlık</h2>
            <h3>h3 başlık</h3>


            <div class="row g-0">
                <div class="col-sm-6 col-md-4 col-lg-2 bg-danger">Sütun 1</div>
                <div class="col-sm-6 col-md-4 col-lg-2 bg-success">Sütun 2</div>
                <div class="col-sm-6 col-md-4 col-lg-2 bg-info">Sütun 3</div>
            </div>
        </div>

        </section>
    <section>
        <div class="card">
            <div class="card-header">
              <h2> Popüler Testler</h2>
            </div>
            <div class="card-body">
                <div class="card">
                    
                    <div class="card-body">
<div class="col-md-6">
    <img src="" alt="">
</div>
<div class="col-md-6"></div>

                    </div>
                </div>
                
            </div>
        </div>
    </section>

</div>



@include('body.footer')
</body>
</html>

