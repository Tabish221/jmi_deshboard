"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_ru_pages2_callbackrequest_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=script&lang=js":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=script&lang=js ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _vueuse_head__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @vueuse/head */ "./node_modules/@unhead/vue/dist/shared/vue.f36acd1f.mjs");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.mjs");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_2__);
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }





var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_3__.useRouter)();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      site_title: "Call Back Request",
      site_description: "",
      site_keywords: ''
    };
  },
  mounted: function mounted() {
    var _this = this;
    (0,_vueuse_head__WEBPACK_IMPORTED_MODULE_4__.u)({
      // Can be static or computed
      title: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
        return _this.site_title;
      }),
      meta: [{
        name: "description",
        content: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
          return '';
        })
      }, {
        name: "keywords",
        content: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
          return '';
        })
      }]
    });
  },
  setup: function setup() {
    var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
    var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_3__.useRouter)();
    var form = (0,vue__WEBPACK_IMPORTED_MODULE_0__.reactive)({
      title: '',
      timetocall: '',
      email: '',
      fullname: '',
      code: '',
      country: '',
      phone: '',
      city: '',
      department: ''
    });
    var callback = /*#__PURE__*/function () {
      var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        var result;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              _context.prev = 0;
              _context.next = 3;
              return axios__WEBPACK_IMPORTED_MODULE_1___default().post('/api/callbackrequest', form);
            case 3:
              result = _context.sent;
              if (!(result.status === 200)) {
                _context.next = 9;
                break;
              }
              _context.next = 7;
              return router.push('/ru/callbackrequest/msg');
            case 7:
              _context.next = 10;
              break;
            case 9:
              if (result.status === 201) {
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Error > span").text(result.data.errors.ru);
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Error").show();
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Success").hide();
              }
            case 10:
              _context.next = 15;
              break;
            case 12:
              _context.prev = 12;
              _context.t0 = _context["catch"](0);
              if (_context.t0.response && _context.t0.response.status === 401) {
                errors.value = _context.t0.response.data.errors.ru || "";
              } else {
                if (_context.t0 && _context.t0.response.data && _context.t0.response.data.errors) {
                  errors.value = Object.values(_context.t0.response.data.errors);
                } else {
                  errors.value = _context.t0.response.data.errors || "";
                }
              }
            case 15:
            case "end":
              return _context.stop();
          }
        }, _callee, null, [[0, 12]]);
      }));
      return function callback() {
        return _ref.apply(this, arguments);
      };
    }();
    return {
      form: form,
      errors: errors,
      callback: callback
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=template&id=2575aa66":
/*!******************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=template&id=2575aa66 ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "row-fluid"
};
var _hoisted_2 = {
  "class": "callbackrequest loginpage"
};
var _hoisted_3 = {
  "class": "container"
};
var _hoisted_4 = {
  "class": "col-lg-6 col-sm-8 col-xs-12 col-xxs"
};
var _hoisted_5 = {
  "class": "login"
};
var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  "class": "title color-white"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "fa fa-arrow-circle-right callbackrequestarrow jmiyellow"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Call Back "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("strong", null, "Request")], -1 /* HOISTED */);
var _hoisted_7 = {
  "class": "form"
};
var _hoisted_8 = {
  "class": "control-group col-sm-12"
};
var _hoisted_9 = {
  "class": "col-sm-3"
};
var _hoisted_10 = {
  "class": "controls"
};
var _hoisted_11 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "0"
}, "Mr", -1 /* HOISTED */);
var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "1"
}, "Mrs", -1 /* HOISTED */);
var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "2"
}, "Miss", -1 /* HOISTED */);
var _hoisted_14 = [_hoisted_11, _hoisted_12, _hoisted_13];
var _hoisted_15 = {
  "class": "col-sm-9"
};
var _hoisted_16 = {
  "class": "controls"
};
var _hoisted_17 = {
  "class": "control-group col-sm-12"
};
var _hoisted_18 = {
  "class": "col-sm-6"
};
var _hoisted_19 = {
  "class": "controls"
};
var _hoisted_20 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  disabled: "",
  selected: ""
}, "--Select Department--", -1 /* HOISTED */);
var _hoisted_21 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "0"
}, "Sales", -1 /* HOISTED */);
var _hoisted_22 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "1"
}, "Customer Service", -1 /* HOISTED */);
var _hoisted_23 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "2"
}, "Account Openings", -1 /* HOISTED */);
var _hoisted_24 = [_hoisted_20, _hoisted_21, _hoisted_22, _hoisted_23];
var _hoisted_25 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "error",
  "for": "username"
}, null, -1 /* HOISTED */);
var _hoisted_26 = {
  "class": "col-sm-6"
};
var _hoisted_27 = {
  "class": "controls"
};
var _hoisted_28 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "error",
  "for": "email"
}, null, -1 /* HOISTED */);
var _hoisted_29 = {
  "class": "control-group col-sm-12"
};
var _hoisted_30 = {
  "class": "col-sm-6"
};
var _hoisted_31 = {
  "class": "controls"
};
var _hoisted_32 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<option disabled selected>--Выберите страну--</option><option value=\"1\">Afghanistan</option><option value=\"2\">Albania</option><option value=\"3\">Algeria</option><option value=\"4\">American Samoa</option><option value=\"5\">Andorra</option><option value=\"6\">Angola</option><option value=\"7\">Anguilla</option><option value=\"8\">Antarctica</option><option value=\"9\">Antigua and Barbuda</option><option value=\"10\">Argentina</option><option value=\"11\">Armenia</option><option value=\"12\">Aruba</option><option value=\"13\">Australia</option><option value=\"14\">Austria</option><option value=\"15\">Azerbaijan</option><option value=\"16\">Bahamas</option><option value=\"17\">Bahrain</option><option value=\"18\">Bangladesh</option><option value=\"19\">Barbados</option><option value=\"20\">Belarus</option><option value=\"21\">Belgium</option><option value=\"22\">Belize</option><option value=\"23\">Benin</option><option value=\"24\">Bermuda</option><option value=\"25\">Bhutan</option><option value=\"26\">Bolivia</option><option value=\"27\">Bosnia and Herzegovina</option><option value=\"28\">Botswana</option><option value=\"29\">Brazil</option><option value=\"30\">British Indian Ocean Territory</option><option value=\"31\">British Virgin Islands</option><option value=\"32\">Brunei</option><option value=\"33\">Bulgaria</option><option value=\"34\">Burkina Faso</option><option value=\"35\">Burundi</option><option value=\"36\">Cambodia</option><option value=\"37\">Cameroon</option><option value=\"38\">Canada</option><option value=\"39\">Cape Verde</option><option value=\"40\">Cayman Islands</option><option value=\"41\">Central African Republic</option><option value=\"42\">Chad</option><option value=\"43\">Chile</option><option value=\"44\">China</option><option value=\"45\">Christmas Island</option><option value=\"46\">Cocos Islands</option><option value=\"47\">Colombia</option><option value=\"48\">Comoros</option><option value=\"49\">Cook Islands</option><option value=\"50\">Costa Rica</option><option value=\"51\">Croatia</option><option value=\"52\">Cuba</option><option value=\"53\">Curacao</option><option value=\"54\">Cyprus</option><option value=\"55\">Czech Republic</option><option value=\"56\">Democratic Republic of the Congo</option><option value=\"57\">Denmark</option><option value=\"58\">Djibouti</option><option value=\"59\">Dominica</option><option value=\"60\">Dominican Republic</option><option value=\"61\">East Timor</option><option value=\"62\">Ecuador</option><option value=\"63\">Egypt</option><option value=\"64\">El Salvador</option><option value=\"65\">Equatorial Guinea</option><option value=\"66\">Eritrea</option><option value=\"67\">Estonia</option><option value=\"68\">Ethiopia</option><option value=\"69\">Falkland Islands</option><option value=\"70\">Faroe Islands</option><option value=\"71\">Fiji</option><option value=\"72\">Finland</option><option value=\"73\">France</option><option value=\"74\">French Polynesia</option><option value=\"75\">Gabon</option><option value=\"76\">Gambia</option><option value=\"77\">Georgia</option><option value=\"78\">Germany</option><option value=\"79\">Ghana</option><option value=\"80\">Gibraltar</option><option value=\"81\">Greece</option><option value=\"82\">Greenland</option><option value=\"83\">Grenada</option><option value=\"84\">Guam</option><option value=\"85\">Guatemala</option><option value=\"86\">Guernsey</option><option value=\"87\">Guinea</option><option value=\"88\">Guinea-Bissau</option><option value=\"89\">Guyana</option><option value=\"90\">Haiti</option><option value=\"91\">Honduras</option><option value=\"92\">Hong Kong</option><option value=\"93\">Hungary</option><option value=\"94\">Iceland</option><option value=\"95\">India</option><option value=\"96\">Indonesia</option><option value=\"97\">Iran</option><option value=\"98\">Iraq</option><option value=\"99\">Ireland</option><option value=\"100\">Isle of Man</option><option value=\"101\">Palestine</option><option value=\"102\">Italy</option><option value=\"103\">Ivory Coast</option><option value=\"104\">Jamaica</option><option value=\"105\">Japan</option><option value=\"106\">Jersey</option><option value=\"107\">Jordan</option><option value=\"108\">Kazakhstan</option><option value=\"109\">Kenya</option><option value=\"110\">Kiribati</option><option value=\"111\">Kosovo</option><option value=\"112\">Kuwait</option><option value=\"113\">Kyrgyzstan</option><option value=\"114\">Laos</option><option value=\"115\">Latvia</option><option value=\"116\">Lebanon</option><option value=\"117\">Lesotho</option><option value=\"118\">Liberia</option><option value=\"119\">Libya</option><option value=\"120\">Liechtenstein</option><option value=\"121\">Lithuania</option><option value=\"122\">Luxembourg</option><option value=\"123\">Macao</option><option value=\"124\">Macedonia</option><option value=\"125\">Madagascar</option><option value=\"126\">Malawi</option><option value=\"127\">Malaysia</option><option value=\"128\">Maldives</option><option value=\"129\">Mali</option><option value=\"130\">Malta</option><option value=\"131\">Marshall Islands</option><option value=\"132\">Mauritania</option><option value=\"133\">Mauritius</option><option value=\"134\">Mayotte</option><option value=\"135\">Mexico</option><option value=\"136\">Micronesia</option><option value=\"137\">Moldova</option><option value=\"138\">Monaco</option><option value=\"139\">Mongolia</option><option value=\"140\">Montenegro</option><option value=\"141\">Montserrat</option><option value=\"142\">Morocco</option><option value=\"143\">Mozambique</option><option value=\"144\">Myanmar</option><option value=\"145\">Namibia</option><option value=\"146\">Nauru</option><option value=\"147\">Nepal</option><option value=\"148\">Netherlands</option><option value=\"149\">Netherlands Antilles</option><option value=\"150\">New Caledonia</option><option value=\"151\">New Zealand</option><option value=\"152\">Nicaragua</option><option value=\"153\">Niger</option><option value=\"154\">Nigeria</option><option value=\"155\">Niue</option><option value=\"156\">North Korea</option><option value=\"157\">Northern Mariana Islands</option><option value=\"158\">Norway</option><option value=\"159\">Oman</option><option value=\"160\">Pakistan</option><option value=\"161\">Palau</option><option value=\"162\">Palestine</option><option value=\"163\">Panama</option><option value=\"164\">Papua New Guinea</option><option value=\"165\">Paraguay</option><option value=\"166\">Peru</option><option value=\"167\">Philippines</option><option value=\"168\">Pitcairn</option><option value=\"169\">Poland</option><option value=\"170\">Portugal</option><option value=\"171\">Puerto Rico</option><option value=\"172\">Qatar</option><option value=\"173\">Republic of the Congo</option><option value=\"174\">Reunion</option><option value=\"175\">Romania</option><option value=\"176\">Russia</option><option value=\"177\">Rwanda</option><option value=\"178\">Saint Barthelemy</option><option value=\"179\">Saint Helena</option><option value=\"180\">Saint Kitts and Nevis</option><option value=\"181\">Saint Lucia</option><option value=\"182\">Saint Martin</option><option value=\"183\">Saint Pierre and Miquelon</option><option value=\"184\">Saint Vincent and the Grenadines</option><option value=\"185\">Samoa</option><option value=\"186\">San Marino</option><option value=\"187\">Sao Tome and Principe</option><option value=\"188\">Saudi Arabia</option><option value=\"189\">Senegal</option><option value=\"190\">Serbia</option><option value=\"191\">Seychelles</option><option value=\"192\">Sierra Leone</option><option value=\"193\">Singapore</option><option value=\"194\">Sint Maarten</option><option value=\"195\">Slovakia</option><option value=\"196\">Slovenia</option><option value=\"197\">Solomon Islands</option><option value=\"198\">Somalia</option><option value=\"199\">South Africa</option><option value=\"200\">South Korea</option><option value=\"201\">South Sudan</option><option value=\"202\">Spain</option><option value=\"203\">Sri Lanka</option><option value=\"204\">Sudan</option><option value=\"205\">Suriname</option><option value=\"206\">Svalbard and Jan Mayen</option><option value=\"207\">Swaziland</option><option value=\"208\">Sweden</option><option value=\"209\">Switzerland</option><option value=\"210\">Syria</option><option value=\"211\">Taiwan</option><option value=\"212\">Tajikistan</option><option value=\"213\">Tanzania</option><option value=\"214\">Thailand</option><option value=\"215\">Togo</option><option value=\"216\">Tokelau</option><option value=\"217\">Tonga</option><option value=\"218\">Trinidad and Tobago</option><option value=\"219\">Tunisia</option><option value=\"220\">Turkey</option><option value=\"221\">Turkmenistan</option><option value=\"222\">Turks and Caicos Islands</option><option value=\"223\">Tuvalu</option><option value=\"224\">U.S. Virgin Islands</option><option value=\"225\">Uganda</option><option value=\"226\">Ukraine</option><option value=\"227\">United Arab Emirates</option><option value=\"228\">United Kingdom</option><option value=\"229\">United States</option><option value=\"230\">Uruguay</option><option value=\"231\">Uzbekistan</option><option value=\"232\">Vanuatu</option><option value=\"233\">Vatican</option><option value=\"234\">Venezuela</option><option value=\"235\">Vietnam</option><option value=\"236\">Wallis and Futuna</option><option value=\"237\">Western Sahara</option><option value=\"238\">Yemen</option><option value=\"239\">Zambia</option><option value=\"240\">Zimbabwe</option>", 241);
var _hoisted_273 = [_hoisted_32];
var _hoisted_274 = {
  "class": "col-sm-6"
};
var _hoisted_275 = {
  "class": "controls"
};
var _hoisted_276 = {
  "class": "control-group col-sm-12"
};
var _hoisted_277 = {
  "class": "col-sm-5"
};
var _hoisted_278 = {
  "class": "controls"
};
var _hoisted_279 = {
  "class": "col-sm-7"
};
var _hoisted_280 = {
  "class": "controls"
};
var _hoisted_281 = {
  "class": "col-sm-12"
};
var _hoisted_282 = {
  "class": "col-sm-12"
};
var _hoisted_283 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-sm-12 text-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
  type: "submit",
  name: "callbackrequest",
  value: "Request",
  id: "loginsubmit",
  "class": "form-btn",
  style: {
    "max-width": "250px",
    "margin": "10px auto"
  }
})], -1 /* HOISTED */);
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
    id: "callbackrequest",
    autocomplete: "off",
    method: "post",
    onSubmit: _cache[9] || (_cache[9] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $setup.callback && $setup.callback.apply($setup, arguments);
    }, ["prevent"])),
    "class": "form-horizontal"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "class": "form-control txt-box",
    name: "title",
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.form.title = $event;
    }),
    id: "title",
    required: ""
  }, [].concat(_hoisted_14), 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.title]])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "text",
    "class": "form-control txt-box col-lg-8",
    id: "fullname",
    "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
      return $setup.form.fullname = $event;
    }),
    name: "fullname",
    placeholder: "Полное имя *",
    required: ""
  }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.fullname]])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    name: "department",
    "class": "form-control txt-box",
    title: "Select Department",
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.form.department = $event;
    }),
    id: "department",
    required: ""
  }, [].concat(_hoisted_24), 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.department]]), _hoisted_25])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_26, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "text",
    "class": "form-control txt-box",
    id: "email",
    name: "email",
    "onUpdate:modelValue": _cache[3] || (_cache[3] = function ($event) {
      return $setup.form.email = $event;
    }),
    placeholder: "Электронная почта *",
    required: ""
  }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.email]]), _hoisted_28])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_29, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_30, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_31, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    name: "country",
    title: "select your country!",
    "onUpdate:modelValue": _cache[4] || (_cache[4] = function ($event) {
      return $setup.form.country = $event;
    }),
    id: "country",
    "class": "form-control txt-box",
    required: ""
  }, [].concat(_hoisted_273), 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.country]])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_274, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_275, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "text",
    "class": "form-control txt-box col-lg-8",
    "onUpdate:modelValue": _cache[5] || (_cache[5] = function ($event) {
      return $setup.form.city = $event;
    }),
    id: "city",
    name: "city",
    placeholder: "Город *",
    required: ""
  }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.city]])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_276, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_277, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_278, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "text",
    "class": "form-control txt-box col-lg-8",
    "onUpdate:modelValue": _cache[6] || (_cache[6] = function ($event) {
      return $setup.form.code = $event;
    }),
    id: "code",
    name: "code",
    placeholder: "Code * : use 00 for +",
    required: ""
  }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.code]])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_279, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_280, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "text",
    "class": "form-control txt-box col-lg-8",
    id: "phone",
    "onUpdate:modelValue": _cache[7] || (_cache[7] = function ($event) {
      return $setup.form.phone = $event;
    }),
    name: "phone",
    placeholder: "Телефон *",
    required: ""
  }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.phone]])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_281, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_282, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "text",
    "class": "form-control txt-box",
    name: "timetocall",
    "onUpdate:modelValue": _cache[8] || (_cache[8] = function ($event) {
      return $setup.form.timetocall = $event;
    }),
    id: "timetocall",
    placeholder: "Time To Call * : Ex. 9 AM to 6 PM",
    required: ""
  }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.timetocall]])])]), _hoisted_283], 32 /* NEED_HYDRATION */)])])])])])]);
}

/***/ }),

/***/ "./resources/js/views/ru/pages2/callbackrequest.vue":
/*!**********************************************************!*\
  !*** ./resources/js/views/ru/pages2/callbackrequest.vue ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _callbackrequest_vue_vue_type_template_id_2575aa66__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./callbackrequest.vue?vue&type=template&id=2575aa66 */ "./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=template&id=2575aa66");
/* harmony import */ var _callbackrequest_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./callbackrequest.vue?vue&type=script&lang=js */ "./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=script&lang=js");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_callbackrequest_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_callbackrequest_vue_vue_type_template_id_2575aa66__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/ru/pages2/callbackrequest.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=script&lang=js":
/*!**********************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=script&lang=js ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_callbackrequest_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_callbackrequest_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./callbackrequest.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=template&id=2575aa66":
/*!****************************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=template&id=2575aa66 ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_callbackrequest_vue_vue_type_template_id_2575aa66__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_callbackrequest_vue_vue_type_template_id_2575aa66__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./callbackrequest.vue?vue&type=template&id=2575aa66 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/callbackrequest.vue?vue&type=template&id=2575aa66");


/***/ })

}]);