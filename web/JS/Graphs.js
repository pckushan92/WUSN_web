
var tempSeries=[];
var vwcSeries=[];
var rssiSeries=[];
var lqiSeries=[];

function dashboardCharts(path){
    //sent dates to server

    $.getJSON(path, function (result) {
        var sensorId=[];
        var temp = [];
        var vwc = [];
        var rssi = [];
        var lqi = [];

        for(key in result ){
            temp.push( result[key].temperatureData);
            vwc.push( result[key].vwcData);
            rssi.push( result[key].rssiData);
            lqi.push( result[key].lqiData);
            sensorId.push('Sensor '+result[key].sensorId);
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

        showTempLineChart(tempSeries);
        showVWCLineChart(vwcSeries);
        showRSSILineChart(rssiSeries);
        showLQILineChart(lqiSeries);
    });

    function showTempLineChart(tempSeries) {
        var tempChart = Highcharts.chart('container-line-chart-temp', {

            title: {
                text: 'Temperature Data'
            },

            subtitle: {
                text: '@Sensor temperature data '
            },

            yAxis: {
                title: {
                    text: 'Temperature Values (Celcius)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 10
                }
            },

            series:  tempSeries,

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

    }

    function showVWCLineChart(vwcSeries) {
        var vwcChart = Highcharts.chart('container-line-chart-vwc', {

            title: {
                text: 'VWC Data'
            },

            subtitle: {
                text: '@Sensor Volumetric Water Content'
            },

            yAxis: {
                title: {
                    text: 'VWC Values (%)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 10
                }
            },

            series: vwcSeries,

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    }

    function showRSSILineChart(rssiSeries) {
        var rssiChart = Highcharts.chart('container-line-chart-rssi', {

            title: {
                text: 'RSSI Data'
            },

            subtitle: {
                text: '@Sensor Received Signal Strength Indicator'
            },

            yAxis: {
                title: {
                    text: 'RSSI Values (decibel)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 10
                }
            },

            series: rssiSeries,

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    }

    function showLQILineChart(lqiSeries) {
        var lqiChart = Highcharts.chart('container-line-chart-lqi', {

            title: {
                text: 'LQI Data'
            },

            subtitle: {
                text: '@Sensor Link Quality Indicator'
            },

            yAxis: {
                title: {
                    text: 'LQI Values (decibel)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 10
                }
            },

            series: lqiSeries,

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    }



// Create the chart
//     function showliveChart() {
//         Highcharts.setOptions({
//             global: {
//                 useUTC: false
//             }
//         });
//
//         var liveChart =Highcharts.stockChart('container', {
//             chart: {
//                 events: {
//                     load: function () {
//
//                         // set up the updating of the chart each second
//                         var series = this.series[0];
//                         setInterval(function () {
//                             var x = (new Date()).getTime(), // current time
//                                 // y = Math.round(Math.random() * 100);
//                                 y =
//                             series.addPoint([x, y], true, true);
//                         }, 1000);
//                     }
//                 }
//             },
//
//             rangeSelector: {
//                 buttons: [{
//                     count: 1,
//                     type: 'minute',
//                     text: '1M'
//                 }, {
//                     count: 5,
//                     type: 'minute',
//                     text: '5M'
//                 }, {
//                     type: 'all',
//                     text: 'All'
//                 }],
//                 inputEnabled: false,
//                 selected: 0
//             },
//
//             title: {
//                 text: 'Live random data'
//             },
//
//             exporting: {
//                 enabled: false
//             },
//
//             series: [{
//                 name: 'Random data',
//                 data: (function () {
//                     // generate an array of random data
//                     var data = [],
//                         time = (new Date()).getTime(),
//                         i;
//
//                     for (i = -999; i <= 0; i += 1) {
//                         data.push([
//                             time + i * 1000,
//                             Math.round(Math.random() * 100)
//                         ]);
//                     }
//                     return data;
//                 }())
//             }]
//         });
//     }

    // var seriesOptions = [],
    //     seriesCounter = 0,
    //     names = ['Sensor 1', 'Sensor 2', 'Sensor 3'];
    //
    // /**
    //  * Create the chart when all data is loaded
    //  * @returns {undefined}
    //  */
    // function createChart(path) {
    //
    //     Highcharts.stockChart('container', {
    //
    //         rangeSelector: {
    //             selected: 4
    //         },
    //
    //         yAxis: {
    //             labels: {
    //                 formatter: function () {
    //                     return (this.value > 0 ? ' + ' : '') + this.value + '%';
    //                 }
    //             },
    //             plotLines: [{
    //                 value: 0,
    //                 width: 2,
    //                 color: 'silver'
    //             }]
    //         },
    //
    //         plotOptions: {
    //             series: {
    //                 compare: 'percent',
    //                 showInNavigator: true
    //             }
    //         },
    //
    //         tooltip: {
    //             pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
    //             valueDecimals: 2,
    //             split: true
    //         },
    //
    //         series: seriesOptions
    //     });
    // }
    //
    // $.each(names, function (i) {
    //
    //     $.getJSON(path,function (data) {
    //         seriesOptions[i] = {
    //             name: 'Sensor '+data[i].sensorId,
    //             data: data[i].temperatureData
    //         };
    //
    //         // As we're loading the data asynchronously, we don't know what order it will arrive. So
    //         // we keep a counter and create the chart when all the data is loaded.
    //         seriesCounter += 1;
    //
    //         if (seriesCounter === names.length) {
    //             createChart(path);
    //             // console.log("inside the print");
    //         }
    //     });
    // });
}