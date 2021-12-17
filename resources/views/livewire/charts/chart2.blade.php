<div class="bg-white p-4" id="chart2">

    @push('js')
        <script>
            document.addEventListener('livewire:load', function() {
                const data = @js($info);

                // Get object of arrays grouped by well name, in which values are US_DesanderPressurePressure
                const seriesData = data.reduce((acc, item) => {
                    if (acc[item.well_name]) {
                        return {
                            ...acc,
                            [item.well_name]: [...acc[item.well_name], parseFloat((item
                                .US_DesanderPressurePressure || "0").replace(/,/g, ''))]
                        };
                    } else {
                        return {
                            ...acc,
                            [item.well_name]: [parseFloat((item
                                .US_DesanderPressurePressure || "0").replace(/,/g, ''))]
                        };
                    }
                }, {});

                // Get series input data by structuring above variable
                const minValuesArr = Object.keys(seriesData).map(key => Math.min(...seriesData[key]));
                const maxValuesArr = Object.keys(seriesData).map(key => Math.max(...seriesData[key]));
                const wellNamesArr = Object.keys(seriesData).map(key => key);

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
                        height: 350,
                        animations: {
                            enabled: false
                        }
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
