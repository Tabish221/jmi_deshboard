<template>
    <router-view></router-view>
</template>
<script>
import {computed, reactive,ref } from 'vue'
import { useHead } from '@vueuse/head'
import $ from 'jquery'
import jquery from 'jquery'
window.jQuery = jquery
require('bootstrap')
import {useRouter} from "vue-router";
import axios from "axios";
const errors = ref()
const router = useRouter();


export default ({
    setup() {
        const siteData = reactive({
            title: `Welcome to JMI Brokers | Online Forex Trading`,
            description: `JMI Brokers leading secure trading since 2009 with the most competitive offers for forex, indices, stocks  and metals with clients in 100 countries.`,
            'keywords': 'Forex, Gold, Silver, US Shares, UK Shares, Metatrader, Oil',
        })
        useHead({
            // Can be static or computed
            htmlAttrs: {
                lang: 'en'
            },
            title: computed(() => siteData.title),
            meta: [
                {
                    name: `description`,
                    content: computed(() => siteData.description),
                },
                {
                    name: `keywords`,
                    content: computed(() => siteData.keywords),
                },
                {
                    name: `google-site-verification`,
                    content: 'mp_A_fZP25-dNqXv3hvBZ6eOQtM51fpsJXNp5bTaOgw',
                },
                {
                    name: `yandex-verification`,
                    content: 'd6ae56d288a2b190',
                },
                {
                    name: `msvalidate.01`,
                    content: '6020DDA7FF98B0ED4896290B2DADC243',
                },
                {
                    name: `author`,
                    content: 'JMIBrokers',
                },
                {
                    name: `viewport`,
                    content: 'width=device-width, initial-scale=1',
                },
                {
                    name: `facebook-domain-verification`,
                    content: 'viojlkbqs3mttdq9ya18s5vy2fkmgr',
                },


            ],

        })
    },
})
</script>
