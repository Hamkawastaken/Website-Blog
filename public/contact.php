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

<main class="bg-gray-100 py-8">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Hubungi Kami</h2>
    <p class="text-gray-600 mb-8 text-center">Silakan isi formulir di bawah ini untuk menghubungi kami.</p>

    <!-- Info Kontak -->
    <div class="flex mx-auto justify-center items-center gap-6">
      <div class="text-center w-52 h-52 p-4">
        <div class="bg-blue-100 text-blue-600 w-16 h-16 mx-auto flex items-center justify-center rounded-full mb-4">
          <i class="fas fa-phone-alt text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-700">Telepon</h3>
        <p class="text-gray-500">+62 812-1498-4587</p>
      </div>

      <div class="text-center w-52 h-52 p-4">
        <div class="bg-green-100 text-green-600 w-16 h-16 mx-auto flex items-center justify-center rounded-full mb-4">
          <i class="fas fa-envelope text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-700">Email</h3>
        <p class="text-gray-500">hamkarifai49@gmail.com</p>
      </div>

      <div class="text-center w-52 h-52 p-4">
        <div class="bg-red-100 text-red-600 w-16 h-16 mx-auto flex items-center justify-center rounded-full mb-4">
          <i class="fas fa-map-marker-alt text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-700">Alamat</h3>
        <p class="text-gray-500">Purworejo, Jateng</p>
      </div>
    </div>

    <!-- Form Kontak -->
    <form action="#" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
        <input
          type="text"
          id="name"
          name="name"
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
          placeholder="Nama Anda"
          required
        />
      </div>

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
          placeholder="Email Anda"
          required
        />
      </div>

      <div class="mb-4">
        <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
        <textarea
          id="message"
          name="message"
          rows="4"
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
          placeholder="Tulis pesan Anda di sini"
          required
        ></textarea>
      </div>

      <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none"
      >
        Kirim
      </button>
    </form>
  </div>
</main>

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
