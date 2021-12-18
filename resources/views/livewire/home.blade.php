<div>
    <livewire:charts.filter-charts />

    <div class="grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 gap-6 items-baseline">
        <div class="grid grid-cols-1 gap-6">
            @foreach ($areaCharts as $areaChart)
                <livewire:charts.area-chart-for-well :chartTitle="$areaChart['title']"
                    :wellFieldName="$areaChart['field']" />
            @endforeach
        </div>
        <div class="grid grid-cols-1 gap-6">
            @foreach ($barCharts as $barChart)
                <livewire:charts.bar-chart-for-well :chartTitle="$barChart['title']"
                    :wellFieldName="$barChart['field']" />
            @endforeach
        </div>
    </div>
</div>
