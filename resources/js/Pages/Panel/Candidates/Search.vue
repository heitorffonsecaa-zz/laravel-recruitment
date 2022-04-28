<template>
    <dashboard-layout>
        <template #header>
            <dashboard-header-component header-icon="" header-title="Buscar candidato"/>
        </template>

        <template #content>
            <div class="card mb-4">
                <div class="card-body">
                    <form @submit.pre.prevent="submit">
                        <select name="">
                            <option value="">Selecione...</option>
                            <option v-for="" value=""></option>
                        </select>
                    </form>
                </div>
            </div>
        </template>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import DashboardHeaderComponent from "@/Components/Dashboard/DashboardHeaderComponent";

export default {
    name: "Search",
    components: {
        DashboardLayout,
        DashboardHeaderComponent
    },
    props:{
        skills: Array
    },
    data(){
        return {
            form: {
                skills: Array
            }
        }
    },
    methods: {
        submit(){
            this.$inertia.post('/search', this.form)
        }
    }
}
</script>

<style scoped>

</style>
