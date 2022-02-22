<!doctype html>
<html lang="en">
<head>
    @include('body.head')
</head>

<body>
<div class="container">

    @include('body.navbar')
    @include('body.slider')

    <section class="section3 row">
        <div class="col">
            <H2>POPÜLER TESTLER</H2>
            @foreach(\App\Models\Survey::all() as $v)
                <div class=" test row">
                    <div class="col-md-6">
                        <img src="{{asset($v->img)}}" class="yetenekimg" alt="">
                    </div>
                    <div class="col-md-6 yetenekler">
                        <h4>{{$v->title}}</h4>
                        <h2>{{$v->name}}</h2>
                        <p>{{$v->text}}</p>
                        <a href="javascript:void(0)" onclick="getSurvey({{$v->id}})" class="a2"> <img src="{{asset('assets/img/dene.png')}}" alt="">
                            SINAMAK İÇİN TIKLA
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="section4">


    </section>
</div>


@include('body.footer')

<script>

    //***************   NOTIFICATON    **************************************
    var totalQ;
    var remainQ;
    var surveyId;
    var ids;


    function getSurvey(id) {
        surveyId = id;
        console.log("surveyId" + surveyId)
        $.ajax({
            url: '{{url("/survey/getCheck")}}',
            type: "post",
            data: {surveyId: id},
            success: function (response) {
                let data = JSON.parse(response);
                let status = data.status;
                remainQ = data.remainQ;
                totalQ = data.totalQ;
                ids = data.ids;

                console.log(response + "kontrol degeri")
                if (status == 1) {
                    viewResult();
                } else if (status == 2) {
                    getSurveyNext(ids[0].id)
                } else if (status == 3 || status == 4) {
                    $.ajax({
                        url: '{{url("/survey/getSurveyCount")}}',
                        type: "post",
                        data: {surveyId: id},
                        success: function (response) {
                            console.log(response + " response")
                            let data = JSON.parse(response);
                            remainQ = data.remainQ;
                            totalQ = data.totalQ;
                            ids = data.ids;

                            if (remainQ > 0) {
                                getSurveyNext(ids[0].id);
                            } else {
                                viewResult();
                            }
                        },
                        error: function (response) {
                            console.log("count hatası")
                        }
                    });
                }else if(status==5){
                    alert("Teknik Bir hata çıktı Sorular yüklenmemiş")
                }
            },
            error: function (response) {
                console.log("count hatası")
            }
        });


    }

    function getSurveyNext(surveyQId) {

        if ($("input:checked").val()) {
            data = {
                surveyQId: surveyQId,
                surveyId: surveyId,
                answerId: $("input:checked").val(),
            }
            completeSurvey(data);
        }


        $.ajax({
            url: '{{url("/survey/getSurvey")}}',
            type: "post",
            data: {
                surveyId: surveyId,
                surveyQId: surveyQId,
            },
            success: function (response) {

                response = JSON.parse(response);
                remainQ = response.remainQ;
                totalQ = response.totalQ;
                data = response.data;
                viewSurvey(data);
            },
            error: function (response) {
                console.log("sonraki  hatası")
            }
        });
    }

    function completeSurvey(data) {
        $.ajax({
            url: '{{url("/survey/surveyStore")}}',
            type: "post",
            data: data,
            success: function (response) {
                console.log(response + "başarılı")
                $("input:checked").prop("checked", false);
            },
            error: function (response) {
                console.log("sonraki  hatası")
            }
        });
    }

    function viewResult() {

        $.ajax({
            url: '{{url("/survey/getResult")}}',
            type: "post",
            data: {surveyId: surveyId},
            success: function (response) {
                let data = JSON.parse(response);


                let img = '{{url("/") }}/' + data.img;

                let html = '<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">' +
                    '<div class="col p-4 d-flex flex-column position-static" style="width: 400px">' +

                    '<H2 class="mb-0 ">HAYATTA KALMA İHTİMALİN</H2>' +
                    '<h1 class="yetenek-yuzde mb-0">' + data.rate + '%</h1>' +
                    '<h2 class="mb-0 "> <span class="kirmizi">' + data.correctAnswer + '</span>  soruyu doğru bildin </h2>' +
                    '</div>' +
                    '<div class="col-auto d-none d-lg-block"><img src="' + img + '" alt="">' +
                    '</div>' +
                    '<button class="btn btn-success mt-2" onclick="goback()">Geri Dön</button>' +
                    '</div>';

                $('.section4').html(html);

                $('.section3').hide(1000);
            },
            error: function (response) {
                console.log("sonraki  hatası")
            }
        });
    }

    function goback() {
        $('.section3').show(1000);
        $('.section4').html("");

    }

    function viewSurvey(response, i) {

        if (remainQ > 0) {
            data =
                '<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">' +
                '<div class="row col-5 survey_question ">' +
                ' <h4 class="fw-bold text-center mt-3"></h4>' +
                '<p class="fw-bold">' + response.question + '</p>';

            response.answer.forEach(function (element) {
                data += '<div class="form-check mb-2">' +
                    '<input class="form-check-input" type="radio" name="answer' + response.id + '" id="answer' + element.id + '" value="' + element.id + '"/>' +
                    '<label class="form-check-label" for="answer' + element.id + '"> ' + element.answer + ' </label></div>';
            })

            if (remainQ > 1) {
                data += '<div class="text-end">' +
                    '<button type="button" class="btn btn-primary" onclick="getSurveyNext(' + response.id + ' )">Sonraki</button>' +
                    '<button class="btn btn-success pl-2" onclick="goback()">Geri Dön</button>' +
                    ' </div> </div> </div>';
            } else {

                data += '<div class="text-end">' +
                    '<button type="button" class="btn btn-primary" onclick="getSurveyNext(' + response.id + ')">Tamamla</button>' +
                    '<button class="btn btn-success pl-2" onclick="goback()">Geri Dön</button>' +
                    ' </div> ' +
                    '</div></div>';

            }
        } else {
            viewResult();
        }

        // console.log(data);
        $('.section4').html(data)
        $('.section3').hide(1000);
    }
</script>


</body>
</html>

