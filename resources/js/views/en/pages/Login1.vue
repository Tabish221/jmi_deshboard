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
                            <h6>Login into your account</h6>
                        </div>

                        <div class="alert alert-danger my-2" id="Error" style="display: none;"></div>
                        <div class="alert alert-success my-2" id="Success" style="display: none;"></div>

                        <div class="alert alert-danger my-2" v-if="typeof errors === 'string'">
                            {{ errors }}
                        </div>
                        <div class="alert alert-danger my-2" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">
                            {{ errors[0] }}
                        </div>

                        <div class="loginForm">
                            <form id="" autocomplete="off" method="post" @submit.prevent="handleLogin">
                                <p class="error text-center"></p>
                                <div class="loginForm-feild">
                                    <label for="username">Email Id:</label>

                                    <div class="feildInput">
                                        <input name="username" type="text" v-model="form.username" placeholder="Username or Email" class="txt-box1" required style="box-shadow: none!important;"/>
                                        <!-- <input type="email" placeholder="info@jmibrokers.com" class="shadow-none" > -->
                                        <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    </div>
                                </div>

                                <div class="loginForm-feild">
                                    <label for="username">Password:</label>

                                    <div class="feildInput">
                                        <input id="myPass" name="password" type="Password" v-model="form.password" placeholder="Password :" style="box-shadow: none!important;" required />
                                        <span id="btnEye1" @click="toggleEye()" type="button">
                                            <i id="openx" class="fa fa-eye" aria-hidden="true" style="display: none;"></i>
                                            <i id="closex" class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="loginForm-forgot">
                                    <a href="/en/forgot-password">Forgot paswword?</a>
                                </div>

                                <div class="loginForm-btn">
                                    <button type="submit" name="loginsubmit" value="Login" id="loginsubmit" class="form-btn">Login Now</button>
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
                    <div class="login-sideImage">
                        <img src="/assets-up/images/login.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ################################################ -->
    <!-- <div class="loginpage" style="background-image:url('/assets/m/img/pic.png')">
        <div class="container">
            <div class="alert alert-danger" v-if="typeof errors === 'string'">
                {{ errors }}
            </div>
            <div class="alert alert-danger" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">
                {{ errors[0] }}
            </div>
            <div class="bigDiv col-lg-3 col-sm-5 col-xs-6 col-xxs-12">
                <div class="login pdtb40">
                    <div id="newLogin">
                        <img src="/assets/m/img/icon.png">
                        <h2>Login</h2>
                    </div>
                    <div class="alert alert-danger col-sm-12" id="Error" style="display: none;"></div>
                    <div class="alert alert-success col-sm-12" id="Success" style="display: none;"></div>
                    <form id="" autocomplete="off" method="post" @submit.prevent="handleLogin" class="form-horizontal">
                        <p class="error text-center"></p>
                        <div class="input-container">
                            <input name="username" type="text" v-model="form.username" placeholder="Username or Email"
                                class="txt-box" required />
                        </div>
                        <div class="input-container">
                            <input id="myPass" name="password" type="Password" v-model="form.password"
                                placeholder="Password :" class="txt-box" required />

                        </div>
                        <input type="submit" name="loginsubmit" value="Login" id="loginsubmit" class="form-btn" />
                    </form>
                    <p class="text-center">Forget<a href="/en/forgot-password"> Password </a>?</p>
                    <p class="text-center">Don't have an account?<a href="/en/signup"> Sign Up</a></p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- *********************************************** -->
</template>

<script>

import { useHead } from '@vueuse/head'
import { computed, reactive, ref } from "vue";
import axios from 'axios';
import { useRouter } from "vue-router";
import $ from "jquery";
const errors = ref()
const router = useRouter();

export default ({
    name: 'logon',
    data() {
        return {
            site_title: `JMI Brokers | Client Login`,
            site_description: `JMI Brokers | Client Login`,
            site_keywords: 'JMI Brokers | Client Login',
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

        toggleEye() {
            var x = document.getElementById("myPass");
            var open = document.getElementById("openx");
            var close = document.getElementById("closex");
            if (x.type === "password") {
                x.type = "text";
                open.style.display = "block";
                close.style.display = "none";
            } else {
                x.type = "password";
                open.style.display = "none";
                close.style.display = "block";
            }
        }

    }, created() {

    },
    setup() {
        const errors = ref()
        const router = useRouter();
        const form = reactive({
            username: '',
            password: '',
            "_token": "{{ csrf_token() }}"
        })
        const handleLogin = async () => {

            try {
                const result = await axios.post('/api/user/login', form)

                if (result.status === 200 && result.data) {
                    localStorage.setItem('JMI_User', result.data.username)
                    await router.push('/en/cpanel/home')
                } else if (result.status === 201) {
                    $("#Error").text(result.data.errors.en);
                    $("#Error").show();
                    $("#Success").hide();
                }
            } catch (e) {
                if (e.response && e.response.status === 401) {
                    errors.value = e.response.data.errors.en || ""
                } else {
                    if (e && e.response.data && e.response.data.errors) {
                        errors.value = Object.values(e.response.data.errors)
                    } else {
                        errors.value = e.response.data.errors || ""
                    }
                }

            }
        }

        return {
            form,
            errors,
            handleLogin,
        }

    },
})

</script>
