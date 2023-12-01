<template>
<link rel="canonical" href="https://www.jmibrokers.com/en/risk-management-strategy " />
	<div class="row gray_bg">
            <img src="/assets/img/Risk-Management-Strategy.jpg" alt="" class="img-responsive center-block w100 picHeight" />
        </div>


        <div class="row gray_bg">
            <div class="container mrtb40">
                <h1>JMI Brokers Risk Management Strategy</h1>
                <h3>Introduction</h3>
                <p>
                    Risk management at JMI Brokers is all about managing our threats and opportunities. By managing our threats effectively we will be in a stronger position to deliver our objectives. By managing our opportunities we will be in a better position to provide improved services and maximize returns for our shareholders.
                    <br /><br />
                    In this strategy risk is defined as something happening that may have an impact on the achievements of our objectives. When it fails, however, the consequences can be significant and high profile. Effective risk management is needed to prevent such failures.
                    <br />
                    A risk management strategy is an essential element of strategic planning. The Board has a corporate plan covering the whole of the Groups activities and the risk management strategy should be seen as sitting under this broader umbrella.
                    <br />
                    The risk management strategy describes the processes that the Board has put in place and link together to identify, assess, address and review and report on our risks. The strategy provides a framework for the management of risk across the whole Group.
                      <br />
                    Overall, the goals of our risk management strategy are to have procedures in place to:
                </p>

                 <ul class="list_style">
                        <li>Integrate risk management into the culture of the       organization</li>
                        <li>Manage risk in accordance with best practice</li>
                        <li>Fully document major threats and opportunities</li>
                        <li>Clearly identify risk exposures</li>
                        <li>Implement cost effective actions to reduce risks</li>
                        <li>Ensure conscious and properly evaluated risk decisions</li>
                      </ul>


                <h3>Principles and Implementation</h3>
                <p>The four linked elements of the strategy:</p>
                <ul class="list_style">
                    <li>Identifying Risks</li>
                    <li>Assessing Risks</li>
                    <li>Addressing Risks</li>
                    <li>Reviewing and Reporting Risks Principles</li>
                    <li>Transparent</li>
                    <li>Co-ordinated</li>
                    <li>Credible</li>
                    <li>Effective</li>
                  </ul>
                <div class="speacer20"></div>
                <p>
        These are the four principles that underpin the Groups risk management  strategy. The mainstay of the strategy is to embed these in the culture of the  organization. Managers will need to review risk management as an integral part  of their job and the groups management team will keep the top risks faced by  the group under regular strategic review.<br/>
             <br/>
        Risk management will only become common practice if there is better understanding  of what it involves and the benefits that it can help secure in terms of  securing the group's objectives. The group will retain a proactive approach to  risk management, which ensures that less time is spent reacting to situations  and more time is spent taking advantage of opportunities.</p>

                <h3>Transparent</h3>
                <p>We are open in our approach to managing risks. Employees, outside organizations and regulators should have access to information on our current risks and how we are managing them.</p>

                <h3>Co-ordinated</h3>
                <p>The group is consistent in how we assess and manage our risks throughout the organization. We identify risk owners for both specific risk and cross cutting risks.</p>

                <h3>Credibility</h3>
                <p>We take proportionate actions in addressing risk, the cost of our time and efforts should be in balance with the impact of the risk, both in the short and long term.</p>

                <h3>Effective</h3>
                <p>We have a robust approach to risk management aiming to identify, assess, address and review and report on risk in a way that can stand scrutiny, building on best practice and protecting the interest of our shareholders.</p>

                <h3>Implementation</h3>
                <p>We will develop our website so that shareholders can obtain information on our approach to risks. We will conduct appropriate training to promote the awareness of risk management throughout the Group.</p>

                <h3>Identifying Risks</h3>
                <p>
                    Risks are assessed in terms of how likely they are to occur and the magnitude of the consequences if they were to occur. The board identifies both strategic and operational risks and will establish an appropriate organizational structure to facilitate this process.
                    <br />
                    The risk management committee, made up of senior management, is responsible for identifying, assessing and monitoring key risks.
                    <br /><br />
                    Once risks have been identified we capture essential information about them in the group risk register. This is a key building block of our strategy. The register will be a working document and a key source of information for the efficient management. This process however must not be allowed to become overly bureaucratic.
                    <br /><br />
                    We recognize that the identification of risk is an ingoing task, all board members and employees have a part to play.
                </p>

                <h3>Assessing Risk</h3>
                <p>To assess risk we will identify the consequences of a risk materializing and give each risk a risk rating. The initial assessment will be refined by the risk committee and a risk owner will be identified who will be responsible for reviewing and accepting the assessment that will feed into the risk register.</p>

                <h3>Risk Review</h3>
                <p>We need to have some means of comparing our risks so that we can concentrate on addressing those that are the most important. We will use the basic approach to giving each risk a weighting depending on the likelihood and it impact as shown in the matrix below.
                    <br /><br />
                    Methods for assessing the likelihood of occurrence and the impact on the groups business are not specifically defined due to the different types on risks facing the groups business. The significance of the risks in the risk assessment matrix is further enhanced by using a traffic light colour coding system.
                    <br /><br />
                    The Board will take a strategic view on risks. It will receive a report on key risks on a quarterly basis and assess those risks against the high level objectives and priorities of the board.
                </p>

                <h3>Addressing Risks</h3>
                <p>
                    Having properly identified and assessed our risks, we select one of the following approaches;
                    <br /><br />
                    Transfer the risk; this might be done through arrangements as conventional as insurance or by asking a third party to take the risk in another way.<br />
                    Tolerate the risk; our ability to take effective action against some risks may be limited, or the cost of taking action may be disproportionate to the potential benefit gained. In this instance, the only management action required is to monitor the risk to ensure that its likelihood or impact does not change.
                </p>

                <h3>Mitigate the Risk</h3>
                <p>The purpose of mitigation is not necessarily to terminate the risk but more importantly to contain the risk to an acceptable level.</p>

                <h3>Terminate the Risk</h3>
                <p>This involves decisive action to eliminate a risk altogether.</p>

                <h3>Reviewing and Reporting Risks</h3>
                <p>Appropriate and effective reporting arrangements will reinforce and support the risk management activities. This will allow up to date and accurate performance information to be passed to senior management.
                    <br />
                    This is intended to be a living document which will be continuously reviewed on an ongoing basis.
                </p>

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
            site_title: `JMI Brokers Risk Management Strategy`,
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
