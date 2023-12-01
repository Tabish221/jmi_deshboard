<template>

    <div class="row-fluid">
        <div class="container">
            <div class=""  style="text-align:center;margin:0 auto;width:800px;">

                <h1 style="font-size:58px;color:red;">404</h1>
                <h1 style="font-size:58px;color:green;">Страница не найдена</h1>
            </div>
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
            site_title: ``,
            site_description: ``,
            site_keywords: '',

        }
    }
});
</script>
