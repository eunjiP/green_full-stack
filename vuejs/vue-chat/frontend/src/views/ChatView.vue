<template>
  <div> 
        <h1>Chat</h1>
        <div v-for="(item, idx) in chatList" :key="idx">
          {{ item.name }} : {{ item.msg }}
        </div>
        <div>
            <input type="text" v-model="input"><button @click="sendMsg">전송</button>
        </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            input: '',
            chatList: []
        }
    },
    created() {       
        this.socketId = this.$socket.id
        this.$socket.on('msg', data => {
            this.chatList.push(data);
        });
    },
    methods: {        
        sendMsg() {
            this.$socket.emit("msg", {
                msg: this.input,
                name: this.socketId
            });
        }
    }
}
</script>

<style>

</style>