<div>
    <div class="bg-white p-4" id="chart2"></div>
    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script>
   
        document.addEventListener('livewire:load', function () {
            // console.log(dataSet[0]);
            // console.log('--');
            // console.log(@js($info));


            var options = {
                series: [{
                    name: 'U/S Desander Pressure',
                    data: @js($info->values()) 
                }],
                chart: {
                    type: 'scatter',
                    stacked: false,
                    height: 350,
                    zoom: {
                        type: 'xy'
                    },
                },
                grid: {
          xaxis: {
            lines: {
              show: true
            }
          },
          yaxis: {
            lines: {
              show: true
            }
          },
        },
                dataLabels: {
                    enabled: false
                },
                // markers: {
                //     size: 0,
                // },
                // fill: {
                // type: 'gradient',
                // gradient: {
                //     shadeIntensity: 1,
                //     inverseColors: false,
                //     opacityFrom: 0.45,
                //     opacityTo: 0.05,
                //     stops: [20, 100, 100, 100]
                //     },
                // },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#8e8da4',
                        },
                        offsetX: 0,
                        // formatter: function(val) {
                        //     return val;
                        //     // return (val / 1000000).toFixed(2);
                        // },
                    },
                    // axisBorder: {
                    //     show: false,
                    // },
                    // axisTicks: {
                    //     show: false
                    // }
                },
                // xaxis: {
                //     categories: @js($info->keys()),
                //     tickAmount: 12,
                //     // tickAmount: @js(count($info)),
                // },
                xaxis: {
                    categories: @js($info->keys()),
                    // tickAmount: 4,
                    // tickPlacement: 'on',
                    // tickPlacement: 'between',

                    labels: {
                        rotate: -30,
                        rotateAlways: true,
                        formatter: function(val, timestamp) {
                            return moment(new Date(val)).format("D/M - hh:mm")
                            // return moment(new Date(timestamp)).format("DD MMM YYYY")
                        }
                    }
                },
                title: {
                    text: 'Scatter',
                    align: 'left',
                    offsetX: 14
                },
                tooltip: {
                // shared: true
                },
                // legend: {
                //     position: 'top',
                //     horizontalAlign: 'right',
                //     offsetX: -10
                // }
                };

                var chart = new ApexCharts(document.querySelector("#chart2"), options);
                chart.render();
         
        })
    </script>
    @endpush

</div>
