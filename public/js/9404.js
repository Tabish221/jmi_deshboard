/*! For license information please see 9404.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[9404],{2095:(t,n,d)=>{d.d(n,{Z:()=>e});var r=d(3645),i=d.n(r)()((function(t){return t[1]}));i.push([t.id,"table thead tr th{text-align:center}",""]);const e=i},9404:(t,n,d)=>{d.r(n),d.d(n,{default:()=>L});var r=d(821),i={class:"row gray_bg"},e={class:"container"},a={class:"row gray_bg mrtb40"},o={class:"table-responsive"},s={class:"pipCalcResults table table-responsive",id:"results"},c=(0,r._)("div",{id:"calculator2"},null,-1);var l=d(7215),u=d(9669),h=d.n(u),f=d(2201);function _(t){return _="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},_(t)}function v(){v=function(){return t};var t={},n=Object.prototype,d=n.hasOwnProperty,r=Object.defineProperty||function(t,n,d){t[n]=d.value},i="function"==typeof Symbol?Symbol:{},e=i.iterator||"@@iterator",a=i.asyncIterator||"@@asyncIterator",o=i.toStringTag||"@@toStringTag";function s(t,n,d){return Object.defineProperty(t,n,{value:d,enumerable:!0,configurable:!0,writable:!0}),t[n]}try{s({},"")}catch(t){s=function(t,n,d){return t[n]=d}}function c(t,n,d,i){var e=n&&n.prototype instanceof h?n:h,a=Object.create(e.prototype),o=new P(i||[]);return r(a,"_invoke",{value:D(t,d,o)}),a}function l(t,n,d){try{return{type:"normal",arg:t.call(n,d)}}catch(t){return{type:"throw",arg:t}}}t.wrap=c;var u={};function h(){}function f(){}function p(){}var m={};s(m,e,(function(){return this}));var w=Object.getPrototypeOf,b=w&&w(w(S([])));b&&b!==n&&d.call(b,e)&&(m=b);var y=p.prototype=h.prototype=Object.create(m);function g(t){["next","throw","return"].forEach((function(n){s(t,n,(function(t){return this._invoke(n,t)}))}))}function L(t,n){function i(r,e,a,o){var s=l(t[r],t,e);if("throw"!==s.type){var c=s.arg,u=c.value;return u&&"object"==_(u)&&d.call(u,"__await")?n.resolve(u.__await).then((function(t){i("next",t,a,o)}),(function(t){i("throw",t,a,o)})):n.resolve(u).then((function(t){c.value=t,a(c)}),(function(t){return i("throw",t,a,o)}))}o(s.arg)}var e;r(this,"_invoke",{value:function(t,d){function r(){return new n((function(n,r){i(t,d,n,r)}))}return e=e?e.then(r,r):r()}})}function D(t,n,d){var r="suspendedStart";return function(i,e){if("executing"===r)throw new Error("Generator is already running");if("completed"===r){if("throw"===i)throw e;return j()}for(d.method=i,d.arg=e;;){var a=d.delegate;if(a){var o=x(a,d);if(o){if(o===u)continue;return o}}if("next"===d.method)d.sent=d._sent=d.arg;else if("throw"===d.method){if("suspendedStart"===r)throw r="completed",d.arg;d.dispatchException(d.arg)}else"return"===d.method&&d.abrupt("return",d.arg);r="executing";var s=l(t,n,d);if("normal"===s.type){if(r=d.done?"completed":"suspendedYield",s.arg===u)continue;return{value:s.arg,done:d.done}}"throw"===s.type&&(r="completed",d.method="throw",d.arg=s.arg)}}}function x(t,n){var d=n.method,r=t.iterator[d];if(void 0===r)return n.delegate=null,"throw"===d&&t.iterator.return&&(n.method="return",n.arg=void 0,x(t,n),"throw"===n.method)||"return"!==d&&(n.method="throw",n.arg=new TypeError("The iterator does not provide a '"+d+"' method")),u;var i=l(r,t.iterator,n.arg);if("throw"===i.type)return n.method="throw",n.arg=i.arg,n.delegate=null,u;var e=i.arg;return e?e.done?(n[t.resultName]=e.value,n.next=t.nextLoc,"return"!==n.method&&(n.method="next",n.arg=void 0),n.delegate=null,u):e:(n.method="throw",n.arg=new TypeError("iterator result is not an object"),n.delegate=null,u)}function E(t){var n={tryLoc:t[0]};1 in t&&(n.catchLoc=t[1]),2 in t&&(n.finallyLoc=t[2],n.afterLoc=t[3]),this.tryEntries.push(n)}function U(t){var n=t.completion||{};n.type="normal",delete n.arg,t.completion=n}function P(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(E,this),this.reset(!0)}function S(t){if(t){var n=t[e];if(n)return n.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var r=-1,i=function n(){for(;++r<t.length;)if(d.call(t,r))return n.value=t[r],n.done=!1,n;return n.value=void 0,n.done=!0,n};return i.next=i}}return{next:j}}function j(){return{value:void 0,done:!0}}return f.prototype=p,r(y,"constructor",{value:p,configurable:!0}),r(p,"constructor",{value:f,configurable:!0}),f.displayName=s(p,o,"GeneratorFunction"),t.isGeneratorFunction=function(t){var n="function"==typeof t&&t.constructor;return!!n&&(n===f||"GeneratorFunction"===(n.displayName||n.name))},t.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,p):(t.__proto__=p,s(t,o,"GeneratorFunction")),t.prototype=Object.create(y),t},t.awrap=function(t){return{__await:t}},g(L.prototype),s(L.prototype,a,(function(){return this})),t.AsyncIterator=L,t.async=function(n,d,r,i,e){void 0===e&&(e=Promise);var a=new L(c(n,d,r,i),e);return t.isGeneratorFunction(d)?a:a.next().then((function(t){return t.done?t.value:a.next()}))},g(y),s(y,o,"Generator"),s(y,e,(function(){return this})),s(y,"toString",(function(){return"[object Generator]"})),t.keys=function(t){var n=Object(t),d=[];for(var r in n)d.push(r);return d.reverse(),function t(){for(;d.length;){var r=d.pop();if(r in n)return t.value=r,t.done=!1,t}return t.done=!0,t}},t.values=S,P.prototype={constructor:P,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(U),!t)for(var n in this)"t"===n.charAt(0)&&d.call(this,n)&&!isNaN(+n.slice(1))&&(this[n]=void 0)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var n=this;function r(d,r){return a.type="throw",a.arg=t,n.next=d,r&&(n.method="next",n.arg=void 0),!!r}for(var i=this.tryEntries.length-1;i>=0;--i){var e=this.tryEntries[i],a=e.completion;if("root"===e.tryLoc)return r("end");if(e.tryLoc<=this.prev){var o=d.call(e,"catchLoc"),s=d.call(e,"finallyLoc");if(o&&s){if(this.prev<e.catchLoc)return r(e.catchLoc,!0);if(this.prev<e.finallyLoc)return r(e.finallyLoc)}else if(o){if(this.prev<e.catchLoc)return r(e.catchLoc,!0)}else{if(!s)throw new Error("try statement without catch or finally");if(this.prev<e.finallyLoc)return r(e.finallyLoc)}}}},abrupt:function(t,n){for(var r=this.tryEntries.length-1;r>=0;--r){var i=this.tryEntries[r];if(i.tryLoc<=this.prev&&d.call(i,"finallyLoc")&&this.prev<i.finallyLoc){var e=i;break}}e&&("break"===t||"continue"===t)&&e.tryLoc<=n&&n<=e.finallyLoc&&(e=null);var a=e?e.completion:{};return a.type=t,a.arg=n,e?(this.method="next",this.next=e.finallyLoc,u):this.complete(a)},complete:function(t,n){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&n&&(this.next=n),u},finish:function(t){for(var n=this.tryEntries.length-1;n>=0;--n){var d=this.tryEntries[n];if(d.finallyLoc===t)return this.complete(d.completion,d.afterLoc),U(d),u}},catch:function(t){for(var n=this.tryEntries.length-1;n>=0;--n){var d=this.tryEntries[n];if(d.tryLoc===t){var r=d.completion;if("throw"===r.type){var i=r.arg;U(d)}return i}}throw new Error("illegal catch attempt")},delegateYield:function(t,n,d){return this.delegate={iterator:S(t),resultName:n,nextLoc:d},"next"===this.method&&(this.arg=void 0),u}},t}function p(t,n,d,r,i,e,a){try{var o=t[e](a),s=o.value}catch(t){return void d(t)}o.done?n(s):Promise.resolve(s).then(r,i)}(0,r.iH)(),(0,f.tv)();const m={directives:{"raw-html":function(t,n){t.innerHTML=n.value}},data:function(){return{site_title:"",site_description:"",site_keywords:"",calculator1:'\\n<thead>\\n<tr>\\n<th>Currency<\\/th>\\n<th>Price<\\/th>\\n<th>\\nStandard Lot <div class=\\"arial_11 noBold\\">(Units 100,000)<\\/div>\\n<\\/th>\\n<th>\\nMini Lot <div class=\\"arial_11 noBold\\">(Units 10,000)<\\/div>\\n<\\/th>\\n<th>\\nMicro Lot <div class=\\"arial_11 noBold\\">(Units 1,000)<\\/div>\\n<\\/th>\\n<th>Pip Value<\\/th>\\n<\\/tr>\\n<\\/thead>\\n<tbody>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-cad\\">AUD\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_47\\">\\n0.8782 <\\/td>\\n<td id=\\"standard_47\\">\\n7.61 <\\/td>\\n<td id=\\"mini_47\\">\\n0.76 <\\/td>\\n<td id=\\"micro_47\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_47\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-chf\\">AUD\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_48\\">\\n0.5980 <\\/td>\\n<td id=\\"standard_48\\">\\n11.17 <\\/td>\\n<td id=\\"mini_48\\">\\n1.12 <\\/td>\\n<td id=\\"micro_48\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_48\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-jpy\\">AUD\\/JPY<\\/a>\\n <\\/td>\\n<td id=\\"price_49\\">\\n95.88 <\\/td>\\n<td id=\\"standard_49\\">\\n696.90 <\\/td>\\n<td id=\\"mini_49\\">\\n69.69 <\\/td>\\n<td id=\\"micro_49\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_49\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-nzd\\">AUD\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_50\\">\\n1.0827 <\\/td>\\n<td id=\\"standard_50\\">\\n6.17 <\\/td>\\n<td id=\\"mini_50\\">\\n0.62 <\\/td>\\n<td id=\\"micro_50\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_50\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-usd\\">AUD\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_5\\">\\n0.6682 <\\/td>\\n<td id=\\"standard_5\\">\\n10.00 <\\/td>\\n<td id=\\"mini_5\\">\\n1.00 <\\/td>\\n<td id=\\"micro_5\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_5\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/cad-jpy\\">CAD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_51\\">\\n109.17 <\\/td>\\n<td id=\\"standard_51\\">\\n696.90 <\\/td>\\n<td id=\\"mini_51\\">\\n69.69 <\\/td>\\n<td id=\\"micro_51\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_51\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/chf-jpy\\">CHF\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_13\\">\\n160.32 <\\/td>\\n<td id=\\"standard_13\\">\\n696.90 <\\/td>\\n<td id=\\"mini_13\\">\\n69.69 <\\/td>\\n<td id=\\"micro_13\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_13\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-aud\\">EUR\\/AUD<\\/a>\\n<\\/td>\\n<td id=\\"price_15\\">\\n1.6334 <\\/td>\\n<td id=\\"standard_15\\">\\n6.68 <\\/td>\\n<td id=\\"mini_15\\">\\n0.67 <\\/td>\\n<td id=\\"micro_15\\">\\n0.07 <\\/td>\\n<td class=\\"bold\\" id=\\"value_15\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-cad\\">EUR\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_16\\">\\n1.4343 <\\/td>\\n<td id=\\"standard_16\\">\\n7.61 <\\/td>\\n<td id=\\"mini_16\\">\\n0.76 <\\/td>\\n<td id=\\"micro_16\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_16\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-chf\\">EUR\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_10\\">\\n0.9768 <\\/td>\\n<td id=\\"standard_10\\">\\n11.17 <\\/td>\\n<td id=\\"mini_10\\">\\n1.12 <\\/td>\\n<td id=\\"micro_10\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_10\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-gbp\\">EUR\\/GBP<\\/a>\\n<\\/td>\\n<td id=\\"price_6\\">\\n0.8578 <\\/td>\\n<td id=\\"standard_6\\">\\n12.72 <\\/td>\\n<td id=\\"mini_6\\">\\n1.27 <\\/td>\\n<td id=\\"micro_6\\">\\n0.13 <\\/td>\\n<td class=\\"bold\\" id=\\"value_6\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-jpy\\">EUR\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_9\\">\\n156.59 <\\/td>\\n<td id=\\"standard_9\\">\\n696.90 <\\/td>\\n<td id=\\"mini_9\\">\\n69.69 <\\/td>\\n<td id=\\"micro_9\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_9\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-nzd\\">EUR\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_52\\">\\n1.7683 <\\/td>\\n<td id=\\"standard_52\\">\\n6.17 <\\/td>\\n<td id=\\"mini_52\\">\\n0.62 <\\/td>\\n<td id=\\"micro_52\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_52\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-usd\\">EUR\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_1\\">\\n1.0913 <\\/td>\\n<td id=\\"standard_1\\">\\n10.00 <\\/td>\\n<td id=\\"mini_1\\">\\n1.00 <\\/td>\\n<td id=\\"micro_1\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_1\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-aud\\">GBP\\/AUD<\\/a>\\n<\\/td>\\n<td id=\\"price_53\\">\\n1.9042 <\\/td>\\n<td id=\\"standard_53\\">\\n6.68 <\\/td>\\n<td id=\\"mini_53\\">\\n0.67 <\\/td>\\n<td id=\\"micro_53\\">\\n0.07 <\\/td>\\n<td class=\\"bold\\" id=\\"value_53\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-cad\\">GBP\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_54\\">\\n1.6721 <\\/td>\\n<td id=\\"standard_54\\">\\n7.61 <\\/td>\\n<td id=\\"mini_54\\">\\n0.76 <\\/td>\\n<td id=\\"micro_54\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_54\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-chf\\">GBP\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_12\\">\\n1.1388 <\\/td>\\n<td id=\\"standard_12\\">\\n11.17 <\\/td>\\n<td id=\\"mini_12\\">\\n1.12 <\\/td>\\n<td id=\\"micro_12\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_12\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-jpy\\">GBP\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_11\\">\\n182.55 <\\/td>\\n<td id=\\"standard_11\\">\\n 696.90 <\\/td>\\n<td id=\\"mini_11\\">\\n69.69 <\\/td>\\n<td id=\\"micro_11\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_11\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-nzd\\">GBP\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_55\\">\\n2.0616 <\\/td>\\n<td id=\\"standard_55\\">\\n6.17 <\\/td>\\n<td id=\\"mini_55\\">\\n0.62 <\\/td>\\n<td id=\\"micro_55\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_55\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-usd\\">GBP\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_2\\">\\n1.2723 <\\/td>\\n<td id=\\"standard_2\\">\\n10.00 <\\/td>\\n<td id=\\"mini_2\\">\\n1.00 <\\/td>\\n<td id=\\"micro_2\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/nzd-jpy\\">NZD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_58\\">\\n88.55 <\\/td>\\n<td id=\\"standard_58\\">\\n696.90 <\\/td>\\n<td id=\\"mini_58\\">\\n69.69 <\\/td>\\n<td id=\\"micro_58\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_58\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/nzd-usd\\">NZD\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_8\\">\\n0.6171 <\\/td>\\n<td id=\\"standard_8\\">\\n10.00 <\\/td>\\n<td id=\\"mini_8\\">\\n1.00 <\\/td>\\n<td id=\\"micro_8\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_8\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-brl\\">USD\\/BRL<\\/a>\\n<\\/td>\\n<td id=\\"price_2103\\">\\n4.7624 <\\/td>\\n<td id=\\"standard_2103\\">\\n2.10 <\\/td>\\n <td id=\\"mini_2103\\">\\n0.21 <\\/td>\\n<td id=\\"micro_2103\\">\\n0.02 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2103\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-cad\\">USD\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_7\\">\\n1.3143 <\\/td>\\n<td id=\\"standard_7\\">\\n7.61 <\\/td>\\n<td id=\\"mini_7\\">\\n0.76 <\\/td>\\n<td id=\\"micro_7\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_7\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-chf\\">USD\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_4\\">\\n0.8950 <\\/td>\\n<td id=\\"standard_4\\">\\n11.17 <\\/td>\\n<td id=\\"mini_4\\">\\n1.12 <\\/td>\\n<td id=\\"micro_4\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_4\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-cny\\">USD\\/CNY<\\/a>\\n<\\/td>\\n<td id=\\"price_2111\\">\\n7.2376 <\\/td>\\n<td id=\\"standard_2111\\">\\n1.38 <\\/td>\\n<td id=\\"mini_2111\\">\\n0.14 <\\/td>\\n<td id=\\"micro_2111\\">\\n0.01 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2111\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-inr\\">USD\\/INR<\\/a>\\n<\\/td>\\n<td id=\\"price_160\\">\\n81.999 <\\/td>\\n<td id=\\"standard_160\\">\\n0.12 <\\/td>\\n<td id=\\"mini_160\\">\\n0.01 <\\/td>\\n<td id=\\"micro_160\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_160\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-jpy\\">USD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_3\\">\\n143.49 <\\/td>\\n<td id=\\"standard_3\\">\\n696.90 <\\/td>\\n<td id=\\"mini_3\\">\\n69.69 <\\/td>\\n<td id=\\"micro_3\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_3\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-rub\\">USD\\/RUB<\\/a>\\n<\\/td>\\n<td id=\\"price_2186\\">\\n85.0875 <\\/td>\\n<td id=\\"standard_2186\\">\\n0.12 <\\/td>\\n<td id=\\"mini_2186\\">\\n0.01 <\\/td>\\n<td id=\\"micro_2186\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2186\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-try\\">USD\\/TRY<\\/a>\\n<\\/td>\\n<td id=\\"price_18\\">\\n26.0098 <\\/td>\\n<td id=\\"standard_18\\">\\n0.38 <\\/td>\\n<td id=\\"mini_18\\">\\n0.04 <\\/td>\\n<td id=\\"micro_18\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_18\\">\\n\\n<\\/td>\\n<\\/tr>\\n<\\/tbody>\\n"\n',calculator2:"",calculator:""}},mounted:function(){var t=this;(0,l.u)({title:(0,r.Fl)((function(){return t.site_title})),meta:[{name:"description",content:(0,r.Fl)((function(){return t.site_description}))},{name:"keywords",content:(0,r.Fl)((function(){return t.site_keywords}))}]}),this.getData()},methods:{getData:function(){var t,n=this;return(t=v().mark((function t(){var d;return v().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return(0,f.tv)(),t.prev=1,t.next=4,h().get("/api/pip-calculator");case 4:200===(d=t.sent).status?(n.site_title=d.data.title.en,n.site_keywords=d.data.keywords.en,n.site_description=d.data.description.en,n.calculator=d.data.calculator_en):console.log("Error"),t.next=11;break;case 8:t.prev=8,t.t0=t.catch(1),console.log("Error");case 11:case"end":return t.stop()}}),t,null,[[1,8]])})),function(){var n=this,d=arguments;return new Promise((function(r,i){var e=t.apply(n,d);function a(t){p(e,r,i,a,o,"next",t)}function o(t){p(e,r,i,a,o,"throw",t)}a(void 0)}))})()}}};var w=d(3379),b=d.n(w),y=d(2095),g={insert:"head",singleton:!1};b()(y.Z,g);y.Z.locals;const L=(0,d(3744).Z)(m,[["render",function(t,n,d,l,u,h){var f=(0,r.Q2)("raw-html");return(0,r.wg)(),(0,r.iD)("div",i,[(0,r._)("div",e,[(0,r._)("div",a,[(0,r._)("h1",null,(0,r.zw)(this.site_title),1),(0,r._)("div",o,[(0,r._)("table",s,[c,(0,r.wy)((0,r._)("div",null,null,512),[[f,u.calculator1]])])])])])])}]])}}]);