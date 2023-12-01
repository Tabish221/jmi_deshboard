

<template>



    <div class="container">
        <div style="text-align:center;width:550px;margin:20px auto;" class="row mrtb40">
            <h1 style="color:#97b54d;">    نظام الرسائل</h1>
            <p style="font-weight:bold;">شكرا لك . لقد تم استلام طلبك وسيتم التواصل معك فى اقرب وقت فى اوقالتك المختارة<br />
                جى ام اى بروكرز  لمساعدتكم وضمان تجربة ناجحة لطيفة. للمضي قدما خدمتكم ، يرجى تزويدنا ملاحظاتك .<br>


                دعم اونلاين بالضغط  <a onclick="psdvWnow(); return false;" href="#"><span id="psdvWnl">هنا</span></a><br>
                نتمنى لك كل نجاح<br>
            </p>
            <p style="text-align:center;width:100%;"><a class="btn btn-lg btn-success btn-block" style="width:70%;margin:0 auto;" target="_blank" href="https://download.mql5.com/cdn/web/jmi.brokers.ltd/mt4/jmibrokers4setup.exe">تحميل المنصة</a></p>
        </div>
    </div>




</template>

<script>
import { useHead } from '@vueuse/head'
import {computed, reactive, ref} from "vue";
import axios from 'axios';
import {useRouter} from "vue-router";
const errors = ref()
const router = useRouter();

export default ({
    data(){
        return{
            site_title: `Call Back Request`,
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
                    content: computed(() => this.site_description),
                },
                {
                    name: `keywords`,
                    content: computed(() => this.site_keywords),
                },
            ],

        })
    }
});
</script>
    <style type="text/css">
        .style5 {color: #a6c54c; font-size: 16px;}
        .li1 li {font-size: 14px; padding-bottom: 10px;}
        .stylebb {display:block;
            height:37px;
            width:197px;
            border-style:none;}
    </style>
