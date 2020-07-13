function createChart(x, y, w) {
    var chart = Highcharts.chart('container', {
        chart: {
            animation: false
        },

        title: {
            text: 'Try to move the blue line'
        },

        xAxis: {
            categories: x
        },

        yAxis: {
        },

        plotOptions: {
        },

        tooltip: {
            enabled: false
        },

        series: [{
            data: y,
            dragDrop: {
                draggableY: true,
                liveRedraw: true,
                groupBy: 'groupId'
            },
            point: {
                events: {
                    dragStart: function (e) {

                    },
                    drag: function (e) {

                    },
                    drop: function (e) {
                        var dd = [];
                        var sum = 0;
                        for (var i = 0; i < 8; i++) {
                            if (y[i]['y']){
                                sum+= y[i]['y'] * w[i];
                            } else {
                                sum += y[i] * w[i];
                            }
                        }
                        for (var i = 0; i < 8; i++) {
                            dd.push(sum);
                        }
                        chart.update({
                            series: [
                                {
                                    data: y
                                },
                                {
                                    data: dd
                                }
                            ]
                        }, true);
                    }
                }
            }
        }, {
            data: (function() {
                var data = [];
                var sum = 0;
                for (var i = 0; i < 8; i++) {
                    sum += y[i] * w[i];
                }
                for (var i = 0; i < 8; i++) {
                    data[i] = sum;
                }
                return data;
            }()),
            marker: {
                enabled: false
            }
        }],
    });
}