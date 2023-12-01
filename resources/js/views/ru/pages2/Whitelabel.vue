<template>



<div class="row gray_bg">
            <img src="/assets/img/whitelabel.jpg" alt="" class="img-responsive  picHeight" />
        </div>
    <div class="row gray_bg mrtb40">
        <div class="container">
            <h2>Белые этикетки</h2>
            <p>JMI Brokers LTD может помочь в развитии вашего бренда с помощью наших экономически эффективных решений под ключ. Наши продукты White Label разработаны для обеспечения гибкости, чтобы вы могли максимально увеличить свой потенциальный доход.</p>



            <h2>Программа White Label</h2>
            <br />
            <p>Используйте наш технологический опыт в MT4 и институциональном рыночном пространстве для развития вашего бренда. JMI Brokers может помочь вам расширить с нашими экономически эффективными решениями под ключ. Наши решения white label разработаны для обеспечения гибкости, чтобы вы могли максимально увеличить свой потенциальный доход.</p>


            <h2>Предлагая доступ к нескольким платформам, в том числе:</h2>
            <ul class="li1">
                <Li> 1. Многоязычные продукты и поддержка </li>
                <Li> 2. Продвинутые графики </li>
                <Li> 3. Алгоритмические торговые решения </li>
                <Li> 4. Образовательные услуги </li>
                <Li> 5. Комплексное решение для бэк-офиса </li>
                <Li> 6. Решение по распределению Money Manager </li>
                <Li> 7. Продвинутые дилинговые решения </li>
            </ul>
            <div class="speacer20"></div>
            <div class="speacer20"></div>


            <p>Позвоните одному из наших профессиональных торговых представителей, чтобы обсудить, как JMI Brokers могут помочь в развитии вашего бренда с помощью нашей программы White Label. +97144096705</p>

            <a href="/ru/become-partner/"  class="become-partner slide-live-button">Станьте нашим партнером</a>


            <div class="speacer20"></div>

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
            site_title: `White Labels`,
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
