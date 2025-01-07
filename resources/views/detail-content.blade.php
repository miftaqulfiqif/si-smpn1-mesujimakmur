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
    @if ($content)
        <div class="max-w-4xl flex flex-col gap-10 mx-10 my-20 lg:mx-auto">
            <img src="{{ asset('storage/' . $content->main_image) }}" alt="Main Image" srcset="" class="max-w-full">
            <div class="overflow-x-auto">
                <div class="flex space-x-4">
                    @foreach ($content->images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Image {{ $loop->index }}"
                            class="w-[340px] h-[200px] rounded-lg object-cover shadow-md">
                    @endforeach
                </div>
            </div>

            <div class="">
                <p class="text-2xl font-bold"> {{ $content->nama }} </p>
                <p class="text-md"> {{ $content->tanggal }} </p>
            </div>

            <div class="text-justify">
                @if ($content->deskripsi != null)
                    <p> {{ $content->deskripsi }}</p>
                @else
                    <p> {{ $content->konten }}</p>
                @endif
            </div>
        </div>
    @else
        <div class="max-w-4xl flex flex-col mx-10 my-20 lg:mx-auto">
            <p>Data Tidak Ditemukan</p>
        </div>
    @endif


</body>

</html>
