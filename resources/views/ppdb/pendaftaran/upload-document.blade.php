@extends('ppdb.layouts.index')
@section('title', 'PPDB | Pendaftaran')
@section('style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
    <section class="w-full h-[100vh] px-3 md:px-10 lg:px-14 pt-16 overflow-hidden">
        <div class="flex gap-2 flex-col md:flex-row">
            <ul class="flex items-start flex-row md:flex-col bg-base-100 p-4 rounded-md justify-between h-fit">
                <li class="hidden md:flex flex-col mb-3 justify-start bg-[#F5EBFF] w-full rounded-md p-2">
                    <progress class="progress progress-primary bg-[#7a1cac8f] w-56" value="75" max="100"></progress>
                    <span class="text-sm">75%</span>
                </li>
                <li class="flex flex-col md:flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Biodata
                        Calon Siswa</span>
                </li>
                <li class="hidden md:block md:border-l-2 border-black border-dashed ml-[10px] w-10 md:w-0 h-1 md:h-10">
                </li>
                <li class="flex flex-col md:flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Data
                        Orang Tua Calon
                        Siswa</span>
                </li>
                <li class="hidden md:block md:border-l-2 border-black border-dashed ml-[10px] w-10 md:w-0 h-1 md:h-10">
                </li>
                <li class="flex flex-col md:flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Input
                        Nilai</span>
                </li>
                <li class="hidden md:block md:border-l-2 border-black border-dashed ml-[10px] w-10 md:w-0 h-1 md:h-10">
                </li>
                <li class="flex flex-col md:flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span
                        class="ml-2 text-[10px] font-bold md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Upload
                        Dokumen</span>
                </li>
            </ul>

            <ul id="upload-document-form" class="flex flex-col w-full gap-4 h-screen overflow-y-auto px-5 pb-40 md:pb-28">
                <form action="{{ route('save-document') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_data_calon_siswa" value="{{ $calonSiswa->id }}">

                    @foreach ($documents as $index => $document)
                        <div class="flex flex-col items-center justify-center">
                            {{-- Input file --}}
                            <label for="uploadFile{{ $index }}"
                                class="mt-2 mb-4 bg-white text-gray-500 font-semibold text-base rounded max-w-md h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed font-[sans-serif]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500" viewBox="0 0 32 32">
                                    <path
                                        d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z" />
                                    <path
                                        d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z" />
                                </svg>
                                {{ $document->nama }} ({{ $document->isRequired ? 'Wajib' : 'Opsional' }})
                                <input type="file" id="uploadFile{{ $index }}" name="files[{{ $document->id }}]"
                                    class="hidden" />
                                <p class="text-xs font-medium text-gray-400 mt-2">PNG, JPG, SVG, WEBP, and GIF are allowed.
                                </p>
                            </label>
                            {{-- Tampilkan error untuk dokumen wajib --}}
                            @error("files.{$document->id}")
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Tampilkan dokumen yang sudah diunggah --}}
                        @php
                            $uploadedDocument = $data->where('id_dokumen', $document->id)->first();
                        @endphp
                        @if ($uploadedDocument && $uploadedDocument->path_url)
                            <div class="mt-2 text-center">
                                <a href="{{ asset('storage/' . $uploadedDocument->path_url) }}" target="_blank"
                                    class="text-blue-500 underline">
                                    Lihat {{ $document->nama }}
                                </a>
                            </div>
                        @endif
                    @endforeach



                    {{-- Tombol Submit --}}
                    <li class="flex justify-center">
                        <button type="submit" id="submit" class="btn px-10 bg-slate-950 text-white">Submit</button>
                    </li>
                </form>
            </ul>


        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.pageYOffset > 0) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        });

        function showSelectedFileName(event, index) {
            const fileInput = event.target;
            const fileNameDisplay = document.getElementById(`selectedFileName${index}`);

            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = `File yang dipilih: ${fileInput.files[0].name}`;
                fileNameDisplay.classList.add('text-green-500');
            } else {
                fileNameDisplay.textContent = '';
            }
        }
    </script>
@endsection
