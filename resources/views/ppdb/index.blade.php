@extends('ppdb.layouts.index')
@section('title', 'PPDB | HOME')
@section('style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
    <section class="w-full h-[100vh] px-3 md:px-10 lg:px-14 pt-16 overflow-hidden">

        {{-- PESAN --}}
        <div class="bg-[#ff252579] border-red-500 max-w-full p-6 rounded-3xl flex flex-row mt-10">
            <p>
                Terdapat kesalahan upload dokumen Ijazah, Silahkan ubah data
            </p>
        </div>

        <div class="my-5">
            <p>Selamat Datang</p>
            <p class="text-3xl font-bold">{{ $nameSiswa }}</p>
        </div>
        <div class="bg-[#FAF5FF] max-w-full p-8 rounded-3xl flex flex-row justify-between">
            <div class="flex flex-col">
                <p class="mb-6 font-bold text-lg">Biodata Anda</p>
                <div class="flex flex-col gap-2">
                    <div class="">
                        <p class="text-md">NIK</p>
                        <p class="text-lg font-bold">{{ $dataCalonSiswa->nik }}</p>
                    </div>
                    <div class="">
                        <p class="text-md">TTL</p>
                        <p class="text-lg font-bold">{{ $dataCalonSiswa->tempat_lahir }}, {{ $dataCalonSiswa->tgl_lahir }}
                        </p>
                    </div>
                    <div class="">
                        <p class="text-md">No. KIP</p>
                        @if ($dataCalonSiswa->no_kip)
                            <p class="text-lg font-bold">{{ $dataCalonSiswa->no_kip }}</p>
                        @else
                            <p class="text-lg font-bold"> - </p>
                        @endif
                    </div>
                    <div class="">
                        <p class="text-md">Alamat</p>
                        <p class="text-lg font-bold">{{ $dataCalonSiswa->alamat }}</p>
                    </div>
                    <div class="">
                        <p class="text-md">Asal Sekolah</p>
                        <p class="text-lg font-bold">{{ $dataCalonSiswa->asal_sekolah }}</p>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="text-lg font-bold">Status Pendaftaran </p>
                    <p class="text-md">Anda Terdaftar pada periode <span class="font-bold">{{ $periodeDaftar->name }}</span>
                    </p>
                    @if ($statusPendaftaran->status == 'processing')
                        <p class="text-lg bg-[#5cff3b65] px-4 py-2 rounded-2xl max-w-fit">Sedang Dalam Proses ...</p>
                    @else
                        <p class="text-lg bg-[#fa000485] px-4 py-2 rounded-2xl max-w-fit">Gagal ...
                        </p>
                    @endif
                </div>
            </div>
            <div class="w-[200px]">
                <img src="{{ asset('storage/' . $dataCalonSiswa->foto) }}" alt="" srcset="">
            </div>
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
    </script>
@endsection
