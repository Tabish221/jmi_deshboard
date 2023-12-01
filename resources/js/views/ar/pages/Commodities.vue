<template>


    <div className="row gray_bg">
        <img src="/assets/img/commoditiescover.jpg" alt=""
             className="img-responsive center-block picHeight"/>
    </div>

    <!-------------------------------------- Start Collapse ------------------------------------------------------------------->

    <h1 className="cfdHeader"> CFD Commodities </h1>
    <ul className="nav nav-tabs" style="margin-bottom: 30px; margin-left:20px;">
        <li className="active"><a data-toggle="tab" href="#menu1">CFDs/Energy</a></li>
        <li><a data-toggle="tab" href="#menu2">CFDs Commodity</a></li>
        <li style="display:none;"><a data-toggle="tab" href="#menu3">CFD Commodity</a></li>
    </ul>

    <div className="tab-content">
        <div id="menu1" className="tab-pane fade in active">
            <iframe src="/en/datatable1"></iframe>
        </div>
        <div id="menu2" className="tab-pane fade">
            <iframe src="/en/datatable2"></iframe>
        </div>

    </div>

    <a className="read cfdHeader" href="/ar/stocks2">Read more ...</a>

    <!------------------------------------------------------ End Collapse------------------------------------------------------->


</template>

<script>
import {useHead} from '@vueuse/head'
import {computed, reactive, ref} from "vue";
import axios from 'axios';
import {useRouter} from "vue-router";
import ('jquery')
import jquery from 'jquery'
window.jQuery = jquery
import $ from 'jquery'
import('/wave/js/vendors/bootstrap.min.js')

const errors = ref()
const router = useRouter();

export default ({
    data() {
        return {
            site_title: `CFD Commodities`,
            site_description: ``,
            site_keywords: '',

        }
    },
    mounted() {
        useHead({
            // Can be static or computed
            title: computed(() => this.site_title),
            meta: [
                {
                    name: `description`,
                    content: computed(() => ''),
                },
                {
                    name: `keywords`,
                    content: computed(() => ''),
                },
            ],

        })

    }
});
</script>
<style>
.read {
    color: #0059b2;

    font-weight: bold;
    font-size: 21px;
    text-decoration: underline;
}

.stocksContent {
    margin: 0px 30px 0px 60px !important
}

.nav-tabs > li.active {
    background-color: white !important;
}

.nav > li > a {
    color-: #0059b2;
    font-size-: 18px !important;
    font-family: Roboto-Light;
}

h3, h4 {
    font-family: Roboto-Light;
}

.bold-blue {
    color: #0059b2;
    font-weight: bold;
    font-family: Roboto-Bold;
}

.blue {
    color: #0059b2;
}

.blue-center {
    color: #888888;
    text-align: center;
}

.btnStocks {
    background-color: #ffc926;
    border: none;
    padding: 7px 15px;
    color: white;
    border-radius: 5px;
    font-family: 'Roboto-Light';
    font-size: 17px;
}

iframe {
    border: none;
}

p {
    color: #888888;
    font-family: Roboto-Light;
}

#menu1 iframe {
    width: 100%;
    height: 520px;
}

#menu2 iframe {
    width: 100%;
    height: 540px;
}

#menu3 iframe {
    width: 100%;
    height: 495px;
}

@media only screen and (max-width: 897px) {
    #menu1 iframe {
        height: 450px;
    }

    #menu2 iframe {
        height: 470px;
    }

    #menu3 iframe {
        height: 466px;
    }
}

@media only screen and (max-width: 768px) {

}

@media only screen and (max-width: 550px) {
    .stocksContent {
        margin: 0px 10px 0px 40px !important
    }

    #pagList {
        margin-bottom: 0px;
    }

    #menu1 iframe {
        height: 400px;
    }

    #menu2 iframe {
        height: 450px;
    }

    #menu3 iframe {
        height: 450px;
    }

    .nav > li > a {
        padding: 8px;
        font-size: 12px !important;
    }

    p {
        font-size: 12px;
    }

    h2 {
        font-size: 25px;
    }

    h3 {
        font-size: 18px;
    }

    h4 {
        font-size: 16px;
    }

    .btnStocks {
        padding: 7px 4px;
        font-size: 13px;
    }

    .blue-center {
        font-size: 14px;
    }
}


</style>

<style>

iframe {
    border: none;
}

.cfdHeader {
    color: #0059b2;
    font-weight: bold;
    font-size: 32px;
    font-family: Roboto-Bold;
    text-transform: uppercase;
    margin: 20px;
}

#collapses {
    margin: 20px;
}

.collapseContainer {
    border-bottom: 1px solid #0059b2;
}

.collapsibleBtn {
    width: 100% !important;
    text-align: left;
    outline: none;
    border: none;
    background-color: white;
    color: #888888;
    cursor: pointer;
    padding: 18px;
    font-size: 19px;
}

.collapsibleBtn.active, .collapsibleBtn:hover {
    background-color: #f5f5f5;
    color: #0059b2;
}

.contentClps {
    transition: height .7s ease-in-out;
    padding: 0 18px;
    height: 0px;
    overflow: hidden;
    background-color: white;

}

.ParaCollapse {
    font-size: 16px;
    margin-top: 10px;
}

#table_1_wrapper {
    overflow: scroll !important;
}

.read {
    text-decoration: underline;
    text-transform: inherit;
}

@media only screen and (max-width: 768px) {
    .cfdHeader {
        font-size: 25px;
        margin: 20px 10px;
    }

    .collapsibleBtn {
        font-size: 15px;
        padding: 12px;
    }

    #collapses {
        margin: 20px 10px;
    }

    .ParaCollapse {
        font-size: 15px;
    }
}

@media only screen and (max-width: 500px) {
    .cfdHeader {
        font-size: 16px;
        margin: 15px 5px;
    }

    .collapsibleBtn {
        font-size: 12px;
        padding: 9px 7px;
    }

    #collapses {
        margin: 10px 5px;
    }

    .ParaCollapse {
        font-size: 12px;
    }

    .contentClps {
        padding: 0px;
    }
}

/************************************************************End Collapse**********************************/

</style>
