var server = require('http').createServer();
var io = require('socket.io')(server);
var redis = require("redis");
var clientRedis = redis.createClient("redis://redis:6379");

server.listen(8888);
console.log("start");
clientRedis.on('connect', function() {
  console.log('connected');
});


clientRedis.on('message', function(chan, msg) {
  console.log(msg);
  io.emit('updade',msg);
});


clientRedis.subscribe('lifts');






