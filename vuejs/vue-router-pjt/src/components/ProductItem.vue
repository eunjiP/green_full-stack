<template>
    <tr>
        <td>{{ product.product_name }}</td>
        <td>{{ getPrice }}</td>
        <td>{{ product.category }}</td>
        <td>{{ getDeliveryPrice }}</td>
    </tr>
</template>

<script>
export default {
    props: {
        product: Object
    },
    computed: {
        getPrice() {
            return this.numberComma(this.product.price);
        },
        getDeliveryPrice() {
            return this.numberComma(this.product.delivery_price);
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