<div>
    <h1 class="my-5 text-2xl font-bold leading-6">All Records <b class="text-gray-600">({{$records->total()}} records)</b></h1>

    @if($records->count())
 
<div class="flex flex-col">
    <div class="mb-3">
        {{$records->links()}}
    </div>
    <div class="overflow-x-auto">
      <div class="py-2 align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
              <tr>
                @foreach ($columns as $cl)
                    <th scope="col" class="px-6 border-r border-gray-300 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{$cl}}
                    </th>
                @endforeach
              </tr>
            </thead>
            <tbody>
               
                @foreach ($records as $key => $item)
                <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                    @foreach ($columns as $col)
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">
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
  
 
    <div class="mt-3">
        {{$records->links()}}
    </div>
    @else
    <div>No records yet.</div>
    @endif
</div>
