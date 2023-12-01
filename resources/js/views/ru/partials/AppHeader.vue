<template>
    <link rel="preload" href="/js/app.js" as="script">
    <div id="fixedBtns">
        <a href="/ru/signup" class="slide-live-button uk-border-rounded ">ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a>
        <a href="/ru/signup" class="slide-demo-button uk-border-rounded ">ОТКРЫТЬ ДЕМО-СЧЕТ</a>
    </div>

    <!-- header content begin -->
    <div class="uk-section uk-padding-remove-vertical in-header-home ">

        <div class="row">
            <div class="col-lg-9 col-md-8" id="first-level-left">

                <marquee behavior="alternate" direction="right"
                         onmouseover="this.stop();"
                         onmouseout="this.start();" style=" padding-top: 6px; ">
                    <table  class="prices" cellspacing="1" cellpadding="2" border="0" style="background: #0059b2;font-size:12px;padding: 0px; font-family:Tahoma, Arial, Helvetica, sans-serif;margin:0 auto;width:max-content;direction: rtl;">
                        <tr style="font-weight:bold;" align="center">

                            <td id="sign" v-for="reuters_new in this.reuters_news"  style="color:#fff;text-align:left;display:inline-block;clear:both">{{ reuters_new.news }} <span style="color: #ffc926; font-size: 12px;"> {{ reuters_new.time }}</span></td>
                            <td></td>

                        </tr></table>

                </marquee>

            </div>

            <div class="col-lg-3 col-md-4 myFlex" id="first-level-right" >

                <div v-if="this.LoggedUser">
                    <a href="/ru/cpanel/home" class=""><i class="fa fa-user" aria-hidden="true"></i> </a>
                    <a href="/ru/logout" class="uk-button-text">Log out</a>
                </div>
                <div v-else="this.LoggedUser">
                    <a href="/ru/login" class="uk-button-text">Log in</a>
                </div>





                <div   id="header-search" class="form-group">
                    <input type="text" name="search"  placeholder="Search.." class="form-control search">
                    <a href="#" id="clear_search"  @click="clear_search()" style=" border-left: unset; color: #fff; font-weight: bold; "><i class="fa fa-trash-o" aria-hidden="true" style=" color: #0059b2; "></i> </a>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Language
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" @click="setlang('ru');">русский</a></li>
                        <li><a href="#"  @click="setlang('ar');" id="lang">العربية</a></li>
                        <li><a href="#" @click="setlang('en');">English</a></li>
                    </ul>
                </div>
                <div>
                    <ul id="myUL" style="width: 100%; border-radius: 10px; position: absolute; top: 34px; right: 0px; z-index: 9; list-style-type: none; padding-left: 0px;">
                        <li style=""><a href="/ru/forex" target="_blank" data-keywords="Monitoring Risk Exposure " style=" border-left: unset; ">Мониторинг подверженности рискам</a></li>
                        <li style=""><a href="/ru/forex" target="_blank" data-keywords="Forex Margin Trading and Leverage" style=" border-left: unset; ">Маржинальная торговля и кредитное плечо на форекс</a></li>
                        <li style=""><a href="/ru/forex" target="_blank" data-keywords="Advantages of trading Forex" style=" border-left: unset; ">Преимущества торговли на Форекс</a></li>
                        <li style=""><a href="/ru/forex" target="_blank" data-keywords="Forex Currency Pairs" style=" border-left: unset; ">Валютные пары Форекс</a></li>
                        <li style=""><a href="/ru/future" target="_blank" data-keywords="Future (OTC) Currencies" style=" border-left: unset; ">Будущая торговля валютами</a></li>
                        <li style=""><a href="/ru/future" target="_blank" data-keywords="Precious Metals Gold and Silver" style=" border-left: unset; ">Торговля драгоценными металлами</a></li>
                        <li style=""><a href="/ru/future" target="_blank" data-keywords="Future (OTC) Energies" style=" border-left: unset; ">Торговля будущими энергиями (OTC)</a></li>
                        <li style=""><a href="/ru/indices" target="_blank" data-keywords="Future (OTC) Indices" style=" border-left: unset; ">Фьючерсные (OTC) индексы</a></li>
                        <li style=""><a href="/ru/indices" target="_blank" data-keywords="American Stocks / Shares" style=" border-left: unset; ">Американские акции / акции</a></li>
                        <li style=""><a href="/ru/about-jmi" target="_blank" data-keywords="About JMI Brokers" style=" border-left: unset; ">насчет нас</a></li>
                        <li style=""><a href="/ru/whyjmi" target="_blank" data-keywords="Safety of clients funds" style=" border-left: unset; ">Сохранность средств клиентов</a></li>
                        <li style=""><a href="/ru/whyjmi" target="_blank" data-keywords="Segregation Of Client Funds" style=" border-left: unset; ">Разделение фондов</a></li>
                        <li style=""><a href="/ru/trading" target="_blank" data-keywords="Account Types" style=" border-left: unset; ">Типы счетов</a></li>
                        <li style=""><a href="/ru/trading" target="_blank" data-keywords="JMI Brokers Micro Account" style=" border-left: unset; ">Микро-счет</a></li>
                        <li style=""><a href="/ru/trading" target="_blank" data-keywords="JMI Brokers Standard Account" style=" border-left: unset; ">Стандартная учетная запись</a></li>
                        <li style=""><a href="/ru/trading" target="_blank" data-keywords="JMI Brokers Professional Account" style=" border-left: unset; ">Профессиональная учетная запись</a></li>
                        <li style=""><a href="/ru/partnership" target="_blank" data-keywords="White Labels" style=" border-left: unset; ">белая этикетка</a></li>
                        <li style=""><a href="/ru/partnership" target="_blank" data-keywords="Money Managers" style=" border-left: unset; ">Финансовые менеджеры </a></li>
                        <li style=""><a href="/ru/partnership" target="_blank" data-keywords="Introducing Broker Services (IB)" style=" border-left: unset; ">Представляющие брокерские услуги (IB)</a></li>
                        <li style=""><a href="/ru/career" target="_blank" data-keywords="Career" style=" border-left: unset; ">Карьера</a></li>
                        <li style=""><a href="/ru/contact-us" target="_blank" data-keywords="Contact us" style=" border-left: unset; ">Связаться с нами</a></li>
                        <li style=""><a href="/ru/conflicts-of-interest-policy" target="_blank" data-keywords="Conflicts of Interest" style=" border-left: unset; ">Политика конфликта интересов</a></li>
                        <li style=""><a href="/ru/faq" target="_blank" data-keywords="Frequently Asked Questions (FAQs)" style=" border-left: unset; ">Часто задаваемые вопросы (FAQs)</a></li>
                        <li style=""><a href="/ru/licenses-and-regulations" target="_blank" data-keywords="Licenses and Regulations" style=" border-left: unset; ">Лицензии и правила</a></li>
                        <li style=""><a href="/ru/mt4" target="_blank" data-keywords="метатрейдер 4" style=" border-left: unset; ">Метатрейдер 4</a></li>
                        <li style=""><a href="/ru/mt4" target="_blank" data-keywords="Trading Platform" style=" border-left: unset; ">Торговая платформа</a></li>
                    </ul>
                </div>
            </div>





            <nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display:none;padding-top:150px" id="mySidebar">
                <span  @click="w3_close()" class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="padding:6px 24px">
                    <i class="fa fa-remove"></i>
                </span>
                <div class="w3-bar-block w3-center">
                    <a href="/ru" class="w3-bar-item w3-button w3-text-grey w3-hover-black">Дом</a>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">о нас</a>
                    <div class="content">
                        <a href="/ru/about-jmi" class="downarrow">О компании JMI</a>
                        <a href="/ru/licenses-and-regulations" class="downarrow">Лицензии и правила</a>
                        <a href="/ru/corporate-philosophy" class="downarrow">Корпоративная философия</a>
                        <a href="/ru/advofjmi" class="downarrow">Преимущества платформы JMI Brokers</a>
                        <a href="/ru/contact-us" class="downarrow">Связаться с нами</a>
                        <a href="/ru/risk-management-strategy" class="downarrow">Стратегия управления рисками</a>
                        <a href="/ru/conflicts-of-interest-policy" class="downarrow">Политика конфликта интересов</a>
                        <a href="/ru/faq" class="downarrow">Часто задаваемые вопросы</a>
                        <a href="/ru/culture" class="downarrow">культура</a>
                        <a href="/ru/career" class="downarrow">Карьера</a>
                        <a href="/ru/partnership-programs" class="downarrow">Партнерские программы</a>
                        <a href="/ru/tradewithjmi" class="downarrow">Зачем торговать с JMI</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">Выбор инвестиций </a>
                    <div class="content">
                        <a href="/ru/forexbroker" class="downarrow">Торговля на Форекс</a>
                        <a style="display:none;" href="/ru/forexmargin" class="downarrow">Форекс Маржа</a>

                        <a href="/ru/preciousmetals" class="downarrow">Торговля драгоценными металлами</a>
                        <a href="/ru/futureenergies" class="downarrow">Торговля будущими энергиями</a>
                        <a href="/ru/futuretrading" class="downarrow">Торговля индексами</a>
                        <a href="/en/commodities" class="downarrow"> Товары</a>
                        <a href="/ru/usshares" class="downarrow">Акции США</a>

                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">платформы</a>
                    <div class="content">
                        <a href="/ru/forexplatform" class="downarrow">Платформа Форекс</a>
                        <a href="/ru/metatrader4" class="downarrow">Метатрейдер 4</a>
                        <a href="/ru/mt4-platform-overview" class="downarrow">Mt4 Обзор платформы</a>
                        <a href="/ru/iphone-and-ipad" class="downarrow">iphone и ipad</a>
                        <a href="/ru/android" class="downarrow">андроид</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">торговые счета  </a>
                    <div class="content">
                        <a href="/ru/jmiaccounts" class="downarrow">Счета Форекс</a>
                        <a href="#" style="display:none;" class="downarrow">ТОРГОВЫЕ СЧЕТА</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">партнерство</a>
                    <div class="content">
                        <a href="/ru/partnership-programs" class="downarrow">Станьте нашим партнером</a>
                        <a href="/ru/businesswithjmi" class="downarrow">Зачем делать бизнес с JMI</a>
                        <a href="/ru/introducingbrokers" class="downarrow">Представляющие брокеры</a>
                        <a href="/ru/moneymanagers" class="downarrow">Финансовые менеджеры</a>
                        <a href="/ru/becomeamoneymanager" class="downarrow">Как стать управляющим деньгами</a>
                        <a href="/ru/whitelabel" class="downarrow">белая этикетка</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">Инструменты</a>
                    <div class="content">
                        <a href="/ru/calendar" class="downarrow">экономический календарь</a>
                        <a href="/ru/pip-calculator" class="downarrow">Калькулятор пипсов</a>
                        <a href="/ru/heatmap" class="downarrow">FX Тепловая карта</a>
                        <a href="/ru/dailyfundamental" class="downarrow">Ежедневный фундаментальный анализ</a>
                        <a href="/ru/dailytechnical" class="downarrow">Ежедневный технический анализ</a>
                        <a href="/ru/downloadfiles" class="downarrow">Скачать файлы</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black hidPhone"> русский </a>
                    <div class="content">
                        <a href="#" onclick="setlang('ar');" id="lang" class="downarrow hidPhone">العربية</a>
                        <a href="#" onclick="setlang('en');" class="downarrow hidPhone                                                                                                    ">English</a>
                    </div>

                </div>
            </nav>
            <div class="row" id="bigNav">
                <div class="col-md-3 col-sm-6" id="JMIImg">
                    <v-lazy-image src="https://www.jmibrokers.com/elis/img/fin-logo2.png" alt="Logo" />
                </div>
                <div class="col-md-9" id="rightNav">
                    <ul>
                        <li>
                            <a href="/ru"  class="dropbtn">Дом</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">о нас</a>
                                <div class="dropdown-content" style="min-width: 250px;">
                                    <a  href="/ru/about-jmi">О компании JMI </a>
                                    <a  href="/ru/contact-us">Связаться с нами</a>
                                    <a  href="/ru/faq">Часто задаваемые вопросы</a>
                                    <a  href="/ru/licenses-and-regulations">Лицензии и правила</a>
                                    <a  href="/ru/risk-management-strategy">Стратегия управления рисками</a>
                                    <a  href="/ru/culture">культура</a>
                                    <a  href="/ru/corporate-philosophy">Корпоративная философия</a>
                                    <a  href="/ru/conflicts-of-interest-policy">Политика конфликта интересов</a>
                                    <a  href="/ru/career">Карьера</a>
                                    <a  href="/ru/advofjmi">Преимущества платформы JMI Brokers</a>
                                    <a  href="/ru/partnership-programs">Партнерские программы</a>
                                    <a href="/ru/tradewithjmi">Зачем торговать с JMI</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">Выбор инвестиций</a>
                                <div class="dropdown-content" style="min-width: 250px;">
                                    <a   href="/ru/forexbroker">Торговля на Форекс</a>
                                    <a   href="/ru/preciousmetals">Торговля драгоценными металлами</a>
                                    <a   style="display:none;" href="/ru/forexmargin">Форекс Маржа</a>
                                    <a   href="/ru/futureenergies">Торговля будущими энергиями</a>

                                    <a href="/ru/futuretrading">Торговля индексами </a>
                                    <a href="/en/commodities"> Товары</a>
                                    <a href="/ru/usshares">Акции США</a>


                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">платформы</a>
                                <div class="dropdown-content" style="min-width: 200px;">
                                    <a   href="/ru/forexplatform">Платформа Форекс</a>
                                    <a   href="/ru/metatrader4">Метатрейдер 4</a>
                                    <a   href="/ru/iphone-and-ipad">iphone и ipad</a>
                                    <a   href="/ru/mt4-platform-overview">Mt4 Обзор платформы</a>
                                    <a   href="/ru/android">андроид</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">торговые счета </a>
                                <div class="dropdown-content" style="min-width: 135px;">
                                    <a  href="/ru/jmiaccounts">Счета Форекс</a>
                                    <a  href="#" style="display:none;">ТОРГОВЫЕ СЧЕТ</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">партнерство</a>
                                <div class="dropdown-content" style="min-width: 220px;">
                                    <a   href="/ru/partnership-programs">Станьте нашим партнером</a>
                                    <a   href="/ru/moneymanagers">Финансовые менеджеры</a>
                                    <a   href="/ru/businesswithjmi">Зачем делать бизнес с JMI</a>
                                    <a   href="/ru/becomeamoneymanager">Как стать управляющим деньгами</a>
                                    <a   href="/ru/introducingbrokers">Представляющие брокеры</a>
                                    <a   href="/ru/whitelabel">белая этикетка</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">Инструменты</a>
                                <div class="dropdown-content" style="min-width: 250px;">
                                    <a   href="/ru/calendar">экономический календарь</a>
                                    <a   href="/ru/dailyfundamental">Ежедневный фундаментальный анализ</a>
                                    <a   href="/ru/pip-calculator">Калькулятор пипсов</a>
                                    <a   href="/ru/dailytechnical">Ежедневный технический анализ</a>
                                    <a   href="/ru/heatmap">FX Тепловая карта</a>
                                    <a   href="/ru/downloadfiles">Скачать файлы</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">русский</a>
                                <div class="dropdown-content" style="min-width: 100px;">
                                    <a href="#"  @click="setlang('ar');" id="lang">العربية</a>
                                    <a href="#" @click="setlang('en');">English</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6" id="openBarsNav">
                    <span class="w3-button w3-xxlarge w3-white w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></span>
                </div>
            </div>





        </div>
    </div>
