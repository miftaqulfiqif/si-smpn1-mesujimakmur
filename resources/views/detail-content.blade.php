<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div class="max-w-4xl flex flex-col gap-10 mx-10 my-20 lg:mx-auto">
        <img src="{{ asset('assets/images/prestasi1.png') }}" alt="" srcset="" class="max-w-full">

        <!-- Gambar Horizontal -->
        <div class="overflow-x-auto">
            <div class="flex space-x-4">
                <!-- Loop Gambar -->
                @foreach ($images as $image)
                    <img src="{{ asset('assets/images/' . $image) }}" alt="Image {{ $loop->index }}"
                        class="w-[340px] h-[200px] rounded-lg object-cover shadow-md">
                @endforeach
            </div>
        </div>

        <div class="">
            <p class="text-2xl font-bold"> Judul Konten </p>
            <p class="text-md"> Tanggal Konten </p>
        </div>

        <div class="text-justify">
            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis debitis doloremque fuga,
                perferendis quasi culpa alias tenetur inventore cum suscipit repudiandae voluptatibus atque corporis
                recusandae velit consequuntur accusamus veritatis placeat sapiente minus. Nihil corporis natus
                reprehenderit fugiat deleniti, ratione repudiandae qui, labore eum vero consectetur nam placeat
                cupiditate cumque aspernatur. Odio nam ea veniam, illo earum sapiente autem quidem fugiat dicta dolor
                voluptatem, saepe dolorem suscipit, quo sit. Aliquam dolores nobis eveniet itaque, rerum laudantium
                tempore illo corrupti, voluptatum dicta, error est sunt quas quae quis possimus. Ut quae necessitatibus
                exercitationem cupiditate inventore? Delectus sit adipisci facilis, vel dolores blanditiis quaerat
                facere distinctio corrupti in itaque eius quasi nostrum qui cumque error porro ipsum rerum consectetur
                beatae. Saepe distinctio earum soluta quibusdam architecto vel, ad recusandae labore vitae obcaecati hic
                alias dicta numquam sunt quo veritatis repellendus voluptates! Incidunt quis libero commodi, explicabo
                veritatis praesentium recusandae ex dolor beatae, minima eaque, consectetur porro voluptatum fugiat
                magnam illo officiis tempora! Neque ut quia, temporibus, deserunt magni dignissimos ipsum eligendi
                recusandae magnam fugit debitis! Aliquam fugit soluta voluptatum. Eos doloribus quam tempora
                consequuntur, ab perspiciatis eaque vitae veritatis ducimus illum cumque iure delectus debitis sequi
                quis, quidem quisquam id, ipsa omnis. Dolore!</p>
        </div>
    </div>

</body>

</html>
