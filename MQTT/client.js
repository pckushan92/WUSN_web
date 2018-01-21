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
            console.log("Data:",s);


            var d = new Date().toLocaleString();

            var array = s.split(')');
            var vwcNo=100-(array[1]/3110)*100;
            console.log("VWC:",vwcNo);

            array.pop();
            function isInt(value) {
                if (isNaN(value)) {
                    return false;
                }
                var x = parseFloat(value);
                return (x | 0) === x;
            }
            var verifiedCount=0;
            var verificationConfirmed=false;
            for (var i in array) {
                verifiedCount=verifiedCount+1;
                if (!isInt(array[i])){
                    verifiedCount=-10;
                    console.log("Not Verified:");
                    // console.log(array[i],"NOT OK");
                    break;
                    // console.log("V Data :",array[i]);
                }
            }
            if(verifiedCount==19 && array[1]!=0 && array[2]!=0 && array[3]!=0 && array[4]!=0){
                verificationConfirmed=true;
            }

            if(verificationConfirmed){
                console.log("Verified:");


                // console.log("Not Verified Data Array:",array);


                var sql = "INSERT INTO `sensor_data` ( `user_id`, `under_ground_node_id`, `vwc`, `rssi`, `lqi`, `tra`, `trrs`, `trr`, `cra`, `crs`, `crr`, `smr`, `caf`, `af`, `otf`, `rdf`, `tef`, `tte`, `tto`, `temperature`,`datetime`)" +
                    "VALUES (4, " + array[0] + ", '" + vwcNo + "', '" + array[3] + "','" + array[4] + "','" + array[5] + "','" + array[6] + "','" + array[7] + "','" + array[8] + "','" + array[9] + "','" + array[10] + "','" + array[11] + "','" + array[12] + "','" + array[13] + "','" + array[14] + "','" + array[15] + "', '" + array[16] + "','" + array[17] + "','" + array[18] + "', '" + array[2] + "','" + d + "')";


                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                });
            }
        }
    });
});