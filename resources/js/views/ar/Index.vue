<template>

    <main>

        <div class="slideshow-container" >



            <div class="mySlides fade_slide"  style="display:none;">
                <div class="slide-text" >
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold';display:none;">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;display:none;">For a living</h1>
                </div>
<!--                <link rel="preload" fetchpriority="high" as="image" href="/img/1.webp" type="image/webp">-->
                <v-lazy-image src="/img/ar/1.webp" style="width:100%;" alt="SlideShow" width="100%" height="auto"/>

                <div class="buttons-overlay" >
                    <a href="/ar/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب حقيقى</a>
                    <a href="/ar/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب تجريبى</a>
                </div>
            </div>

            <div class="mySlides fade_slide"  style="display:none;">
                <div class="slide-text" >
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold';display:none;">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;display:none;">For a living</h1>
                </div>
                <v-lazy-image src="/img/ar/2.webp" style="width:100%;" alt="SlideShow" />

                <div class="buttons-overlay" >
                    <a href="/ar/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب حقيقى</a>
                    <a href="/ar/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب تجريبى</a>
                </div>
            </div>


            <div class="mySlides fade_slide">

                <div class="slide-text"  style="display:none;">
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold'">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;">For a living</h1>
                </div>

                <v-lazy-image src="/img/ar/3.webp"  style="width:100%;" alt="SlideShow"/>

                <div class="buttons-overlay" >
                    <a href="/ar/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب حقيقى</a>
                    <a href="/ar/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب تجريبى</a>
                </div>

            </div>

            <div  class="mySlides fade_slide">

                <div class="slide-text"  style="display:none;">
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold'">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;">For a living</h1>
                </div>

                <v-lazy-image src="/img/ar/4.webp"  style="width:100%;" alt="SlideShow"/>

                <div class="buttons-overlay" >
                    <a href="/ar/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب حقيقى</a>
                    <a href="/ar/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب تجريبى</a>
                </div>

            </div>






            <div class="buttons-overlay2" >
                <a href="/ar/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب حقيقى</a>
                <a href="/ar/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>فتح حساب تجريبى</a>
            </div>


            <div id="dot_navigation" >
                <span class="dot" number="1" @click="this.currentSlide(1)"></span>
                <span class="dot" number="2" @click="this.currentSlide(2)"></span>
                <span class="dot" number="3" @click="this.currentSlide(3)"></span>
                <span class="dot" number="4" @click="this.currentSlide(4)"></span>


            </div>

        </div>


        <div class="row" id="main-features">

            <div class="col-md-9 col-sm-12 col-md-push-3" id="main-features-left">

                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/nofees-icon1.png"  alt="wave-icon"  data-uk-img width="57px" height="50px"/>
                    </div>
                    <div class="">
                        <p>سحب وايداع بدون عمولة</p>
                    </div>

                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/deposit-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>أقل ايداع فقط $100</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/fast-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>تنفيذ سريع بدون عمولة</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/analysis-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>أدوات تحليل مجانا</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 col-md-pull-9" id="main-features-right">
                <div class="">
                    <a href="/ar/signup"><v-lazy-image src="/elis/img/ico11.png" id="ico11"  alt="wave-icon"  data-uk-img/></a>
                </div>

                <div id="start-trading">
                    <b>أبدأ التداول</b>
                    <span>لكي تصبح محترف تداول</span>
                    <b><a href="/ar/signup">انضم لنا الأن</a></b>
                </div>
            </div>

        </div>

        <!-- section content begin -->
        <div class="uk-container in-wave-4uk-container in-wave-4">
            <div class="uk-grid uk-flex uk-flex-center">


                <div class="col-sm-12" id="main-section-2">
                    <div class="col-sm-12">
                        <div class="" id="left-section">
                            <p class="uk-margin-remove-bottom">مجموعة كاملة من خيارات الاستثمار</p>
                        </div>
                    </div>
                    <div class="col-sm-12" id="right-section">
                        <div class="">
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom">احصل على  أسعار أفضل كلما زاد حجم تداولاتك.</p>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12"  id="main-section-3">
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <p class="main_title"><span class="Bold_blue">FX أسبريد يبدأ من</span></p>
                        <div class="col-sm-12" id="content">
                            <h1 class="uk-margin-top ">0$ لكل صفقة</h1>
                            <p class="Bold_blue hint">0.1 نقطة</p>
                            <p class="mr-b"> تداول 182 زوجًا من أزواج العملات الأجنبية و 140 عقدًا آجلًا عبر العملات الرئيسية والثانوية والغريبة والمعادن.</p>

                        </div>
                        <a href="/ar/forexbroker">المزيد >></a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <p class="main_title"><span class="Bold_blue">الأسهم</span></p>
                        <div class="col-sm-12" id="content">

                            <h1 class="uk-margin-top">0.2$ لكل سهم</h1>
                            <p>استثمر في الأسهم العالمية.</p>
                            <p class="mr-b">قم بالشراء أو البيع على أكثر من 9000 أداة مع فروق أسعار صغيرة وعمولات منخفضة.</p>


                        </div>
                        <a href="/ar/stocks2">المزيد >></a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <p class="main_title"><span class="Bold_blue" style=" font-size: 20px; ">السلع</span></p>
                        <div class="col-sm-12" id="content">
                            <h1 class="uk-margin-top">0$ لكل صفقة</h1>

                            <p>نوّع محفظتك مع مجموعة كبيرة من السلع.</p>
                            <p class="mr-b">تداول في نطاق واسع من السلع مثل العقود مقابل الفروقات والعقود الآجلة والخيارات والأزواج الفورية والمزيد.</p>

                        </div>
                        <a href="/ar/commodities">المزيد >></a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <p class="main_title"><span class="Bold_blue">تداول المعادن الثمينة</span></p>
                        <div class="col-sm-12" id="content">



                            <h1 class="uk-margin-top">0$ لكل صفقة</h1>
                            <p>تداول الذهب والفضة والنحاس والبلاتين والبلاديوم مقابل العملات الرئيسية.</p>
                            <p class="mr-b"> الوصول إلى أكثر من 19000 سهم عبر الأسواق الأساسية والناشئة في 36 بورصة حول العالم.</p>


                        </div>
                        <a href="/ar/preciousmetals">المزيد >></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">تداول الطاقات المستقبليه  </span></p>
                            <h1 class="uk-margin-top"> 0$ لكل صفقة</h1>

                            <p> الطاقة المستقبلية  المتداولة لدى JMI Brokers هي: النفط الخام الخفيف والغاز الطبيعي.</p>

                        </div>
                        <a href="/ar/futureenergies">المزيد >></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">تداول المؤشرات</span></p>
                            <h1 class="uk-margin-top"> 0$ لكل صفقة</h1>

                            <p> تقدم JMI Brokers التداول في مؤشرات الأسهم الأكثر تداولًا في جميع أنحاء العالم ، مثل مؤشر Dow ​​Jones و E-mini S&P 500 و E-mini NASDAQ 100.</p>

                        </div>
                        <a href="/ar/futuretrading">المزيد >></a>
                    </div>
                </div>
            </div>
            </div>



        <!-- section content end -->


        <!-- section content begin -->
        <div class="" id="main-section-6">
            <div class="uk-container in-wave-4" id="main-section-66">
                <div class="uk-grid uk-flex">
                    <div class="uk-width-4-5@m">
                        <div id="section-6-title">
                            <h1>الاستثمارات البديلة</h1>
                        </div>
                    </div>

                    <div class="col-sm-12" id="main-pricing-list">
                        <div class="in-wave-pricing-list" >



                            <div class="col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <v-lazy-image src="/elis/img/social-trade-offer1.jpg" style="height: 300px;" alt="Social Trading"/>
                                <div class="package">

                                    <h4>نسخ التداول</h4>

                                    <ul class="package-features-list package-features-list1">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>حساب نسخ مجاني مع نسبة المحفظة المفضلة</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>تحويل لحظى داخلى بين كل حساباتك</li>

                                    </ul>
                                    <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">ابدأ و أحصل على محفظتك الان</a>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="slideshow-container" >

                                    <div v-for="fundamentalanalysis in this.fundamentalanalysises" class="Slides fade_slide"  style="display:none;">
                                        <div class="slide-text" >
                                            <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold';display:none;">
                                                Scalping </h1>
                                            <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;display:none;">For a living</h1>
                                        </div>
                                        <v-lazy-image src="/assets/img/Fund-Analy.jpeg" style="width:100%; height:300px;" alt="Fundamental Analysis"/>
                                        <div class="package">

                                            <h4> التحليل الأساسى</h4>


                                            <ul class="package-features-list package-features-list1">
                                                <li><i class="fa fa-check" aria-hidden="true"></i>{{fundamentalanalysis.title}}</li>


                                            </ul>
                                            <a :href="`/ar/dailyfundamental/fundamental/${fundamentalanalysis.id}`" :title="`${fundamentalanalysis.title}`"  class="uk-button uk-button-default uk-border-rounded uk-align-center">المزيد من {{fundamentalanalysis.title}}</a>
                                        </div>

                                    </div>



                                    <div id="dot_navigation" >
                                        <span class="dott" number="1" onclick="currentSlide(1)"></span>
                                        <span class="dott" number="2" onclick="currentSlide(2)"></span>
                                        <span class="dott" number="3" onclick="currentSlide(3)"></span>
                                        <span class="dott" number="4" onclick="currentSlide(4)"></span>

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
                                <h5 class="uk-margin-small-top">Strategies &amp; Discussions</h5>
                            </div>
                            <div class="col-sm-6 padding-left-0">
                                <h5 class="uk-margin-small-top">Forecasts &amp; Educations</h5>
                            </div>
                        </div>

                        <div class="col-sm-12 margin-top-10" >
                            <div class="col-sm-4">
                                <i class="fa fa-trophy"></i>
                                <p class="">Award-winning support</p>
                            </div>
                            <div class="col-sm-4">
                                <i class="fa fa-university "></i>
                                <p class="">REGULATED BY Republic of Vanuatu</p>
                            </div>
                            <div class="col-sm-4">
                                <i class="fa fa-history "></i>
                                <p class="">12 years experience</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="uk-inline uk-dark in-wave-video uk-margin-small-bottom">
                            <v-lazy-image class="uk-border-rounded uk-width-1-1" src="/wave/img/in-wave-image-1.jpg"  alt="wave-video" width="533" height="355" data-uk-img/>
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
        <div id="main-section-5" class="uk-section uk-section-muted uk-padding-large in-wave-3 uk-background-contain uk-background-center" >
            <div class="col-sm-12">
                <div class="col-sm-12" >
                    <div class="col-md-6 col-sm-12">
                        <h1 class="">تحليل السوق والتداول</h1>
                        <p>نتواصل فى  JMI Brokers تحدى انفسنا لتزويد المتداولين بما يحتاجون اليه للنجاح وليكونوا خبراء فى الفوركس.</p>
                        <div class="col-sm-12 uk-text-center padding-left-0">
                            <div class="col-sm-6 padding-left-0">
                                <h5 class="uk-margin-small-top">التخطيط والتحليل</h5>
                            </div>
                            <div class="col-sm-6 padding-left-0">
                                <h5 class="uk-margin-small-top">التنبأ والتعلم</h5>
                            </div>
                        </div>

                        <div class="col-sm-12 margin-top-10" >
                            <div class="col-sm-4">
                                <i class="fa fa-trophy"></i>
                                <p class="">دعم فنى 24/7</p>
                            </div>
                            <div class="col-sm-4">
                                <i class="fa fa-university "></i>
                                <p class="">مرخصة  من احدى دول الكومنولث البريطاني</p>
                            </div>
                            <div class="col-sm-4">
                                <i class="fa fa-history "></i>
                                <p class="">12 سنة من الخبرة</p>
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
        <div class="" id="main-section-6">
            <div class="uk-container in-wave-4" >
                <div class="uk-grid uk-flex">
                    <div class="uk-width-4-5@m">
                        <div id="section-6-title">
                            <h1 class="uk-margin-medium-bottom">مجموعة متكاملة لكل المتداولين</h1>
                        </div>
                    </div>

                    <div class="col-sm-12" id="main-pricing-list">
                        <div class="in-wave-pricing-list" >

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">أقل ايداع<span class="price">100 USD </span></p>
                                    <h2 class="title">حساب اسبريد  ثابت</h2>
                                    <p class="desc">احصل على فروق أسعار قليلة</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>اسبريد ثابت 1 نقطة فقط</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>رافعة مالية تصل الى 1:500</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>أقل ايداع 100$</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>عملة الحساب الدولار الامريكى</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>جميع الحسابات الأسلامية</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>أقل لوت 0.01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>متاح الأكسبرت</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>مسموح بالهيدج</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>4 خانات</li>

                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>غير مسموح بالأسكالبينج</li>
                                    </ul>
                                    <a href="/ar/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">فتح حساب</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">أقل ايداع<span class="price">500 USD </span></p>
                                    <h2 class="title">حساب اسبريد  متغير</h2>
                                    <p class="desc">احصل على فروق أسعار قليلة</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">

                                        <li><i class="fa fa-check" aria-hidden="true"></i> اسبريد يبدأ من 0.1</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>رافعة مالية تصل الى 1:200</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>أقل ايداع 500$</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>عملة الحساب الدولار الأمريكى</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>جميع الحسابات الأسلامية</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>أقل لوت 0.01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>متاح الأكسبرت</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>مسموح بالهيدج</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>5 خانات</li>

                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>غير مسموح بالأسكالبينج</li>

                                    </ul>
                                    <a href="/ar/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">فتح حساب</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">أقل ايداع<span class="price"> 1000 USD</span></p>
                                    <h2 class="title">حساب سكالبينج</h2>
                                    <p class="desc">احصل على فروق أسعار قليلة</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">

                                        <li><i class="fa fa-check" aria-hidden="true"></i>اسبريد يبدأ من 1.7</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>رافعة مالية تصل الى 1:100</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>أقل ايداع 1000$</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>عملة الحساب الدولار الأمريكى</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>جميع الحسابات الأسلامية</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>أقل لوت 0.01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>متاح الأكسبرت</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>مسموح بالهيدج</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>5 خانات</li>

                                        <li><i class="fa fa-check" aria-hidden="true"></i>مسموح بالاسكالبينج</li>

                                    </ul>
                                    <a href="/ar/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">فتح حساب</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">أقل ايداع<span class="price"> 100 USD</span></p>
                                    <h2 class="title">حساب بونص</h2>
                                    <p class="desc">احصل على فروق أسعار قليلة</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">

                                        <li><i class="fa fa-check" aria-hidden="true"></i>اسبريد ثابت 2 نقطة فقط</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>رافعة مالية تصل الى 1:500</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>أقل ايداع 100$</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>عملة الحساب الدولار الأمريكى</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>جميع الحسابات الأسلامية</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>أقل لوت 0.01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>متاح الأكسبرت</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>مسموح بالهيدج</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>4 خانات</li>

                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>غير مسموح بالأسكالبينج</li>

                                    </ul>
                                    <a href="/ar/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">فتح حساب</a>
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
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">تاريخ</h4>
                    <p class="uk-text-small uk-margin-remove-top">الشركة تعمل فى الاسواق منذ عام 2008. حيث اصبحنا واحدة من اكبر الشركات الوساطة</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-shield" ></i>
                    <h6 class="uk-margin-small-top uk-margin-remove-bottom">الأمان</h6>
                    <p class="uk-text-small uk-margin-remove-top">نحن حاصلين على التراخيص التى تضمن سلامة امولاك</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-user" ></i>
                    <h6 class="uk-margin-small-top uk-margin-remove-bottom">مساعده بشكل شخصي</h6>
                    <p class="uk-text-small uk-margin-remove-top">هذه المساعده يحصل عليها كبار العملاء فى الشركات الاخرى .. نحن نقدمها للجميع</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-video-camera" ></i>
                    <h6 class="uk-margin-small-top uk-margin-remove-bottom">دخول غير محدود إلى الفيديوهات التعليمية</h6>
                    <p class="uk-text-small uk-margin-remove-top">الشركة تقدم لكم فيديوهات تعليمية مجانية مع اتاحة الوصول اليها فى اى وقت</p>
                </div>
            </div>
        </div>




        <div class="col-sm-12" id="main-section-7">
            <div class="col-md-6" style="position:absolute;bottom:20px;padding-left:0px;">
                <v-lazy-image src="/elis/img/trading-platforms-bg5.jpg" id="responsive1-img-trading1" alt="Trading Platforms" />
            </div>
            <div class="col-md-6 col-sm-12" id="mobile-app">
                <h1  id="animate1"  class=""> منصة ميتاتريدر 4</h1>
                <h3  id="animate1"  class=""> ابدأ التداول  </h3>
                <h3  id="animate2"  class="">على تطبيق JMI Brokers للموبايل</h3>
                <h6  id="animate3"  class="">متاح على منصات مختلفة</h6>
                <a  id="animate4" href="/ar/signup"><v-lazy-image src="/elis/img/ar/ios-store.png" alt="IOS"  width="140px" height="44px" /></a>
                <a  id="animate5"  href="/ar/signup"><v-lazy-image src="/elis/img/ar/play-store.png" alt="Android"  width="140px" height="44px" /></a>
                <a  id="animate6"  href="/ar/signup"><v-lazy-image src="/elis/img/ar/win-store.png" alt="Windows"   width="140px" height="44px" /></a>
            </div>
            <v-lazy-image src="/elis/img/trading-platforms-bg5.jpg" id="responsive1-img-trading2"  alt="Trading Platforms" />

        </div>
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
                    this.fundamentalanalysises=result.data.data.ar.fundamentalanalysis
                    this.site_title=result.data.data.ar.title
                    this.site_description=result.data.data.ar.description
                    this.site_keywords=result.data.data.ar.keywords

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
            this.plusSlides(1),
                this.plusSlidess(1)
        }, 8000)
    },
    setup() {


    },
})

</script>
