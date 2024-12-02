<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Blog</title>
    <link rel="stylesheet" href="../src/css/output.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-[#F8F9FA] font-opensans overflow-x-hidden">

  <nav>
      <div class="bg-white shadow-xl">
        <div class="flex justify-between items-center px-8 md:px-24 py-4">
          <div class="logo flex justify-center items-center gap-x-4">
            <img src="../images/logo.png" class="w-52 hidden md:block" />
            <img src="../images/logo-mobile.png" class="w-12 md:hidden" />
            <div class="icon-search py-1 px-2 rounded-full bg-[#F8F9FA]">
              <a
                href=""
                class="fa-solid fa-magnifying-glass text-[#808385]"
              ></a>
            </div>
          </div>
          <div class="navigasi flex gap-x-4 justify-center items-center">
            <div>
              <a href=""><img src="../images/user1.png" class="w-12 mr-2" /></a>
            </div>
            <div class="icon-bell">
              <a href="" class="fa-solid fa-bell text-2xl text-[#808385]"></a>
            </div>
            <button id="hamburger-menu" class="hamburger-menu">
              <i class="fa-solid fa-bars text-2xl"></i>
            </button>
          </div>
        </div>
      </div>

      <div
        id="menu-accordion"
        class="menu-accordion bg-white px-8 md:px-24 py-4 hidden"
      >
        <ul class="space-y-4">
          <li><a href="" class="text-[#595C5F] text-sm font-bold">HOME</a></li>
          <li>
            <a href="" class="text-[#595C5F] text-sm font-bold relative"
              >BERITA
              <span
                class="absolute -top-2 text-[10px] bg-red-600 text-white px-2 rounded-full"
                >NEW</span
              >
            </a>
          </li>
          <li><a href="" class="text-[#595C5F] text-sm font-bold">AKUN</a></li>
          <li>
            <a href="" class="text-[#595C5F] text-sm font-bold">KONTAK</a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="home">
      <div class="container mx-auto md:px-24 mb-24">
        <div class="content grid md:grid-cols-4 mt-8">
          <div class="profile-info col-span-1">
            <div class="profile mx-8 bg-white rounded-xl shadow-xl h-fit py-4">
              <div class="account">
                <img src="../images/user1.png" class="w-32 mx-auto" />
                <p class="text-[#14A7A0] text-center text-sm font-bold">
                  ROOKIE III
                </p>
                <h2 class="text-center font-bold text-lg px-8">
                  MUHAMMAD HAMKA RIFAI
                </h2>
                <hr class="mx-4 my-2" />
              </div>
              <div class="navigation">
                <ul class="space-y-6 mt-6">
                  <li class="px-6 text-[#595C5F] font-semibold">
                    <a href=""
                      ><i class="fa-solid fa-user mr-2"></i>My Profile</a
                    >
                  </li>
                  <li class="px-6 text-[#595C5F] font-semibold">
                    <a href=""
                      ><i class="fa-solid fa-comments mr-2"></i>My Blog</a
                    >
                  </li>
                  <li class="px-6 text-[#595C5F] font-semibold">
                    <a href=""
                      ><i class="fa-solid fa-bookmark mr-2"></i>My Bookmark</a
                    >
                  </li>
                  <li class="px-6 text-[#595C5F] font-semibold">
                    <a href=""
                      ><i class="fa-solid fa-circle-question mr-2"></i>My
                      Questions</a
                    >
                  </li>
                </ul>
                <hr class="mx-4 mt-4 mb-2" />
                <div class="buttons flex flex-col justify-center items-center">
                  <button
                    class="rounded-lg w-44 px-3 py-2 mt-2 border border-[#595C5F] text-[#595C5F]"
                  >
                    Gabung Komunitas
                  </button>
                  <button
                    class="rounded-lg w-44 px-3 py-2 mt-2 border border-[#595C5F] text-[#595C5F]"
                  >
                    Butuh Bantuan?
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="thread-menu md:col-span-3">
            <div
              class="berita-pilihan flex flex-col md:flex-row justify-between items-center mt-12 md:mt-0"
            >
              <div class="title">
                <h1 class="text-[#595C5F] text-2xl font-bold">
                  Berita Pilihan Hari Ini
                </h1>
              </div>
              <div class="navigasi flex flex-col md:flex-row gap-2 mt-4">
                <button
                  class="border border-[#14A7A0] bg-transparent text-[#14A7A0] rounded-lg px-2 py-1"
                >
                  <i class="fa-solid fa-list mr-2"></i>Lihat Semua Berita
                </button>
                <button
                  class="text-white border border-[#14A7A0] bg-[#14A7A0] rounded-lg px-2 py-1"
                >
                  <i class="fa-regular fa-square-plus mr-2"></i>Buat Berita
                </button>
              </div>
            </div>

            <div
              class="berita-utama container px-4 md:px-0 mx-auto flex justify-between flex-col md:flex-row gap-x-4 items-start mt-5"
            >
              <div class="berita w-full md:min-w-[550px]">
                <div
                  class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border"
                >
                  <div class="profile flex items-center">
                    <div class="image">
                      <img src="../images/user1.png" class="w-12 h-12" />
                    </div>
                    <div class="title flex flex-col ml-1">
                      <h1 class="text-black font-bold text-sm md:text-base">
                        Muhammad Hamka
                        <span class="text-[#595C5F] text-xs"
                          >| Fullstack Web Developer</span
                        >
                      </h1>
                      <h1 class="text-[#595C5F] text-sm">7 November 2024</h1>
                    </div>
                  </div>
                  <div class="hero-image mt-4 -mx-4">
                    <img src="../images/programmer1.png" class="w-full" />
                  </div>
                  <div class="tags flex gap-2 text-[#595C5F] mt-4 flex-wrap">
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #programming
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #coding
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #tips
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #website
                      </p></a
                    >
                  </div>
                  <div class="judul-berita mt-4">
                    <a href="blog.html" class="text-xl md:text-2xl font-bold">
                      10 Kesalahan Umum Programmer Pemula (Jangan Sampai
                      Terjebak!)
                    </a>
                  </div>
                  <div class="reaksi mt-4 flex justify-between">
                    <div class="likecomment flex gap-x-4">
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-heart text-red-500 mr-2"></i>200
                        Reaksi
                      </p>
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-comment text-blue-500 mr-2"></i>76
                        Komentar
                      </p>
                    </div>
                    <div class="simpan">
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-bookmark text-gray-500 mr-2"></i
                        >Simpan
                      </p>
                    </div>
                  </div>
                </div>
                <div
                  class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border"
                >
                  <div class="profile flex items-center">
                    <div class="image">
                      <img src="../images/user1.png" class="w-12 h-12" />
                    </div>
                    <div class="title flex flex-col ml-1">
                      <h1 class="text-black font-bold text-sm md:text-base">
                        Muhammad Hamka
                        <span class="text-[#595C5F] text-xs"
                          >| Fullstack Web Developer</span
                        >
                      </h1>
                      <h1 class="text-[#595C5F] text-sm">7 November 2024</h1>
                    </div>
                  </div>
                  <div class="hero-image mt-4 -mx-4">
                    <img src="../images/programmer41.jpg" class="w-full" />
                  </div>
                  <div class="tags flex gap-2 text-[#595C5F] mt-4 flex-wrap">
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #programming
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #coding
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #tips
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #website
                      </p></a
                    >
                  </div>
                  <div class="judul-berita mt-4">
                    <a href="blog.html" class="text-xl md:text-2xl font-bold">
                      Desain Mudah dan Interaktif? Figma Jawabannya!
                    </a>
                  </div>
                  <div class="reaksi mt-4 flex justify-between">
                    <div class="likecomment flex gap-x-4">
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-heart text-red-500 mr-2"></i>200
                        Reaksi
                      </p>
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-comment text-blue-500 mr-2"></i>76
                        Komentar
                      </p>
                    </div>
                    <div class="simpan">
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-bookmark text-gray-500 mr-2"></i
                        >Simpan
                      </p>
                    </div>
                  </div>
                </div>
                <div
                  class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border"
                >
                  <div class="profile flex items-center">
                    <div class="image">
                      <img src="../images/user1.png" class="w-12 h-12" />
                    </div>
                    <div class="title flex flex-col ml-1">
                      <h1 class="text-black font-bold text-sm md:text-base">
                        Muhammad Hamka
                        <span class="text-[#595C5F] text-xs"
                          >| Fullstack Web Developer</span
                        >
                      </h1>
                      <h1 class="text-[#595C5F] text-sm">7 November 2024</h1>
                    </div>
                  </div>
                  <div class="hero-image mt-4 -mx-4">
                    <img src="../images/programmer3.jpg" class="w-full" />
                  </div>
                  <div class="tags flex gap-2 text-[#595C5F] mt-4 flex-wrap">
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #programming
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #coding
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #tips
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #website
                      </p></a
                    >
                  </div>
                  <div class="judul-berita mt-4">
                    <a href="blog.html" class="text-xl md:text-2xl font-bold">
                      Apa Itu GitHub? Simak Fungsinya dan Cara Memakainya!
                    </a>
                  </div>
                  <div class="reaksi mt-4 flex justify-between">
                    <div class="likecomment flex gap-x-4">
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-heart text-red-500 mr-2"></i>200
                        Reaksi
                      </p>
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-comment text-blue-500 mr-2"></i>76
                        Komentar
                      </p>
                    </div>
                    <div class="simpan">
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-bookmark text-gray-500 mr-2"></i
                        >Simpan
                      </p>
                    </div>
                  </div>
                </div>
                <div
                  class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border"
                >
                  <div class="profile flex items-center">
                    <div class="image">
                      <img src="../images/user1.png" class="w-12 h-12" />
                    </div>
                    <div class="title flex flex-col ml-1">
                      <h1 class="text-black font-bold text-sm md:text-base">
                        Muhammad Hamka
                        <span class="text-[#595C5F] text-xs"
                          >| Fullstack Web Developer</span
                        >
                      </h1>
                      <h1 class="text-[#595C5F] text-sm">7 November 2024</h1>
                    </div>
                  </div>
                  <div class="hero-image mt-4 -mx-4">
                    <img src="../images/programmer2.png" class="w-full" />
                  </div>
                  <div class="tags flex gap-2 text-[#595C5F] mt-4 flex-wrap">
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #programming
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #coding
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #tips
                      </p></a
                    >
                    <a href=""
                      ><p class="border rounded-full px-4 py-1 text-xs">
                        #website
                      </p></a
                    >
                  </div>
                  <div class="judul-berita mt-4">
                    <a href="blog.html" class="text-xl md:text-2xl font-bold">
                      Cara Mengintegerasikan Stack Overflow Dengan GitHub
                      Copilot
                    </a>
                  </div>
                  <div class="reaksi mt-4 flex justify-between">
                    <div class="likecomment flex gap-x-4">
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-heart text-red-500 mr-2"></i>200
                        Reaksi
                      </p>
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-comment text-blue-500 mr-2"></i>76
                        Komentar
                      </p>
                    </div>
                    <div class="simpan">
                      <p class="text-xs text-[#595C5F]">
                        <i class="fa-solid fa-bookmark text-gray-500 mr-2"></i
                        >Simpan
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="berita-aside w-full md:min-w-[265px]">
                <div
                  class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
                  <div class="title">
                    <h2 class="font-bold text-lg">Sedang Ramai</h2>
                    <div class="berita-1 group">
                      <div class="flex flex-col">
                        <a
                          href=""
                          class="text-[#595C5F] mt-4 font-bold group-hover:text-black transition-all ease-in-out"
                          >Tutorial Membuat Full Stack Application dengan Node
                          JS Express dan MySQL</a
                        >
                        <a
                          href=""
                          class="text-[#595C5F] text-sm mt-1 group-hover:text-black transition-all ease-in-out"
                          >24 Reactions • 6 Comments</a
                        >
                      </div>
                      <hr class="mt-4" />
                    </div>
                    <div class="berita-2 group">
                      <div class="flex flex-col">
                        <a
                          href=""
                          class="text-[#595C5F] mt-4 font-bold group-hover:text-black transition-all ease-in-out"
                          >Apa Itu CORS? Panduan Lengkap untuk Pemula Dalam Pengembangan Web</a
                        >
                        <a
                          href=""
                          class="text-[#595C5F] text-sm mt-1 group-hover:text-black transition-all ease-in-out"
                          >34 Reactions • 8 Comments</a
                        >
                      </div>
                      <hr class="mt-4" />
                    </div>
                    <div class="berita-3 group">
                      <div class="flex flex-col">
                        <a
                          href=""
                          class="text-[#595C5F] mt-4 font-bold group-hover:text-black transition-all ease-in-out"
                          >Kamu Anak IT? Bingung Cari Topik Tugas Akhir? Sini Saya BantuL</a
                        >
                        <a
                          href=""
                          class="text-[#595C5F] text-sm mt-1 group-hover:text-black transition-all ease-in-out"
                          >56 Reactions • 9 Comments</a
                        >
                      </div>
                      <hr class="mt-4" />
                    </div>
                    <div class="berita-4 group">
                      <div class="flex flex-col">
                        <a
                          href=""
                          class="text-[#595C5F] mt-4 font-bold group-hover:text-black transition-all ease-in-out"
                          >Gmail Kini Hadirkan AI untuk Bantu Tulis Email Lebih Mudah!</a
                        >
                        <a
                          href=""
                          class="text-[#595C5F] text-sm mt-1 group-hover:text-black transition-all ease-in-out"
                          >12 Reactions • 2 Comments</a
                        >
                      </div>
                      <hr class="mt-4" />
                    </div>
                  </div>
                </div>

                <div class="user-teraktif">
                    <h1 class="text-[#595C5F] text-xl font-bold">Author Teraktif</h1>
                    <p class="text-[#595C5F] text-sm mt-1">Menulis berita <span class="text-[#14A7A0]">paling banyak</span></p>

                    <div class="user-1">
                        <div class="card relative py-2 px-4 mt-6 bg-white rounded-xl flex items-center gap-x-2">
                            <img src="../images/user1.png" class="w-12 h-12">
                            <h1 class="text-[#595C5F] font-bold">Muhammad Hamka</h1>
                            <span class="absolute -top-3 -left-2 bg-white border rounded-lg px-2">1</span>
                        </div>
                    </div>
                    <div class="user-2">
                        <div class="card relative py-2 px-4 mt-4 bg-white rounded-xl flex items-center gap-x-2">
                            <img src="../images/profile01.jpg" class="w-12 h-12 rounded-full mr-2">
                            <h1 class="text-[#595C5F] font-bold">Gojou Satoru</h1>
                            <span class="absolute -top-3 -left-2 bg-white border rounded-lg px-2">2</span>
                        </div>
                    </div>
                    <div class="user-3">
                        <div class="card relative py-2 px-4 mt-4 bg-white rounded-xl flex items-center gap-x-2">
                            <img src="../images/profile02.jpg" class="w-12 h-12 rounded-full mr-2">
                            <h1 class="text-[#595C5F] font-bold">Zahra</h1>
                            <span class="absolute -top-3 -left-2 bg-white border rounded-lg px-2">3</span>
                        </div>
                    </div>
                    <div class="user-4">
                        <div class="card relative py-2 px-4 mt-4 bg-white rounded-xl flex items-center gap-x-2">
                            <img src="../images/profile03.jpg" class="w-12 h-12 rounded-full mr-2">
                            <h1 class="text-[#595C5F] font-bold">Kibutsuji Muzan</h1>
                            <span class="absolute -top-3 -left-2 bg-white border rounded-lg px-2">4</span>
                        </div>
                    </div>
                </div>

                <div
                  class="card bg-white py-4 px-4 mt-4 w-full rounded-lg border">
                  <div class="title">
                    <h2 class="font-bold text-lg">Tags Teratas</h2>
                    <div class="tags mt-2">
                      <div class="flex flex-col gap-y-2">
                        <a href="" class="text-[#595C5F] hover:text-black transition-all ease-in-out">#programming</a>
                        <a href="" class="text-[#595C5F] hover:text-black transition-all ease-in-out">#tutorial</a>
                        <a href="" class="text-[#595C5F] hover:text-black transition-all ease-in-out">#tailwindcss</a>
                        <a href="" class="text-[#595C5F] hover:text-black transition-all ease-in-out">#github</a>
                        <a href="" class="text-[#595C5F] hover:text-black transition-all ease-in-out">#boostraps</a>
                        <a href="" class="text-[#595C5F] hover:text-black transition-all ease-in-out">#javascript</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        <footer class="bg-white text-gray-300 py-10 mt-24">
  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- About -->
    <div>
      <img src="../images/logo.png" alt="">
      <p class="text-sm text-[#595C5F]">
        Kami adalah perusahaan yang bergerak di bidang teknologi, menyediakan solusi digital untuk kebutuhan Anda.
      </p>
    </div>


    <!-- Contact Information -->
    <div>
      <h3 class="text-xl font-semibold text-black mb-4">Informasi Kontak</h3>
      <ul class="space-y-2">
        <li class="text-[#595C5F]"><i class="fas fa-phone-alt mr-2 text-[#595C5F]"></i> +62 812-1398-4587</li>
        <li class="text-[#595C5F]"><i class="fas fa-envelope mr-2 text-[#595C5F]"></i> codepolitan.com</li>
        <li class="text-[#595C5F]"><i class="fas fa-map-marker-alt mr-2 text-[#595C5F]"></i> Purworejo, Jawa Tengah</li>
      </ul>
    </div>

        <!-- Navigation -->
    <div>
      <h3 class="text-xl font-semibold text-black mb-4">Navigasi</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline hover:text-black text-[#595C5F]">Home</a></li>
        <li><a href="#" class="hover:underline hover:text-black text-[#595C5F]">Berita</a></li>
        <li><a href="#" class="hover:underline hover:text-black text-[#595C5F]">Akun</a></li>
        <li><a href="#" class="hover:underline hover:text-black text-[#595C5F]">Kontak</a></li>
      </ul>
    </div>

    <!-- Subscribe -->
    <div>
      <h3 class="text-xl font-semibold text-black mb-4">Berlangganan</h3>
      <p class="text-sm mb-4 text-[#595C5F]">Dapatkan update terbaru dari kami langsung ke email Anda.</p>
      <form class="flex flex-col space-y-2">
        <input 
          type="email" 
          placeholder="Email Anda" 
          class="p-2 rounded bg-white border border-gray-300 text-[#595C5F] focus:ring-2 focus:ring-blue-500"
        />
        <button 
          type="submit" 
          class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700"
        >
          Langganan
        </button>
      </form>
    </div>

    
  </div>

  <div class="border-t border-gray-700 mt-8 pt-6">
    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
      <p class="text-sm text-gray-400">© 2024 Website. Semua Hak Dilindungi.</p>
      <ul class="flex space-x-4 mt-4 md:mt-0">
        <li><a href="#" class="hover:text-[#595C5F]"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#" class="hover:text-[#595C5F]"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#" class="hover:text-[#595C5F]"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#" class="hover:text-[#595C5F]"><i class="fab fa-linkedin"></i></a></li>
      </ul>
    </div>
  </div>
</footer>

    <script src="script.js"></script>
  </body>
</html>
