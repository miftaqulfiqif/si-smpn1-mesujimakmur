<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar />
    <section class="mt-[73px]">
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
            <div class="grid grid-rows-3 grid-flow-col gap-4">
                <div class="max-w-xs">
                    <img src="{{ asset('assets/images/aktivitas1.png') }}" alt="" srcset="">
                    <div class="flex flex-col gap-2 mt-2 bg-white">
                        <p class="font-bold">Newest Activity Title</p>
                        <p class="font-semibold">By Writer</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat nulla in distinctio dicta
                            iure
                            incidunt voluptates amet. Non repellendus nemo quidem voluptas deleniti inventore cumque
                            nulla modi
                            ea perferendis iste autem recusandae quos similique voluptate sequi temporibus.</p>
                    </div>
                </div>
                <div class="h-10">02</div>
                <div class="h-10">03</div>
                <div class="h-10">04</div>
                <div class="h-10">05</div>
                <div class="h-10">06</div>
                <div class="h-10">07</div>
                <div class="h-10">08</div>
                <div class="h-10">09</div>
            </div>
        </div>
    </section>
</body>

</html>
