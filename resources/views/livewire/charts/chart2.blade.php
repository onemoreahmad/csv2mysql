<div class="bg-white p-4" id="chart2">

    @push('js')
        <script>
            document.addEventListener('livewire:load', function() {
                // Get chart data grouped by well name with values of min and max of US_DesanderPressurePressure field values
                const data = @js($info);

                // Get series input data by structuring above variable
                const minValuesArr = data.map(item => item.minVal);
                const maxValuesArr = data.map(item => item.maxVal);
                const wellNamesArr = data.map(item => item.well_name);

                var options = {
                    series: [{
                        name: 'Min',
                        data: minValuesArr
                    }, {
                        name: 'Max',
                        data: maxValuesArr
                    }],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: wellNamesArr,
                    },
                    yaxis: {
                        title: {
                            text: 'US_DesanderPressurePressure'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "US_DesanderPressurePressure"
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart2"), options);
                chart.render();

            })
        </script>
    @endpush
</div>
