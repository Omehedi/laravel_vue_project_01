<template>
    <div>
        <top-nav-bar></top-nav-bar>
        <div id="layoutSidenav">
            <side-nav-bar></side-nav-bar>
            <div id="layoutSidenav_content">
                <main>
                    <router-view></router-view>
                </main>
                <Footer></Footer>
            </div>
        </div>
    </div>

</template>
<script>
import TopNavBar from "./components/topNavBar.vue";
import SideNavBar from "./components/sideNavBar.vue";
import Footer from "./components/Footer.vue";

export default {
    name : 'App',
    components: {Footer, SideNavBar, TopNavBar},
    mounted() {
    }
}
</script>
<style scoped>

</style>
