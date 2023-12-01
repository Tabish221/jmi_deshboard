<template>
    <link rel="stylesheet" href="/assets/css/rtl/style.css">

    <link rel="preload" href="/js/app.js" as="script">
    <div id="fixedBtns">
        <a href="/ar/signup" class="slide-live-button uk-border-rounded ">فتح حساب حقيقي</a>
        <a href="/ar/signup" class="slide-demo-button uk-border-rounded ">فتح حساب تجريبي</a>
    </div>

    <!-- header content begin -->
    <div class="uk-section uk-padding-remove-vertical in-header-home ">

        <div class="row">
            <div class="col-lg-9 col-md-8 col-lg-push-3 col-md-push-4  " id="first-level-left">

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

            <div class="col-lg-3 col-md-4 col-lg-pull-9 col-md-pull-8 myFlex" id="first-level-right" >

                <div v-if="this.LoggedUser">
                    <a href="/ar/cpanel/home" class=""><i class="fa fa-user" aria-hidden="true"></i></a>
                    <a href="/ar/logout" class="uk-button-text">خروج</a>
                </div>
                <div v-else="this.LoggedUser">
                    <a href="/ar/login" class="uk-button-text">دخول</a>
                </div>





                <div   id="header-search" class="form-group">
                    <input type="text" name="search"  placeholder="البحث.." class="form-control search">
                    <a href="#" id="clear_search"  @click="clear_search()" style=" border-left: unset; color: #fff; font-weight: bold; "><i class="fa fa-trash-o" aria-hidden="true" style=" color: #0059b2; "></i> </a>
                </div>

                <div>
                    <ul id="myUL" style="width: 100%; border-radius: 10px; position: absolute; top: 34px; right: 0px; z-index: 9; list-style-type: none; padding-left: 0px;">
                        <li style=""><a href="/ar/forex" target="_blank" data-keywords="Monitoring Risk Exposure " style=" border-right: unset; ">مراقبة التعرض للمخاطر</a></li>
                        <li style=""><a href="/ar/forex" target="_blank" data-keywords="Forex Margin Trading and Leverage" style=" border-right: unset; ">هامش الفوركس والرافعة المالية</a></li>
                        <li style=""><a href="/ar/forex" target="_blank" data-keywords="Advantages of trading Forex" style=" border-right: unset; ">مميزات تداول الفوركس</a></li>
                        <li style=""><a href="/ar/forex" target="_blank" data-keywords="Forex Currency Pairs" style=" border-right: unset; ">ازواج الفوركس</a></li>
                        <li style=""><a href="/ar/future" target="_blank" data-keywords="Future (OTC) Currencies" style=" border-right: unset; ">العملات المستقبلية</a></li>
                        <li style=""><a href="/ar/future" target="_blank" data-keywords="Precious Metals Gold and Silver" style=" border-right: unset; ">المعادن الثمينة , ذهب , فضة </a></li>
                        <li style=""><a href="/ar/future" target="_blank" data-keywords="Future (OTC) Energies" style=" border-right: unset; ">طاقة المستقبل</a></li>
                        <li style=""><a href="/ar/indices" target="_blank" data-keywords="Future (OTC) Indices" style=" border-right: unset; ">مؤشرات المستقبل</a></li>
                        <li style=""><a href="/ar/indices" target="_blank" data-keywords="American Stocks / Shares" style=" border-right: unset; ">الأسهم الامريكية</a></li>
                        <li style=""><a href="/ar/about-jmi" target="_blank" data-keywords="About JMI Brokers" style=" border-right: unset; ">عن الشركة</a></li>
                        <li style=""><a href="/ar/whyjmi" target="_blank" data-keywords="Safety of clients funds" style=" border-right: unset; ">حفظ اموال العملاء</a></li>
                        <li style=""><a href="/ar/trading" target="_blank" data-keywords="Account Types" style=" border-right: unset; ">انواع الحسابات</a></li>
                        <li style=""><a href="/ar/trading" target="_blank" data-keywords="JMI Brokers Micro Account" style=" border-right: unset; ">الحساب المايكرو</a></li>
                        <li style=""><a href="/ar/trading" target="_blank" data-keywords="JMI Brokers Standard Account" style=" border-right: unset; ">الحساب القياسى</a></li>
                        <li style=""><a href="/ar/trading" target="_blank" data-keywords="JMI Brokers Professional Account" style=" border-right: unset; ">الحساب المهنى</a></li>
                        <li style=""><a href="/ar/partnership" target="_blank" data-keywords="White Labels" style=" border-right: unset; ">وايت ليبل</a></li>
                        <li style=""><a href="/ar/partnership" target="_blank" data-keywords="Money Managers" style=" border-right: unset; ">ادارة الاموال</a></li>
                        <li style=""><a href="/ar/partnership" target="_blank" data-keywords="Introducing Broker Services (IB)" style=" border-right: unset; ">المعرف الوسيط</a></li>
                        <li style=""><a href="/ar/career" target="_blank" data-keywords="Career" style=" border-right: unset; ">الوظائف</a></li>
                        <li style=""><a href="/ar/contact-us" target="_blank" data-keywords="Contact us" style=" border-right: unset; ">أتصل بنا</a></li>
                        <li style=""><a href="/ar/conflicts-of-interest-policy" target="_blank" data-keywords="Conflicts of Interest" style=" border-right: unset; ">تضارب المصالح</a></li>
                        <li style=""><a href="/ar/faq" target="_blank" data-keywords="Frequently Asked Questions (FAQs)" style=" border-right: unset; ">الأسئلة الشائعة</a></li>
                        <li style=""><a href="/ar/licenses-and-regulations" target="_blank" data-keywords="Licenses and Regulations" style=" border-right: unset; ">التراخيص واللوائح</a></li>
                        <li style=""><a href="/ar/mt4" target="_blank" data-keywords="MetaTrader 4" style=" border-right: unset; ">ميتاتريدر 4</a></li>
                        <li style=""><a href="/ar/mt4" target="_blank" data-keywords="Trading Platform" style=" border-right: unset; ">منصات التداول</a></li>

                    </ul>
                </div>
            </div>








            <nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display:none;padding-top:150px" id="mySidebar">
                <span  @click="w3_close()" class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="cursor: pointer;padding:6px 24px">
                    <i class="fa fa-remove"></i>
                </span>
                <div class="w3-bar-block w3-center">
                    <a href="/ar" class="w3-bar-item w3-button w3-text-grey w3-hover-black">الرئيسية</a>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">حول الشركة</a>
                    <div class="content">
                        <a href="/ar/about-jmi" class="downarrow">حول الشركة </a>
                        <a href="/ar/licenses-and-regulations" class="downarrow">التراخيص واللوائح</a>
                        <a href="/ar/corporate-philosophy" class="downarrow">فلسفة الشركة</a>
                        <a href="/ar/advofjmi" class="downarrow">مزاية منصة JMI</a>

                        <a href="/ar/contact-us" class="downarrow">اتصل بنا</a>
                        <a href="/ar/risk-management-strategy" class="downarrow">استراتيجية ادارة المخاطر</a>
                        <a href="/ar/conflicts-of-interest-policy" class="downarrow">سياسة تضارب المصالح</a>
                        <a href="/ar/faq" class="downarrow">الأسئلة الأكثر شيوعا</a>
                        <a href="/ar/culture" class="downarrow">ثقافتنا</a>
                        <a href="/ar/career" class="downarrow">وظائف</a>
                        <a href="/ar/partnership-programs" class="downarrow">برامج الشراكة</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">خيارات الأستثمارات</a>
                    <div class="content">
                        <a href="/ar/forexbroker" class="downarrow">تداول الفوركس</a>
                        <a href="/ar/forexmargin" class="downarrow">هامش الفوركس</a>
                        <a href="/ar/forexplatform" class="downarrow">منصات الفوركس </a>
                        <a href="/ar/preciousmetals" class="downarrow">تداول المعادن الثمينة</a>
                        <a href="/ar/futureenergies" class="downarrow">تداول طاقات المستقبل</a>
                        <a href="/ar/futuretrading" class="downarrow">مؤشرات التداول المستقبلية</a>
                        <a href="/ar/usshares" class="downarrow">الأسهم الأمريكية</a>
                        <a href="/ar/tradewithjmi" class="downarrow">لماذا التداول معنا ؟</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">منصات التداول</a>
                    <div class="content">
                        <a href="/ar/metatrader4" class="downarrow">ميتاتريدر 4</a>
                        <a href="/ar/mt4-platform-overview" class="downarrow">رؤية حول ميتاتريدير 4</a>
                        <a href="/ar/iphone-and-ipad" class="downarrow">ايفون و ايباد</a>
                        <a href="/ar/android" class="downarrow">اندرويد</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">حسابات التداول </a>
                    <div class="content">
                        <a href="/ar/jmiaccounts" class="downarrow">حسابات الفوركس </a>
                        <a href="#" class="downarrow">حسابات التداول</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">الشراكة </a>
                    <div class="content">
                        <a href="/ar/partnership-programs" class="downarrow">كن شريكا لنا</a>
                        <a href="/ar/businesswithjmi" class="downarrow">لماذا التعامل معنا</a>
                        <a href="/ar/introducingbrokers" class="downarrow">الوسيط المعرف</a>
                        <a href="/ar/moneymanagers" class="downarrow">مدراء الأموال</a>
                        <a href="/ar/becomeamoneymanager" class="downarrow">كيف تكون مدير اموال</a>
                        <a href="/ar/whitelabel" class="downarrow">وايت ليبل</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">الأدوات </a>
                    <div class="content">
                        <a href="/ar/calendar" class="downarrow">الأجندة الاقتصادية</a>
                        <a href="/ar/pip-calculator" class="downarrow">حاسبة النقاط</a>
                        <a href="/ar/heatmap" class="downarrow">خارطة الحرارة للعملات</a>
                        <a href="/ar/dailyfundamental" class="downarrow">التحليل الأساسى اليومى</a>
                        <a href="/ar/dailytechnical" class="downarrow">التحليل الفنى اليومى</a>
                        <a href="/ar/downloadfiles" class="downarrow">تحميل الملفات</a>
                    </div>
                    <a href="#" class="collapsible w3-bar-item w3-button w3-text-grey w3-hover-black">العربية </a>
                    <div class="content">
                        <a href="#" onclick="setlang('en');" id="langSelectorEnglish" class="downarrow">English</a>
                        <a href="#" onclick="setlang('ru');" id="langSelectorArabic" class="downarrow">русский</a>
                    </div>

                </div>
            </nav>
            <div class="row" id="bigNav">
                <div onclick="location.href='/ar';" class="col-md-3 col-sm-6" id="JMIImg">
                    <v-lazy-image src="/elis/img/fin-logo2.webp" alt="Logo" width="242px;" height="85px" />
                </div>
                <div class="col-md-9" id="rightNav">
                    <ul>
                        <li>
                            <a href="/ar"  class="dropbtn">الرئيسية</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">حول الشركة</a>
                                <div class="dropdown-content" style="min-width: 220px;">
                                    <a  href="/ar/about-jmi">حول الشركة </a>
                                    <a  href="/ar/contact-us">اتصل بنا</a>
                                    <a  href="/ar/faq">الأسئلة الأكثر شيوعا</a>
                                    <a  href="/ar/licenses-and-regulations">التراخيص واللوائح</a>
                                    <a  href="/ar/risk-management-strategy">استراتيجية ادارة المخاطر</a>
                                    <a  href="/ar/culture">ثقافتنا</a>
                                    <a  href="/ar/corporate-philosophy">فلسفة الشركة</a>
                                    <a  href="/ar/conflicts-of-interest-policy">سياسة تضارب المصالح</a>
                                    <a  href="/ar/career">وظائف</a>
                                    <a  href="/ar/advofjmi">مزاية منصة JMI</a>
                                    <a  href="/ar/partnership-programs">برامج الشراكة</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">خيارات الأستثمارات</a>
                                <div class="dropdown-content" style="min-width: 200px;">
                                    <a   href="/ar/forexbroker">تداول الفوركس</a>
                                    <a   href="/ar/preciousmetals">تداول المعادن الثمينة</a>
                                    <a   href="/ar/forexmargin">هامش الفوركس</a>
                                    <a   href="/ar/futureenergies">تداول طاقات المستقبل</a>
                                    <a   href="/ar/forexplatform">منصات الفوركس </a>
                                    <a href="/ar/futuretrading">مؤشرات التداول المستقبلية</a>
                                    <a href="/ar/usshares">الأسهم الأمريكية</a>
                                    <a href="/ar/tradewithjmi">لماذا التداول معنا ؟</a>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">منصات التداول</a>
                                <div class="dropdown-content" style="min-width: 200px;">
                                    <a   href="/ar/metatrader4">ميتاتريدر 4</a>
                                    <a   href="/ar/iphone-and-ipad">ايفون و ايباد</a>
                                    <a   href="/ar/mt4-platform-overview">رؤية حول ميتاتريدير 4</a>
                                    <a   href="/ar/android">اندرويد</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">حسابات التداول</a>
                                <div class="dropdown-content" style="min-width: 135px;">
                                    <a  href="/ar/jmiaccounts">حسابات الفوركس</a>
                                    <a  href="#">حسابات التداول</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">الشراكة</a>
                                <div class="dropdown-content" style="min-width: 220px;">
                                    <a   href="/ar/partnership-programs">كن شريكا لنا</a>
                                    <a   href="/ar/moneymanagers">مدراء الأموال</a>
                                    <a   href="/ar/businesswithjmi">لماذا التعامل معنا</a>
                                    <a   href="/ar/becomeamoneymanager">كيف تكون مدير اموال</a>
                                    <a   href="/ar/introducingbrokers">الوسيط المعرف</a>
                                    <a   href="/ar/whitelabel">وايت ليبل</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">الأدوات</a>
                                <div class="dropdown-content" style="min-width: 200px;">
                                    <a   href="/ar/calendar">الأجندة الاقتصادية</a>
                                    <a   href="/ar/dailyfundamental">التحليل الأساسى اليومى</a>
                                    <a   href="/ar/pip-calculator">حاسبة النقاط</a>
                                    <a   href="/ar/dailytechnical">التحليل الفنى اليومى</a>
                                    <a   href="/ar/heatmap">خارطة الحرارة للعملات</a>
                                    <a   href="/ar/downloadfiles">تحميل الملفات</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">العربية</a>
                                <div class="dropdown-content" style="min-width: 100px;">
                                    <a href="#"  @click="setlang('en');" id="lang">English</a>
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
                    this.reuters_news=result.data.data.ar.reuters_news
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
