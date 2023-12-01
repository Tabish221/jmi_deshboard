// store.js
import Vuex from 'vuex';

export default new Vuex.Store({
    state: {
        title: '',
        notifications_all:[],
        notifications_unseen:[],
        pending_account:'',
        user:'',
        accounts:[],
        equities:[],
        names:[],
        balances:[],
        currentPage:'',
        pageType:'',
    },




    mutations: {
        setTitle(state, newTitle) {
            state.title = newTitle;
        },
        setnotifications_all(state, newVariable) {
            state.notifications_all = newVariable;
        },
        setnotifications_unseen(state, newVariable) {
            state.notifications_unseen = newVariable;
        },
        setuser(state, newVariable) {
            state.user = newVariable;
        },
        setaccounts(state, newVariable) {
            state.accounts = newVariable;
        },
        setequities(state, newVariable) {
            state.equities = newVariable;
        },
        setnames(state, newVariable) {
            state.names = newVariable;
        },
        setbalances(state, newVariable) {
            state.balances = newVariable;
        },
        setcurrentPage(state, newVariable) {
            state.currentPage = newVariable;
        },
        setpageType(state, newVariable) {
            state.pageType = newVariable;
        },
        setpending_account(state, newVariable) {
            state.pending_account = newVariable;
        },



    },
});
