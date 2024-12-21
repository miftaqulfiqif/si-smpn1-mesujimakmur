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
                    <progress class="progress progress-primary bg-[#7a1cac8f] w-56" value="50" max="100"></progress>
                    <span class="text-sm">50%</span>
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
                    <span
                        class="ml-2 text-[10px] font-bold md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Input
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

            <ul id="input-nilai-form" class="flex flex-col w-full gap-4 h-screen overflow-y-auto px-5 pb-40 md:pb-28">
                <form action="{{ route('save-nilai') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_data_calon_siswa" value="{{ $calonSiswa->id }}">

                    <li class="form-control gap-1">
                        <label for="semester_ganjil_kelas_4" class="label font-medium">Nilai Kelas 4 (Semester
                            Ganjil)</label>
                        <input type="number" id="semester_ganjil_kelas_4" name="semester_ganjil_kelas_4"
                            value="{{ old('semester_ganjil_kelas_4', $data->semester_ganjil_kelas_4 ?? '') }}"
                            class="input bg-white input-bordered w-full" required>
                        @error('semester_ganjil_kelas_4')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="semester_genap_kelas_4" class="label font-medium">Nilai Kelas 4 (Semester
                            Genap)</label>
                        <input type="number" id="semester_genap_kelas_4" name="semester_genap_kelas_4"
                            value="{{ old('semester_genap_kelas_4', $data->semester_genap_kelas_4 ?? '') }}"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('semester_genap_kelas_4')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="semester_ganjil_kelas_5" class="label font-medium">Nilai Kelas 5 (Semester
                            Ganjil)</label>
                        <input type="number" id="semester_ganjil_kelas_5" name="semester_ganjil_kelas_5"
                            value="{{ old('semester_ganjil_kelas_5', $data->semester_ganjil_kelas_5 ?? '') }}"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('semester_ganjil_kelas_5')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="semester_genap_kelas_5" class="label font-medium">Nilai Kelas 5 (Semester
                            Genap)</label>
                        <input type="number" id="semester_genap_kelas_5" name="semester_genap_kelas_5"
                            value="{{ old('semester_genap_kelas_5', $data->semester_genap_kelas_5 ?? '') }}"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('semester_genap_kelas_5')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </li>
                    <li class="form-control gap-1">
                        <label for="semester_ganjil_kelas_6" class="label font-medium">Nilai Kelas 6 (Semester
                            Ganjil)</label>
                        <input type="number" id="semester_ganjil_kelas_6" name="semester_ganjil_kelas_6"
                            value="{{ old('semester_ganjil_kelas_6', $data->semester_ganjil_kelas_6 ?? '') }}"
                            class="input bg-white input-bordered w-full" required maxlength="255">
                        @error('semester_ganjil_kelas_6')
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
