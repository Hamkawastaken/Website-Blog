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
            <a href="index.php"><img src="../images/logo-mobile.png" class="w-12 md:hidden" /> </a>
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


    <section class="blog">
        <div class="container mx-auto flex flex-col md:flex-row gap-2 max-w-screen-lg mt-12 mb-24">

        <aside class="w-full md:overflow-hidden flex justify-center md:w-1/12">
            <div class="card flex md:flex-col w-fit gap-x-8 mx-auto bg-white rounded-xl border md:fixed py-4 px-4 md:p-4">
                <div class="like flex flex-col justify-center items-center md:my-2 group">
                    <a href="" class="rounded-full border border-[#595C5F] group-hover:bg-[#595c5f] transition-all ease-in-out py-2 px-3">
                        <i class="fa-solid fa-heart text-[#595c5f] group-hover:text-white transition-all ease-in-out"></i>
                    </a>
                    <p class="text-[#595c5f] mt-1">6</p>
                </div>
                <div class="comment flex flex-col justify-center items-center md:my-2 group">
                    <a href="" class="rounded-full border border-[#595C5F] group-hover:bg-[#595c5f] transition-all ease-in-out py-2 px-3">
                        <i class="fa-solid fa-comment text-[#595c5f] group-hover:text-white transition-all ease-in-out"></i>
                    </a>
                    <p class="text-[#595c5f] mt-1">6</p>
                </div>
                <div class="bookmark flex flex-col justify-center items-center md:my-2 group">
                    <a href="" class="rounded-full border border-[#595C5F] group-hover:bg-[#595c5f] transition-all ease-in-out py-2 px-3">
                        <i class="fa-solid fa-bookmark text-[#595c5f] group-hover:text-white transition-all ease-in-out"></i>
                    </a>
                    <p class="text-[#595c5f] mt-1">6</p>
                </div>
                <div class="share flex flex-col justify-center items-center md:my-2 group">
                    <a href="" class="rounded-full border border-[#595C5F] group-hover:bg-[#595c5f] transition-all ease-in-out py-2 px-3">
                        <i class="fa-solid fa-share text-[#595c5f] group-hover:text-white transition-all ease-in-out"></i>
                    </a>
                    <p class="text-[#595c5f] mt-1">6</p>
                </div>
            </div>
        </aside>

            <main class="w-full mx-auto px-2">
                <div class="card bg-white rounded-lg border md:px-10 py-6">
                    <div class="navigasi flex px-4 md:px-0">
                        <a href="index.html" class="text-[#14A7A0] text-sm md:text-base">Home</a>
                        <p class="mx-2 text-sm md:text-base">></p>
                        <p class="text-[#595c5f] text-sm md:text-base truncate">10 Kesalahan Umum Programmer Pemula (Jangan Sampai
                        Terjebak!)</p>
                    </div>
                    <hr class="mx-4 md:mx-0 font-bold my-4">
                    <div class="tags flex gap-x-2 px-4 md:px-0">
                        <a href="index.html" class="text-[#595c5f] text-sm md:text-base">#programming</a>
                        <a href="index.html" class="text-[#595c5f] text-sm md:text-base">#coding</a>
                        <a href="index.html" class="text-[#595c5f] text-sm md:text-base">#tips</a>
                        <a href="index.html" class="text-[#595c5f] text-sm md:text-base">#website</a>
                    </div>
                    <hr class="mx-4 md:mx-0 font-bold my-4">
                    <div class="reaction mt-4 flex justify-between px-4 md:px-0">
                        <div class="likecomment flex gap-x-4">
                            <p class="text-xs text-[#595C5F]">
                            <i class="fa-solid fa-heart text-red-500 mr-2"></i>200 Reaksi
                            </p>
                            <p class="text-xs text-[#595C5F]">
                            <i class="fa-solid fa-comment text-blue-500 mr-2"></i>76 Komentar
                            </p>
                        </div>
                    </div>
                    <div class="title mt-4 px-4 md:px-0">
                        <h1 class="text-[#595C5F] text-2xl md:text-3xl font-bold line-clamp-3">10 Kesalahan Umum Programmer Pemula (Jangan Sampai Terjebak!)</h1>
                    </div>
                    <div class="author flex gap-x-2 items-center my-4 px-4 md:px-0">
                        <div class="author-image"><img src="../images/profile01.jpg" class="w-8 h-8 rounded-full"></div>
                        <div class="author-info flex flex-col">
                            <h1 class="text-[#595C5F] font-semibold text-sm md:text-base">
                            Muhammad Hamka
                            <span class="text-[#595C5F] font-extralight text-xs">| 4 November 2024</span>
                            </h1>
                        </div>
                    </div>
                    <div class="hero-image px-4 md:px-0">
                        <img src="../images/programmer1.png" class="rounded-xl">
                    </div>
                    <div class="px-4 md:px-0">
                        <p class="text-base md:text-lg mt-4">Halo, teman-teman! Selamat datang di dunia pemrograman! Meskipun menarik, perjalanan ini juga penuh dengan tantangan. Untuk membantu Anda menghindari beberapa jebakan, berikut adalah sepuluh kesalahan umum yang sering dilakukan oleh programmer pemula, beserta cara untuk menghindarinya.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">1. Tidak Belajar Bahasa Inggris</h1>
                        <p class="text-base md:text-lg mt-4">Bahasa Inggris adalah bahasa utama yang digunakan dalam pemrograman. Sebagian besar dokumentasi, pesan error, dan forum bantuan menggunakan bahasa ini. Oleh karena itu, penting untuk mempelajari bahasa Inggris, terutama istilah-istilah teknis, agar Anda dapat memahami kesalahan yang terjadi dan mencari solusi yang tepat.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">2. Malas Membaca Pesan Error</h1>
                        <p class="text-base md:text-lg mt-4">Seringkali, programmer pemula langsung merasa panik saat menemukan pesan error. Namun, penting untuk meluangkan waktu untuk membaca dan memahami pesan tersebut. Pesan error biasanya memberikan petunjuk yang berguna mengenai penyebab masalah, sehingga Anda dapat mendiagnosis dan menyelesaikan permasalahan lebih cepat.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">3. Mengabaikan Dokumentasi Resmi</h1>
                        <p class="text-base md:text-lg mt-4">Dokumentasi resmi adalah sumber informasi yang sangat berharga. Di dalamnya terdapat panduan penggunaan, versi terkini, dan informasi penting lainnya. Membaca dokumentasi resmi akan membantu Anda memahami fitur dan fungsi teknologi yang Anda gunakan, sehingga mengurangi kemungkinan kesalahan.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">4. Menghafal Kode, Bukan Memahami Konsep</h1>
                        <p class="text-base md:text-lg mt-4">Pemrograman bukanlah tentang menghafal kode. Sebaliknya, penting untuk memahami konsep dasar seperti variabel dan fungsi. Dengan pemahaman yang kuat, Anda akan lebih mudah mencari solusi di internet dan menerapkannya dalam proyek Anda.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">5. Tidak Memahami Konsep Fundamental</h1>
                        <p class="text-base md:text-lg mt-4">Sebagai pemula, sangat penting untuk memahami konsep-konsep dasar pemrograman, seperti struktur data dan algoritma. Memiliki pemahaman yang kuat tentang dasar-dasar ini akan memudahkan Anda ketika menghadapi tantangan yang lebih kompleks di kemudian hari.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">6. Tidak Mengenal Tools Pendukung</h1>
                        <p class="text-base md:text-lg mt-4">Tools seperti code editor, web browser, dan developer tools sangat penting dalam proses pengembangan. Memahami dan mengenali tools ini akan meningkatkan produktivitas dan efisiensi Anda. Luangkan waktu untuk mempelajari cara menggunakan tools tersebut secara optimal.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">7. Mengabaikan Version Control System (VCS)</h1>
                        <p class="text-base md:text-lg mt-4">Version control system, seperti GitHub, adalah alat yang sangat penting untuk menyimpan dan mengelola kode. VCS memungkinkan Anda untuk melacak perubahan, mengembalikan versi sebelumnya, dan berkolaborasi dengan tim. Oleh karena itu, pelajari dasar-dasar Git dan manfaatkan platform seperti GitHub untuk proyek Anda.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">8. Terjebak di Tutorial Hell</h1>
                        <p class="text-base md:text-lg mt-4">Banyak programmer pemula terjebak dalam siklus menonton tutorial tanpa berani mencoba membuat proyek sendiri. Untuk menghindari hal ini, lakukan empat langkah berikut:
                        Tonton dan pahami tutorial hingga selesai.Ketik kode sambil mem-pause video untuk memahami setiap barisnya.Cobalah untuk membuat sesuatu tanpa menonton tutorial.Buat proyek yang berbeda dan unik sebagai latihan.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">9. Kurangnya Kepercayaan Diri</h1>
                        <p class="text-base md:text-lg mt-4">Sering kali, programmer pemula merasa tidak percaya diri dengan hasil karyanya. Penting untuk diingat bahwa tidak ada proyek yang sempurna pada awalnya. Beri diri Anda waktu untuk berkembang dan hargai setiap kemajuan yang Anda capai dalam perjalanan belajar ini.</p>
                        <h1 class="text-black font-bold text-xl md:text-2xl mt-4">10. Membandingkan Diri dengan Orang Lain</h1>
                        <p class="text-base md:text-lg mt-4">Membandingkan diri Anda dengan orang lain hanya akan menimbulkan perasaan tidak percaya diri. Setiap orang memiliki perjalanan yang berbeda dalam belajar pemrograman. Fokuslah pada perkembangan Anda sendiri dan hargai setiap pencapaian yang telah Anda raih.</p>
                        <p class="text-base md:text-lg mt-4">Nah, itu dia 10 kesalahan yang sering dilakukan oleh programmer pemula. Ingat, belajar itu proses, jadi nikmati setiap langkah yang kamu ambil! Semoga bermanfaat dan happy coding!</p>
                    </div>
                </div>
            </main>

            <aside class="md:w-1/3 w-full mx-auto px-2">
                <div class="author-blog bg-white pb-4 rounded-lg">
                  <div class="bg-[#EAEEF3] w-full h-16 rounded-t-lg"></div>
                  <a href="" class="flex justify-center items-center"><img src="../images/user1.png" class="w-24 h-24 -mt-12 rounded-full"></a>
                  <h2 class="text-center text-black font-bold text-lg mx-4">MUHAMMAD HAMKA RIFAI</h2>
                  <p class="bg-[#14A7A0] text-white w-fit mx-auto px-2 py-1 rounded-full text-center text-xs font-bold mt-2 mb-4">ROOKIE III</p>
                </div>

                <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg mt-3">
                  <div class="title">
                    <h2 class="font-bold text-lg">Lainnya Dari MUHAMMAD HAMKA RIFAI</h2>
                    <div class="berita-1 group">
                      <div class="flex flex-col">
                        <a href="" class="text-[#595C5F] mt-4 font-bold group-hover:text-black transition-all ease-in-out">Tutorial Membuat Full Stack Application dengan Node JS Express dan MySQL</a>
                        <a href="" class="text-[#595C5F] text-sm mt-1 group-hover:text-black transition-all ease-in-out">24 Reactions • 6 Comments</a>
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
                  </div>
                </div>

                <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg mt-3">
                  <div class="title">
                    <h2 class="font-bold text-lg">Berita Terbaru</h2>
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

            </aside>
        </div>
    </section>

        <footer class="bg-white text-gray-300 py-10">
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