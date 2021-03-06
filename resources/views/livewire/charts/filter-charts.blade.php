<div class="mb-10">
    <div class="md:flex items-center gap-4 mt-3 bg-white p-2 rounded-sm text-sm">
        <span class="px-3 text-gray-400">
        Filter
        </span>

        <label for="all" class="flex items-center py-2 rounded text-center justify-center cursor-pointer p-2">
            <input wire:model.lazy="all" id="all" value="all" name="all" type="checkbox" class="focus:ring-primary-green h-4 w-4 text-primary-green border-gray-300">
            <label for="all" class="mx-2">
              <span class="block text-sm font-medium text-gray-500"> All </span>
            </label>
        </label>

        <div class="@if($all) opacity-50 cursor-not-allowed  @endif md:flex items-center">
        @forelse ($wells as $well)
            <label for="social" class="flex items-center py-2 rounded text-center justify-center p-2">
                <input @if($all) disabled="disabled" @endif wire:model.lazy="selectedWells" id="well-{{$well->id}}" value="{{$well->id}}" type="checkbox" class="focus:ring-primary-green h-4 w-4 text-primary-green border-gray-300">
                <label for="well-{{$well->id}}" class="mx-2">
                    <span class="block text-sm font-medium text-gray-500">  {{$well->well_name}} : {{$well->well_number}}</span>
                </label>
            </label>  
        @empty no wells yet. @endforelse
        </div>
    </div>
 
    {{json_encode($selectedWells)}}
</div>
