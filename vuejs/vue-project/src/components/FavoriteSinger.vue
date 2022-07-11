<template>
<!-- v-bind:src의 축약형 :src -->
    <img class="imgsize" :src="imgSrc">
</template>

<script>
export default {
    data() {
        return {
            imgSrc: 'https://post-phinf.pstatic.net/MjAyMTAxMjFfMTA3/MDAxNjExMTk2ODM3NzU4.er3X53Mr5Zcn0ynp1B5QAIWeyjwgk9T-1cSC7Tgqe14g.cLCKopgCQAUtv9y2wMvX1hxLlN1cZTezylgCCppn0X8g.PNG/%EA%B6%8C%EC%A0%95%EC%97%B4_10cm_playlist.png?type=w1200'
        }
    }
}

</script>

<style scoped>
    .imgsize { width: 350px;}
</style>