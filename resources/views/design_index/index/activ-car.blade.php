@extends('design_index.layout.layout')

<style>
   li {
    list-style-type: none; /* Убираем маркеры */
   }
   #mt-section-1 > ul {
    color:#000;
    font-size:18px;
   }
   p {
       font-size:large;
   }
</style>

@section('meta-tags')
    <link rel="stylesheet" href="/new_design/css/opportunity-responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fontawesome/font-awesome.css">
    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection
<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLadialogrgeModalLabel">
    <div class="modal- modal-lg">
        <div class="modal-content" style="height:700px; width:100%;padding-top: 50px;">
            <iframe id="myFrame" style="width: 100%; height: 100%;"
                    frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
            </iframe>
        </div>
    </div>
</div>
@section('content')

    <main id="mt-main">
        <section class="mt-mainslider4 add" style="
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url('/new_design/images/Partner/b-0.png');
            margin-left: auto;
            margin-right: auto;
            position: relative;
            min-height: 258px;
        ">
                             <div class="holder">
								<div class="texts" style="font-family: Akrobat;color: #000;position: absolute;left: 10%;top: 24%;width: 458px;font-weight: bold;">
									<span class="mb-0" style="font-size:42px;font-weight:bold;">СОЦИАЛЬНАЯ ПРОГРАММА ДЛЯ СЧАСТЛИВОЙ СЕМЬИ</span>
                                </div>
							</div>
        </section>
        <section class="mt-section-1" style="font-family:Akrobat;">
            <div class="container" style="margin-top: 0;padding:50px 10px; color:#000;">
                <div class="row row-1 text-center">
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xs-12" style="margin-bottom:15px; text-align: left;">
                            <div class="packet-body">
                                <div class="my-img-circle text-center" style="padding: 0;">
                                    <img class="rounded-circle " src="/new_design/images/Partner/activ.png" width='790' height='380' alt="">
                                    <div class="holder" style="position: absolute;top: 2%;text-align:left;left: 10%;">
							        	<div class="texts" style="font-family: Akrobat;color: #000;position: absolute;left: 10%;top: 32%;width: 370px;font-weight: bold;">
							        		<span class="mb-0" style="font-size:44px;font-weight:bold;color:#ffd700;line-height: 1;">СВОЙ АВТОМОБИЛЬ ЗА СЧЕТ КОМПАНИИ</span>
                                            <p class="mb-0" style="font-size:20px;font-weight:bold;color:#fff;">Выполни условия за 12 месяцев и получи АВТОМОБИЛЬ ЗА СЧЕТ компании!</p>
                                       </div>
							        </div>
                                </div>
                            </div>
                            
                            <h4 style="font-size: 30px;font-weight: bold; text-align:center;">АВТО ПО ПРОГРАММЕ "ACTIV"</h4>
                           
                            <p><span style="font-weight:bold;"> Хотите стать одним из тех кому мы подарим автомобиль?</span></p>
                            <p><span style="font-weight:bold;">Тогда дочитайте до конца!</span></p>
                            <p>Став участником<span style="font-weight:bold;"> Социальной программы GAP и получив статус Партнер Qyran Partners Club</span> Вы сможете приобрести автомобиль за счет компании на сумму  3 000 000 KZT</p>
                            <p ><span style="font-weight:bold;">Для этого Вам необходимо выполнить условия, закрыв 4 статусов течений 6 месяцев:</span></p>
                            <div class="col-sm-12">
                                <div class="text-center" style="padding: 0 60px;">
                                    <img class="rounded-circle " src="/new_design/images/Partner/Жилье Актив.png" alt="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center" style="padding: 0 60px;">
                                    <img class="rounded-circle " src="/new_design/images/Partner/Жилье Актив1.png" alt="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center" style="padding: 0 60px;">
                                    <img class="rounded-circle " src="/new_design/images/Partner/Жилье Актив2.png" alt="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center" style="padding: 0 60px;">
                                    <img class="rounded-circle " src="/new_design/images/Partner/Авто Актив.png" alt="">
                                </div>
                            </div>
                            
                            <p style="color:red;font-weight:bold;">Важно!</p>
                            <p>При не выполнении <span style="font-weight:bold;"> 4 условий за 6 месяцев </span>Вы не сможете получить Автомобиль за счет компании, но Вы сможете получить рассрочку.</p>
                            <p><span style="font-weight:bold;">Не упустите свой шанс обладателем своего жилья!</span></p>

                            <div class="col-sm-6 text-center"> 
                            <a href="/presentation/Презент.pdf" target="_blank" class="want-to-be-partner-box-a">
                                     <div class="want-to-be-partner-box text-center" style="font-size:15px;">
                                         СКАЧАТЬ ПРЕЗЕНТАЦИЮ
                                     </div>
                                 </a>
                            </div>
                             <div class="col-sm-6 text-center"> 
                                 <a href="/form" class="want-to-be-partner-box-a">
                                   <div class="want-to-be-partner-box text-center" style="font-size:15px;">
                                         УЧАСТВОВАТЬ В ПРОГРАММЕ
                                   </div>
                                 </a>
                             </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xs-12" style="margin-bottom:15px;">
                          <h3 style="text-align: right;">СОЦИАЛЬНЫЕ ПРОГРАММЫ</h3>
                            <div class="packet-body">
                                 <ul style="text-align: right;font-size:18px;">
                                        <li><a href="/baspana">Жильё в рассрочку "BASPANA"</a></li>
                                      <li><a href="/baspana-plus">Жильё в рассрочку "BASPANA+"</a></li>
                                      <li><a href="/tulpar">Авто в рассрочку "TULPAR"</a></li>
                                      <li><a href="/tulpar-plus">Авто в рассрочку "TULPAR+"</a></li>
                                      <li><a href="/activ-car">Авто по программе "ACTIV"</a></li>
                                      <li><a href="/activ-home">Жильё по программе "ACTIV"</a></li>
                                 </ul>
                            </div>
                            
                            <h3 style="text-align: right;">НОВОСТИ СОЦИАЛЬНОЙ ПРОГРАММЫ</h3>
                            <ul style="float:right;text-align: right;">
                                      <li>
                                                   <div class="card" style="margin-bottom:4px;">
                                                       <div class="card-horizontal" style="display: flex;flex: 1 1 auto;">
                                                           <div class="card-body">
                                                               <h4 class="card-title">Свой дом за счет компании!</h4>
                                                            </div>
                                                            <div class="img-square-wrapper">
                                                               <img class="" src="/new_design/images/Partner/bb.png" width="60" height="60" alt="Card image cap">
                                                            </div>
                                                       </div>
                                                   </div>
                                      </li>
                                      <li>
                                                    <div class="card">
                                                       <div class="card-horizontal" style="display: flex;flex: 1 1 auto;">
                                                           <div class="card-body">
                                                               <h4 class="card-title">Свой авто за счет компании!</h4>
                                                            </div>
                                                            <div class="img-square-wrapper">
                                                               <img class="" src="/new_design/images/Partner/bb.png" width="60" height="60" alt="Card image cap">
                                                            </div>
                                                       </div>
                                                   </div>
                                      </li>
                                 </ul>
                        </div>
                    </div>
                </div>
             </div>
        </section>

    </main>
@endsection

<style>
    #mCSB_1_dragger_horizontal {
        background: #ff0000 !important;
    }
</style>
@section('js')
    <script>
        function openModal(tag_object) {
            var videoIdInYouTube = $(tag_object).data('youtube-url');
            var url = ('https://www.youtube.com/embed/' + videoIdInYouTube);
            document.getElementById("myFrame").src = url;
            $('#myModal').modal('toggle');
        }
    </script>
@endsection


                               
                                