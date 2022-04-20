<template>
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Overview</div>

                    <!-- OVERVIEW -->
                    <inertia-link class="nav-link"
                       href="#!">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </inertia-link><!-- END OVERVIEW -->

                    <!-- FILE SEARCH -->
                    <inertia-link class="nav-link"
                                  :href="route('dashboard.candidate.search')">
                        <div class="nav-link-icon"><i data-feather="file-plus"></i></div>
                        Buscar candidato
                    </inertia-link><!-- END FILE SEARCH -->

                    <div class="sidenav-menu-heading">Entidades</div>

                    <!-- USERS -->
                    <inertia-link class="nav-link collapsed"
                       href="javascript:void(0);"
                       data-bs-toggle="collapse"
                       data-bs-target="#collapsePages"
                       aria-expanded="false"
                       aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="fas fa-users"></i></div>
                        Usuários
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </inertia-link>
                    <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <inertia-link class="nav-link"
                               href="#!">
                                Candidatos
                            </inertia-link>
                            <inertia-link v-if="isAdmin" class="nav-link"
                               href="#!">
                                Recrutadores
                            </inertia-link>
                        </nav>
                    </div><!-- END USERS -->

                    <!-- FILE SKILLS -->
                    <inertia-link class="nav-link"
                                  href="#!">
                        <div class="nav-link-icon"><i data-feather="star"></i></div>
                        Habilidades
                    </inertia-link><!-- END SKILLS -->

                    <div v-if="isAdmin" class="sidenav-menu-heading">Sistema</div>

                    <!-- SYSTEM USERS -->
                    <inertia-link v-if="isAdmin" class="nav-link"
                       href="#!">
                        <div class="nav-link-icon"><i class="fas fa-users-cog"></i></div>
                        Administradores
                    </inertia-link><!-- END SYSTEM USERS -->
                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logado como:</div>
                    <div class="sidenav-footer-title">{{ fullName }}</div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: "DashboardSidebarComponent",
    props: {
        role: String,
        fullName: String
    },
    computed: {
        isAdmin(){
            return this.role === 'admin'
        }
    }
}
</script>

<style scoped>

</style>
