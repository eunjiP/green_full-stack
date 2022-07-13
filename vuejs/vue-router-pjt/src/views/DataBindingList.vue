<template>
    <div>
        <h1>DataBinding</h1>
        <table>
            <thead>
                <tr>
                    <th>제품명</th>
                    <th>가격</th>
                    <th>카테고리</th>
                    <th>배송료</th>
                </tr>
            </thead>
            <tbody>
                <!-- 반복문에서는 key가 꼭있어야함!!(중요) -->
                <tr v-for="(item, idx) in productList" :key="idx">
                    <td>{{ item.product_name }}</td>
                    <!-- method를 사용한 천단위구분 -->
                    <td>{{ numberComma(item.price) }}</td>
                    <td>{{ item.category }}</td>
                    <td>{{ numberComma(item.delivery_price) }}</td>
                </tr>
            </tbody>
        </table>

        <hr>
        <!-- components를 활용한 천단위 구분
            components에 파일 생성 후 반복되는 부분만 파일안에 담는 후 반복한다 -->
        <table>
            <thead>
                <tr>
                    <th>제품명</th>
                    <th>가격</th>
                    <th>카테고리</th>
                    <th>배송료</th>
                </tr>
            </thead>
            <tbody>
                <!-- 반복문에서는 key가 꼭있어야함!!(중요) -->
                <ProductItem :product="item" v-for="(item, idx) in productList" :key="idx" />
            </tbody>
        </table>
    </div>
</template>

<script>
import ProductItem from '../components/ProductItem.vue';

export default {
    components: {ProductItem},

    //method를 사용한 방법
    methods: {
        numberComma(num) {
            return String(num).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    },  
    data() {
        return {
            productList: [
                {
                    product_name : '기계식 키보드',
                    price: 25000,
                    category: '노트북/태블릿',
                    delivery_price:5000
                },
                {
                    product_name : '무선 마우스',
                    price: 15000,
                    category: '노트북/태블릿',
                    delivery_price:3000
                },
                {
                    product_name : '아이패드',
                    price: 725000,
                    category: '노트북/태블릿',
                    delivery_price:5000
                },
                {
                    product_name : '태블릿 거치대',
                    price: 32000,
                    category: '노트북/태블릿',
                    delivery_price:4000
                },
            ]
        }
    }
}
</script>

<style>
table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%;}
td, th { border: 1px solid #ddd; text-align: left; padding: 8px;}
</style>