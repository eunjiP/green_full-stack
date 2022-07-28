const express = require('express');
const app = express();
const http = require('http').createServer(app);
const port = process.env.PORT || 3000;
const path = require("path");

//setting cors 
app.all('/*', function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "X-Requested-With");
    next();
});

app.use(express.static('public'));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, './public', 'index.html'));
});



const server = http.listen(port, () => {
    console.log(`server is listening at localhost:${port}`);
});

const socketIO = require('socket.io');

const io = socketIO(server, { path: '/socket.io'});
io.on('connection', (socket) => {
    console.log('a user connected');
    socket.on('msg', (msg) => {
      io.emit('msg', msg);
    });
    socket.on('disconnect', reason => {
        console.log(reason);
        console.log('user disconnected');
    });
  });