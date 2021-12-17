<div class="bg-white p-4" id="chart1">

    @push('js')
        <script>
            document.addEventListener('livewire:load', function() {
                // Get raw table rows
                const wellTableRows = @js($info);

                // Get object grouped by well name, in which key is well name, and value is array of [Date, US_DesanderPressurePressure] pairs
                const seriesData = wellTableRows.reduce((acc, item) => {
                    if (acc[item.well_name]) {
                        return {
                            ...acc,
                            [item.well_name]: [...acc[item.well_name],
                                [
                                    new Date(item.Date),
                                    parseFloat((item.US_DesanderPressurePressure || "0").replace(/,/g, ''))
                                ]
                            ]
                        };
                    } else {
                        return {
                            ...acc,
                            [item.well_name]: [
                                [
                                    new Date(item.Date),
                                    parseFloat((item.US_DesanderPressurePressure || "0").replace(/,/g, ''))
                                ]
                            ]
                        };
                    }
                }, {});

                // Get series input data by structuring above variable
                const series = Object.keys(seriesData).map(wellName => ({
                    name: wellName,
                    data: seriesData[wellName]
                }));

                var options = {
                    series: series,
                    chart: {
                        type: 'area',
                        stacked: false,
                        height: 350,
                        zoom: {
                            enabled: false
                        },
                        animations: {
                            enabled: true
                        },
                        markers: {
                            size: 0,
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    markers: {
                        size: 0,
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
                        type: 'datetime',
                        labels: {
                            rotate: -20,
                            rotateAlways: true
                        }
                    },
                    title: {
                        text: 'Well data',
                        align: 'left',
                        offsetX: 14
                    },
                    tooltip: {
                        shared: true
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        //colors: ['transparent']
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        offsetX: -10
                    }
                };
                var chart = new ApexCharts(document.querySelector("#chart1"), options);
                chart.render();


            })
        </script>
    @endpush
</div>
