<!DOCTYPE html>
<html>

<title>SPK Ekskul</title>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('dist/assets/img/illustrations/rocket-white.png') }}">
</head>

<body class="bg-[#EBF4F6]">
    <div class="h-full bg-gradient-to-r from-[#402E7A] to-[#4C3BCF] rounded-b-[100px] shadow-xl">

        {{-- Navbar --}}
        <nav class="bg-gradient-to-r from-[#402E7A] to-[#4C3BCF] fixed z-10 w-full border-gray-200">
            <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('dist/assets/img/logo.png') }}" class="h-12" alt="Logo" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                        <li>
                            <a href="#home"
                                class="text-xs block py-2 px-3 text-white hover:text-[#3DC2EC] bg-blue-700 rounded md:bg-transparent md:p-0"
                                aria-current="page">HOME</a>
                        </li>
                        <li>
                            <a href="#about"
                                class="text-xs block py-2 px-3 text-white hover:text-[#3DC2EC] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">ABOUT</a>
                        </li>
                        <li>
                            <a href="#information"
                                class="text-xs block py-2 px-3 text-white hover:text-[#3DC2EC] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">EKSTRAKURIKULER</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="home" class="container mx-auto pt-24 pb-16">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="text-[#EBF4F6] py-16 mx-12 md:mx-0" data-aos="fade-right" data-aos-duration="1000">
                    <p class="text-xl">Tidak Pusing Lagi Memilih Ekstrakurikuler</p>
                    <p class="text-5xl font-bold mb-5 mt-2">
                        Sistem Pendukung Keputusan Ekstrakurikuler
                    </p>
                    <a href="{{ route('register') }}" type="button"
                        class="focus:outline-none text-white bg-[#3DC2EC] hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-500 font-medium rounded-l-3xl rounded-br-3xl text-sm px-5 py-2.5 mb-2">
                        Register
                    </a>
                    <a href="{{ route('login') }}" type="button"
                        class="focus:outline-none text-white bg-[#FEAE6F] hover:bg-orange-600 focus:ring-4 focus:ring-orange-500 font-medium rounded-r-3xl rounded-bl-3xl text-sm px-5 py-2.5 mb-2">
                        Login
                    </a>
                </div>
                <div class="overflow-hidden border rounded-3xl shadow-xl mx-12 md:mx-0" data-aos="fade-left"
                    data-aos-duration="1000">
                    <img src="{{ asset('dist/assets/img/home.jpg') }}" alt="" class="object-cover h-full" />
                </div>
            </div>
        </section>
    </div>

    <main class="container mx-auto my-20">
        <!-- about -->
        <section id="about" class="grid grid-cols-1 md:grid-cols-2">
            <div class="overflow-hidden" data-aos="fade-up" data-aos-duration="1200">
                <img src="{{ asset('dist/assets/img/about.png') }}" alt="" class="object-cover rounded-3xl" />
            </div>
            <div class="px-12">
                <p class="text-orange-500">ABOUT</p>
                <p class="text-3xl font-bold text-[#4C3BCF]">
                    Sistem Pendukung Keputusan Ekstrakurikuler.
                </p>
                <p>
                    Aplikasi ini dirancang untuk membantu siswa Yayasan Pendidikan Singosari Delitua dalam memilih
                    kegiatan ekstrakurikuler yang paling sesuai dengan kebutuhan dan aspirasi mereka. Dengan
                    memanfaatkan metode SMART, aplikasi ini memastikan bahwa setiap siswa dapat menentukan pilihan
                    kegiatan berdasarkan kriteria yang terukur, seperti minat, bakat, dan tujuan jangka panjang mereka.
                    Selain itu, aplikasi ini mendukung pengembangan pribadi secara optimal, membantu siswa meningkatkan
                    keterampilan sosial dan akademis mereka, serta mendorong keterlibatan yang lebih aktif dalam
                    berbagai aktivitas sekolah. Dengan demikian, siswa dapat menikmati pengalaman belajar yang lebih
                    menyeluruh dan bermakna.
                </p>
            </div>
        </section>

        <!-- information -->
        <section id="information" class="mt-32">
            <p class="text-center text-3xl font-bold text-[#4C3BCF]">DAFTAR EKSTRAKURIKULER</p>
            <p class="text-center text-orange-500">
                Berikut Adalah Informasi Singkat Tentang Ekstrakurikuler
                Yayasan Pendidikan Singosari Delitua.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-5 justify-items-center border gap-5">
                {{-- @foreach ($ekskul as $item)
                    <a href="{{ route('detail-ekskul', $item->nama_ekskul) }}" class="w-full max-w-lg">
                        <div class="bg-gray-100 hover:bg-gray-200 rounded-xl shadow-xl border h-full flex flex-col"
                            target="blank" data-aos="fade-up" data-aos-duration="1000">
                            <div class="p-5 overflow-hidden rounded-xl flex-grow">
                                <img src="{{ asset('dist/assets/img/ekskul/' . $item->image) }}" alt=""
                                    class="object-cover shadow-lg rounded-xl h-[180px] w-full" />
                                <p class="text-xl font-bold text-[#4C3BCF] my-2">
                                    {{ $item->nama_ekskul }}
                                </p>
                                <p class="text-sm desc">
                                    {{ $item->informasi_ekskul }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach --}}
            </div>

        </section>
    </main>

    <footer class="bg-gradient-to-r from-[#402E7A] to-[#4C3BCF] rounded-t-[100px] shadow-xl">
        <p class="text-center text-white py-2">
            Copyright Reynald Sitepu 2024 All right reserved
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        const descElements = document.querySelectorAll('.desc'); // gunakan class untuk memilih semua elemen
        descElements.forEach((descElement) => {
            const fullText = descElement.innerText; // gunakan innerText untuk mempertahankan format spasi dan enter
            const words = fullText.split(' ');

            // Jika kata lebih dari 15, potong kata yang berlebih dan tambahkan '...'
            if (words.length > 15) {
                const shortenedText = words.slice(0, 15).join(' ') + '...';
                descElement.innerText = shortenedText; // gunakan innerText agar tidak merusak HTML di dalamnya
            }
        });
    </script>


</body>

</html>
