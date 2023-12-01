<template>
           <div class="row ">
            <img src="/assets/img/career.jpg" alt="" class="img-responsive center-block picHeight" />
        </div>






        <div class="row  mrtb40">
            <div class="container">
                <h1>Карьера</h1>

                <h2>В JMI Brokers LTD главное — люди и карьера</h2>
                <p>
                    JMI Brokers LTD считает, что ее бизнес развивается вместе с личным и профессиональным ростом ее сотрудников. По этой причине JMI Brokers постоянно инвестирует в курсы, семинары, программы обучения лидерству и навыкам, а также формальные образовательные квалификации;
                    все разработано для того, чтобы ее сотрудники были на переднем крае своей профессии и могли предоставлять услуги, которые ожидают клиенты и партнеры. </p>

                <h3>Университет JMI – Добивайтесь профессиональных успехов и достигайте личных целей</h3>
                <p> Университет JMI Brokers — это инициатива внутреннего развития, которая предлагает программы и курсы для всех сотрудников JMI Brokers.
                    Курсы охватывают темы, которые, по мнению JMI Brokers, способствуют успеху за счет дальнейшего развития индивидуальных компетенций и помощи сотрудникам в достижении личных и профессиональных карьерных целей.<br/> <br/>

                    JMI Brokers реализует структурированную программу развития сотрудников — «План личного развития» — и программу развития лидерских качеств с помощью модели «Конвейер лидерства». У JMI Brokers также есть программа образцов для подражания,
                    которая представляет собой программу личного развития для специалистов и руководителей, которые демонстрируют последовательное поведение образца для подражания и соответствуют Корпоративному заявлению и семи ценностям JMI Brokers.<br/>


                    JMI Brokers использует внутреннюю модель развития в качестве основы для описания трех основных этапов развития карьеры в JMI: этапа введения, этапа высокой эффективности и этапа моделирования ролей.<br/>
                    JMI Brokers любит обучать и развивать своих собственных менеджеров и лидеров и приняла подход лидерства для развития компетенций. Это поддерживает установление постоянной
                    организационный процесс, обеспечивающий лидерство на всех уровнях организации. Лидеры развивают свои собственные навыки и рабочие ценности в соответствии со своим уровнем конвейера и стремятся развивать своих непосредственных подчиненных до следующего уровня организации.
                </p>

                <h3>Цель JMI</h3>
                <p> Цель JMI — стать самым прибыльным и профессиональным посредником в мире на глобальных рынках капитала.<br/>
                    Его заинтересованные стороны включают акционеров, сотрудников, клиентов и партнеров, которые поддерживают Банк в достижении результатов, мотивации и развитии персонала и построении успешных отношений посредством превосходного обслуживания и инноваций.<br/>
                    Заинтересованные стороны в успехе Банка следуют фундаментальным ценностям и правилам взаимодействия, установленным для расширения возможностей отдельных лиц в достижении личных и деловых целей. </p>


                <h3>В центре внимания сотрудники</h3>
                <p> Сотрудники JMI Brokers увлечены своим делом и стремятся к достижению результатов. Фактически, недавний внутренний опрос показал, что 92,3% сотрудников гордятся тем, что работают в JMI. В общем,
                    сотрудники JMI Brokers высоко оценивают удовлетворенность работой, командный дух и страсть к работе.<br/><br/>

                    JMI Brokers LTD — это динамично развивающаяся организация, состоящая из талантливых людей из разных сфер деятельности: от трейдеров и аналитиков фронт-офиса до разработчиков программного обеспечения, бизнес-контролеров,
                    бизнес-разработчики, маркетологи и талантливые специалисты по кадрам. JMI Brokers предлагает возможности как для личного, так и для профессионального развития посредством обучения, курсов и множества внутренних ресурсов, доступных для повышения уровня обучения и дальнейшей карьеры.
                    Уверенные и вдохновляющие менеджеры также вносят свой вклад в силу компании, поощряя новые идеи, развитие процессов и продвигая личную ответственность за проекты и задачи. </p>


                <h3>Возможности международной карьеры</h3>
                <p>Поскольку JMI Brokers продолжает расширяться по всему миру, сотрудники могут реализовывать карьерные устремления в различных международных условиях. Выдающиеся сотрудники, которым предлагается возможность представлять JMI Brokers за границей, могут получить ценные знания и развить много новых компетенций, которые могут принести пользу их будущему в Банке.
                    JMI Brokers поощряет и поддерживает желание реализовать международные амбиции и ищет способы расширить индивидуальные знания и опыт, продвигая культуру JMI Brokers.</p>

                <h3>Здоровье JMI</h3>
                <p> JMI Brokers уделяет большое внимание здоровью и хочет облегчить сотрудникам выбор здорового образа жизни как в профессиональной, так и в личной жизни. Столовая JMI предлагает разнообразную здоровую пищу в течение дня. Также приветствуются различные занятия фитнесом,
                    и Банк считает, что социальные и сетевые элементы exe
                </p>
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
                        <span style="color:red;">Допустимый тип: .PDF — максимальный размер: 2 МБ</span>
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
                    $("#Success span:first-child").text(result.data.message.ru);
                    $("#Success").show();
                    $("#Error").hide();

                }else if(result.status === 201){
                    $("#Error > span").text(result.data.errors.ru);
                    $("#Error").show();
                    $("#Success").hide();
                }
            } catch (e) {
                if (e.response && e.response.status === 401) {
                    errors.value = e.response.data.errors.ru || ""
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
