<template>
<div>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <div v-for="(link, key) in links" :key="key">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
                <inertia-link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        links: Array,
    },
    data() {
        return {
            flag: false
        }
    },
    watch: {
        links() {
            console.log(this.links)
            this.flag = true
        }
    }
}
</script>

<style>

</style>
