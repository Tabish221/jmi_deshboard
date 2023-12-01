<template>



<div class="row gray_bg">
            <img src="/assets/img/whitelabel.jpg" alt="" class="img-responsive  picHeight" />
        </div>

    <div class="row gray_bg mrtb40" dir="rtl">
        <div class="container">
            <h2>العلامة البيضاء</h2>
            <p>ويمكن لـ جى ام اى بروكرز مساعدتك في نمو العلامة التجارية الخاصة بك مع حلولنا الجاهزة والفعالة من حيث التكلفة، وتم تصميم برنامج العلامة البيضاء لتحقيق المرونة بحيث يمكنك تحقيق أقصى قدر من الكسب الخاص بك بشكل أسرع. </p>



            <h2>برنامج العلامة البيضاء</h2>
            <br />
            <p>حيث نستخدم خبراتنا التكنولوجية في MT4 ومساحة السوق المؤسسي في المساعدة على نمو العلامة التجارية الخاصة بك، ويمكن ل جى ام اى بروكرز مساعدتك في التوسع مع حلولنا الجاهزة والفعالة من حيث التكلفة، وتم تصميم برنامج العلامة البيضاء لتحقيق المرونة بحيث يمكنك تحقيق أقصى قدر من الكسب الخاص بك بشكل أسرع. </p>


            <h2>إتاحة الوصول إلى منصات متعددة، تتضمن:</h2>
            <ul class="li1">
                <li>تقديم منتجات ودعم بعدة لغات .</li>
                <li>رسوم بيانية (مخططات) متقدمة.</li>
                <li>حلول تداول عالية المستوى.</li>
                <li>الخدمات التعليمية.</li>
                <li>خدمات دعم متكاملة.</li>
                <li>حلول متعلقة بإدارة توزيع الأموال .</li>
                <li>حلول متقدمة للتداول.</li>

            </ul>
            <div class="speacer20"></div>
            <div class="speacer20"></div>


            <p>بإمكانك استدعاء أحد ممثلي المبيعات لدينا لمناقشة كيف يمكن ل جى ام اى بروكرز مساعدتك في نمو العلامة التجارية الخاصة بك من خلال برنامج العلامة البيضاء. +97144096705</p>

            <a href="/ar/become-partner"  class="become-partner slide-live-button">كن شريكا</a>


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
            site_title: `وايت ليبل`,
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
