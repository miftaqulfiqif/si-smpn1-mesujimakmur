<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <style>
        .relative {
            position: relative;
        }

        .gradient-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Sesuaikan tinggi gradien */
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            /* Agar konten berada di atas gradien */
        }
    </style>
</head>

<body>
    <x-navbar />
    <section class="my-20">
        <div class="flex mx-20 items-center">
            <div class="my-auto basis-1/2">
                <img src="{{ asset('assets/images/aktivitas.png') }}" alt="" srcset="">
            </div>
            <div class="relative justify-center h-96 max-h-full basis-1/2">
                <p class="text-3xl font-bold mb-4 font-[#2E073F]">Newest Activity Title</p>
                <p class="font-semibold mb-4">By Writer</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat nulla in distinctio dicta iure
                    incidunt voluptates amet. Non repellendus nemo quidem voluptas deleniti inventore cumque nulla modi
                    ea perferendis iste autem recusandae quos similique voluptate sequi temporibus, totam a aut
                    veritatis blanditiis possimus esse quia aspernatur. Quidem quos modi aliquam.
                </p>
                <div class="absolute flex items-center bottom-0">
                    <p class="mr-4">Baca Selengkapnya</p>
                    <img src="{{ asset('assets/images/send.png') }}" alt="" srcset="">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="flex mx-20 items-center max-w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto max-w-7xl">
                <div class="relative max-w-xs shadow-xl">
                    <!-- Gambar -->
                    <img src="{{ asset('assets/images/aktivitas1.png') }}" alt="Activity Image" class="w-full h-auto">

                    <!-- Overlay Gradien -->
                    <div class="gradient-overlay"></div>

                    <!-- Konten -->
                    <div class="content bg-white p-4 gap-4">
                        <p class="font-bold text-xl py-2">Activities Title</p>
                        <p class="font-semibold text-sm pb-2">By Writer</p>
                        <p class="text-sm">
                            Short Descripting, Short Descripting, Short Descripting, Short Descripting, Short
                            Descripting.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
