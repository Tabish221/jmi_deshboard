<template>



 <div class="row gray_bg">
        <img src="/assets/img/download_files_bg.jpg" alt="" class="img-responsive center-block picHeight" />
    </div>


        <div class="row gray_bg">
            <div class="container mrtb40">
                <h1>Download Center JMI Brokers</h1>

                <p><a href="/assets/Downloads/account_agreement.pdf/">соглашение с клиентом</a></p>
                <p><a href="/assets/Downloads/Expert_Advisor_Request.pdf/">Запрос эксперта</a></p>
                <p><a href="/assets/Downloads/Funds_Transfer_Advice.pdf/">Советы по переводу средств</a></p>
                <p><a href="/assets/Downloads/Funds_Transfer_RequestTo_SubAccount.pdf/" style="display:none;">Запрос на перевод средств на субсчет</a></p>
                <p><a href="/assets/Downloads/Funds_Withdrawal_Request.pdf">Запрос на снятие средств</a></p>
                <p><a href="/assets/Downloads/IB_Questionnaire.pdf" style="display:none;">IB Анкета</a></p>
                <p><a href="/assets/Downloads/Password_Change_Request.pdf/">Запрос на изменение пароля</a></p>
                <p><a href="/assets/Downloads/Power_of_attorney.pdf/" style="display:none;">Доверенность</a></p>
                <p><a href="/assets/Downloads/Sub_Account_Request.pdf/">Запрос дополнительной учетной записи</a></p>
                <p><a href="/assets/Downloads/Trailing_Stop_Request.pdf/">Запрос на трейлинг-стоп</a></p>
                <p><a href="/assets/Downloads/Transfer_Funds_From_Commission_Account_Request.pdf/">Перевод средств с комиссии по запросу счета</a></p>

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
            site_title: `Download Center JMI Brokers`,
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
