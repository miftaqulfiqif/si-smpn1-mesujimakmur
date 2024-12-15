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
                    <progress class="progress progress-primary bg-[#7a1cac8f] w-56" value="1" max="100"></progress>
                    <span class="text-sm">0%</span>
                </li>
                <li class="flex flex-col md:flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span
                        class="ml-2 text-[10px] font-bold md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">
                        Biodata
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
                        class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Dokumen</span>
                </li>
            </ul>



            <ul id="biodata-form" class="flex flex-col w-full gap-4 h-screen overflow-y-auto px-5 pb-40 md:pb-28">
                <form action="{{ route('saveBiodataSiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <li class="form-control gap-1">
                        <label for="name" class="label font-medium">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="jenis_kelamin" class="label font-medium">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="select select-bordered w-full bg-white">
                            <option disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="tempat_lahir" class="label font-medium">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir"
                            class="input bg-white input-bordered w-full">
                        @error('tempat_lahir')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="tgl_lahir" class="label font-medium">Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="Pilih Tanggal Lahir"
                            class="input bg-white input-bordered w-full">
                        @error('tgl_lahir')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="nik" class="label font-medium">NIK</label>
                        <input type="text" id="nik" name="nik" placeholder="Masukkan NIK"
                            class="input bg-white input-bordered w-full">
                        @error('nik')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="alamat" class="label font-medium">Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Lengkap"
                            class="input bg-white input-bordered w-full">
                        @error('alamat')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="penerima_kip" class="label font-medium">Penerima KIP?</label>
                        <select id="penerima_kip" name="penerima_kip" class="select select-bordered w-full bg-white">
                            <option value="" {{ old('penerima_kip') == '' ? 'selected' : '' }}>Apakah anda penerima
                                KIP?</option>
                            <option value="ya" {{ old('penerima_kip') == 'ya' ? 'selected' : '' }}>Ya</option>
                            <option value="tidak" {{ old('penerima_kip') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @error('penerima_kip')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1" id="kip_section" style="display: none;">
                        <label for="nomor_kip" class="label font-medium">Nomor KIP</label>
                        <input type="text" id="nomor_kip" name="nomor_kip" placeholder="Masukkan Nomor KIP"
                            class="input bg-white input-bordered w-full">
                        @error('nomor_kip')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="asal_sekolah" class="label font-medium">Asal Sekolah</label>
                        <select id="asal_sekolah" name="asal_sekolah"
                            class="select select2 select-bordered w-full bg-white" style="width: 100% !important;">
                            @foreach ($sekolahPilihan as $sekolah)
                                <option value="{{ $sekolah }}">{{ $sekolah }}</option>
                            @endforeach

                        </select>
                        @error('asal_sekolah')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>

                    <li class="form-control gap-1">
                        <label for="tinggi_badan" class="label font-medium">Tinggi Badan (Berdasarkan cm)</label>
                        <input type="text" id="tinggi_badan" name="tinggi_badan"
                            placeholder="Masukkan Tinggi Badan Berdasarkan Centimeter"
                            class="input bg-white input-bordered w-full">
                        @error('tinggi_badan')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="kegemaran" class="label font-medium">Kegamaran atau Hobi</label>
                        <input type="text" id="kegemaran" name="kegemaran" placeholder="Masukkan Kegemaran atau Hobi"
                            class="input bg-white input-bordered w-full">
                        @error('kegemaran')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="notelp" class="label font-medium">Nomor Telpon</label>
                        <input type="text" id="notelp" name="notelp" placeholder="Masukkan Nomor Telepon"
                            class="input bg-white input-bordered w-full">
                        @error('notelp')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="foto" class="label font-medium">Foto</label>
                        <input type="file" id="foto" name="foto" accept="image/*"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </li>
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
        $(".select2").select2({
            tags: "true",
            placeholder: "Pilih salah satu atau ketik manual",
            allowClear: true
        });

        document.addEventListener('DOMContentLoaded', function() {
            const penerimaKip = document.getElementById('penerima_kip');
            const kipSection = document.getElementById('kip_section');

            penerimaKip.addEventListener('change', function() {
                if (this.value === 'ya') {
                    kipSection.style.display = 'block';
                } else {
                    kipSection.style.display = 'none';
                }
            })
        })
    </script>
@endsection
