<template>
  <div>
    <p>Count : {{ count }}</p>
    <button type="button" @click="increment">증가</button>
  </div>
</template>

<script>
export default {
    computed: {
        count() {
            return this.$store.state.count;
        }
    },
    methods: {
        increment() {
            this.$store.commit('increment')
        }
    }
}
</script>

<style>

</style>