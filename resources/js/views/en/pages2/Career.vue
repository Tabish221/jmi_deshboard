<template>
           <div class="row ">
            <img src="/assets/img/career.jpg" alt="" class="img-responsive center-block picHeight" />
        </div>






        <div class="row  mrtb40">
            <div class="container">
                <h1>Careers</h1>

               <h2>At JMI Brokers LTD, it's all about people & careers</h2>
                <p>
                      The JMI Brokers LTD believes that its business develops in line with its employees' personal and professional growth. For this reason, JMI Brokers invests continuously in courses, workshops, leadership and skills-training programs and formal educational qualifications;
                     all designed to ensure that its people are at the forefront of their professions and are able to deliver the kind of service that clients and partners expect.  </p>

                <h3>JMI University - Excel professionally and reach personal goals</h3>
                <p> The JMI Brokers University is an internal development initiative that offers programs and courses to all JMI Brokers employees.
                    Courses cover topics which JMI Brokers feels promote success by further developing individual competencies and helping employees meet personal and professional career goals.<br/> <br/>

                    JMI Brokers runs a structured employee development program - the "Personal Development Plan" - and a leadership development program through the Leadership Pipeline model. JMI Brokers also has a role model program,
                    which is a personal development program for specialists and leaders who demonstrate consistent role model behavior and live up to the Corporate Statement and JMI Brokers seven values.<br/>


                    JMI Brokers uses an internal developmental model as a framework for describing the three major career development phases at JMI: the introduction phase, the high performance phase and the role modeling phase.<br/>
                                        JMI Brokers likes to train and develop its own managers and leaders and has adopted a leadership pipeline approach for development of competencies. This supports the establishment of an ongoing
                    organizational process that produces leadership on all levels of the organization. Leaders develop their own skills and work values according to their pipeline level, and strive towards developing their direct reports to the next level of the organization.
                </p>

                 <h3>JMI's goal</h3>
                <p> JMI's goal is to be the world's most profitable and professional facilitator in the global capital markets.<br/>
                    Its stakeholders include shareholders, employees, clients and partners who support the Bank in generating results, motivating and developing staff and building successful relationships through superior service and innovation.<br/>
                    Stakeholders in the Bank's success follow fundamental values and rules of engagement set forth to empower individuals in reaching personal and business goals.  </p>


                <h3>A focus on employees</h3>
                <p> JMI Brokers employees are passionate about what they do and driven to achieve results. In fact, a recent internal survey showed that 92.3% of employees are proud to work for JMI. In general,
                    job satisfaction, team spirit and passion for work are rated highly by JMI Brokers staff.<br/><br/>

                    The JMI Brokers LTD is a dynamic organization consisting of talented individuals across career sectors - from Front Office traders and analysts to software developers, business controllers,
                     business developers, marketing experts and talented human resources professionals. JMI Brokers offers opportunities for both personal and professional development through training, courses and a multitude of internal resources available to increase learning and further careers.
                     Confident and inspiring managers also contribute to the strength of the company by encouraging new ideas, process development and promoting individual ownership of projects and tasks. </p>


                 <h3>International career opportunities</h3>
                <p>As JMI Brokers continues to expand globally, employees can realize career aspirations in a variety of international settings. Outstanding employees who are offered opportunities to represent JMI Brokers abroad can gain valuable knowledge and develop many new competencies which can benefit their future in the Bank.
                    JMI Brokers encourages and supports the desire to fulfill international ambitions and looks for ways to expand individual knowledge and experience while promoting the JMI Brokers culture.</p>

                <h3>JMI Health</h3>
                <p> JMI Brokers places strong emphasis on health, and wants to make it easy for employees to choose a healthy life-style both in their professional and in their private lives. JMI's canteen provides a variety of healthy food throughout the day. Various fitness activities are also encouraged,
                     and the Bank believes that the social and networking elements of exercising with fellow colleagues are very important.<br/>
                  JMI Brokers realizes it's a tough challenge to find just the right balance between work, family and friends, sports and hobbies. But when all these essentials do come together, they form a rich and full co-existence.
                     JMI Brokers believes that good health is important in order to be a passionate and productive professional. </p>



                <div class="speacer20"></div>
                <h3>be a member of the community</h3>
<div class="col-sm-12">
                <form @submit.prevent="career" enctype="multipart/form-data">
                    <div class="alert alert-danger" v-if="typeof errors === 'string'">

                        {{errors}}
                    </div>
                    <div class="alert alert-danger" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">

                        {{errors[0]}}
                    </div>
                    <div class="alert alert-danger col-sm-12" id="Error" style="display: none;">
                    </div>
                    <div class="alert alert-success col-sm-12" id="Success" style="display: none;">
                    </div>



                <div class="row">
                    <label style="font-size: 2rem;" class="col-sm-12 "> Upload Your CV</label>
                    <div class="col-sm-12 ">

                        <div class="controls">
                                <div class="input-group">

                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                             <input type="file" id="document" name="document" @change="documentUpload" accept="application/pdf" ref="document" required>
                                        </span>
                                    </span>
                                </div>
                        </div>
                        <span style="color:red;">Allowed Type:.PDF - Max Size:2MB</span>
                    </div>
                    <div class="col-sm-12 ">
                        <div class="controls"><br />
                             <input style="padding:0px; max-width: 150px;" class="btn btn-success form-control" type="submit" value="Upload" />

                        </div>
                    </div>

                </div>


                </form>



</div>




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
            site_title: `Career`,
            site_description: ``,
            site_keywords: '',
            file:''
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
    methods:{
        documentUpload(){
            this.file = this.$refs.document.files[0];
        },

        async career () {
            const errors = ref()
            const router = useRouter();

            let formData = new FormData();
            formData.append('document', this.file);
            try {
                const result = await axios.post('/api/career', formData)

                if (result.status === 200) {
                    $("#Success span:first-child").text(result.data.message.en);
                    $("#Success").show();
                    $("#Error").hide();

                }else if(result.status === 201){
                    $("#Error > span").text(result.data.errors.en);
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
    },

});
</script>
