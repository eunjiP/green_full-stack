<template>
    <img class="imgsize" v-bind:src="imgSrc">
</template>

<script>

export default {
    props: {
        imgSrc:String,
    },
}

</script>

<!-- scoped : 파일 내에서만 적용하겠다는 말 -->
<style scoped>
    .imgsize { width: 215.5px;}
</style>