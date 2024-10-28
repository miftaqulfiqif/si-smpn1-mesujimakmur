@extends('ppdb.layouts.index')
@section('title', 'PPDB | Pendaftaran')
@section('style')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
<section class="w-full h-[100vh] px-3 md:px-10 lg:px-14 pt-16 overflow-hidden">
    <form class="flex gap-2 flex-col md:flex-row">
        <ul class="flex items-start flex-row md:flex-col bg-base-100 p-4 rounded-md justify-between h-fit">
            <li class="hidden md:flex flex-col mb-3 justify-start bg-[#F5EBFF] w-full rounded-md p-2">
                <progress class="progress progress-primary bg-[#7a1cac8f] w-56" value="25" max="100"></progress>
                <span class="text-sm">0%</span>
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
                    class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Dokumen</span>
            </li>
        </ul>
        <ul id="biodata-form" class="flex flex-col w-full gap-4 h-screen overflow-y-auto px-5 pb-40 md:pb-28">
            <li class="form-control gap-1">
                <label for="nama" class="label font-medium">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="jenis_kelamin" class="label font-medium">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="select select-bordered w-full bg-white">
                    <option disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </li>
            <li class="form-control gap-1">
                <label for="tempat_lahir" class="label font-medium">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="tgl_lahir" class="label font-medium">Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="Pilih Tanggal Lahir"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="nik" class="label font-medium">NIK</label>
                <input type="text" id="nik" name="nik" placeholder="Masukkan NIK mu"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="alamat" class="label font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Lengkap"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="no_telp" class="label font-medium">No Telpon</label>
                <input type="text" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telpon"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="penerima_kip" class="label font-medium">Penerima KIP?</label>
                <select id="penerima_kip" name="penerima_kip" class="select select-bordered w-full bg-white">
                    <option disabled selected>Pilih salah satu</option>
                    <option value="ya">Ya</option>
                    <option value="tidak">Tidak</option>
                </select>
            </li>
            <li class="form-control gap-1">
                <label for="zonasi" class="label font-medium">Zonasi</label>
                <select id="zonasi" name="zonasi" class="select select2 select-bordered w-full bg-white"
                    style="width: 100% !important;">
                    <option disabled selected>Pilih salah satu</option>
                    <option value="sdn_1_kalibata">SDN 1 Kalibata</option>
                    <option value="sdn_2_kalibata">SDN 2 Kalibata</option>
                    <option value="sdn_3_kalibata">SDN 3 Kalibata</option>
                    <option value="sdn_4_kalibata">SDN 4 Kalibata</option>
                    <option value="sdn_5_kalibata">SDN 5 Kalibata</option>
                    <option value="sdn_6_kalibata">SDN 6 Kalibata</option>
                </select>
            </li>
            <li class="form-control gap-1">
                <label for="alamat" class="label font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Lengkap"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="alamat" class="label font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Lengkap"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="alamat" class="label font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Lengkap"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="alamat" class="label font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Lengkap"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="alamat" class="label font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Lengkap"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="form-control gap-1">
                <label for="alamat" class="label font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Lengkap"
                    class="input bg-white input-bordered w-full">
            </li>
            <li class="flex justify-center">
                <button type="button" id="biodata-btn" class="btn px-10 bg-slate-950 text-white">Submit</button>
            </li>
        </ul>
    </form>
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
</script>
@endsection
