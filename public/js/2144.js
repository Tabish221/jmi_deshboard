/*! For license information please see 2144.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[2144],{1004:(t,e,r)=>{r.d(e,{Z:()=>i});var n=r(3645),o=r.n(n)()((function(t){return t[1]}));o.push([t.id,"#newLogin{align-items:center;display:flex}#newLogin h2{color:#0059b2;font-family:Roboto-Bold;margin:0 10px}.txt-box{border-radius:inherit;margin:0;padding:6px 0 6px 7px!important}input:-webkit-autofill,input:-webkit-autofill:active,input:-webkit-autofill:focus,input:-webkit-autofill:hover{-webkit-box-shadow:inset 0 0 0 30px #fff!important}#loginsubmit{background-color:#fdbe01!important;border:1px solid #bfbfbf!important;border-radius:10px;color:#fff!important;display:flex;padding:3px 35px!important;width:auto!important}.text-center{color:#838383!important;font-size:13px;font-weight:700}.text-center a{color:#0059b2!important}.bigDiv{max-width:270px!important}@media only screen and (max-width:500px){.bigDiv{width:100%!important}}#open{display:none}#close,#open{font-size:15px;padding-right:5px}#btnEye{background-color:#fff;border:none;border-radius:inherit;padding:0}.input-container{background-color:#fff;border:1px solid #bfbfbf;border-radius:10px;display:flex;margin-bottom:10px;max-width:270px!important}#myPass{width:calc(100% - 19px)}",""]);const i=o},2144:(t,e,r)=>{r.r(e),r.d(e,{default:()=>C});var n=r(821);function o(t){return o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},o(t)}var i={class:"loginpage",style:{"background-image":"url('/assets/m/img/pic.png')"}},a={class:"container"},s={key:0,class:"alert alert-danger"},c={class:"bigDiv col-lg-3 col-sm-5 col-xs-6 col-xxs-12"},u={class:"login pdtb40"},l=(0,n.uE)('<div id="newLogin"><img src="/assets/m/img/icon.png"><h2>Login</h2></div><div class="alert alert-danger col-sm-12" id="Error" style="display:none;"><span></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="alert alert-success col-sm-12" id="Success" style="display:none;"><span></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>',3),p=(0,n._)("p",{class:"error text-center"},null,-1),f={class:"input-container"},d={class:"input-container"},h=[(0,n._)("i",{id:"open",class:"fas fa-eye"},null,-1),(0,n.Uk)(),(0,n._)("i",{id:"close",class:"fas fa-eye-slash"},null,-1)],y=(0,n._)("input",{type:"submit",name:"loginsubmit",value:"Login",id:"loginsubmit",class:"form-btn"},null,-1),m=(0,n._)("p",{class:"text-center"},[(0,n.Uk)("Forget"),(0,n._)("a",{href:"/ru/forgot-password"}," Password "),(0,n.Uk)("?")],-1),v=(0,n._)("p",{class:"text-center"},[(0,n.Uk)("Don't have an account?"),(0,n._)("a",{href:"/ru/signup"}," Sign Up")],-1);var g=r(7215),b=r(9669),w=r.n(b),x=r(2201),k=r(9755),_=r.n(k);function L(t){return L="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},L(t)}function E(){E=function(){return t};var t={},e=Object.prototype,r=e.hasOwnProperty,n=Object.defineProperty||function(t,e,r){t[e]=r.value},o="function"==typeof Symbol?Symbol:{},i=o.iterator||"@@iterator",a=o.asyncIterator||"@@asyncIterator",s=o.toStringTag||"@@toStringTag";function c(t,e,r){return Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{c({},"")}catch(t){c=function(t,e,r){return t[e]=r}}function u(t,e,r,o){var i=e&&e.prototype instanceof f?e:f,a=Object.create(i.prototype),s=new j(o||[]);return n(a,"_invoke",{value:x(t,r,s)}),a}function l(t,e,r){try{return{type:"normal",arg:t.call(e,r)}}catch(t){return{type:"throw",arg:t}}}t.wrap=u;var p={};function f(){}function d(){}function h(){}var y={};c(y,i,(function(){return this}));var m=Object.getPrototypeOf,v=m&&m(m(O([])));v&&v!==e&&r.call(v,i)&&(y=v);var g=h.prototype=f.prototype=Object.create(y);function b(t){["next","throw","return"].forEach((function(e){c(t,e,(function(t){return this._invoke(e,t)}))}))}function w(t,e){function o(n,i,a,s){var c=l(t[n],t,i);if("throw"!==c.type){var u=c.arg,p=u.value;return p&&"object"==L(p)&&r.call(p,"__await")?e.resolve(p.__await).then((function(t){o("next",t,a,s)}),(function(t){o("throw",t,a,s)})):e.resolve(p).then((function(t){u.value=t,a(u)}),(function(t){return o("throw",t,a,s)}))}s(c.arg)}var i;n(this,"_invoke",{value:function(t,r){function n(){return new e((function(e,n){o(t,r,e,n)}))}return i=i?i.then(n,n):n()}})}function x(t,e,r){var n="suspendedStart";return function(o,i){if("executing"===n)throw new Error("Generator is already running");if("completed"===n){if("throw"===o)throw i;return P()}for(r.method=o,r.arg=i;;){var a=r.delegate;if(a){var s=k(a,r);if(s){if(s===p)continue;return s}}if("next"===r.method)r.sent=r._sent=r.arg;else if("throw"===r.method){if("suspendedStart"===n)throw n="completed",r.arg;r.dispatchException(r.arg)}else"return"===r.method&&r.abrupt("return",r.arg);n="executing";var c=l(t,e,r);if("normal"===c.type){if(n=r.done?"completed":"suspendedYield",c.arg===p)continue;return{value:c.arg,done:r.done}}"throw"===c.type&&(n="completed",r.method="throw",r.arg=c.arg)}}}function k(t,e){var r=e.method,n=t.iterator[r];if(void 0===n)return e.delegate=null,"throw"===r&&t.iterator.return&&(e.method="return",e.arg=void 0,k(t,e),"throw"===e.method)||"return"!==r&&(e.method="throw",e.arg=new TypeError("The iterator does not provide a '"+r+"' method")),p;var o=l(n,t.iterator,e.arg);if("throw"===o.type)return e.method="throw",e.arg=o.arg,e.delegate=null,p;var i=o.arg;return i?i.done?(e[t.resultName]=i.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=void 0),e.delegate=null,p):i:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,p)}function _(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function S(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function j(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(_,this),this.reset(!0)}function O(t){if(t){var e=t[i];if(e)return e.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var n=-1,o=function e(){for(;++n<t.length;)if(r.call(t,n))return e.value=t[n],e.done=!1,e;return e.value=void 0,e.done=!0,e};return o.next=o}}return{next:P}}function P(){return{value:void 0,done:!0}}return d.prototype=h,n(g,"constructor",{value:h,configurable:!0}),n(h,"constructor",{value:d,configurable:!0}),d.displayName=c(h,s,"GeneratorFunction"),t.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===d||"GeneratorFunction"===(e.displayName||e.name))},t.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,h):(t.__proto__=h,c(t,s,"GeneratorFunction")),t.prototype=Object.create(g),t},t.awrap=function(t){return{__await:t}},b(w.prototype),c(w.prototype,a,(function(){return this})),t.AsyncIterator=w,t.async=function(e,r,n,o,i){void 0===i&&(i=Promise);var a=new w(u(e,r,n,o),i);return t.isGeneratorFunction(r)?a:a.next().then((function(t){return t.done?t.value:a.next()}))},b(g),c(g,s,"Generator"),c(g,i,(function(){return this})),c(g,"toString",(function(){return"[object Generator]"})),t.keys=function(t){var e=Object(t),r=[];for(var n in e)r.push(n);return r.reverse(),function t(){for(;r.length;){var n=r.pop();if(n in e)return t.value=n,t.done=!1,t}return t.done=!0,t}},t.values=O,j.prototype={constructor:j,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(S),!t)for(var e in this)"t"===e.charAt(0)&&r.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=void 0)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var e=this;function n(r,n){return a.type="throw",a.arg=t,e.next=r,n&&(e.method="next",e.arg=void 0),!!n}for(var o=this.tryEntries.length-1;o>=0;--o){var i=this.tryEntries[o],a=i.completion;if("root"===i.tryLoc)return n("end");if(i.tryLoc<=this.prev){var s=r.call(i,"catchLoc"),c=r.call(i,"finallyLoc");if(s&&c){if(this.prev<i.catchLoc)return n(i.catchLoc,!0);if(this.prev<i.finallyLoc)return n(i.finallyLoc)}else if(s){if(this.prev<i.catchLoc)return n(i.catchLoc,!0)}else{if(!c)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return n(i.finallyLoc)}}}},abrupt:function(t,e){for(var n=this.tryEntries.length-1;n>=0;--n){var o=this.tryEntries[n];if(o.tryLoc<=this.prev&&r.call(o,"finallyLoc")&&this.prev<o.finallyLoc){var i=o;break}}i&&("break"===t||"continue"===t)&&i.tryLoc<=e&&e<=i.finallyLoc&&(i=null);var a=i?i.completion:{};return a.type=t,a.arg=e,i?(this.method="next",this.next=i.finallyLoc,p):this.complete(a)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),p},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.finallyLoc===t)return this.complete(r.completion,r.afterLoc),S(r),p}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.tryLoc===t){var n=r.completion;if("throw"===n.type){var o=n.arg;S(r)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,r){return this.delegate={iterator:O(t),resultName:e,nextLoc:r},"next"===this.method&&(this.arg=void 0),p}},t}function S(t,e,r,n,o,i,a){try{var s=t[i](a),c=s.value}catch(t){return void r(t)}s.done?e(c):Promise.resolve(c).then(n,o)}(0,n.iH)(),(0,x.tv)();const j={data:function(){return{site_title:"JMI Brokers | Client Login",site_description:"JMI Brokers | Client Login",site_keywords:"JMI Brokers | Client Login"}},mounted:function(){var t=this;(0,g.u)({title:(0,n.Fl)((function(){return t.site_title})),meta:[{name:"description",content:(0,n.Fl)((function(){return t.site_description}))},{name:"keywords",content:(0,n.Fl)((function(){return t.site_keywords}))}]})},methods:{toggleEye:function(){var t=document.getElementById("myPass"),e=document.getElementById("open"),r=document.getElementById("close");"password"===t.type?(t.type="text",e.style.display="block",r.style.display="none"):(t.type="password",e.style.display="none",r.style.display="block")}},created:function(){},setup:function(){var t=(0,n.iH)(),e=(0,x.tv)(),r=(0,n.qj)({username:"",password:"",_token:"{{ csrf_token() }}"}),o=function(){var n,o=(n=E().mark((function n(){var o;return E().wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return n.prev=0,n.next=3,w().post("/ru/slogin",r);case 3:if(200!==(o=n.sent).status||!o.data){n.next=9;break}return n.next=7,e.push("/ru/spanel/home");case 7:n.next=10;break;case 9:201===o.status&&(_()("#Error > span").text(o.data.errors.ru),_()("#Error").show(),_()("#Success").hide());case 10:n.next=15;break;case 12:n.prev=12,n.t0=n.catch(0),n.t0.response&&401===n.t0.response.status?t.value=n.t0.response.data.errors.ru||"":n.t0&&n.t0.response.data&&n.t0.response.data.errors?t.value=Object.values(n.t0.response.data.errors):t.value=n.t0.response.data.errors||"";case 15:case"end":return n.stop()}}),n,null,[[0,12]])})),function(){var t=this,e=arguments;return new Promise((function(r,o){var i=n.apply(t,e);function a(t){S(i,r,o,a,s,"next",t)}function s(t){S(i,r,o,a,s,"throw",t)}a(void 0)}))});return function(){return o.apply(this,arguments)}}();return{form:r,errors:t,handleLogin:o}}};var O=r(3379),P=r.n(O),F=r(1004),I={insert:"head",singleton:!1};P()(F.Z,I);F.Z.locals;const C=(0,r(3744).Z)(j,[["render",function(t,e,r,g,b,w){return(0,n.wg)(),(0,n.iD)("div",i,[(0,n._)("div",a,["string"==typeof g.errors?((0,n.wg)(),(0,n.iD)("div",s,(0,n.zw)(g.errors),1)):(0,n.kq)("",!0),"object"===o(g.errors)?((0,n.wg)(!0),(0,n.iD)(n.HY,{key:1},(0,n.Ko)(g.errors,(function(t,e){return(0,n.wg)(),(0,n.iD)("div",{class:"alert alert-danger",key:e},(0,n.zw)(g.errors[0]),1)})),128)):(0,n.kq)("",!0),(0,n._)("div",c,[(0,n._)("div",u,[l,(0,n._)("form",{id:"",autocomplete:"off",method:"post",onSubmit:e[3]||(e[3]=(0,n.iM)((function(){return g.handleLogin&&g.handleLogin.apply(g,arguments)}),["prevent"])),class:"form-horizontal"},[p,(0,n._)("div",f,[(0,n.wy)((0,n._)("input",{name:"username",type:"text","onUpdate:modelValue":e[0]||(e[0]=function(t){return g.form.username=t}),placeholder:"Username or Email",class:"txt-box",required:""},null,512),[[n.nr,g.form.username]])]),(0,n._)("div",d,[(0,n.wy)((0,n._)("input",{id:"myPass",name:"password",type:"Password","onUpdate:modelValue":e[1]||(e[1]=function(t){return g.form.password=t}),placeholder:"Password :",class:"txt-box",required:""},null,512),[[n.nr,g.form.password]]),(0,n._)("button",{id:"btnEye",onClick:e[2]||(e[2]=function(t){return w.toggleEye()}),type:"button"},h)]),y],32),m,v])])])])}]])}}]);