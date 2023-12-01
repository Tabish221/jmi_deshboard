<template>


    <div class="row  mrtb40">
        <div class="container">
            <h1> Лицензии и правила</h1>
            <p>
                При выборе брокера важно убедиться, что он лицензирован и регулируется заслуживающим доверия государственным органом. Каждый лицензирующий орган контролирует практику работы финансовых компаний, обеспечивая строгое соблюдение всех норм.
                <br />

            </p>
            <div class="speacer20"></div>

            <h4 style="display:none;">1- <img src="/assets/img/drawn-switz-icon-dark.png/" style="width:25px;height:25px;" />швейцарский юрист</h4>
            <p style="display:none;">
                JMI BROKERS AG, швейцарская юридическая корпорация с зарегистрированным офисом в Цуге с регистрацией<a href="/assets/downloads/CHE.pdf" ># CHE 334-229-499 </a> и цель "Управление активами и фондами"
            </p>


            <h4>1- Республика Вануату Лицензия</h4>
            <p>
                JMI Brokers LTD является лицензированным провайдером финансовых услуг от Комиссии по финансовым услугам Вануату и уполномочен вести бизнес по сделкам с ценными бумагами в соответствии с<a href="/assets/Downloads/Vanuatu-license.pdf/"> регистрационный номер15010</a>

            </p>
            <p>
                Регулятор VFSC полностью контролирует деятельность участников рынка и обеспечивает соответствие международным стандартам, в частности, предоставление брокерских услуг лицензированными компаниями. Регулятор гарантирует прозрачность работы и подтверждает, что только компании с высокой степенью надежности могут получить право на получение лицензии на финансовую деятельность в юрисдикции регистратора.

            </p>
            <p>VFSC строго следует международным правовым нормам и соблюдает все законы о борьбе с отмыванием денег.</p>
            <a href="/assets/Downloads/AML-Policy.pdf" title="Anti Money Laundering">Борьба с обмыванием денег</a><br />
            <img src="/assets/img/vanuatu-license.png" altr="Vanuatu License" style="width:100%;"/>


        </div>
    </div>

    <div class="container">


        <div class="speacer20"></div>
        <h2>Автоматизированное управление рисками</h2>
        <p>
            Автоматизированная система управления рисками JMI Brokers LTD предназначена для снижения риска истощения вашего торгового счета до нуля или его отрицательного результата.
        </p>
    </div>












    <div class="row  mrtb40">
        <div class="container">

            <h1>Наша поддержка и услуги </h1>
            <h2>Телефонная торговля 24/7 </h2>
            <h2>Быстрый вывод 1 рабочий день  </h2>

        </div>
    </div>



    <div class="row  mrtb40">
        <div class="container">

            <h1>Наше исполнение </h1>
            <h2>Нет дилингового стола </h2>
            <h2>Только 2-й автоматизированный </h2>
            <h2>Торговля с фиксированным спредом </h2>

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
            site_title: `Why JMI Brokers`,
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

    },
    methods:{
    }
});
</script>
