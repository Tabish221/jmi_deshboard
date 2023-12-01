<template>



 <div class="row gray_bg">
        <img src="/assets/img/download_files_bg.jpg" alt="" class="img-responsive center-block picHeight" />
    </div>


        <div class="row gray_bg">
            <div class="container mrtb40">
                <h1>مركز التحميل</h1>

                <span ><a href="/assets/Downloads/account_agreement.pdf">اتفاقية حساب العميل</a></span>
                <span><a href="/assets/Downloads/Expert_Advisor_Request.pdf">طلب استشارة خبير</a></span>
                <span><a href="/assets/Downloads/Funds_Transfer_Advice.pdf">نصائح تحويلب الأموال</a></span>
                <span><a href="/assets/Downloads/Funds_Transfer_RequestTo_SubAccount.pdf"  style="display:none;">تحويل الاأموال الى حساب فرعى</a></span>
                <span><a href="/assets/Downloads/Funds_Withdrawal_Request.pdf">طلب سحب الأموال</a></span>
                <span><a href="/assets/Downloads/IB_Questionnaire.pdf"  style="display:none;">استبيانة IB</a></span>
                <span><a href="/assets/Downloads/Password_Change_Request.pdf">طلب تغيير الباسورد</a></span>
                <span><a href="/assets/Downloads/Power_of_attorney.pdf"  style="display:none;">تفويض</a></span>
                <span><a href="/assets/Downloads/Sub_Account_Request.pdf">طلب حساب فرعى</a></span>
                <span><a href="/assets/Downloads/Trailing_Stop_Request.pdf">طلب أيقاف</a></span>
                <span><a href="/assets/Downloads/Transfer_Funds_From_Commission_Account_Request.pdf">طلب تحويل اموال العمولة</a></span>

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
