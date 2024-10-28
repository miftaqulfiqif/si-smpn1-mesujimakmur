<!DOCTYPE html>
<html lang="en">

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
    <div class="navbar
        bg-base-100">
        <div class="gap-5 text-[#2E073F] mx-auto font-semibold">
            <a href="#">Home</a>
            <a href="#">Achievment</a>
            <a href="#">Activites</a>
            <a href="#">Information</a>
            <a href="#">Contact</a>
            <a href="#">PPDB</a>
        </div>
    </div>
    <img src="{{ asset('assets/images/line.png') }}" alt="" srcset="" class="mx-auto">
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
                <a href="#" class="flex mt-10 max-w-max rounded-full mx-auto">
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
        <div class="w-[700px] mx-auto mt-5">
            <div class="flex left-0">
                <img src="{{ asset('assets/images/Group 1.svg') }}" alt="" srcset="" class="w-12">
                <p class="font-bold text-2xl">300 +<br><span class="font-normal text-sm">Aktif dengan Berjuta
                        Prestasi</span></p>
                <img src="{{ asset('assets/images/Group.svg') }}" alt="" class="w-10 ml-10 rotate-180">
            </div>
            <div class="flex justify-end right-0">
                <img src="{{ asset('assets/images/Group.svg') }}" alt="" class="w-10 mr-5">
                <img src="{{ asset('assets/images/Ellipse 28.svg') }}" alt="" srcset="" class="w-12">
                <p class="font-bold text-2xl">50 +<br><span class="font-normal text-sm">Achievments in the school</span>
                </p>
            </div>
        </div>
        <div class="flex px-20 mt-20">
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
        <div
            class="flex justify-between mt-10 bg-gradient-to-b from-[#7C18CD] to-[#38085F] h-[300px] rounded-3xl mx-20 p-10 gap-2">
            <div class="max-w-sm">
                <p class="text-white font-bold text-2xl h-[96px]">
                    Visi & Misi
                </p>
                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veritatis corporis
                    veniam sed ipsum
                    possimus fuga, iure unde! Sequi, odit!</p>
            </div>
            <img src="{{ asset('assets/images/Line 17.png') }}" alt="">
            <div class="max-w-sm">
                <img src="{{ asset('assets/images/book 1.svg') }}" alt="">
                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veritatis corporis
                    veniam sed ipsum
                    possimus fuga, iure unde! Sequi, odit!</p>
            </div>
            <img src="{{ asset('assets/images/Line 17.png') }}" alt="">
            <div class="max-w-sm">
                <img src="{{ asset('assets/images/book 2.svg') }}" alt="">
                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veritatis corporis
                    veniam sed ipsum
                    possimus fuga, iure unde! Sequi, odit!</p>
            </div>
            <img src="{{ asset('assets/images/Line 17.png') }}" alt="">
            <div class="max-w-sm">
                <img src="{{ asset('assets/images/cap 1.svg') }}" alt="">
                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veritatis corporis
                    veniam sed ipsum
                    possimus fuga, iure unde! Sequi, odit!</p>
            </div>
        </div>
    </section>
</body>

</html>
