/**
 * Created by Kushan on 2018-01-08.
 */

console.log(process.pid);
// require('daemon')();

var mqtt    = require('mqtt');
var mysql = require('mysql');

var client  = mqtt.connect('mqtt://174.138.20.122:1883');

client.on('connect', function () {
    client.subscribe('wusnSensor');
    // client.publish('wusnSensor','2,54,32,56,32,443');
    var con = mysql.createConnection({
        host: "127.0.0.1",
        user: "root",
        password: null,
        database : 'wusn_web'
    });
    // con.connect(function(err) {
    //
    //     var sql = "INSERT INTO `u_g_node` (`under_ground_node_id`, `under_ground_node_name`, `delete_status`, `vwc`, `temperature`, `central_node_id`, `above_ground_node_id`, `user_id`, `rssi`, `lqi`, `tra`, `trrs`, `trr`, `cra`, `crs`, `crr`, `smr`, `caf`, `af`, `otf`, `rdf`, `tef`, `tte`, `tto`) VALUES( 'abc', 'Underground Node  7', 0, 10, 26, 1, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
    //     con.query(sql, function (err, result) {
    //         if (err) throw err;
    //         console.log("1 record inserted");
    //     });
    // });



    client.on('message', function (topic, message) {

        // console.log('collector data: ', message.toString());
        if (topic == 'wusnSensor') {

            // console.log('string: ',str1+str2);
            s = message.toString();
            var array = s.split(')');
            // console.log('sensor data: ', array);
            // console.log('sensor data: ', message.toString());

            // var sql = "INSERT INTO `sensor_data` (`under_ground_node_id`, `under_ground_node_name`, `vwc`, `temperature`, `central_node_id`, `above_ground_node_id`, `user_id`, `rssi`, `lqi`, `tra`, `trrs`, `trr`, `cra`, `crs`, `crr`, `smr`, `caf`, `af`, `otf`, `rdf`, `tef`, `tte`, `tto`)" +
            //     " VALUES( 'UGN0000" + array[0] + "', 'Underground Node " + array[0] + "', '" + array[1] + "', '" + array[2] + "', 1, 1,4,'" + array[3] + "','" + array[4] + "','" + array[5] + "','" + array[6] + "','" + array[7] + "','" + array[8] + "','" + array[9] + "','" + array[10] + "','" + array[11] + "','" + array[12] + "','" + array[13] + "','" + array[14] + "','" + array[15] + "', '" + array[16] + "','" + array[17] + "','" + array[18] + "')";
            var sql = "INSERT INTO `sensor_data` ( `user_id`, `under_ground_node_id`, `vwc`, `rssi`, `lqi`, `tra`, `trrs`, `trr`, `cra`, `crs`, `crr`, `smr`, `caf`, `af`, `otf`, `rdf`, `tef`, `tte`, `tto`, `temperature`)"+
            "VALUES (4, " + array[0] + ", '" + array[1] + "', '" + array[3] + "','" + array[4] + "','" + array[5] + "','" + array[6] + "','" + array[7] + "','" + array[8] + "','" + array[9] + "','" + array[10] + "','" + array[11] + "','" + array[12] + "','" + array[13] + "','" + array[14] + "','" + array[15] + "', '" + array[16] + "','" + array[17] + "','" + array[18] + "', '" + array[2] + "')";


            con.query(sql, function (err, result) {
                if (err) throw err;
                console.log("1 record inserted");
            });
        }
    });
});