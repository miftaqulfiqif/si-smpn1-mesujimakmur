<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Achievment</title>
</head>

<body>
    <x-navbar />
    <section class="mx-20">
        <div class="max-w-full mt-[145px]">
            <div class="max-w-5xl">
                <p class="font-semibold text-5xl mb-3">Setiap Langkah Maju Adalah Bukti Dedikasi dan Kerja Keras</p>
                <p class="font-bold">SMP Negeri 1 Mesuji Makmur <span class="font-normal text-[#7A1CAC]">terus
                        mengukir prestasi
                        gemilang melalui dedikasi
                        dan kerja keras
                        para
                        siswa dan pendidik. Setiap penghargaan yang diraih menjadi bukti nyata dari komitmen kami untuk
                        menciptakan generasi unggul yang siap bersaing di masa depan.</span></p>
                <div class="flex mt-[88px] mb-[204px]">
                    <a href="#" class="flex mt-10 mb-[80px] max-w-max rounded-full mr-[29px]">
                        <div
                            class="py-4 mx-auto flex px-6 bg-gradient-to-b from-[#7A1CAC] to-[#4D0E69] rounded-full gap-x-6 shadow-xl">
                            <p class="text-white font-bold mx-auto">Lihat Prestasi</p><span>
                                <img src="{{ asset('assets/images/arrow-circle-down.png') }}" alt=""
                                    srcset="">
                            </span>
                        </div>
                    </a>
                    <a href="#" class="flex mt-10 mb-[80px] max-w-max rounded-full">
                        <div
                            class="py-4 mx-auto flex px-6 bg-gradient-to-b from-[#7A1CAC] to-[#4D0E69] rounded-full gap-x-6 shadow-xl">
                            <p class="text-white font-bold mx-auto">Daftar Sekarang</p><span>
                                <img src="{{ asset('assets/images/arrow-square-right.svg') }}" alt=""
                                    srcset="">
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="relative max-w-full bg-[#AD49E1] pt-[74px] pb-[174px]">
        <div class="max-w-2xl mx-auto text-center mb-[125px] text-3xl">
            <p class=" text-white">Siswa-siswa SMP Negeri 1 Mesuji Makmur terus</p>
            <p class=" text-[#FFF344]">mengukir prestasi di berbagai bidang, membuktikan bahwa tekad dan usaha
                bisa
            <p class=" text-white">mereka menuju puncak kesuksesan. Mereka adalah bintang masa depan yang siap
                bersinar di segala bidang</p>
        </div>
        <div class="flex justify-center gap-[72px]">
            <img src="{{ asset('assets/images/gina natasha.png') }}" alt="" srcset="">
            <img src="{{ asset('assets/images/xaviera.png') }}" alt="" srcset="">
            <img src="{{ asset('assets/images/epan.png') }}" alt="" srcset="">
            <img src="{{ asset('assets/images/maspek.png') }}" alt="" srcset="">
        </div>
        <img src="{{ asset('assets/images/icon petir.png') }}" alt="" srcset=""
            class="absolute left-[147px] top-[86px]">
        <img src="{{ asset('assets/images/plus plus.png') }}" alt="" srcset=""
            class="absolute right-[171px] top-[332px]">
        <img src="{{ asset('assets/images/dot dot.png') }}" alt="" srcset=""
            class="absolute left-[670px] top-[481px]">
        <img src="{{ asset('assets/images/ball.png') }}" alt="" srcset=""
            class="absolute left-[315px] top-[492px]">
    </section>
    <section class="mx-20 ">
        <p class="text-2xl font-bold mt-[94px] mb-[44px]">{{ $data }}</p>
        <div class="flex flex-col gap-10">
            <div class="flex bg-[#6A138F] rounded-2xl p-10 h-[385px] gap-10">
                <img src="{{ asset('assets/images/cup.png') }}" alt="" srcset="" class="max-w-fit h-10">
                <div class="text-white">
                    <p class="font-bold mb-2 text-2xl">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="mb-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos alias iure ab
                        sint veniam ipsum fugit mollitia minima. Ipsam modi cum voluptatem reiciendis ea enim quis
                        laborum tenetur atque eos dolorem praesentium quos aliquam, voluptates exercitationem rerum
                        quisquam saepe? Similique!</p>
                    <div class="flex items-center">
                        <p class="mr-4">Baca Selengkapnya</p>
                        <img src="{{ asset('assets/images/send.png') }}" alt="" srcset="">
                    </div>
                </div>
                <div class="self-end h-full">
                    <img src="{{ asset('assets/images/prestasi1.png') }}" alt="" srcset=""
                        class="h-full w-[1642px] rounded-2xl">
                </div>
            </div>
        </div>
    </section>

</body>

</html>