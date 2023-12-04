<x-AppLayout>
  <div class="" id="content">
    <section>
      <div class="py-4">
        <div class="container px-2 mx-auto">
          <div class="flex flex-wrap xl:items-center -mx-4">
            <div class="w-full md:w-1/2 py-4 px-4 md:mb-0">
              <span class="inline-block py-px px-2 mb-4 text-xs leading-5 text-gray-900 bg-green-500 bg-opacity-50 uppercase rounded-md" data-config-id="auto-txt-13-1">Header</span>
              <h1 class="mb-6 text-3xl uppercase md:text-5xl lg:text-6xl leading-tight font-bold tracking-tight" data-config-id="auto-txt-14-1">Book library web archive</h1>
              <p class="mb-8 text-lg md:text-xl text-coolGray-500 font-medium" data-config-id="auto-txt-15-1">We&rsquo;re different. Flex is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.</p>
              <div class="flex flex-wrap">
                @if (Route::has('login'))
                <div class="w-full md:w-auto py-1 md:py-0 md:mr-4"><a class="inline-block py-2 px-5 w-full text-base md:text-lg leading-4 text-green-50 font-medium text-center bg-blue-500 hover:bg-blue-600 rounded-md shadow" href="{{ route('book.index') }}" data-config-id="auto-txt-16-1">Find a Book</a></div>
                @else
                <div class="w-full md:w-auto py-1 md:py-0"><a class="inline-block py-2 px-5 w-full text-base md:text-lg leading-4 text-green-50 font-medium text-center bg-blue-500 hover:bg-blue-600 rounded-md shadow" href="{{ route('login') }}" data-config-id="auto-txt-17-1">Login</a></div>
                @endif
              </div>
            </div>
            <div class="w-full md:w-1/2 px-4">
              <div class="relative mx-auto md:mr-0 max-w-max">
                <img class="absolute z-10 -left-14 -top-12 w-28 md:w-auto" src="" alt="" data-config-id="auto-img-5-1">
                <img class="absolute z-10 -right-7 -bottom-8 w-28 md:w-auto" src="flex-ui-assets/elements/dots3-blue.svg" alt="" data-config-id="auto-img-6-1">
                <img class="relative overflow" src="{{ URL('storage/e-library.png')}}" alt="SPOILER" data-config-id="auto-img-3-1">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</x-AppLayout>