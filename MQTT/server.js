// console.log(process.pid);

var mosca = require('mosca');



var moscaSettings = {
    http: {
        port: 3000,
        bundle: true,
        static: './'
    },
    port: 1883
};

var server = new mosca.Server(moscaSettings);
server.on('ready', setup);

server.on('clientConnected', function(client) {
    console.log('client connected', client.id);
});

server.on('published', function(packet, client) {
    console.log('Published', packet.payload);
});

function setup() {
    console.log('Mosca server is up and running')
}
console.log(process.pid)