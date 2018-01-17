
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
        // console.log(result);
        for(key in result ){
            // console.log((result));
            temp.push( result[key].temperatureData);
            // datetimeTemp.push( result[key].datetimeTempData);
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

    // function showTempLineChart(tempSeries){
    //     var tempChart =Highcharts.chart('container', {
    //     chart: {
    //         type: 'spline'
    //     },
    //     title: {
    //         text: 'Temperature values at Kajukale'
    //     },
    //     subtitle: {
    //         text: 'Irregular time data in Highcharts JS'
    //     },
    //     xAxis: {
    //         type: 'datetime',
    //         dateTimeLabelFormats: { // don't display the dummy year
    //             month: '%e. %b',
    //             year: '%b'
    //         },
    //         title: {
    //             text: 'Date'
    //         }
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Temperature(Celcius)'
    //         },
    //         min: 0
    //     },
    //     tooltip: {
    //         headerFormat: '<b>{tempSeries.name}</b><br>',
    //         pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
    //     },
    //
    //     plotOptions: {
    //         spline: {
    //             marker: {
    //                 enabled: true
    //             }
    //         }
    //     },
    //
    //     series: tempSeries
    // });

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
}