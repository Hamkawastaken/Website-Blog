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
            <a href="index.php" class="hidden md:flex justify-center items-center gap-x-4">
              <img src="../images/logo-mobile.png" class="w-12 hidden md:block" />
            </a>
            <a href="index.php"><img src="../images/logo-mobile.png" class="w-12 md:hidden"/></a>
            <div class="icon-search py-1 px-2 rounded-full bg-[#F8F9FA]">
              <a
                href=""
                class="fa-solid fa-magnifying-glass text-[#808385]"
              ></a>
            </div>
          </div>
          <div class="navigasi flex gap-x-4 justify-center items-center">
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
          <li><a href="index.php" class="text-[#595C5F] text-sm font-bold">HOME</a></li>
          <li>
            <a href="index.php" class="text-[#595C5F] text-sm font-bold relative"
              >BERITA
              <span
                class="absolute -top-2 text-[10px] bg-red-600 text-white px-2 rounded-full"
                >NEW</span
              >
            </a>
          </li>
          <li><a href="detail-author.php" class="text-[#595C5F] text-sm font-bold">AKUN</a></li>
          <li>
            <a href="contact.php" class="text-[#595C5F] text-sm font-bold">KONTAK</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="bg-[#14A7A0] w-full h-56"></div>

    <div class="detail-author container mx-auto flex flex-col md:flex-row px-4 md:px-20 justify-center gap-5 -mt-36">
        
        <main class="w-full md:w-9/12">

            <div class="profile bg-white rounded-lg p-4">
                <div class="image mx-auto md:mx-10 mt-5 flex flex-col md:flex-row md:items-end">
                    <img src="../images/profile01.jpg" class="w-36 h-36 ml-4 md:ml-0 rounded-full">
                    <div class="title ml-5">
                        <p class="font-bold text-xl md:text-3xl mt-2 md:mb-2">Muhammad Hamka Rifa'i</p>
                        <div class="subtitle flex items-center">
                            <p class="bg-[#14A7A0] text-white w-fit font-bold px-2 py-1 rounded-full text text-xs md:text-xs mr-2">Rookie III</p>
                            <p class="font-thin md:font-extralight text-xs mr-2">| Fullstack Web Developer</p>
                        </div>
                    </div>
                </div>
                <hr class="mt-6 mb-4">
                <div class="bio">
                  <i class="text-[#595C5F] px-2 text-sm">"Sesungguhnya setelah kesusahan, pasti akan ada kemudahan ☝"</i>
                </div>
            </div>

            <div class="published mt-4">
                <h2 class="border-b border-[#14A7A0] text-[#14A7A0] mx-4 w-fit">Published</h2>
                <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border mt-4">
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
                <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border mt-4">
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
                <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border mt-4">
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
                <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border mt-4">
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
            </div>

        </main>


        <aside class="w-full md:w-1/5">
          <div class="social-media">
            
            <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
              <h1 class="text-lg font-bold text-[#595C5F]">Sosial Media</h1>
              <div class="logo flex gap-x-2 mt-2">
                <a href="" class="bg-[#EAEEF3] fa-brands fa-instagram text-xl text-[#595C5F] px-2 py-2 rounded-full"></a>
                <a href="" class=" bg-[#EAEEF3] fa-brands fa-linkedin text-xl text-[#595C5F] px-2 py-2 rounded-full"></a>
              </div>
            </div>

            <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
              <h1 class="text-lg font-bold text-[#595C5F]">Aktivitas</h1>
              <div class="flex flex-col gap-y-1 mt-2 px-1">
                <div class="text-[#595C5F]"><i class="fa-solid fa-file-invoice text-[#14A7A0] mr-2"></i>43 Diskusi</div>
                <div class="text-[#595C5F]"><i class="fa-solid fa-comment text-sky-500 mr-2"></i>57 Komentar</div>
                <div class="text-[#595C5F]"><i class="fa-solid fa-heart text-pink-500 mr-2"></i>76 Reaksi</div>
              </div>
            </div>

            <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
              <h1 class="text-lg font-bold text-[#595C5F]">Keahlian</h1>
              <div class="mt-2">
                              <div class=" bg-gray-300  rounded-lg overflow-hidden mb-2">
                <div class="bg-[#14A7A0] h-6 px-2 text-white text-xs py-1 font-bold" style="width: 70%;">PHP - 70%</div>
              </div>
              <div class=" bg-gray-300  rounded-lg overflow-hidden mb-2">
                <div class="bg-[#14A7A0] h-6 px-2 text-white text-xs py-1 font-bold" style="width: 50%;">JS - 50%</div>
              </div>
              <div class=" bg-gray-300  rounded-lg overflow-hidden mb-2">
                <div class="bg-[#14A7A0] h-6 px-2 text-white text-xs py-1 font-bold" style="width: 70%;">MySQL - 70%</div>
              </div>
              </div>
            </div>

            <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
              <h1 class="text-lg font-bold text-[#595C5F]">Pekerjaan</h1>
              <i class="text-[#595C5F]">Belum mempunyai pekerjaan</i>
            </div>

            <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
              <h1 class="text-lg font-bold text-[#595C5F]">Edukasi</h1>
              <i class="text-[#595C5F]">Belum memasukkan riwayat edukasi</i>
            </div>

          </div>
        </aside>

    </div>

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