<nav class="w-full fixed bg-white flex px-3 md:px-10 z-40 lg:px-14 h-16 items-center justify-between shadow-md md:shadow-none"
    id="navbar">
    <div class="dropdown md:hidden">
        <div tabindex="0" role="button" class="lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content bg-white rounded-box z-[10] mt-3 w-52 p-2 shadow">
            <li><a>Pendaftaran</a></li>
            <li>
                <a>Informasi</a>
                <ul class="p-2">
                    <li><a>Submenu 1</a></li>
                    <li><a>Submenu 2</a></li>
                </ul>
            </li>
            <li><a>Aktifitas</a></li>
            <li><a>Bantuan</a></li>
        </ul>
    </div>
    <img src="{{ asset('assets/images/logo-dikdasmen 1.png') }}" class="h-10 w-10 hidden md:block" alt=""
        srcset="">
    <div class="flex space-x-16">
        <ul class="space-x-4 items-center hidden md:flex">
            {{-- <li><a href="{{ route('ppdb.index') }}"
                    class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('ppdb.index') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Pendaftaran</a>
            </li> --}}
            <li>
                <div class="dropdown">
                    <div tabindex="0" role="button"
                        class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('ppdb.informasi') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }} flex space-x-2 items-center">
                        <p>Informasi</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transform" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.707a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li><a>Item 1</a></li>
                        <li><a>Item 2</a></li>
                    </ul>
                </div>
            </li>
            <li><a href=""
                    class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('ppdb.aktifitas') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Aktifitas</a>
            </li>
            <li><a href=""
                    class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('ppdb.bantuan') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Bantuan</a>
            </li>
        </ul>
        <div class="dropdown">
            <div tabindex="0" role="button" class="flex space-x-2 items-center">
                <img src="https://i.pravatar.cc/50?img={{ rand(1, 50) }}" alt="Profile Photo"
                    class="rounded-full h-10 w-1h-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <ul tabindex="0" class="dropdown-content right-0 menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                <li class="border-b pb-1">
                    <span class="font-bold">Rosyamdani</span>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" style="display: inline">
                        @csrf
                        @method('POST')
                        <button type="submit"
                            style="background: none; border: none; color: inherit; cursor: pointer;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        {{-- <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-2">
                <img src="" alt="Profile Photo" class="rounded-full h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>

            </button>
            <ul x-show="open" @click.away="open = false"
                class="absolute right-0 mt-2 bg-white p-2 rounded-md shadow-md">
                <li><a href="">Profile</a></li>
                <li><a href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
        </div>
        <form id="logout-form" action="" method="POST" class="hidden">
            @csrf
        </form> --}}
    </div>
</nav>
