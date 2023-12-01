<template>


<div class="row gray_bg">
            <img src="/assets/img/businesswithjmi.jpg" alt="" class="img-responsive center-block picHeight" />
        </div>


    <div class="row gray_bg mrtb40" dir="rtl">
        <div class="container">
            <h2>الشراكات</h2>
            <p>        نحن في جى ام اى بروكرز نقدم مجموعة كاملة من خدمات الوسيط المعرف وفقا لاحتياجات كل عميل على حده<br />
        كل شريك له متطلبات مختلفة، لذلك نحن نتمتع بالمرونة سواء في الحلول التي نقدمها أو بالشروط التجارية.<br />
        للحصول على تفاصيل شراكة IB أو إذا كنت ترغب بمزيد من المعلومات عن خدمات الشراكة الخاصة بنا يرجى التواصل معنا على البريد الإلكتروني <a href="mailto:partners@jmibrokers.com">partners@jmibrokers.com</a> أو الاتصال بنا على هاتف رقم 063 3199 4 971 + وسنكون

          سعداء بمساعدتك.
            </p>
            <div align="center">
                <hr size="2" width="100%" align="center" />
            </div>
            <div class="speacer20"></div>

            <h2>عملاء مجموعة JMI</h2>
            <br />
            على مستوى دولي نحن نقدم للعملاء خدمة كاملة لتداول المنتجات المالية مثل البنوك الصغيرة، صناديق التغطية، الوسطاء، المكاتب الخاصة، الأفراد من أصحاب الأموال وعملاء التجزئة، وهدفنا هو تقديم أفضل منصات التداول بشفافية وتقديم أسعار

            تنافسية ومستويات أعلى من الخدمات التي يقدمها مزودي الخدمات التقليدية.

            <h2>الوسطاء المعرفين</h2>
            إن برنامج الوسيط المعرف (IB) يسمح بتقديم تعويض للمؤسسات في جميع أنحاء العالم عند اشتراك عملاء جدد معنا، ونحن نقدم حلولا متكاملة، ابتداء من توفير منصات التداول وانتهاء بتنفيذ وتسوية المعاملات، ويتم تعيين مدير حساب لكل IB

            مساعدتهم على تطوير أعمالهم وضمان تقديم أعلى مستويات الخدمة
            <div class="speacer10"></div>

            <h2>عملاء المؤسسات</h2>
            خدماتنا المؤسسية مخصصة لتلبية احتياجات المؤسسات الصغيرة والمتوسطة والبنوك التي تبحث عن توسيع عروض منتجاتها، مع كامل الدعم المهني
            <div class="speacer20"></div>

            <h2>الشراكات العالمية</h2>
            <br />
            <p>
            حتى مع الاستخدام المتزايد للإنترنت، فإن العالم هو مكان كبير جدا، ونحن نسعى بتطوير الشراكات متبادلة المنفعة مع المؤسسات في جميع أنحاء العالم، فنحن موجودون هناك لتوفير منصات تداول، الوصول إلى الأسواق، تقديم الخبرة اللازمة، والبنية

            التحتية الداعمة. وشركائنا لديهم المعرفة المتعمقة في السوق المحلية اللازمة لتوفير أعلى مستويات الخدمة التي يحتاجها العملاء </p>

            <div class="speacer20"></div>
            <div class="speacer20"></div>


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
            site_title: `الشراكة مع جى ام اى بروكرز`,
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
