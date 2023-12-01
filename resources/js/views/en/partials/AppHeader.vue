<template>
    <link rel="stylesheet" href="../../../../../public/assets-up/css/layout.css">
    <!-- <link rel="preload" href="/js/app.js" as="script">
    <div id="fixedBtns">
        <a href="/en/signup" class="slide-live-button uk-border-rounded ">Open Live Account</a>
        <a href="/en/signup" class="slide-demo-button uk-border-rounded ">Open Demo Account</a>
    </div>

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
                    <a href="/en/cpanel/home" class=""><i class="fa fa-user" aria-hidden="true"></i> </a>
                    <a href="/en/logout" class="uk-button-text">Log out</a>
                </div>
                <div v-else="this.LoggedUser">
                    <a href="/en/login" class="uk-button-text">Log in</a>
                </div>





                <div   id="header-search" class="form-group">
                    <input type="text" name="search"  placeholder="Search.." class="form-control search">
                    <a href="#" id="clear_search"  @click="clear_search()" style=" border-left: unset; color: #fff; font-weight: bold; "><i class="fa fa-trash-o" aria-hidden="true" style=" color: #0059b2; "></i> </a>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Language
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" @click="setlang('en');">ENGLISH</a></li>
                        <li><a href="#"  @click="setlang('ar');" id="lang">العربية</a></li>
                        <li><a href="#" @click="setlang('ru');">русский</a></li>
                    </ul>
                </div>
                <div>
                    <ul id="myUL" style="width: 100%; border-radius: 10px; position: absolute; top: 34px; right: 0px; z-index: 9; list-style-type: none; padding-left: 0px;">
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/forex" target="_blank" data-keywords="Monitoring Risk Exposure " >Monitoring Risk Exposure</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/forex" target="_blank" data-keywords="Forex Margin Trading and Leverage" >Forex Margin Trading and Leverage</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/forex" target="_blank" data-keywords="Advantages of trading Forex" >Advantages of trading Forex</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/forex" target="_blank" data-keywords="Forex Currency Pairs" >Forex Currency Pairs</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/future" target="_blank" data-keywords="Future (OTC) Currencies" >Future (OTC) Currencies</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/future" target="_blank" data-keywords="Precious Metals Gold and Silver" >Precious Metals Gold and Silver</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/future" target="_blank" data-keywords="Future (OTC) Energies" >Future (OTC) Energies</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/indices" target="_blank" data-keywords="Future (OTC) Indices" >Future (OTC) Indices</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/indices" target="_blank" data-keywords="American Stocks / Shares" >American Stocks / Shares</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/about-jmi" target="_blank" data-keywords="About JMI Brokers" >About JMI Brokers</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/whyjmi" target="_blank" data-keywords="Safety of clients funds" >Safety of clients funds</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/trading" target="_blank" data-keywords="Account Types" >Account Types</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/trading" target="_blank" data-keywords="JMI Brokers Micro Account" >JMI Brokers Micro Account</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/trading" target="_blank" data-keywords="JMI Brokers Standard Account" >JMI Brokers Standard Account</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/trading" target="_blank" data-keywords="JMI Brokers Professional Account" >JMI Brokers Professional Account</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/partnership" target="_blank" data-keywords="White Labels" >White Labels</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/partnership" target="_blank" data-keywords="Money Managers" >Money Managers</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/partnership" target="_blank" data-keywords="Introducing Broker Services (IB)" >Introducing Broker Services (IB)</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/career" target="_blank" data-keywords="Career" >Career</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/contact-us" target="_blank" data-keywords="Contact us" >Contact us</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/conflicts-of-interest-policy" target="_blank" data-keywords="Conflicts of Interest" >Conflicts of Interest</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/faq" target="_blank" data-keywords="Frequently Asked Questions (FAQs)" >Frequently Asked Questions (FAQs)</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/licenses-and-regulations" target="_blank" data-keywords="Licenses and Regulations" >Licenses and Regulations</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/mt4" target="_blank" data-keywords="MetaTrader 4" >MetaTrader 4</a></li>
                        <li style="border-bottom: 1px solid #96969699;padding: 2px 0px;display: none;background: linear-gradient(to bottom, #ffffff -12%, #cecece 74%);width: 310px;margin: auto;"><a href="/en/mt4" target="_blank" data-keywords="Trading Platform" >Trading Platform</a></li>

                    </ul>
                </div>
            </div>








            <nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display:none;padding-top:150px" id="mySidebar">
                <span  @click="w3_close()" class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="cursor: pointer;padding:6px 24px">
                    <i class="fa fa-remove"></i>
                </span>
                <div class="w3-bar-block w3-center">
                    <a href="/en" class="w3-bar-item w3-button w3-text-grey w3-hover-black">HOME</a>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">ABOUT US</a>
                    <div class="content">
                        <a href="/en/about-jmi" class="downarrow">About JMI</a>
                        <a href="/en/licenses-and-regulations" class="downarrow">Licenses and Regulations</a>
                        <a href="/en/corporate-philosophy" class="downarrow">Corporate Philosophy</a>
                        <a href="/en/advofjmi" class="downarrow">Advantages of JMI Brokers Platform</a>
                        <a href="/en/contact-us" class="downarrow">Contact us</a>
                        <a href="/en/risk-management-strategy" class="downarrow">Risk Management Strategy</a>
                        <a href="/en/conflicts-of-interest-policy" class="downarrow">Conflict Of Interest Policy</a>
                        <a href="/en/faq" class="downarrow">FAQ</a>
                        <a href="/en/culture" class="downarrow">Culture</a>
                        <a href="/en/career" class="downarrow">Careers</a>
                        <a href="/en/partnership-programs" class="downarrow">Partnership Programs</a>
                        <a href="/en/tradewithjmi" class="downarrow">Why Trade With JMI</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">INVESTMENT CHOICES</a>
                    <div class="content">
                        <a href="/en/forexbroker" class="downarrow">Forex Trading</a>
                        <a style="display:none;" href="/en/forexmargin" class="downarrow">Forex Margin</a>

                        <a href="/en/preciousmetals" class="downarrow">Precious Metals Trading</a>
                        <a href="/en/futureenergies" class="downarrow">Future Energies Trading</a>
                        <a href="/en/futuretrading" class="downarrow"> Indices Trading</a>
                        <a href="/en/stocks2" class="downarrow">Stocks CFDs</a>
                        <a href="/en/commodities" class="downarrow">Commodities</a>

                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">PLATFORMS</a>
                    <div class="content">
                        <a href="/en/forexplatform" class="downarrow">Forex Platform</a>
                        <a href="/en/metatrader4" class="downarrow">MetaTrader 4</a>
                        <a href="/en/mt4-platform-overview" class="downarrow">Mt4 Platform Overview</a>
                        <a href="/en/iphone-and-ipad" class="downarrow">IPhone and IPad</a>
                        <a href="/en/android" class="downarrow">Android</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">TRADING ACCOUNTS </a>
                    <div class="content">
                        <a href="/en/jmiaccounts" class="downarrow">Forex Accounts</a>
                        <a href="#" class="downarrow" style="display:none;">Trading Account</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">PARTNERSHIP </a>
                    <div class="content">
                        <a href="/en/partnership-programs" class="downarrow">Become Our Partner</a>
                        <a href="/en/businesswithjmi" class="downarrow">Why to Make Business with JMI</a>
                        <a href="/en/introducingbrokers" class="downarrow">Introducing Brokers</a>
                        <a href="/en/moneymanagers" class="downarrow">Money Mangers</a>
                        <a href="/en/becomeamoneymanager" class="downarrow">How To Become a Money Mangers</a>
                        <a href="/en/whitelabel" class="downarrow">White Label</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">TOOLS </a>
                    <div class="content">
                        <a href="/en/calendar" class="downarrow">Economic Calendar</a>
                        <a href="/en/pip-calculator" class="downarrow">Pip Calculator</a>
                        <a href="/en/heatmap" class="downarrow">FX HeatMap</a>
                        <a href="/en/dailyfundamental" class="downarrow">Daily Fundamental Analysis</a>
                        <a href="/en/dailytechnical" class="downarrow">Daily Technical Analysis</a>
                        <a href="/en/downloadfiles" class="downarrow">Download Files</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black hidPhone">ENGLISH </a>
                    <div class="content">
                        <a href="#" @click="setlang('ar');" id="lang" class="downarrow hidPhone">العربية</a>
                        <a href="#" @click="setlang('ru');" class="downarrow hidPhone">русский</a>
                    </div>

                </div>
            </nav>
            <div class="row" id="bigNav">
                <div onclick="location.href='/en';" class="col-md-3 col-sm-6" id="JMIImg">
                    <v-lazy-image src="/elis/img/fin-logo2.webp" alt="Logo" width="242px;" height="85px" />
                </div>
                <div class="col-md-9" id="rightNav">
                    <ul>
                        <li>
                            <a href="/en"  class="dropbtn">HOME</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">ABOUT US</a>
                                <div class="dropdown-content" style="min-width: 220px;">
                                    <a  href="/en/about-jmi">About JMI </a>
                                    <a  href="/en/contact-us">Contact us</a>
                                    <a  href="/en/faq">FAQ</a>
                                    <a  href="/en/licenses-and-regulations">Licenses and Regulations</a>
                                    <a  href="/en/risk-management-strategy">Risk Management Strategy</a>
                                    <a  href="/en/culture">Culture</a>
                                    <a  href="/en/corporate-philosophy">Corporate Philosophy</a>
                                    <a  href="/en/conflicts-of-interest-policy">Conflict Of Interest Policy</a>
                                    <a  href="/en/career">Careers</a>
                                    <a  href="/en/advofjmi">Advantages of JMI Brokers Platform</a>
                                    <a  href="/en/partnership-programs">Partnership Programs</a>
                                    <a   href="/en/tradewithjmi" >Why Trade With JMI</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">INVESTMENT CHOICES</a>
                                <div class="dropdown-content" style="min-width: 200px;">
                                    <a   href="/en/forexbroker">Forex Trading</a>
                                    <a   href="/en/preciousmetals">Precious Metals Trading</a>
                                    <a style="display:none;"  href="/en/forexmargin">Forex Margin</a>
                                    <a   href="/en/futureenergies">Future Energies Trading</a>

                                    <a   href="/en/futuretrading" >Indices Trading</a>
                                    <a   href="/en/stocks2" >Stocks CFDs</a>
                                    <a href="/en/commodities">Commodities</a>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">PLATFORMS</a>
                                <div class="dropdown-content" style="min-width: 200px;">
                                    <a   href="/en/forexplatform">Forex Platform</a>
                                    <a   href="/en/metatrader4">MetaTrader 4</a>
                                    <a   href="/en/iphone-and-ipad">IPhone and IPad</a>
                                    <a   href="/en/mt4-platform-overview">Mt4 Platform Overview</a>
                                    <a   href="/en/android">Android</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">TRADING ACCOUNTS</a>
                                <div class="dropdown-content" style="min-width: 135px;">
                                    <a  href="/en/jmiaccounts">Forex Accounts</a>
                                    <a  href="#" style="display:none;">Trading Account</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">PARTNERSHIP</a>
                                <div class="dropdown-content" style="min-width: 220px;">
                                    <a   href="/en/partnership-programs">Become Our Partner</a>
                                    <a   href="/en/moneymanagers">Money Mangers</a>
                                    <a   href="/en/businesswithjmi">Why to Make Business with JMI</a>
                                    <a   href="/en/becomeamoneymanager">How To Become a Money Mangers</a>
                                    <a   href="/en/introducingbrokers">Introducing Brokers</a>
                                    <a   href="/en/whitelabel">White Label</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">TOOLS</a>
                                <div class="dropdown-content" style="min-width: 200px;">
                                    <a   href="/en/calendar">Economic Calendar</a>
                                    <a   href="/en/dailyfundamental">Daily Fundamental Analysis</a>
                                    <a   href="/en/pip-calculator">Pip Calculator</a>
                                    <a   href="/en/dailytechnical">Daily Technical Analysis</a>
                                    <a   href="/en/heatmap">FX HeatMap</a>
                                    <a   href="/en/downloadfiles">Download Files</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">ENGLISH</a>
                                <div class="dropdown-content" style="min-width: 100px;">
                                    <a href="#"  @click="setlang('ar');" id="lang">العربية</a>
                                    <a href="#" @click="setlang('ru');">русский</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6" id="openBarsNav">
                    <span class="w3-button w3-xxlarge w3-white w3-right" @click="w3_open()"><i class="fa fa-bars"></i></span>
                </div>
            </div>






        </div>
    </div> -->
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
// import "../../../../../public/assets-up/css/layout.css";

require('../../../../../public/wave/css/vendors/uikit.min.css')
require('../../../../../public/assets/css/bootstrap.min.css')
require('../../../../../public/assets/new_cpanel/css/font-awesome.min.css')
require('../../../../../public/wave/css/flags.css')
require('../../../../../public/assets/css/Style.css')
// require('../../../../../public/assets/css/Style1.css')
// require('')

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
