<template>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">E-commerce</div>
                    <template v-for="(menu, mIndex) in Config.menus">
                        <template v-if="menu.sub_menus.length > 0">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                <span>{{ menu.name }}</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <template v-for="(subMenu, sIndex) in menu.sub_menus">
                                        <router-link class="nav-link" :to="subMenu.link">{{ subMenu.name }}</router-link>
                                    </template>
                                </nav>
                            </div>
                        </template>
                        <template v-else>
                            <router-link class="nav-link" :to="menu.link">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{ menu.name }}
                            </router-link>
                        </template>
                    </template>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        <span>Customer</span>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link to="/admin/customer/customer" class="nav-link" >Customers</router-link>
                            <router-link to="/admin/customer/orders" class="nav-link" >Orders</router-link>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
</template>
<script>
    export default {
        name: "sideNavBar",
        methods : {
            getConfigurations : function (){
                const _this = this;
                let url = _this.urlGenerate('api/configurations');
                _this.httpReq('get', url, {}, {}, function (retData){
                    _this.$store.commit('Config', retData.result);
                    _this.$store.commit('permissions', retData.result.permissions);
                })
            }
        },
        mounted() {
            this.getConfigurations();
        }
    }
</script>
<style scoped>
</style>