// Setup basic express server
var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('../..')(server);
var port = process.env.PORT || 3000;

var url = require("url");
server.listen(port, function () {
  console.log('Server listening at port %d', port);
});
/*
app.all("*", function(request, response, next) {
    response.writeHead(200, { "Access-Control-Allow-Origin": "*" });
    next();
});
*/

// Routing
app.use(express.static(__dirname + '/public'));



// Chatroom

// usernames which are currently connected to the chat
var usernames = {};
var numUsers = 0;

io.on('connection', function (socket) {
  var addedUser = false;

  // when the client emits 'new message', this listens and executes
  socket.on('new message', function (data) {
    // we tell the client to execute 'new message'
    socket.broadcast.to(socket.room).emit('new message', {
      username: socket.username,
      message: data
    });
  });

  // when the client emits 'add user', this listens and executes
  socket.on('add user', function (dataOut) {
    // we store the username in the socket session for this client
	var data;
	if(typeof(dataOut) == "string"){
		var code = "var data=" + dataOut;	
  		console.log("code is "+code);
		eval(code);
	}else{
		data = dataOut;
	}
  console.log("data is "+data);
  console.log("data room is :" +data.room);
  console.log("data[room] " +data["room"]);
    socket.username = data["username"];
    // add the client's username to the global list
    usernames[data["username"]] = data["username"];
    socket.room = data["room"];
    socket.join(data["room"]);
    ++numUsers;
    addedUser = true;
    socket.emit('login', {
      numUsers: numUsers
    });
    // echo globally (all clients) that a person has connected
    socket.broadcast.to(socket.room).emit('user joined', {
      username: data["username"],
      numUsers: numUsers
    });
  });

  // when the client emits 'typing', we broadcast it to others
  socket.on('typing', function () {
    socket.broadcast.to(socket.room).emit('typing', {
      username: socket.username
    });
  });

  // when the client emits 'stop typing', we broadcast it to others
  socket.on('stop typing', function () {
    socket.broadcast.to(socket.room).emit('stop typing', {
      username: socket.username
    });
  });

  // when the user disconnects.. perform this
  socket.on('disconnect', function () {
    // remove the username from global usernames list
    if (addedUser) {
      delete usernames[socket.username];
      --numUsers;

      // echo globally that this client has left
      socket.broadcast.to(socket.room).emit('user left', {
        username: socket.username,
        numUsers: numUsers
      });
    }
  });
});
