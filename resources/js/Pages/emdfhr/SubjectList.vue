<template>
    <app-layout >
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                과목
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                        <div class="container mt-5">
                            <table class="table w-full">
                                <thead>
                            <tr>
                                <th>과목명</th>
                                <th>학점</th>
                                <th>설명</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in subjects.data" :key="item.id">
                                    <a :href="route('show', item.id)">
                                        <td>{{ item.name }}</td>
                                    </a>
                                    <td>{{ item.score }}</td>
                                    <td>{{ item.content }}</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <pagination :links="subjects.links" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from './Pagination.vue'

export default {
components: {
        AppLayout,
        Pagination,
},
props: {
        subjects: Object
    },
    created() {
        console.log(this.subjects)
    },
    data() {
        return{

        }
    },
    methods: {
        listClick(id) {
            let router = '/emdfhr/show' + id

        }
    }
}
</script>

<style>

</style>
