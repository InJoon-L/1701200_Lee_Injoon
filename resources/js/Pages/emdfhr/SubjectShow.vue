<template>
<app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                교과목 자세히 보기
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    과목명: {{ this.subject.name }}<br />
                    학점: {{ this.subject.score }}<br />
                    과목 설명: {{ this.subject.content }}<br />
                    등록일: {{ this.subject.created_at }}<br />
                    변경일: {{ this.subject.updated_at }}<br />
                    <a :href="route('edit', subject.id)">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        수정
                    </button>
                    </a>
                    <a :href="route('list')">
                    <button @click="deleted" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        삭제
                    </button>
                    </a>

                    <button v-if="flag" @click="sinchung" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        수강신청
                    </button>
                    <button v-if="!flag" @click="cls" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        수강취소
                    </button>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'

export default {
    components: {
        AppLayout
    },
    props: {
        subject: Object
    },
    data() {
        return {
            flag: true
        }
    },
    methods: {
        deleted() {
            axios.delete('/emdfhr/' + this.subject.id)
            .then(res => {
                console.log(res)
                alert('삭제성공')
            })
            .catch(err => {
                console.log(err)
                alert('삭제실패')
            })
        },
        sinchung() {
            axios.post('/emdfhr/select', { 'id': this.subject.id })
            .then(res => {
                console.log(res)
                alert('수강신청 완료')
            })
            .catch(err => {
                console.log(err)
            })
        },
        cls() {
            axios.post('/emdfhr/cls', { 'id': this.subject.id })
            .then(res => {
                console.log(res)
                alert('수강취소 완료')
            })
            .catch(err => {
                console.log(err)
            })
        },
        check() {
            axios.post('/emdfhr/state', { 'id': this.subject.id })
            .then(res => {
                console.log(res)
                this.flag = res.data
            })
            .catch(err => {
                console.log(err)
                this.flag = true;
            })
        }
    },
    created() {
        this.check()
    }
}
</script>

<style>

</style>
