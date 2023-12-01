<template>




						 <div class="row gray_bg ">
						<img src="/assets/img/iphone_header.jpg" alt="Iphone and Ipad" width="100%" class="img-responsive picHeight" />
				</div>


    <div class="row gray_bg mrtb40">
        <div class="container">

            <h2 class="text-center"><span class="fa fa-arrow-circle-right jmiyellow" aria-hidden="true"></span> Iphone & Ipad</h2>

            <div class="speacer20"></div>

            <h4>Торговые Платформы</h4>
            <p>JMI предлагает множество торговых платформ, каждая из которых имеет свои преимущества. Просмотрите наш выбор торгового программного обеспечения (включая наши мобильные приложения) и найдите платформу, которая лучше всего подходит для вас</p>

            <div class="col-md-4 col-sm-4 col-xs-12 pdd0 text-center">
                <div class="speacer20"></div>
                <div class="border-5px">
                    <h1 class="padding-0">Торговые приложения для</h1>

                    <h2>iPhone & iPad.</h2>
                </div>

                <br>

                <br>
                <a type="button" class="header-btn" href="/ru/signup/">Открыть учетную запись
                    </a>
                <img src="/assets/img/app-store.jpg/">
            </div>

            <div class="col-md-8 col-sm-8 col-xs-12 pdd0">
                <img src="/assets/img/iphn.jpg/" alt="" class="img-responsive " />
            </div>

            <h4>метатрейдер 4 для iPhone и iPad</h4>
            <p>
                Торговая платформа: метатрейдер 4<br>
                Системные требования: iPhone 3GS, 4, 4S, iPod touch, iPad 1, iOS 4.0 и более поздние версии, 3G / Wi-Fi
            </p>
            <br>

         <a type="button" class="header-btn" href="https://download.mql5.com/cdn/mobile/mt4/ios?server=JMIBrokers-Demo,JMIBrokers-JMI">Download</a>

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
            site_title: `Iphone & Ipad`,
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
