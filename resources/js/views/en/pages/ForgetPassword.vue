<template>
    <section class="loginSection">
        <div class="container-fluid p-0">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="login-main">
                        <div class="login-logo">
                            <img src="/assets-up/images/logo.png" alt="">
                        </div>
                        <div class="login-heading">
                            <h6>Forget Password</h6>
                        </div>

                        <div class="alert alert-danger my-2" id="Error" style="display: none;">
                            <span> </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="alert alert-success my-2" id="Success" style="display: none;">
                            <span> </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="alert alert-danger my-2" v-if="typeof errors === 'string'">
                            {{errors}}
                        </div>
                        <div class="alert alert-danger my-2" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">
                            {{errors[0]}}
                        </div>

                        <div class="loginForm">
                            <form id="resetpassword" autocomplete="off" method="post" @submit.prevent="handleForgotPassword" class="form-horizontal1">
                                <input type="hidden"  name="base_url" id="base_url" value="/" />
                                <div class="loginForm-feild">
                                    <label for="username">Email Id:</label>

                                    <div class="feildInput">
                                        <input name="username_email" type="text" id="email" v-model="form.username_email" placeholder="Plaese enter your registered email or username" class="form-control" required/>
                                        <span id="ctl00_ContentPlaceHolder1_RegularExpressionValidator1" style="color:rgb(204, 31, 31);display:none;">Please Enter Valid Email Address</span>
                                    </div>
                                </div>

                                <div class="loginForm-btn">
                                    <button type="submit" name="resetpassword" id="resetpassword" class="submit" >Reset Password</button>
                                </div>

                                <div class="loginForm-new">
                                    <p>Don't have an account? <a href="/en/signup">Signup Now</a></p>
                                </div>


                                <div class="loginForm-copyright">
                                    <p>Copyright © JMI Brokers 2023. <br> All rights reserved. </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="login-sideImage" style="font-size: 0;position: fixed;top: 0;right: 0;width: 50%;">
                        <img src="/assets-up/images/login.png" style="max-width: 100%;max-height: 100%;" alt="Forget Password Images">
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            site_title: `JMI Brokers | Forgot Password`,
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
                    $("#Error span:first-child").text(result.data.errors.en);
                    $("#Error").show();
                    $("#Success").hide();
                }
            } catch (e) {
                if (e.response && e.response.status === 401) {
                    errors.value = e.response.data.errors.en || ""
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
