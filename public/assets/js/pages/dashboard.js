var options = {
    series: [

    ],
    labels: ['Nữ', 'Nam'],
    chart: {
        type: 'donut',
    },
    responsive: [{
        breakpoint: 0,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};

var chart = new ApexCharts(document.querySelector("#donut"), options);
chart.render();