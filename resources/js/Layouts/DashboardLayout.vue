<template>
    <div class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
             id="sidenavAccordion">
            <!-- Sidenav Toggle Button-->
            <button v-if="!isCandidate" class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
                data-feather="menu"></i></button>
            <inertia-link class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.html">{{ appName }}</inertia-link>
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
                <!-- User Dropdown-->
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                       href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <img v-if="isMale" class="img-fluid"
                             src="assets/admin/images/illustrations/profiles/profile-2.png" alt=""/>
                        <img v-else class="img-fluid"
                             src="assets/admin/images/illustrations/profiles/profile-1.png" alt=""/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                         aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img v-if="isMale" class="dropdown-user-img"
                                 src="assets/admin/images/illustrations/profiles/profile-2.png" alt=""/>
                            <img v-else class="dropdown-user-img"
                                 src="assets/admin/images/illustrations/profiles/profile-1.png" alt=""/>

                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">{{ fullName }}</div>
                                <div class="dropdown-user-details-email">{{ email }}</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <inertia-link class="dropdown-item" href="#!">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Perfil
                        </inertia-link>
                        <inertia-link class="dropdown-item" href="#!" @click.prevent="logout">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Sair
                        </inertia-link>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <dashboard-sidebar-component v-if="!isCandidate" :full-name="fullName" :role="role" />

            <div id="layoutSidenav_content">
                <main>
                    <slot id="header"></slot>

                    <slot id="content"></slot>
                </main>
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; {{ appName }} 2021</div>
                            <div class="col-md-6 text-md-end small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
import DashboardSidebarComponent from "@/Components/Dashboard/DashboardSidebarComponent";

export default {
    name: "DashboardLayout",
    components: {
        DashboardSidebarComponent
    },
    created() {
        console.log(this.user())
    },
    computed: {
        appName(){
            return this.$page.props.appName
        },
        email(){
            return this.user().email
        },
        fullName(){
            const user = this.user()
            return user.first_name.concat(" ", user.last_name)
        },
        isMale(){
            return this.user().gender === "male"
        },
        isCandidate(){
            return this.user().role === "candidate"
        },
        role(){
            return this.user().role
        }
    },
    methods: {
        logout(){
            this.$inertia.post(route("logout"))
        },
        user(){
            return this.$page.props.auth.user
        }
    }
}
</script>

<style scoped>

</style>
