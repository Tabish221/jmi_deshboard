<template>
    <AppHeader/>

        <router-view/>
        <AppFooter/>
</template>
<script>
import AppHeader from './AppHeader.vue'
import AppFooter from './AppFooter.vue'
export default {
    components:{AppHeader,AppFooter}
}
</script>
