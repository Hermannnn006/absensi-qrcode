<div v-bind:class="{ block: toggled, hidden: !toggled }" class="lg:flex">
    <div class="w-1/2 md:w-1/3 lg:w-64 fixed md:top-0 md:left-0 h-screen lg:block bg-hitam border-r z-30"
        id="main-nav">

        <Link href="/">
        <div class="w-full h-20 border-b flex px-4 items-center mb-8">
            <p class="font-semibold text-3xl text-hijau pl-4">Absensi</p>
        </div>
        </Link>

        <div class="mb-4 px-4">
            <p class="pl-4 text-sm font-semibold mb-1 text-hijau">MAIN</p>

            <Link href="/">
            <div class="w-full flex items-center text-hijau h-10 pl-4 {{ Request::is('/') ? 'bg-slate-500' : '' }} hover:bg-slate-500 rounded-lg cursor-pointer">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="text-putih ml-3">Dashboard</span>
            </div>
            </Link>

            @role('admin')
            <Link href="/dashboard/absensi">
            <div class="w-full flex items-center text-hijau h-10 pl-4 {{ Request::is('dashboard/absensi') ? 'bg-slate-500' : '' }} hover:bg-slate-500 rounded-lg cursor-pointer">
                <i class="fa fa-qrcode" aria-hidden="true"></i>
                <span class="text-putih ml-3">Absensi</span>
            </div>
            </Link>
        </div>

        <div class="mb-4 px-4">
            <p class="pl-4 text-sm font-semibold mb-1 text-hijau">DATA</p>
            <Link href="/dashboard/data-absensi">
            <div class="w-full flex items-center text-hijau h-10 pl-4 {{ Request::is('dashboard/data-absensi') ? 'bg-slate-500' : '' }} hover:bg-slate-500 rounded-lg cursor-pointer">
                <i class="fa fa-server" aria-hidden="true"></i>
                <span class="text-putih ml-3">Data Absensi</span>
            </div>
            </Link>
            <Link href="/dashboard/data-mahasiswa">
            <div class="w-full flex items-center text-hijau h-10 pl-4 {{ Request::is('dashboard/data-mahasiswa') ? 'bg-slate-500' : '' }} hover:bg-slate-500 rounded-lg cursor-pointer">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span class="text-putih ml-3">Data Mahasiswa</span>
            </div>
            </Link>
            <Link href="/dashboard/data-kelas">
            <div class="w-full flex items-center text-hijau h-10 pl-4 {{ Request::is('dashboard/data-kelas') ? 'bg-slate-500' : '' }} hover:bg-slate-500 rounded-lg cursor-pointer">
                <i class="fa fa-university" aria-hidden="true"></i>
                <span class="text-putih ml-3">Data Kelas</span>
            </div>
            </Link>
        </div>

        <div class="mb-4 px-4">
            <p class="pl-4 text-sm font-semibold mb-1 text-hijau">ADMIN</p>
            <Link href="/profil-admin">
                <div class="w-full flex items-center text-hijau h-10 pl-4 {{ Request::is('profil-admin*') ? 'bg-slate-500' : '' }} hover:bg-slate-500 rounded-lg cursor-pointer">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <span class="text-putih ml-3">Profil</span>
                </div>
                </Link>
                @endrole
        </div>

    @role('mahasiswa')
        <div class="mb-4 px-4">
            <p class="pl-4 text-sm font-semibold mb-1 text-hijau">MAHASISWA</p>
            <Link href="/profil">
                <div class="w-full flex items-center text-hijau h-10 pl-4 {{ Request::is('profil*') ? 'bg-slate-500' : '' }} hover:bg-slate-500 rounded-lg cursor-pointer">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <span class="text-putih ml-3">Profil</span>
                </div>
                </Link>
        </div>
    @endrole
    </div>
</div>