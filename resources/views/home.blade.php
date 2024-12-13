<!DOCTYPE html>
<html lang="en">

@if (session('success'))
    <div class="text-green-500">
        {{ session('success') }}
    </div>
@endif


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Home</title>
</head>

<body class="" style="">
    <img src="{{ asset('assets/images/Photo.png') }}" alt="" class="absolute mt-[300px]">
    <img src="{{ asset('assets/images/Photo1.png') }}" alt="" class="absolute mt-[185px] right-0">
    <x-navbar />
    <section class="max-w-full">
        <div class="mx-auto py-2 sm:px-6">
            <div class="mx-auto max-w-full text-center py-[47px] lg:mx-0 lg:flex-auto">
                <h2 class="text-balance text-3xl font-semibold tracking-tight text-[#2E073F] sm:text-4xl">Membangun Masa
                    Depan Gemilang Bersama Kami.</h2>
                <p
                    class="mt-6 text-pretty text-lg/8 font-bold  text-[#590E7A] bg-white p-1 max-w-lg mx-auto rounded-2xl shadow-lg">
                    Menginspirasi
                    Generasi
                    untuk Masa
                    Depan Lebih Cerah
                </p>
                <a href="#" class="flex mt-10 mb-[80px] max-w-max rounded-full mx-auto">
                    <div class="py-4 mx-auto flex px-6 bg-[#7A1CAC] rounded-full gap-x-6 shadow-xl">
                        <p class="text-white font-bold mx-auto">Daftar Sekarang</p><span>
                            <img src="{{ asset('assets/images/arrow-square-right.svg') }}" alt=""
                                srcset="">
                        </span>
                    </div>
                </a>
            </div>
            <div class="flex max-w-max mx-auto">
                <img src="{{ asset('assets/images/book.png') }}" alt="" srcset="" class="absolute"><span>
                    <p class="static text-[#590E79] max-w-[450px] pl-8 text-xl">Kami berkomitmen untuk menciptakan
                        lingkungan
                        pendidikan
                        yang
                        penuh
                        inspirasi,
                        di
                        mana setiap siswa
                        didorong untuk menjadi pemimpin masa depan.</p>
                </span>
            </div>
        </div>
        <div class="w-[700px] mx-auto my-20">
            <div class="flex left-0 mb-10">
                <img src="{{ asset('assets/images/Group 1.svg') }}" alt="" srcset="" class="w-12">
                <p class="font-bold text-3xl">300 +<br><span class="font-normal text-xl">Aktif dengan Berjuta
                        Prestasi</span></p>
                <img src="{{ asset('assets/images/Group.svg') }}" alt="" class="w-16 ml-28 rotate-180">
            </div>
            <div class="flex justify-end right-0">
                <img src="{{ asset('assets/images/Group.svg') }}" alt="" class="w-16 mr-28">
                <img src="{{ asset('assets/images/Ellipse 28.svg') }}" alt="" srcset="" class="w-12">
                <p class="font-bold text-3xl">50 +<br><span class="font-normal text-xl">Achievments in the school</span>
                </p>
            </div>
        </div>
        <div class="flex flex-col xl:flex-row px-20 mt-20">
            <div class="pr-6 my-auto">
                <p class="text-6xl font-semibold text-[#7A1CAC]">
                    Selamat Datang di <br>
                    SMP Negeri 1 Mesuji Makmur
                </p>
                <p class="mt-6 text-xl">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id voluptates blanditiis, facilis dolor
                    consectetur ullam magnam vel ducimus dolorem reiciendis.
                </p>
            </div>
            <img src="{{ asset('assets/images/Component 2.png') }}" alt="">
        </div>
    </section>
    <section class="max-w-full">
        <div class="bg-gradient-to-b from-[#7C18CD] to-[#38085F] h-auto rounded-3xl mx-20">
            <div class="flex justify-between mt-10 gap-2 p-10">
                <div class="max-w-sm">
                    <p class="text-white font-bold text-2xl h-[100px]">
                        Visi & Misi
                    </p>
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veritatis
                        corporis
                        veniam sed ipsum
                        possimus fuga, iure unde! Sequi, odit!</p>
                </div>
                <img src="{{ asset('assets/images/Line 17.png') }}" alt="">
                <div class="max-w-sm">
                    <img src="{{ asset('assets/images/book 1.png') }}" alt="">
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veritatis
                        corporis
                        veniam sed ipsum
                        possimus fuga, iure unde! Sequi, odit!</p>
                </div>
                <img src="{{ asset('assets/images/Line 17.png') }}" alt="">
                <div class="max-w-sm">
                    <img src="{{ asset('assets/images/book 2.png') }}" alt="">
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veritatis
                        corporis
                        veniam sed ipsum
                        possimus fuga, iure unde! Sequi, odit!</p>
                </div>
                <img src="{{ asset('assets/images/Line 17.png') }}" alt="">
                <div class="max-w-sm">
                    <img src="{{ asset('assets/images/cap 1.png') }}" alt="">
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veritatis
                        corporis
                        veniam sed ipsum
                        possimus fuga, iure unde! Sequi, odit!</p>
                </div>
            </div>
            <div class="mx-auto pr-10 pb-10">
                <div class="flex items-center justify-end ">
                    <p class="text-white mr-2">Selengkapnya </p>
                    <img src="{{ asset('assets/images/arrow_right.png') }}" alt="" srcset=""
                        class="h-[11px]">
                </div>
            </div>
        </div>

    </section>
    <section class="max-w-full">
        <div class="mx-auto mt-20 mb-10 text-center">
            <p class="font-semibold text-3xl"> Prestasi </p>
            <p class="text-2xl"> Source Of Achievment</p>
        </div>
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-end mr-20 mb-2">
                <p class="underline">Lihat Semua </p>
            </div>
            <div class="grid grid-cols-3 gap-4">

                <div class="border-2 border-[#AD49E1] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-64 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/prestasi1.png') }}')">
                    </div>
                    <div class="my-5">
                        <div class="flex">
                            <img src="{{ asset('assets/images/Shoes.png') }}" alt="" srcset=""
                                class="h-8">
                            <div class="ml-2">
                                <p class="text-xl">Piala Presiden, Juara 1</p>
                                <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas,
                                    veniam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-2 border-[#AD49E1] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-64 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/prestasi2.png') }}')">
                    </div>
                    <div class="my-5">
                        <div class="flex">
                            <img src="{{ asset('assets/images/Drawing Compass.png') }}" alt=""
                                srcset="" class="h-8">
                            <div class="ml-2">
                                <p class="text-xl">Piala Presiden, Juara 1</p>
                                <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas,
                                    veniam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-2 border-[#AD49E1] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-64 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/prestasi3.png') }}')">
                    </div>
                    <div class="my-5">
                        <div class="flex">
                            <img src="{{ asset('assets/images/Drawing Compass.png') }}" alt=""
                                srcset="" class="h-8">
                            <div class="ml-2">
                                <p class="text-xl">Piala Presiden, Juara 1</p>
                                <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas,
                                    veniam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 border-2 border-[#AD49E1] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-64 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/x_prestasi1.png') }}')">
                    </div>
                    <div class="my-5">
                        <div class="flex">
                            <img src="{{ asset('assets/images/Drawing Compass.png') }}" alt=""
                                srcset="" class="h-8">
                            <div class="ml-2">
                                <p class="text-xl">Piala Presiden, Juara 1</p>
                                <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas,
                                    veniam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-2 border-[#AD49E1] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-64 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/prestasi4.png') }}')">
                    </div>
                    <div class="my-5">
                        <div class="flex">
                            <img src="{{ asset('assets/images/Drawing Compass.png') }}" alt=""
                                srcset="" class="h-8">
                            <div class="ml-2">
                                <p class="text-xl">Piala Presiden, Juara 1</p>
                                <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas,
                                    veniam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-2 border-[#AD49E1] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-64 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/prestasi5.png') }}')">
                    </div>
                    <div class="my-5">
                        <div class="flex">
                            <img src="{{ asset('assets/images/Drawing Compass.png') }}" alt=""
                                srcset="" class="h-8">
                            <div class="ml-2">
                                <p class="text-xl">Piala Presiden, Juara 1</p>
                                <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas,
                                    veniam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 border-2 border-[#AD49E1] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-64 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/x_pretstasi2.png') }}')">
                    </div>
                    <div class="my-5">
                        <div class="flex">
                            <img src="{{ asset('assets/images/Drawing Compass.png') }}" alt=""
                                srcset="" class="h-8">
                            <div class="ml-2">
                                <p class="text-xl">Piala Presiden, Juara 1</p>
                                <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas,
                                    veniam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-full">
        <div class="mx-auto mt-20 mb-4 text-center">
            <p class="font-semibold text-3xl"> Informasi </p>
            <p class="text-2xl"> Source Of Information</p>
        </div>
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-end mr-20 mb-2">
                <p class="underline">Lihat Semua </p>
            </div>
            <div class="grid grid-cols-4 gap-10">
                <div
                    class="border-2 bg-[conic-gradient(at_bottom_right,_var(--tw-gradient-stops))] from-[#2E073F] to-[#4A0B66] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-52 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/informasi1.png') }}')">
                    </div>
                    <div class="my-5 text-white">
                        <p class="text-sm font-bold mb-2">PPDB Periode 2024 - 2025</p>
                        <div class="relative flex h-12">
                            <p class="text-xs">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas, veniam.
                            </p>
                            <img src="{{ asset('assets/images/arrow-square-right.svg') }}" alt=""
                                class="absolute bottom-0 right-0">
                        </div>
                    </div>
                </div>
                <div
                    class="border-2 bg-[conic-gradient(at_bottom_right,_var(--tw-gradient-stops))] from-[#2E073F] to-[#4A0B66] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-52 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/informasi2.png') }}')">
                    </div>
                    <div class="my-5 text-white">
                        <p class="text-sm font-bold mb-2">Peserta didik Lolos Seleksi</p>
                        <div class="relative flex h-12">
                            <p class="text-xs">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas, veniam.
                            </p>
                            <img src="{{ asset('assets/images/arrow-square-right.svg') }}" alt=""
                                class="absolute bottom-0 right-0">
                        </div>
                    </div>
                </div>
                <div
                    class="border-2 bg-[conic-gradient(at_bottom_right,_var(--tw-gradient-stops))] from-[#2E073F] to-[#4A0B66] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-52 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/informasi3.png') }}')">
                    </div>
                    <div class="my-5 text-white">
                        <p class="text-sm font-bold mb-2">Peserta didik Lolos Seleksi</p>
                        <div class="relative flex h-12">
                            <p class="text-xs">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas, veniam.
                            </p>
                            <img src="{{ asset('assets/images/arrow-square-right.svg') }}" alt=""
                                class="absolute bottom-0 right-0">
                        </div>
                    </div>
                </div>
                <div
                    class="border-2 bg-[conic-gradient(at_bottom_right,_var(--tw-gradient-stops))] from-[#2E073F] to-[#4A0B66] p-6 rounded-xl">
                    <div class="bg-cover bg-center h-52 rounded-lg"
                        style="background-image: url('{{ asset('assets/images/informasi4.png') }}')">
                    </div>
                    <div class="my-5 text-white">
                        <p class="text-sm font-bold mb-2">Peserta didik Lolos Seleksi</p>
                        <div class="relative flex h-12">
                            <p class="text-xs">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas, veniam.
                            </p>
                            <img src="{{ asset('assets/images/arrow-square-right.svg') }}" alt=""
                                class="absolute bottom-0 right-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-full h-[400px]"></div>
    </section>
</body>

</html>
