<div>
    <h1 class="my-5 text-2xl font-bold leading-6">All Records <b class="text-gray-600">({{$records->total()}} records)</b></h1>

    @if($records->count())


<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                @foreach ($columns as $cl)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{$cl}}
                    </th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              
                {{-- @foreach ($records as $key => $item)
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        {{$item->DT}}
                    </td>
                </tr>
                @endforeach --}}
              
                @foreach ($records as $key => $item)
                <tr>
                    @foreach ($columns as $col)
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        {{$item->$col}}
                    </td>
                    @endforeach
                  
                </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  





    <table class="table w-full hidden">
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
    <div class="mt-3">
        {{$records->links()}}
    </div>
    @else
    <div>No records yet.</div>
    @endif
</div>
