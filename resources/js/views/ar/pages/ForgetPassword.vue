<template>


    <div class="container">
        <div class="col-sm-4 col-sm-push-8" style="direction:rtl;">


            <h2>تغيير كلمة السر</h2>

            <div class="alert alert-danger col-sm-12" id="Error" style="display: none;">
                <span> </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="alert alert-success col-sm-12" id="Success" style="display: none;">
                <span> </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>

            <div class="alert alert-danger" v-if="typeof errors === 'string'">

                {{errors}}
            </div>
            <div class="alert alert-danger" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">

                {{errors[0]}}
            </div>
            <form id="resetpassword" autocomplete="off" method="post" @submit.prevent="handleForgotPassword" class="form-horizontal">
                <input type="hidden"  name="base_url" id="base_url" value="/" />
                <input name="username_email" type="text" id="email" v-model="form.username_email" placeholder="ادخل البريد او اسم المستخدم المسجل" class="form-control" required/>
                <span id="ctl00_ContentPlaceHolder1_RegularExpressionValidator1" style="color:White;display:none;">من فضلك ادخل بريد الكترونى او اسم مستخدم صحيح</span>
                <br />
                <input type="submit" name="resetpassword" value="تغيير كلمة السر"  id="resetpassword" class="btn btn-success submit" />
            </form>

        </div>
    </div>


</template>

<script>

import { useHead } from '@vueuse/head'
import {computed, reactive, ref} from "vue";
import axios from 'axios';
import {useRouter} from "vue-router";
import $ from "jquery";
const errors = ref()
const router = useRouter();

export default ({
    data(){
        return{
            site_title: `نسيت كلمة السر`,
            site_description: `JMI Brokers | Forgot Password`,
            site_keywords: 'JMI Brokers | Forgot Password',
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
    methods: {


    },created () {

    },
    setup() {
        const errors = ref()
        const router = useRouter();
        const form = reactive({
            username_email: '',
            "_token": "{{ csrf_token() }}"
        })
        const handleForgotPassword = async () => {

            try {
                const result = await axios.post('/api/forgot-password', form)

                if (result.status === 200 && result.data==1) {
                    $("#Success span:first-child").text("Message Sent Successfully.");
                    $("#Success").show();
                    $("#Error").hide();

                }else if(result.status === 201){
                    $("#Error span:first-child").text(result.data.errors.ar);
                    $("#Error").show();
                    $("#Success").hide();
                }
            } catch (e) {
                if (e.response && e.response.status === 401) {
                    errors.value = e.response.data.errors.ar || ""
                } else {
                    if(e && e.response.data && e.response.data.errors) {
                        errors.value = Object.values(e.response.data.errors)
                    } else {
                        errors.value = e.response.data.errors || ""
                    }                }

            }
        }

        return {
            form,
            errors,
            handleForgotPassword,
        }

    },
})

</script>


<style>

</style>
