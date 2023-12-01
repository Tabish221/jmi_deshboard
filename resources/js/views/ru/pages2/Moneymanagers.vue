<template>




<div class="row gray_bg">
            <img src="/assets/img/moneymanagers.jpg" alt="" class="img-responsive  picHeight" />
        </div>

        <div class="row gray_bg mrtb40">
            <div class="container">
                <h2>Управляющие деньгами</h2>
                <p>Менеджеры, ищущие конкурентоспособную оценку и последовательное выполнение, не должны смотреть дальше. С помощью JMI Brokers Money Manager вы можете торговать на нескольких счетах с одной торговой платформы. JMI Brokers обрабатывает все пост-торговые распределения для вас, поэтому вы можете сосредоточиться исключительно на торговле и привлечении клиентов.</p>



                <h2>Методы множественного распределения:</h2>
                <br />
                <ul>
                    <Li> 1. Процентное распределение </li>
                    <Li> 2. Распределение лотов </li>
                </ul>

                <h2>Reports:</h2>
                <br />
                <ul>
                    <li>1.	Ваши клиенты могут получить доступ к своим отчетам 24/7</li>
                    <li>2.	Получать ежедневные отчеты, показывающие распределение торговли</li>
                </ul>


                <h2>Поддержка бэк-офиса:</h2>
                <br />
                <p>Наша бэк-офис команда будет обрабатывать все расчеты на конец месяца для вас и ваших клиентов. Это позволит вам тратить меньше времени на административные проблемы и больше времени на поиск следующей сделки для ваших клиентов. </P>
                <p> Позвоните одному из наших профессиональных торговых представителей, чтобы обсудить, как JMI Brokers могут помочь в развитии вашего управляемого бизнеса.</p>
                <p>+97144096705</p>

                <div class="speacer20"></div>
                <div class="speacer20"></div>


                <p>Позвоните одному из наших профессиональных торговых представителей, чтобы обсудить, как JMI Brokers могут помочь в развитии вашего бренда с помощью нашей программы управления капиталом. +97144096705</p>

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
            site_title: `Money Managers`,
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
