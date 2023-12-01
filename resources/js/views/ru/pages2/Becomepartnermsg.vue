<template>



<div class="container">
            <div id="centerMsg" class="row mrtb40">
                <h1 > Системное сообщение</h1>
                <p>Спасибо. Мы получили ваш запрос и свяжемся с вами как можно скорее.<br>
                    JMI Brokers смотрит вперед, чтобы помочь вам и гарантировать приятный успешный опыт. <br>
                    Чтобы улучшить обслуживание, оставьте нам свой отзыв.<br>
                    Свяжитесь с нами, нажав <a onclick="psdvWnow(); return false;" href="/ru/contact-us"><span id="psdvWnl">Здесь</span></a><br>
                    Желаем всем успехов<br>
                </p>

        <a id="" class="btn  slide-live-button" target="_blank" href="https://download.mql5.com/cdn/web/jmi.brokers.ltd/mt4/jmibrokers4setup.exe">Download The Platform</a>
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
            site_title: `System Message`,
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
.li1 li { font-size: 14px; padding-bottom: 10px;}
.stylebb {display:block;
    height:37px;
    width:197px;
    border-style:none;}
#downloadBtn
{
    width: 90%;
    max-width: 300px;
    background-color: #0059b2;
    color: #ffc926;
    padding: 15px 20px;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    margin-top:2rem;
    border:none;
    cursor:pointer;
}
#downloadBtn:hover , #downloadBtn:focus
{
    background-color: #ffc926;
    color: #0059b2;
}
#centerMsg
{

    margin:1rem;

}
#centerMsg h1
{
    color:#0059b2;
    color: #0059b2;
    font-size: 4rem;
    margin-bottom: 2rem;
    font-weight: bold;
}
#centerMsg p
{
    color: #999;
    font-size: 2rem;

}
#psdvWnl
{
    text-decoration:underline;
    font-weight:bold;
}

.slide-live-button {
    border: unset !important;
    display: inline-block;
    background-color: #ffc926;
    color: #0059b2 !important;
    padding: 15px 20px;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: bold;
    margin: 5px;
}

.slide-live-button:hover {
    transition: all ease 200ms;
    border: unset !important;
    display: inline-block;
    background-color: #0059b2 !important;
    color: #ffc926 !important;
    padding: 15px 20px;
    font-size: 16px;
    text-decoration: none;
    margin: 5px;
}

</style>
