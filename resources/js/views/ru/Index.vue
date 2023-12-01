<template>

    <main>

        <div class="slideshow-container" >



            <div class="mySlides fade_slide"  style="display:none;">
                <div class="slide-text" >
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold';display:none;">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;display:none;">For a living</h1>
                </div>
<!--                <link rel="preload" fetchpriority="high" as="image" href="/img/1.webp" type="image/webp">-->
                <v-lazy-image src="/img/1.webp" style="width:100%;" alt="SlideShow" width="100%" height="auto"/>

                <div class="buttons-overlay" >
                    <a href="/ru/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a>
                    <a href="/ru/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a>
                </div>
            </div>

            <div class="mySlides fade_slide"  style="display:none;">
                <div class="slide-text" >
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold';display:none;">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;display:none;">For a living</h1>
                </div>
                <v-lazy-image src="/img/2.webp" style="width:100%;" alt="SlideShow" />

                <div class="buttons-overlay" >
                    <a href="/ru/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a>
                    <a href="/ru/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a>
                </div>
            </div>


            <div class="mySlides fade_slide">

                <div class="slide-text"  style="display:none;">
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold'">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;">For a living</h1>
                </div>

                <v-lazy-image src="/img/3.webp"  style="width:100%;" alt="SlideShow"/>

                <div class="buttons-overlay">
                    <a href="/ru/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a>
                    <a href="/ru/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a>
                </div>

            </div>

            <div  class="mySlides fade_slide">

                <div class="slide-text"  style="display:none;">
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold'">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;">For a living</h1>
                </div>

                <v-lazy-image src="/img/4.webp"  style="width:100%;" alt="SlideShow"/>

                <div class="buttons-overlay">
                    <a href="/ru/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a>
                    <a href="/ru/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a>
                </div>

            </div>






            <div class="buttons-overlay2">
                <a href="/ru/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a>
                <a href="/ru/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a>
            </div>


            <div id="dot_navigation" >
                <span class="dot" number="1" @click="this.currentSlide(1)"></span>
                <span class="dot" number="2" @click="this.currentSlide(2)"></span>
                <span class="dot" number="3" @click="this.currentSlide(3)"></span>
                <span class="dot" number="4" @click="this.currentSlide(4)"></span>


            </div>

        </div>


        <div class="row" id="main-features">

            <div class="col-md-9 col-sm-12" id="main-features-left">

                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/nofees-icon1.png"  alt="wave-icon"  data-uk-img width="57px" height="50px"/>
                    </div>
                    <div class="">
                        <p>Депозит и вывод без комиссии</p>
                    </div>

                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/deposit-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>Низкий минимум депозит 100$</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/fast-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>Быстрое исполнение 0 комиссии</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/analysis-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>Свободно инструменты анализа</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12" id="main-features-right">
                <div class="">
                    <a href="/ru/signup"><v-lazy-image src="/elis/img/ico11.png" id="ico11"  alt="wave-icon"  data-uk-img/></a>
                </div>

                <div id="start-trading">
                    <b>НАЧАТЬ СВОЮ ТОРГОВЛЮ </b>
                    <span>теперь, чтобы стать экспертом в торговле.</span>
                    <b><a href="/ru/signup">ПРИСОЕДИНЯЙСЯ СЕЙЧАС!</a></b>
                </div>
            </div>

        </div>


        <!-- section content begin -->
        <div class="uk-container in-wave-4uk-container in-wave-4">
            <div class="uk-grid uk-flex uk-flex-center">


                <div class="col-sm-12" id="main-section-2">
                    <div class="col-sm-12">
                        <div class="" id="left-section">
                            <p class="uk-margin-remove-bottom">ПОЛНЫЙ ИНВЕСТИЦИОННЫЙ ВЫБОР</p>
                        </div>
                    </div>
                    <div class="col-sm-12" id="right-section">
                        <div class="">
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom">Получите сверхконкурентные спреды и комиссии по всем классам активов.</p>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom">Получите еще более высокие ставки по мере увеличения вашего объема.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12"  id="main-section-3">
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">FX Распространение до</span></p>
                            <h1 class="uk-margin-top"> $ 0 за сделку</h1>
                            <p  class="Bold_blue hint">0.1 типун </p>

                            <p> Торгуйте 182 валютными спотовыми парами и 140 форвардными контрактами на основные, второстепенные, экзотические и металлы..</p>

                        </div>
                        <a href="/ru/forexbroker">Читать далее >></a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">

                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">Акции</span></p>
                            <h1 class="uk-margin-top">0.2$ за акцию</h1>

                            <p>Инвестируйте в мировые акции.</p>
                            <p>на US500 Открывайте длинную или короткую позицию по 9000+ инструментам с узкими спредами и низкими комиссиями.</p>

                        </div>
                        <a href="/ru/futuretrading">Читать далее >></a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">Сырьевые товары</span></p>
                            <h1 class="uk-margin-top">$ 0 за сделку</h1>

                            <p>Разнообразьте свой портфель широким ассортиментом товаров.</p>
                            <p>Торгуйте широким спектром товаров, таких как CFD, фьючерсы, опционы, спотовые пары и т. Д.</p>

                        </div>
                        <a href="/ru/future">Читать далее >></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">торговля драгоценными металлами</span></p>
                            <h1 class="uk-margin-top">$ 0 за сделку</h1>


                            <p>Торгуйте золотом, серебром, медью, платиной и палладием против основных валют.</p>
                            <p> по акциям США, доступ к более чем 19 000 акций на основных и развивающихся рынках на 36 биржах по всему миру.</p>
                        </div>
                        <a href="/ru/preciousmetals">Читать далее >></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">торговля энергией будущего</span></p>
                            <h1 class="uk-margin-top"> $ 0 за сделку</h1>

                            <p> Энергии будущего, торгуемые в JMI Brokers, включают: легкую малосернистую нефть, природный газ.</p>

                        </div>
                        <a href="/ru/futureenergies">Читать далее >></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">Торговля индексами</span></p>
                            <h1 class="uk-margin-top"> $ 0 за сделку</h1>

                            <p> JMI Brokers предлагает торговлю самыми продаваемыми фондовыми индексами в мире: индекс Доу-Джонса, E-mini S&P 500 и E-mini NASDAQ 100.</p>

                        </div>
                        <a href="/ru/futuretrading">Читать далее >></a>
                    </div>
                </div>
            </div>

        </div>

        <!-- section content end -->



        <!-- section content begin -->
        <div class="alternative" id="main-section-6">
            <div class="uk-container in-wave-4" id="main-section-66">
                <div class="uk-grid uk-flex">
                    <div class="uk-width-4-5@m">
                        <div id="section-6-title">
                            <h1 class="uk-margin-medium-bottom">АЛЬТЕРНАТИВНЫЕ ИНВЕСТИЦИИ</h1>
                        </div>
                    </div>

                    <div class="col-sm-12" id="main-pricing-list">
                        <div class="in-wave-pricing-list" >

                            <div style="display:none;" class="col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <v-lazy-image src="/elis/img/testdiv-1.jpg" alt="Prices" />

                                <div class="package">
                                    <h4>Управление благосостоянием</h4>

                                    <ul class="package-features-list package-features-list1">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Откройте свой кошелек сейчас</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Только физическая торговля</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Кредитное плечо 1: 1 или 1: 2</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Вашим портфелем управляют эксперты</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Минимальный депозит $ 10,000</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Начните свое портфолио прямо сейчас</a>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <v-lazy-image src="/elis/img/testdiv-22.jpg" alt="Prices"/>

                                <div class="package">

                                    <h4 >Получите свою кредитную карту</h4>


                                    <ul class="package-features-list package-features-list1">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Мгновенное снятие наличных в любом банкомате мира</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Закажи карту сейчас</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Наслаждайтесь покупками со всего мира с помощью платежной карты Union</li>


                                    </ul>
                                    <a href="/ru/unionpaycard" class="uk-button uk-button-default uk-border-rounded uk-align-center" >ЗАКАЖИТЕ КАРТУ СЕЙЧАС</a>
                                </div>
                            </div>





                            <div class="col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <v-lazy-image src="/elis/img/social-trade-offer1.jpg" alt="Social Trading" />
                                <div class="package">

                                    <h4>Социальная торговля</h4>

                                    <ul class="package-features-list package-features-list1">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Счет Free Copy с предпочтительным соотношением портфеля</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Мгновенный перевод между всеми вашими счетами.</li>


                                    </ul>
                                    <a href="/ru/cpanel/home" class="uk-button uk-button-default uk-border-rounded uk-align-center">Начните свое портфолио прямо сейчас</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- section content begin -->
        <div id="main-section-5" class="uk-section uk-section-muted uk-padding-large in-wave-3 uk-background-contain uk-background-center" >
            <div class="col-sm-12">
                <div class="col-sm-12" >
                    <div class="col-md-6 col-sm-12">
                        <h1 class="">Market analysis and trade inspiration</h1>
                        <p>JMI Brokers continue to challenge ourselves to provide traders with what they need to succeed to be Expert Trader in forex in addition to have experience in this trade</p>
                        <div class="col-sm-12 uk-text-center padding-left-0">
                            <div class="col-sm-6 padding-left-0">
                                <h5 class="uk-margin-small-top">Стратегии &amp; Обсуждения</h5>
                            </div>
                            <div class="col-sm-6 padding-left-0">
                                <h5 class="uk-margin-small-top">Прогнозы &amp; Образование</h5>
                            </div>
                        </div>

                        <div class="col-sm-12 margin-top-10" >
                            <div class="col-sm-4">
                                <i class="fa fa-trophy"></i>
                                <p class="">Отмеченная наградами поддержка</p>
                            </div>
                            <div class="col-sm-4">
                                <i class="fa fa-university "></i>
                                <p class="">РЕГУЛИРУЕТСЯ Республикой Вануату</p>
                            </div>
                            <div class="col-sm-4">
                                <i class="fa fa-history "></i>
                                <p class="">12 лет опыта</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="uk-inline uk-dark in-wave-video uk-margin-small-bottom">
                            <v-lazy-image class="uk-border-rounded uk-width-1-1" src="/wave/img/in-lazy.gif" data-src="/wave/img/in-wave-image-1.jpg" alt="wave-video" width="533" height="355" data-uk-img/>
                            <div class="uk-position-center">
                                <a href="#modal-media-youtube" data-uk-toggle>
                                    <div class="in-play-button"></div>
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div id="modal-media-youtube" class="uk-flex-top" data-uk-modal>
                                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical in-iframe">
                                    <button class="uk-modal-close-outside" type="button" data-uk-close></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->








        <!-- section content begin -->
        <div class="sec2" id="main-section-6">
            <div class="uk-container in-wave-4" >
                <div class="uk-grid uk-flex ">
                    <div class="uk-width-4-5@m">
                        <div id="section-6-title">
                            <h1 class="uk-margin-medium-bottom">Полный пакет для каждого трейдера</h1>
                        </div>
                    </div>

                    <div class="col-sm-12" id="main-pricing-list">
                        <div class="in-wave-pricing-list" >

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">Минимальное финансирование<span class="price">100 USD </span></p>
                                    <h2 class="title">Счет с фиксированным спредом</h2>
                                    <p class="desc">Воспользуйтесь лучшими в отрасли ценами на вход</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1 фиксированный спред</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1:500 Кредитное плечо</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>100$ Минимальное финансирование</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>USD - основная валюта</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Исламский счет доступен</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Минимальный лот 0,01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Советник</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Заголовок доступен</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>4 цифры</li>

                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>Скальпинг недоступен</li>
                                    </ul>
                                    <a href="/ru/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">Открыть счет</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">Минимальное финансирование<span class="price">500 USD </span></p>
                                    <h2 class="title">счет с переменным спредом</h2>
                                    <p class="desc">Получайте еще более узкие спреды и комиссии</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>0.1 от спреда</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1:200 Кредитное плечо</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>500$ Минимальное финансирование</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>USD - основная валюта</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Исламский счет доступен</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Минимальный лот 0,01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Советник</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Заголовок доступен</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>5 цифры</li>

                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>Скальпинг недоступен</li>
                                    </ul>
                                    <a href="/ru/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">Открыть счет</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">Минимальное финансирование<span class="price"> 1000 USD</span></p>
                                    <h2 class="title">счет для скальпинга</h2>
                                    <p class="desc">Получайте еще более узкие спреды и комиссии</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1.7 от спреда</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1:100 Кредитное плечо</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1000$ Минимальное финансирование</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>USD - основная валюта</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Исламский счет доступен</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Минимальный лот 0,01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Советник</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Заголовок доступен</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>5 цифры</li>

                                        <li ><i class="fa fa-check" aria-hidden="true"></i>Скальпинг доступен</li>
                                    </ul>
                                    <a href="/ru/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">Открыть счет</a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">Минимальное финансирование<span class="price"> 100 USD</span></p>
                                    <h2 class="title">  бонусный счет</h2>
                                    <p class="desc">Получайте еще более узкие спреды и комиссии</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>2 фиксированный спред</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1:500 Кредитное плечо</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>100$ Минимальное финансирование</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>USD - основная валюта</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Исламский счет доступен</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Минимальный лот 0,01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Советник</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Заголовок доступен</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>4 цифры</li>

                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>Скальпинг недоступен</li>
                                    </ul>
                                    <a href="/ru/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">Открыть счет</a>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="row" id="main-section-88">
            <div class=""  id="main-section-8">
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-history" ></i>
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">История</h4>
                    <p class="uk-text-small uk-margin-remove-top">Основанная в 2008 году, мы являемся одним из брокеров в регионе с наибольшим стажем работы</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-shield" ></i>
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">Безопасность</h4>
                    <p class="uk-text-small uk-margin-remove-top">Полностью регулируемый и лицензированный брокер</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-user" ></i>
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">Личный аккаунт менеджер</h4>
                    <p class="uk-text-small uk-margin-remove-top">Мы предоставляем персональные менеджеры по работе с клиентами для всех</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-video-camera" ></i>
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">Неограниченный доступ к видеоуроку</h4>
                    <p class="uk-text-small uk-margin-remove-top">Предоставляем неограниченный доступ к обучающим видео бесплатно</p>
                </div>
            </div>
        </div>



        <div class="col-sm-12" id="main-section-7">
            <div class="col-md-6" style="position:absolute;bottom:20px;padding-left:0px;">
                <v-lazy-image src="/elis/img/trading-platforms-bg5.jpg" id="responsive1-img-trading1" alt="Trading Platforms"/>
            </div>
            <div class="col-md-6 col-sm-12" id="mobile-app">
                <h1  id="animate1"  class="">Платформы Metatrader 4</h1>
                <h3  id="animate1"  class="">Начинать Торговля</h3>
                <h3  id="animate2"  class="">в мобильном приложении JMI Brokers</h3>
                <h6  id="animate3"  class="">Доступен на нескольких платформах</h6>
                <a  id="animate4" href="/ru/signup"><v-lazy-image src="/elis/img/ru/ios-store.png" alt="IOS"  width="140px" height="44px"/></a>
                <a  id="animate5"  href="/ru/signup"><v-lazy-image src="/elis/img/ru/play-store.png" alt="Play Store" width="140px" height="44px"/></a>
                <a  id="animate6"  href="/ru/signup"><v-lazy-image src="/elis/img/ru/win-store.png" alt="Windows" width="140px" height="44px"/></a>
            </div>
            <v-lazy-image src="/elis/img/trading-platforms-bg5.jpg" id="responsive1-img-trading2" alt="Trading Platforms"/>

        </div>





    </main>




