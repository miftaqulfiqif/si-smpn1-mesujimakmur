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
                    <progress class="progress progress-primary bg-[#7a1cac8f] w-56" value="25" max="100"></progress>
                    <span class="text-sm">25%</span>
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
                    <span
                        class="ml-2 text-[10px] font-bold md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Data
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
            <ul id="biodata-orangtua-form" class="flex flex-col w-full gap-4 h-screen overflow-y-auto px-5 pb-40 md:pb-28">
                <form action="{{ route('save-biodata-orangtua') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_data_calon_siswa" value="{{ $calonSiswa->id }}">

                    <li class="form-control gap-1">
                        <label for="nama_ayah" class="label font-medium">Nama Ayah</label>
                        <input type="text" id="nama_ayah" name="nama_ayah"
                            value="{{ old('nama_ayah', $biodata->nama_ayah ?? '') }}" placeholder="Masukkan Nama Ayah"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('nama_ayah')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="nik_ayah" class="label font-medium">NIK Ayah</label>
                        <input type="text" id="nik_ayah" name="nik_ayah"
                            value="{{ old('nik_ayah', $biodata->nik_ayah ?? '') }}" placeholder="Masukkan NIK Ayah"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('nik_ayah')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="tgl_lahir_ayah" class="label font-medium">Tanggal Lahir Ayah</label>
                        <input type="date" id="tgl_lahir_ayah" name="tgl_lahir_ayah"
                            value="{{ old('tgl_lahir_ayah', $biodata->tgl_lahir_ayah ?? '') }}"
                            placeholder="Pilih Tanggal Lahir" class="input bg-white input-bordered w-full">
                        @error('tgl_lahir_ayah')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="pendidikan_ayah" class="label font-medium">Pendidikan Terakhir Ayah</label>
                        <input type="text" id="pendidikan_ayah" name="pendidikan_ayah"
                            value="{{ old('pendidikan_ayah', $biodata->pendidikan_ayah ?? '') }}"
                            placeholder="Masukkan Pendidikan Terakhir Ayah" class="input bg-white input-bordered w-full"
                            required maxlength="255">
                        @error('pendidikan_ayah')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="pekerjaan_ayah" class="label font-medium">Pekerjaan Ayah</label>
                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah"
                            value="{{ old('pekerjaan_ayah', $biodata->pekerjaan_ayah ?? '') }}"
                            placeholder="Masukkan Pekerjaan Ayah" class="input bg-white input-bordered w-full" required
                            maxlength="255">
                        @error('pekerjaan_ayah')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="penghasilan_ayah" class="label font-medium">Penghasilan Ayah</label>
                        <input type="text" id="penghasilan_ayah" name="penghasilan_ayah"
                            value="{{ old('penghasilan_ayah', $biodata->penghasilan_ayah ?? '') }}"
                            placeholder="Masukkan Penghasilan Ayah" class="input bg-white input-bordered w-full" required
                            maxlength="255">
                        @error('penghasilan_ayah')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>


                    <li class="form-control gap-1">
                        <label for="nama_ibu" class="label font-medium">Nama Ibu</label>
                        <input type="text" id="nama_ibu" name="nama_ibu"
                            value="{{ old('nama_ibu', $biodata->nama_ibu ?? '') }}" placeholder="Masukkan Nama ibu"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('nama_ibu')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="nik_ibu" class="label font-medium">NIK Ibu</label>
                        <input type="text" id="nik_ibu" name="nik_ibu"
                            value="{{ old('nik_ibu', $biodata->nik_ibu ?? '') }}" placeholder="Masukkan NIK ibu"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('nik_ibu')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="tgl_lahir_ibu" class="label font-medium">Tanggal Lahir Ibu</label>
                        <input type="date" id="tgl_lahir_ibu" name="tgl_lahir_ibu"
                            value="{{ old('tgl_lahir_ibu', $biodata->tgl_lahir_ibu ?? '') }}"
                            placeholder="Pilih Tanggal Lahir" class="input bg-white input-bordered w-full">
                        @error('tgl_lahir_ibu')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="pendidikan_ibu" class="label font-medium">Pendidikan Terakhir Ibu</label>
                        <input type="text" id="pendidikan_ibu" name="pendidikan_ibu"
                            value="{{ old('pendidikan_ibu', $biodata->pendidikan_ibu ?? '') }}"
                            placeholder="Masukkan Pendidikan Terakhir Ibu" class="input bg-white input-bordered w-full"
                            required maxlength="255">
                        @error('pendidikan_ibu')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="pekerjaan_ibu" class="label font-medium">Pekerjaan Ibu</label>
                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu"
                            value="{{ old('pekerjaan_ibu', $biodata->pekerjaan_ibu ?? '') }}"
                            placeholder="Masukkan Pekerjaan ibu" class="input bg-white input-bordered w-full" required
                            maxlength="255">
                        @error('pekerjaan_ibu')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="penghasilan_ibu" class="label font-medium">Penghasilan Ibu</label>
                        <input type="text" id="penghasilan_ibu" name="penghasilan_ibu"
                            value="{{ old('penghasilan_ibu', $biodata->penghasilan_ibu ?? '') }}"
                            placeholder="Masukkan Penghasilan Ibu" class="input bg-white input-bordered w-full" required
                            maxlength="255">
                        @error('penghasilan_ibu')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="flex justify-center">
                        <button type="submit" id="submit"
                            class="btn px-10 bg-slate-950 text-white mt-4">Submit</button>
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
    </script>
@endsection