</template>
<script>
import axios from "axios";

import ('jquery')
import jquery from 'jquery'
window.jQuery = jquery
import $ from 'jquery'
import VLazyImage from "v-lazy-image";
import {useHead} from "@vueuse/head";
import {computed} from "vue";

require('../../../../../public/wave/css/vendors/uikit.min.css')
require('../../../../../public/assets/css/bootstrap.min.css')
require('../../../../../public/assets/new_cpanel/css/font-awesome.min.css')
require('../../../../../public/wave/css/flags.css')
require('../../../../../public/assets/css/Style.css')

export default {
    name: 'AppHeader',
    data(){
        return{
            LoggedUser: String,
            reuters_news: [],
        }
    },
    components:{
        VLazyImage
    },
    mounted() {
        this.getLoggedUser()
        this.getData()
    },
    methods:{
        async getData(){
            try {
                const result = await axios.get('/api/shownews')
                if (result.status === 200 && result.data) {
                    this.reuters_news=result.data.data.en.reuters_news
                }
            } catch (e) {
                if(e && e.response.data && e.response.data.errors) {
                    errors.value = Object.values(e.response.data.errors)
                } else {
                    errors.value = e.response.data.message || ""
                }
            }
        },
        head: document.getElementById("head"),

        coll: document.getElementsByClassName("collapsible"),

        getLoggedUser(){
            this.LoggedUser=localStorage.getItem('JMI_User')
        },
        setlang(val){
            if(val=='en'){
                let url=document.location.href
                url=url.replace('/ar','/en');
                url=url.replace('/ru','/en');
                if(url==document.location.href){
                    url='/en'
                }
                document.location = url;
            }else if(val=='ar'){
                let url=document.location.href
                url=url.replace('/en','/ar');
                url=url.replace('/ru','/ar');
                if(url==document.location.href){
                    url='/ar'
                }
                document.location = url;
            }else if(val=='ru'){
                let url=document.location.href
                url=url.replace('/en','/ru');
                url=url.replace('/ar','/ru');
                if(url==document.location.href){
                    url='/ru'
                }
                document.location = url;
            }
        },
        w3_open() {
            document.getElementById("mySidebar").style.width = "100%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementsByTagName("html")[0].style.overflow="hidden";
        },

        w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementsByTagName("html")[0].style.overflow="visible";
        },
        // collapse


        openForm() {
            document.getElementById("myForm").style.display = "block";
            document.getElementById("open-button").style.display = "none";
        },

        closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("open-button").style.display = "block";

        },
        clear_search()
        {
            $('ul#myUL li').hide();
            $('ul#myUL2 li').hide();
            $('#header-search input').val('');

        },
    }
}

</script>
