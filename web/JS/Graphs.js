
var tempSeries=[];
var vwcSeries=[];
var rssiSeries=[];
var lqiSeries=[];

function dashboardCharts(path){
    //sent dates to server

    $.getJSON(path, function (result) {
        var sensorId=[];
        var temp = [];
        // var datetimeTemp = [];
        var vwc = [];
        var rssi = [];
        var lqi = [];

        for(key in result ){
            // var lastUpdte=result[key].lastUpdate;
            // console.log(lastUpdte);
            // temp.push( result[key].temperatureData);
            var datetimeresult=result[key].datetimeTempData;
            // console.log(datetimeresult);
            var tempT = [];
            var tempV = [];
            var tempR = [];
            var tempL = [];
            for(key2 in datetimeresult){
                // console.log("Key:",key2);
                tempT.push([Date.UTC((datetimeresult[key2])[0],(datetimeresult[key2])[1],(datetimeresult[key2])[2],(datetimeresult[key2])[3],(datetimeresult[key2])[4],(datetimeresult[key2])[5]),(datetimeresult[key2])[6]]);
                tempV.push([Date.UTC((datetimeresult[key2])[0],(datetimeresult[key2])[1],(datetimeresult[key2])[2],(datetimeresult[key2])[3],(datetimeresult[key2])[4],(datetimeresult[key2])[5]),(datetimeresult[key2])[7]]);
                tempR.push([Date.UTC((datetimeresult[key2])[0],(datetimeresult[key2])[1],(datetimeresult[key2])[2],(datetimeresult[key2])[3],(datetimeresult[key2])[4],(datetimeresult[key2])[5]),(datetimeresult[key2])[8]]);
                tempL.push([Date.UTC((datetimeresult[key2])[0],(datetimeresult[key2])[1],(datetimeresult[key2])[2],(datetimeresult[key2])[3],(datetimeresult[key2])[4],(datetimeresult[key2])[5]),(datetimeresult[key2])[9]]);

            }
            temp.push(tempT);
            vwc.push(tempV);
            rssi.push(tempR);
            lqi.push(tempL);
            // console.log("Belw:",datetimeTemp);
            // // vwc.push( result[key].vwcData);
            // // rssi.push( result[key].rssiData);
            // // lqi.push( result[key].lqiData);
            sensorId.push('Sensor '+result[key].sensorId);

            // console.log("Date Time Temp",datetimeTemp);
        }

        $.each(sensorId, function (i) {

            tempSeries[i] = {
                name: sensorId[i],
                data: temp[i]
            };
            vwcSeries[i] = {
                name: sensorId[i],
                data: vwc[i]
            };
            rssiSeries[i] = {
                name: sensorId[i],
                data: rssi[i]
            };
            lqiSeries[i] = {
                name: sensorId[i],
                data: lqi[i]
            };

        });
        // createChart(path,sensorId);
        // console.log(tempSeries);
        showTempLineChart(tempSeries);
        showVWCLineChart(vwcSeries);
        showRSSILineChart(rssiSeries);
        showLQILineChart(lqiSeries);
    });

    // function updateTable(lastUpdte) {
    //     var myTable = document.getElementById('update_table');
    //     myTable.rows[0].cells[1].innerHTML = lastUpdte. ;
    //
    // }

    // function showTempLineChart(tempSeries) {
    //     var tempChart = Highcharts.stockChart('container-line-chart-temp', {
    //
    //         title: {
    //             text: 'Temperature Values'
    //         },
    //         subtitle: {
    //             text: 'Irregular time data in Highcharts JS'
    //         },
    //
    //         yAxis: {
    //             title: {
    //                         text: 'Temperature Values (Celcius)'
    //             },
    //
    //             labels: {
    //                 formatter: function () {
    //                     return ( this.value);
    //                 }
    //             },
    //             plotLines: [{
    //                 value: 0,
    //                 width: 2,
    //                 color: 'silver'
    //             }]
    //         },
    //
    //         xAxis: {
    //             title: {
    //                 enabled: true,
    //                 text: 'Date time'
    //             },
    //             type: 'datetime',
    //
    //             dateTimeLabelFormats : {
    //                 hour: '%I %p',
    //                 minute: '%I:%M %p'
    //             }
    //         },
    //
    //         plotOptions: {
    //             series: {
    //                 compare: 'percentage',
    //                 showInNavigator: true
    //             }
    //         },
    //         tooltip: {
    //             pointFormat: '<span style="color:{series.color}">{tempSeries.name}</span>: <b>({point.y}Celcius)</b><br/>',
    //             valueDecimals: 2,
    //             split: true
    //         },
    //
    //         series:  tempSeries
    //
    //     });
    //
    // }


    //.............................................................


    function showTempLineChart(tempSeries) {
        var tempChart = Highcharts.chart('container-line-chart-temp', {

            chart: {
                type: 'spline'
            },
            title: {
                text: 'Temperature Values'
            },
            subtitle: {
                text: '@Sensor Temperature'
            },
            yAxis: {
                title: {
                    text: 'Temperature Values (Celcius)'
                }

            },

            xAxis: {
                title: {
                    enabled: true,
                    text: 'Date time'
                },
                type: 'datetime',

                dateTimeLabelFormats : {
                    hour: '%I %p',
                    minute: '%I:%M %p'
                }
            },
            // legend: {
            //     layout: 'vertical',
            //     align: 'right',
            //     verticalAlign: 'middle'
            // },

            plotOptions: {
                series:{
                    marker: {
                        fillColor: '#FFFFFF',
                        lineWidth: 2,
                        lineColor: null // inherit from series
                    }
                }

            },

            tooltip: {
                pointFormat: '<span style="color:{series.color}">{tempSeries.name}</span>: <b>({point.y}Celcius)</b><br/>',
                valueDecimals: 2,
                split: true
            },

            series:  tempSeries

        });

    }

    function showVWCLineChart(vwcSeries) {
        var vwcChart = Highcharts.chart('container-line-chart-vwc', {

            chart: {
                type: 'spline'
            },
            title: {
                text: 'VWC Values'
            },
            subtitle: {
                text: '@Sensor Volumetric Water Content'
            },
            yAxis: {
                title: {
                    text: 'Volumetric Water Content (%)'
                }

            },
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Date time'
                },
                type: 'datetime',

                dateTimeLabelFormats : {
                    hour: '%I %p',
                    minute: '%I:%M %p'
                }
            },
            // legend: {
            //     layout: 'vertical',
            //     align: 'right',
            //     verticalAlign: 'middle'
            // },

            plotOptions: {
                series:{
                    marker: {
                        fillColor: '#FFFFFF',
                        lineWidth: 2,
                        lineColor: null // inherit from series
                    }
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{vwcSeries.name}</span>: <b>({point.y}%)</b><br/>',
                valueDecimals: 2,
                split: true
            },

            series:  vwcSeries

        });
    }

    function showRSSILineChart(rssiSeries) {
        var rssiChart = Highcharts.chart('container-line-chart-rssi', {

            chart: {
                type: 'spline'
            },
            title: {
                text: 'RSSI Values'
            },
            subtitle: {
                text: '@Sensor Received Signal Strength Indicator'
            },
            yAxis: {
                title: {
                    text: 'Received Signal Strength Indicator(dBm)'
                }

            },
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Date time'
                },
                type: 'datetime',

                dateTimeLabelFormats : {
                    hour: '%I %p',
                    minute: '%I:%M %p'
                }
            },
            // legend: {
            //     layout: 'vertical',
            //     align: 'right',
            //     verticalAlign: 'middle'
            // },

            plotOptions: {
                series:{
                    marker: {
                        fillColor: '#FFFFFF',
                        lineWidth: 2,
                        lineColor: null // inherit from series
                    }
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{rssiSeries.name}</span>: <b>({point.y}dBm)</b><br/>',
                valueDecimals: 2,
                split: true
            },

            series:  rssiSeries

        });
    }

    function showLQILineChart(lqiSeries) {
        var lqiChart = Highcharts.chart('container-line-chart-lqi', {

            chart: {
                type: 'spline'
            },
            title: {
                text: 'LQI Values'
            },
            subtitle: {
                text: '@Sensor Link Quality Indicator'
            },
            yAxis: {
                title: {
                    text: 'Link Quality Indicator'
                }

            },
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Date time'
                },
                type: 'datetime',

                dateTimeLabelFormats : {
                    hour: '%I %p',
                    minute: '%I:%M %p'
                }
            },
            // legend: {
            //     layout: 'vertical',
            //     align: 'right',
            //     verticalAlign: 'middle'
            // },

            plotOptions: {
                series:{
                    marker: {
                        fillColor: '#FFFFFF',
                        lineWidth: 2,
                        lineColor: null // inherit from series
                    }
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{lqiSeries.name}</span>: <b>({point.y})</b><br/>',
                valueDecimals: 2,
                split: true
            },

            series:  lqiSeries

        });
    }

}