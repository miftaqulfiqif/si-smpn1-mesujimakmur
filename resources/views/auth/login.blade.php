<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>
    <div class="w-[577px] h-auto mx-auto border border-[#BB97CB] p-[53px] rounded-2xl bg-[#F9EEFF]">
        <img src="{{ asset('assets/images/logo_login.png') }}" alt="" class="h-[206px] mx-auto mb-4">
        <div class="flex flex-col mb-4">
            <label for="username" class="font-bold">Nisn</label>
            <input type="text" id="username" placeholder="Masukkan nisn"
                class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
        </div>
        <div class="flex flex-col mb-4">
            <label for="password" class="font-bold">Password</label>
            <input type="password" id="password" placeholder="Masukkan password"
                class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
        </div>
        <p class="text-[#AAA9A9] text-sm mb-4">Lupa password ?</p>
        <button type="submit" class="bg-[#2E073F] p-4 text-white w-full rounded-xl font-bold mb-5">Log In</button>
        <button type="submit" class="font-[#2E073F] font-normal w-full text-center">Buat Akun</button>
        <div class="flex mt-[20px]">
            <input type="checkbox" checked="checked"
                class="checkbox border-[#B38DDB] [--chkbg:theme(colors.indigo.600)] [--chkfg:[#B38DDB]] checked:border-[#B38DDB]" />
            <p class="ml-2 text-[#B38DDB]">Ingat Saya</p>
        </div>
    </div>
</body>

</html>
