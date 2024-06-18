<x-app-layout>
    <div class="min-h-screen flex flex-col justify-center">
      <div class="flex justify-center">
        <form action="" class="w-1/4 py-2 px-3 rounded-md bg-[#2f3541] shadow-slate-400 shadow-sm">
          <div class="mt-3 text-gray-200 font-semibold mb-1">Title</div>
          <input type="text" name="title" class="w-full rounded-sm bg-gray-200">

          <div class="mt-3 text-gray-200 font-semibold mb-1">Description</div>
          <input type="text" name="description" class="w-full rounded-sm bg-gray-200 h-20">

          <div class="mt-3 text-gray-200 font-semibold mb-1">File <span>(optional)</span></div>
          <input type="file" name="attachment" class="w-full rounded-sm bg-gray-200">
          <div class="mt-4 flex justify-end">
            <x-primary-button>
              submit
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
</x-app-layout>