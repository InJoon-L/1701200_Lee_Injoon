<template>
<div>
    <div class="w-full max-w-xs">
  <form >
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        title
      </label>
      <input v-model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="title">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="score">
        score
      </label>
      <input v-model="score" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="score" type="number" placeholder="score">
    </div>
        <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
        content
      </label>
      <input v-model="content" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="content" type="text" placeholder="content">
    </div>
    <div class="flex items-center justify-between">
      <button @click="inputData" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        등록
      </button>
    </div>
  </form>
</div>
</div>
</template>

<script>
export default {
    data() {
        return {
            title: '',
            score: '',
            content: ''
        }
    },
    methods: {
        async inputData() {
            let data = {
                title: this.title,
                score: this.score,
                content: this.content
            }
            console.log(data)
            let res = await axios.post('/emdfhr', data)
            if (res.data) {
                console.log(res.data)
                alert('등록완료')
                this.title = ''
                this.score = ''
                this.content = ''
            }
        }
    }
}
</script>

<style>

</style>
