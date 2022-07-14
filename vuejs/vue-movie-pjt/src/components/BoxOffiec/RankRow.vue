<template>
    <tr>
        <td>{{ item.rank }}</td>
        <td>{{ item.movieNm }}</td>
        <td>{{ item.openDt }}</td>
        <td>{{ getAudiAcc }} 명</td>
        <td>{{ getSalesAcc }} 원</td>
    </tr>
</template>

<script>
export default {
    props: {
        item:Object
    },
    computed: {
        getAudiAcc() {
            return this.numberComma(this.item.audiAcc);
        },
        getSalesAcc() {
            return this.numberComma(this.item.salesAcc);
        }
    },
    methods: {
        numberComma(num) {
            return String(num).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }, 
}
</script>

<style>

</style>