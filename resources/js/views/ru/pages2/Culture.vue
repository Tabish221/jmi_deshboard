<template>

  <div class="row gray_bg">
        <img src="/assets/img/lgculture.png" alt="" class="img-responsive center-block picHeight" />
    </div>

    <div class="row gray_bg mrtb40">
        <div class="container">
            <H3> Целостность </h3>
            <p> Наш успех связан с успехом наших клиентов; поэтому мы всегда действуем этично и честно. </p>

            <h3> Глобальное разнообразие </h3>
            <p> У каждого сотрудника уникальные идеи и оригинальные таланты, отражающие многообразный характер нашего международного бизнеса. </p>

            <h3> Динамическая рабочая среда </h3>
            <p> Мы планируем будущее, принимаем изменения и выполняем их с точностью. </p>

            <h3> Ведущее в отрасли обслуживание клиентов </h3>
            <p> Наша уникальная бизнес-модель, ориентированная на клиента, обеспечивает непревзойденное обслуживание клиентов. </p>

            <H3> Инновации </h3>
            <p> Наша компания поощряет инновации в открытии, разработке и коммерциализации революционных продуктов. </p>

            <h3> Совместная работа в команде </h3>
            <p> Краткое и своевременное общение создает идеальную атмосферу для сотрудничества и единства. </p>

            <H3> Wellness </h3>
            <p> Мы понимаем важность баланса между работой и семьей и поддерживаем здоровый образ жизни. </p>

            <h3> Обучение и постоянное улучшение </h3>
            <p> Мы поддерживаем культуру, которая поддерживает индивидуальный рост и развитие личности. </p>

            <h3> Делаем работу веселой </h3>
            <p> Будь то приготовление чили, турнир по настольному футболу или аренда кинотеатра для последней премьеры, мы весело проводим время! </p>

            <div class="speacer20"></div>
            <img src="/assets/img/lg-culture-bottom.jpg" alt="" class="img-responsive center-block" />
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
            site_title: `CULTURE`,
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