</template>

<script>

import { useHead } from '@vueuse/head'
import {computed, reactive, ref} from "vue";
import axios from 'axios';
import {useRouter} from "vue-router";
import VLazyImage from "v-lazy-image";
const errors = ref()
const router = useRouter();

export default ({
    data(){
        return{
            site_title: ``,
            site_description: ``,
            site_keywords: '',
            fundamentalanalysises: [],
            url:'',
            action:'click',
            speed:500,
            img:'',
            head:'',
            slideIndex:'1',
            slideIndexx:'1',
            i:'',
            slides:'',
            slidess:'',
            dots:'',
            dotss:'',
        }
    },
    mounted() {
        this.getData()
        this.fundamentalanalysises
        this.plusSlides(1)
    },components:{
        VLazyImage
    },
    methods: {
        async getData(){
            try {
                const result = await axios.get('/api/index')
                if (result.status === 200 && result.data) {
                    this.fundamentalanalysises=result.data.data.en.fundamentalanalysis
                    this.site_title=result.data.data.en.title
                    this.site_description=result.data.data.en.description
                    this.site_keywords=result.data.data.en.keywords

                    useHead({
                        // Can be static or computed
                        title: computed(() => this.site_title),
                        meta: [
                            {
                                name: `description`,
                                content: computed(() => this.site_description),
                            },
                            {
                                name: `keywords`,
                                content: computed(() => this.site_keywords),
                            },
                        ],

                    })

                }
            } catch (e) {
                if(e && e.response.data && e.response.data.errors) {
                    errors.value = Object.values(e.response.data.errors)
                } else {
                    errors.value = e.response.data.message || ""
                }
            }
        },
        plusSlides:function(n) {
            this.slideIndex=this.slideIndex+n
            this.showSlides(this.slideIndex += n);
        },
        currentSlide:function(n) {
            this.showSlides(this.slideIndex = n);
        },
        plusSlidess:function(n) {
            this.slideIndexx=this.slideIndexx+n
            this.showSlidess(this.slideIndexx +=n);
        },
        currentSlidee:function(n) {
            this.showSlidess(this.slideIndexx = n);
        },
        showSlides:function(n) {

            this.slides = document.getElementsByClassName("mySlides");
            this.dots = document.getElementsByClassName("dot");
            if (n > this.slides.length) {this.slideIndex = 1}
            if (n < 1) {this.slideIndex = this.slides.length}
            for (this.i = 0; this.i < this.slides.length; this.i++) {
                this.slides[this.i].style.display = "none";
            }
            for (this.i = 0; this.i < this.dots.length; this.i++) {
                this.dots[this.i].className = this.dots[this.i].className.replace(" active", "");
            }
            this.slideIndex=(this.slideIndex)-1;
            this.slides[this.slideIndex].style.display = "block";
            this.dots[this.slideIndex].className += " active";
        },
        showSlidess:function(n) {

            this.slidess = document.getElementsByClassName("Slides");
            this.dotss = document.getElementsByClassName("dott");
            if (n > this.slidess.length-1) {this.slideIndexx = 1}
            if (n < 1) {this.slideIndexx = this.slidess.length}
            for (this.i = 0; this.i < this.slidess.length; this.i++) {
                this.slidess[this.i].style.display = "none";
            }
            for (this.i = 0; this.i < this.dotss.length; this.i++) {
                this.dotss[this.i].className = this.dotss[this.i].className.replace(" active", "");
            }
            this.slideIndexx=(this.slideIndexx)-1;
            this.slidess[this.slideIndexx].style.display = "block";
            this.dotss[this.slideIndexx].className += " active";
        },

    },created () {
        setInterval(() => {
            this.plusSlides(1)
        }, 8000)
    },
    setup() {


    },
})

</script>
