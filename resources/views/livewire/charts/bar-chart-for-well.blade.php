<div class="bg-white p-4" id="chart-line-{{ $wellFieldName }}">

    @push('js')
        <script>
            document.addEventListener('livewire:load', function() {
                // Get raw table rows
                const wellTableRows = @js($info);
                const wellFieldName = @js($wellFieldName);
                const chartTitle = @js($chartTitle);

                // Get object of arrays grouped by well name, in which values are well field name
                const seriesData = wellTableRows.reduce((acc, item) => {
                    if (acc[item.well_name]) {
                        return {
                            ...acc,
                            [item.well_name]: [...acc[item.well_name], parseFloat((item[wellFieldName] || "0").replace(/,/g, ''))]
                        };
                    } else {
                        return {
                            ...acc,
                            [item.well_name]: [parseFloat((item[wellFieldName] || "0").replace(/,/g, ''))]
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
                    xaxis: {
                        categories: wellNamesArr,
                    },
                    yaxis: {
                        title: {
                            text: wellFieldName,                            
                        }
                    },
                    title: {
                        text: chartTitle,
                        align: 'left',
                        offsetX: 14
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val;
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart-line-"+wellFieldName), options);
                chart.render();

            })
        </script>
    @endpush
</div>
