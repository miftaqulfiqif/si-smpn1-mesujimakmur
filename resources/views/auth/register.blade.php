<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body>
    <div class="w-[577px] h-auto mx-auto border border-[#BB97CB] p-[53px] rounded-2xl bg-[#F9EEFF]">
        <img src="{{ asset('assets/images/logo_login.png') }}" alt="" class="h-[206px] mx-auto mb-4">
        <div class="flex flex-col mb-4">
            <label for="username" class="font-bold">Nama Lengkap</label>
            <input type="text" id="username" placeholder="Masukkan nama lengkap" class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
        </div>
        <div class="flex flex-col mb-4">
            <label for="username" class="font-bold">Nisn</label>
            <input type="text" id="username" placeholder="Masukkan nisn" class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
        </div>
        <div class="flex flex-col mb-4">
            <label for="password" class="font-bold">Password</label>
            <input type="password" id="password" placeholder="Masukkan password" class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
        </div>
        <div class="flex flex-col mb-5">
            <label for="password" class="font-bold">Konfirmasi Password</label>
            <input type="password" id="password" placeholder="Masukkan ulang password" class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
        </div>
        <button type="submit" class="bg-[#2E073F] p-4 text-white w-full rounded-xl font-bold mb-5">Sumbit</button>
    </div>
</body>
</html>