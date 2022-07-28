import io from "socket.io-client";

const socket = io.connect("http://192.168.0.6:3000", {
    path: '/socket.io',
    transports: ['websocket']
});

const socketPlugin = {
  install: (app, options) => {
    app.config.globalProperties.$socket = socket;
  },
};

export default socketPlugin;
