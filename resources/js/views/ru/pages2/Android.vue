<template>

             <div class="row gray_bg ">
            <img src="/assets/img/android_header.jpg" alt="Android" width="100%" class="img-responsive picHeight" />
        </div>

     <div class="row gray_bg mrtb40">
        <div class="container">

            <h2>Android</h2>

            <div class="speacer20"></div>

            <h4>Торговые Платформы</h4>
            <p>JMI предлагает множество торговых платформ, каждая из которых имеет свои преимущества. Просмотрите наш выбор торгового программного обеспечения (включая наши мобильные приложения) и найдите платформу, которая лучше всего подходит для вас</p>

            <div class="col-md-6 col-sm-6 col-xs-12 pdd0 text-center txt-apps">
                <h2>Торговые приложения для Android.</h2>
                <div class="speacer20"></div>

                <div class="speacer20"></div>

                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>

               <a  type="button" class="header-btn" href="/ru/signup">Открой счет</a>
                <img src="/assets/img/app-store.jpg">
            </div>

            <div class="speacer20"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 pdd0">
                <img src="/assets/img/tablet.png" alt="" class="img-responsive center-block" />
            </div>


            <h4>метатрейдер 4 для iPhone и iPad</h4>
            <p>
                Торговая платформа: метатрейдер 4 <br>
                 Системные требования: сенсорный смартфон или планшет, андроид 2.1 и более поздние версии, 3G / Wi-Fi
            </p>
            <br>
            <div class="speacer20"></div>
          <a  type="button" class="header-btn" href="https://download.mql5.com/cdn/mobile/mt4/android?server=JMIBrokers-Demo,JMIBrokers-JMI">Download</a>
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
            site_title: `Android`,
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
