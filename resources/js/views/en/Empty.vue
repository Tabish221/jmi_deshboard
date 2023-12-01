<template>


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
            site_title: ``,
            site_description: ``,
            site_keywords: '',

        }
    },
    mounted() {
        useHead({
            // Can be static or computed
            title: computed(() => ''),
            meta: [
                {
                    name: `description`,
                    content: computed(() => ''),
                },
                {
                    name: `keywords`,
                    content: computed(() => ''),
                },
            ],

        })
    }
});
</script>
