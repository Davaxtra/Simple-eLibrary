<div class="w-full bg-blue-500 text-gray-200">
  <div x-data="{ open: false }" class="mx-auto flex max-w-screen-xl flex-col px-4 md:flex-row md:items-center md:justify-between md:px-6 lg:px-8">
    <div class="flex flex-row items-center justify-between p-4">
      <a href="{{ route('welcome') }}" class="focus:shadow-outline rounded-lg text-lg font-semibold uppercase tracking-widest text-white   focus:outline-none">E-Library</a>
      <button class="focus:shadow-outline rounded-lg focus:outline-none md:hidden" @click="open = !open">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
          <path fill="#ffffff" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
        </svg>
      </button>
    </div>

    <nav :class="{'flex': open, 'hidden': !open}" class="hidden flex flex-col bg-blue-500 items-left pb-4 md:flex md:flex-row md:justify-end md:pb-0">
      @guest
      <a href="{{ route('login') }}" class="focus:shadow-outline mt-4 rounded-lg px-4 py-2 text-sm font-semibold hover:bg-white hover:text-blue-500 focus:outline-none md:mt-0">Login</a>
      @endguest
      @auth
      <a class="focus:shadow-outline mt-4 rounded-lg px-4 py-2 text-sm font-semibold hover:bg-white hover:text-blue-500 focus:outline-none md:mt-0" href="{{ route('welcome') }}">Home</a>
      <a class="focus:shadow-outline mt-4 rounded-lg px-4 py-2 text-sm font-semibold hover:bg-white hover:text-blue-500 focus:outline-none md:mt-0 md:ml-4" href="{{ route('book') }}">Books</a>
      <a class="focus:shadow-outline mt-4 rounded-lg px-4 py-2 text-sm font-semibold hover:bg-white hover:text-blue-500 focus:outline-none md:mt-0 md:ml-4" href="#">About</a>
      <div @click.away="open = false" class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="focus:shadow-outline mt-4 rounded-lg px-4 py-2 text-sm font-semibold hover:bg-white hover:text-blue-500 focus:outline-none md:mt-0 md:ml-4 md:inline md:w-auto">
          <span>{{ Auth::user()->username }}</span>
          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="ml-1 mt-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-full origin-top-right rounded-md shadow-lg md:w-48">
          <div class="rounded-md bg-blue-500 px-2 py-2 shadow">
            <a class="focus:shadow-outline block rounded-lg hover:bg-white px-4 py-2 text-sm font-semibold hover:text-blue-500 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="#">Profile</a>
            <a class="focus:shadow-outline block rounded-lg hover:bg-white px-4 py-2 text-sm font-semibold hover:text-blue-500 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="{{ route('auth.logout') }}">Logout</a>
          </div>
        </div>
      </div>
      @endauth
    </nav>
  </div>
</div>