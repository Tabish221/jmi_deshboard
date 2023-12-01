<template>

        <div class="container">

            <h1 style="display-:none">Economic Calendar</h1>

            <iframe scrolling="no" allowtransparency="true" frameborder="0" style="width:100%;min-height: 500px;" src="https://www.tradays.com/en/economic-calendar/widget?mode=2&amp;utm_source=www.jmibrokers.com"></iframe>

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
            site_title: `Economic Calendar`,
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
