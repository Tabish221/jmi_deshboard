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
                    <a href="/en/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>Open Live Account</a>
                    <a href="/en/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>Open Demo Account</a>
                </div>
            </div>

            <div class="mySlides fade_slide"  style="display:none;">
                <div class="slide-text" >
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold';display:none;">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;display:none;">For a living</h1>
                </div>
                <v-lazy-image src="/img/2.webp" style="width:100%;" alt="SlideShow" />

                <div class="buttons-overlay" >
                    <a href="/en/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>Open Live Account</a>
                    <a href="/en/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>Open Demo Account</a>
                </div>
            </div>


            <div class="mySlides fade_slide">

                <div class="slide-text"  style="display:none;">
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold'">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;">For a living</h1>
                </div>

                <v-lazy-image src="/img/3.webp"  style="width:100%;" alt="SlideShow"/>

                <div class="buttons-overlay">
                    <a href="/en/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>Open Live Account</a>
                    <a href="/en/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>Open Demo Account</a>
                </div>

            </div>

            <div  class="mySlides fade_slide">

                <div class="slide-text"  style="display:none;">
                    <h1 style="color:#ffc926; font-weight: bold;text-transform:uppercase;font-size: 50px;font-family: 'Roboto-Bold'">Scalping </h1>
                    <h1 style="color: #0059b2; font-weight: bold; text-transform: uppercase; font-size: 50px; font-family: 'Roboto-Bold'; margin-top: -18px;">For a living</h1>
                </div>

                <v-lazy-image src="/img/4.webp"  style="width:100%;" alt="SlideShow"/>

                <div class="buttons-overlay">
                    <a href="/en/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>Open Live Account</a>
                    <a href="/en/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>Open Demo Account</a>
                </div>

            </div>






            <div class="buttons-overlay2">
                <a href="/en/signup" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>Open Live Account</a>
                <a href="/en/signup" class="slide-demo-button uk-border-rounded " ><i class="fas fa-scroll uk-margin-small-right"></i>Open Demo Account</a>
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
                        <p>No fees on withdrawal and deposit </p>
                    </div>

                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/deposit-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>Begin with only $100</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/fast-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>Without commissions without fees </p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="">
                        <v-lazy-image src="/elis/img/analysis-icon.png"  alt="wave-icon"  data-uk-img width="48px" height="50px"/>
                    </div>
                    <div class="">
                        <p>Free daily analysis</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12" id="main-features-right">
                <div class="">
                    <a href="/en/signup"><v-lazy-image src="/elis/img/ico11.png" id="ico11"  alt="wave-icon"  data-uk-img/></a>
                </div>

                <div id="start-trading">
                    <b>START TRADING NOW </b>
                    <span>become an expert trader</span>
                    <b><a href="/en/signup">JOIN NOW!</a></b>
                </div>
            </div>

        </div>

        <!-- section content begin -->
        <div class="uk-container in-wave-4uk-container in-wave-4">
            <div class="uk-grid uk-flex uk-flex-center">


                <div class="col-sm-12" id="main-section-2">
                    <div class="col-sm-12">
                        <div class="" id="left-section">
                            <p class="uk-margin-remove-bottom">Full range of Investment Choices</p>
                        </div>
                    </div>
                    <div class="col-sm-12" id="right-section">
                        <div class="">
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom">Get ultra-competitive spreads and commissions across all asset classes.</p>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom">Receive even better rates as your volume increases.</p>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12"  id="main-section-3">
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">FX Spread as low as</span></p>
                            <h1 class="uk-margin-top"> $0 Per trade</h1>
                            <p class="Bold_blue hint">0.1 PIP</p>
                            <p> Trade 182 FX spot pairs and 140 forwards across majors, minors, exotics and metals.</p>

                        </div>
                        <a href="/en/forexbroker">Read More >></a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">

                            <p class="main_title"><span class="Bold_blue">Stocks CFDs</span></p>
                            <h1 class="uk-margin-top">$0.2 Per share</h1>

                            <p>Invest in global equities.</p>
                            <p>on US500 Go long or short on 9,000+ instruments with tight spreads & low commissions.</p>

                        </div>
                        <a href="/en/stocks2">Read More >></a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue" style=" font-size: 20px; ">Commodities</span></p>

                            <h1 class="uk-margin-top">$0 Per trade</h1>

                            <p>Diversify your portfolio with a wide ranges of commodities.</p>
                            <p>Trade a wide range of commodities as CFDs, futures, options, spot pairs, & more.</p>


                        </div>
                        <a href="/en/commodities">Read More >></a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">Precious Metals Trading</span></p>

                            <h1 class="uk-margin-top">$0 Per trade</h1>

                            <p>Trade Gold, Silver, Copper, Platinum, and Palladium against the main currencies.</p>
                            <p> on US stocks, Access 19,000+ stocks across core and emerging markets on 36 exchanges worldwide.</p>
                        </div>
                        <a href="/en/preciousmetals">Read More >></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">Future Energies Trading</span></p>
                            <h1 class="uk-margin-top"> $0 Per trade</h1>

                            <p> Future (OTC) Energies traded at JMI Brokers are: Light Sweet Crude Oil, Natural Gas.</p>

                        </div>
                        <a href="/en/futureenergies">Read More >></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6  main-column">
                        <div class="col-sm-12" id="content">
                            <p class="main_title"><span class="Bold_blue">Indices Trading</span></p>
                            <h1 class="uk-margin-top"> $0 Per trade</h1>

                            <p> JMI Brokers offers trading in the most traded stock indices world wide The Dow Jones index, E-mini S&P 500 and E-mini NASDAQ 100.</p>

                        </div>
                        <a href="/en/futuretrading">Read More >></a>
                    </div>
                </div>
            </div>

        </div>

        <!-- section content end -->


        <!-- section content begin -->
        <div class="alternative" id="main-section-6">
            <div class="uk-container in-wave-4" id="main-section-66">
                <div class="uk-grid uk-flex ">
                    <div class="uk-width-4-5@m ">
                        <div id="section-6-title">
                            <h1 class="uk-margin-medium-bottom">Alternative Investments</h1>
                        </div>
                    </div>

                    <div class="col-sm-12" id="main-pricing-list">
                        <div class="in-wave-pricing-list" >

                            <div style="display:none;" class="col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <v-lazy-image src="/elis/img/testdiv-1.jpg" style="height: 300px;" alt="JMI Brokers"/>

                                <div class="package">

                                    <h4>Wealth Management</h4>


                                    <ul class="package-features-list package-features-list1">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Open your Wallet now</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Physical Trading Only</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Leverage 1:1 or 1:2</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Your Portfolio is managed by Experts</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Minimum Deposit $10,000</li>

                                    </ul>
                                    <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Start Your Portfolio Now</a>
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

                                            <h4> Fundamental Analysis</h4>


                                            <ul class="package-features-list package-features-list1">
                                                <li><i class="fa fa-check" aria-hidden="true"></i>{{fundamentalanalysis.title}}</li>


                                            </ul>
                                            <a :href="`/en/dailyfundamental/fundamental/${fundamentalanalysis.id}`" :title="`${fundamentalanalysis.title}`"  class="uk-button uk-button-default uk-border-rounded uk-align-center">More about {{fundamentalanalysis.title}}</a>
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




                            <div class="col-md-6 col-sm-6 col-xs-12 margin-top-10" >
                                <v-lazy-image src="/elis/img/social-trade-offer1.jpg" style="height: 300px;" alt="Social Trading"/>
                                <div class="package">

                                    <h4>Social Trading</h4>

                                    <ul class="package-features-list package-features-list1">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Free Copy Account with preferred portfolio ratio</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Instant intertransfer  between all your accounts .</li>


                                    </ul>
                                    <a href="/en/cpanel/home" class="uk-button uk-button-default uk-border-rounded uk-align-center">Start Your Portfolio Now</a>
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
        <div class="" id="main-section-6">
            <div class="uk-container in-wave-4" >
                <div class="uk-grid uk-flex ">
                    <div class="uk-width-4-5@m ">
                        <div id="section-6-title">
                            <h1 class="uk-margin-medium-bottom">Complete Package For Every Trader</h1>
                        </div>
                    </div>

                    <div class="col-sm-12" id="main-pricing-list">
                        <div class="in-wave-pricing-list" >

                            <div class="col-lg-3 col-md-6 col-xs-6 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">Minimum funding<span class="price">100 USD </span></p>
                                    <h2 class="title">Fixed spread account</h2>
                                    <p class="desc">Benefit from industry-leading entry prices</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1 PIP fixed spread</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Up To 1:500 Leverage</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>100$ Minimum funding</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>USD is the main currency</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Islamic account - No Swap</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Minimun lot 0.01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Expert advisor</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Headging is available</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>4 Digit</li>
                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>Scalping is not available</li>
                                    </ul>
                                    <a href="/en/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-6 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">Minimum funding<span class="price">500 USD </span></p>
                                    <h2 class="title">Variable spread account</h2>
                                    <p class="desc">Receive even tighter spreads and commissions</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>0.1 PIP spread</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Up To 1:200 Leverage</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>500$ Minimum funding</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>USD is the main currency</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Islamic account - No Swap</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Minimun lot 0.01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Expert advisor</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Headging is available</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>5 Digit</li>

                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>Scalping is not available</li>
                                    </ul>
                                    <a href="/en/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-6 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">Minimum funding<span class="price"> 1000 USD</span></p>
                                    <h2 class="title">Scalping account</h2>
                                    <p class="desc">Benefit from industry-leading entry prices</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1.7 PIP </li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Up to 1:100 Leverage</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>1000$ Minimum funding</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>USD is the main currency</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Islamic account - No Swap</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Minimun lot 0.01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Expert advisor</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Headging is available</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>5 Digit</li>

                                        <li><i class="fa fa-check" aria-hidden="true"></i>Scalping is  available</li>
                                    </ul>
                                    <a href="/en/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-6 margin-top-10" >
                                <div class="package">
                                    <p class="minimum">Minimum funding<span class="price"> 100 USD</span></p>
                                    <h2 class="title">Bonus account</h2>
                                    <p class="desc">Benefit from industry-leading entry prices</p>
                                    <hr>
                                    <ul class="package-features-list package-features-list2">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>2 PIP Fixed Spread</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Up To 1:500 Leverage</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>100$ Minimum funding</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>USD is the main currency</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Islamic account - No Swap</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Minimun lot 0.01</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Expert advisor</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Headging is available</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>4 Digit</li>

                                        <li class="false"><i class="fa fa-times" aria-hidden="true"></i>Scalping is not available</li>
                                    </ul>
                                    <a href="/en/signup" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account</a>
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
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">History</h4>
                    <p class="uk-text-small uk-margin-remove-top">Estableshed in 2009, We are one of the region's longest serving brokers</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-shield" ></i>
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">Security</h4>
                    <p class="uk-text-small uk-margin-remove-top">Fully regulated and licensed broker</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-user" ></i>
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">Personal Account Manager</h4>
                    <p class="uk-text-small uk-margin-remove-top">We provide personal account managers for everyone</p>
                </div>
                <div class="col-md-3 col-xs-6">
                    <i class="fa fa-video-camera" ></i>
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">Unlimited Access to Video Tutorial</h4>
                    <p class="uk-text-small uk-margin-remove-top">We provide unlimited access for educational videos for free</p>
                </div>
            </div>
        </div>



        <div class="col-sm-12" id="main-section-7">
            <div class="col-md-6" style="position:absolute;bottom:20px;padding-left:0px;">
                <v-lazy-image src="/elis/img/trading-platforms-bg5.jpg" id="responsive1-img-trading1" alt="Trading Platforms"/>
            </div>
            <div class="col-md-6 col-sm-12" id="mobile-app">
                <h1  id="animate1"  class="">Platforms  Metatrader 4</h1>
                <h4  id="animate2"  class="">Start Trading</h4>
                <h4  id="animate2"  class="">on JMI Brokers mobile app</h4>
                <h6  id="animate3"  class="">Available on multiple platforms</h6>
                <a  id="animate4" href="/en/signup"><v-lazy-image src="/elis/img/ios-store.png" alt="IOS Platform" width="140px" height="44px"/></a>
                <a  id="animate5"  href="/en/signup"><v-lazy-image src="/elis/img/play-store.png" alt="Android Platform"  width="140px" height="44px"/></a>
                <a  id="animate6"  href="/en/signup"><v-lazy-image src="/elis/img/win-store.png" alt="Windows Platform"  width="140px" height="44px"/></a>
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
            this.plusSlides(1),
                this.plusSlidess(1)
        }, 8000)
    },
    setup() {


    },
})

</script>
