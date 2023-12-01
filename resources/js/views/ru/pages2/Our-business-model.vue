<template>

 <div class="row gray_bg mrtb40">
            <div class="container">
                <h2>Наша бизнес-модель</h2>
                <p>
                    Все клиентские заказы автоматически передаются на рынок ECN (Electronic Communication Network) через технологию метатрейдер 4 Bridge, которая соединяет серверы JMI с ECN. Сделки заключаются по рыночным ценам с использованием Market Execution.
                </p>
                <div class="speacer20"></div>
                <h2>Детали:</h2>
                <p>
                    Более высокий уровень ликвидности <br />
                                         Мгновенное выполнение <br />
                                         Нет реквотирования <br />
                                         Комиссия взимается
                </p>
                <div class="speacer20"></div>
            </div>
 </div>

 <div class="row gray_bg mrtb40">
                <img src="/assets/img/dataflow.jpg" alt="" class="img-responsive center-block w100" />
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
            site_title: `Our Business Model`,
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
