<div>
    <div class="bg-white p-4" id="chart3"></div>

    @push('js')
    <script>
        document.addEventListener('livewire:load', function () {
            var options = {
                series: [{
                    name: 'Test chart',
                    data: @js($info->values()) 
                }],    
                chart: {
                    type: 'area',
                    stacked: false,
                    height: 350,
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                markers: {
                    size: 0,
                },
                fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [20, 100, 100, 100]
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#8e8da4',
                        },
                        offsetX: 0,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    }
                },
                xaxis: {
                    categories: @js($info->keys()),
                    tickAmount: 4,
                    tickPlacement: 'on',
                    tickPlacement: 'between',

                    labels: {
                        rotate: -30,
                        rotateAlways: true,
                        formatter: function(val, timestamp) {
                            return val
                        }
                    }
                },
                title: {
                    text: 'Test chart',
                    align: 'left',
                    offsetX: 14
                },
                tooltip: {
                    shared: true
                },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        offsetX: -10
                    }
                };
                var chart = new ApexCharts(document.querySelector("#chart3"), options);
                chart.render();
        })
    </script>
    @endpush
</div>