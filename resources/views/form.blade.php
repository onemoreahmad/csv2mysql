<x-app-layout>
    <h2 class="font-semibold text-2xl py-5 text-gray-800 leading-tight">
        Import data
    </h2>

    @if (\Session::has('success'))
    <div class="alert alert-success" style="color: green">
        {!! \Session::get('success') !!}
    </div>
    <br />
    @endif

    <div></div>

    @if ($errors->any())
    <div class="alert alert-danger" style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/data" method="post" enctype="multipart/form-data">
        @csrf

        <input
            id="file"
            type="file"
            name="file"
            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
        />

        <p>
            <button type="submit">Import data</button>
        </p>
    </form>

    <hr />

    <h1>All Records</h1>

    @if($records->count())
    <table class="table w-full">
        <thead style="font-weight: bold" class="border p-3">
            <td>DT</td>
            <td width="100px">Remarks</td>
            <td>ChokeSize1</td>
            <td>US_DesanderPressurePressure</td>
        </thead>
        <tbody class="border p-3">
            @foreach ($records as $item)
            <tr>
                <td>
                    {{$item->DT}}
                </td>
                <td>
                    {{$item->Remarks}}
                </td>
                <td>
                    {{$item->ChokeSize1}}
                </td>
                <td>
                    {{$item->US_DesanderPressurePressure}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr />
    <div>
        {{$records->links('vendor.pagination.default')}}
    </div>
    @else
    <div>No records yet.</div>
    @endif
</x-app-layout>
