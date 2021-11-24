<div x-data="{ open: false }" class="mb-10">
  <button @click="open = ! open" class="p-3 rounded border bg-gray-600 text-white hover:bg-gray-700 flex items-center gap-x-3 inline-block mb-3"> 
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
    </svg>
    Show import data form
    
  </button>
  
    <form x-cloak x-show="open" wire:submit.prevent="submit" method="post" enctype="multipart/form-data" class="bg-white p-5 rounded-sm my-3 block">
        @csrf

        @if ($success)
        <div class="text-green-600 p-2 rounded-sm bg-green-100 border border-green-200 mb-3">
            Data imported successfully! 
            <button class="underline font-bold" wire:click.prevent="$set('success', false)"> X </button>
        </div>
        @endif

        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
              <div>
                <h3 class="text-2xl font-bold leading-6 font-medium text-gray-900">
                  Import Data
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Upload CSV file to import your data. Table below will be updated once the file successfully finish uploading.
                </p>
              </div>
      
              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5 py-2 sm:gap-4 ">
                <div class="sm:grid sm:grid-cols-6 py-2 border-b border-gray-200 flex items-center">
                  <label for="file" class="block text-sm font-medium text-gray-700">
               

                    Select <span class="bg-indigo-100 p-0.5 font-bold">CSV</span> file
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input
                        id="file"
                        type="file"
                        wire:model="file"
                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                    />
                  </div>

                </div>
                @error('file') <span class="text-red-500 bg-red-50 p-2 rounded-sm block border border-red-200">{{ $message }}
                    <button class="underline font-bold" wire:click.prevent="resetErrors"> X </button>
                
                </span>  @enderror
                
              </div>
            </div>
        </div>


        <p class="mt-4 flex items-center gap-3">
            <button type="submit" wire:loading.attr="disabled" wire:loading.class="bg-gray-300" class="p-3 rounded border bg-blue-600 text-white hover:bg-blue-700 flex items-center gap-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  Import data
                
                  <svg wire:loading wire:target="submit" class="animate-spin ml-2 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                </button>

                <span wire:loading wire:target="submit" class="text-indigo-400 text-sm mx-2">Please wait, uploading file ..</span>
        </p>
    </form>
</div>
