<?php

require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Post.php';
require_once __DIR__ . '/../Model/Category.php';

// Ambil category_id dari URL
$category_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Inisialisasi Post dan Category
$postModel = new Post();
$categoryModel = new Category();

// Ambil posts berdasarkan category
$posts = $postModel->getPostsByCategory($category_id);

// Ambil detail kategori
$category = $categoryModel->find($category_id);

// Ambil semua kategori untuk sidebar
$categories = $categoryModel->all();
$articleCounts = $postModel->getArticleCountByCategory();

$post = new Post();
$topAuthors = $post->getTopAuthors(5);



?>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body class="bg-[#F8F9FA] font-opensans overflow-x-hidden">

  <nav>
      <div class="bg-white shadow-xl">
        <div class="flex justify-between items-center px-8 md:px-24 py-4">
          <div class="logo flex justify-center items-center gap-x-4">
            <a href="index.php" class="hidden md:flex justify-center items-center gap-x-4">
              <img src="../images/logo-mobile.png" class="w-12 hidden md:block" />
            </a>
            <img src="../images/logo-mobile.png" class="w-12 md:hidden" />
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

    <section class="home">
      <div class="container mx-auto md:px-24 mb-24">
        <div class="content grid md:grid-cols-4 mt-8">
          <div class="profile-info col-span-1">
            <div class="profile mx-8 bg-white rounded-xl shadow-xl h-fit py-4">
              <div class="account">
                <?php if(isset($_SESSION['id_user'])): ?>
                    <img src="../images/<?= $_SESSION['avatar'] ?? '../images/default-avatar.png'; ?>" class="w-24 h-24 object-cover mx-auto rounded-full" />
                    <p class="text-[#14A7A0] text-center text-sm font-bold mt-2">
                        <?php echo $_SESSION['user_level'] ?? 'ROOKIE I'; ?>
                    </p>
                    <h2 class="text-center font-bold text-lg px-8">
                        <?php echo $_SESSION['full_name'] ?? 'Anonymous User'; ?>
                    </h2>
                <?php else: ?>
                    <img src="../images/default-avatar.jpg" class="w-24 h-24 object-cover mx-auto rounded-full" />
                    <p class="text-[#14A7A0] text-center text-sm font-bold mt-2">
                        Belum Ada Peringkat
                    </p>
                    <h2 class="text-center font-bold text-lg px-8">
                        Anonymous
                    </h2>
                <?php endif; ?>
                <hr class="mx-4 my-2" />
              </div>
              <div class="navigation">
                <ul class="space-y-6 mt-6">
                  <li class="px-6 text-[#595C5F] font-semibold">
                    <a href="detail-author.php"
                      ><i class="fa-solid fa-user mr-2"></i>My Profile</a
                    >
                  </li>
                  <li class="px-6 text-[#595C5F] font-semibold">
                    <a href="detail-author.php"
                      ><i class="fa-solid fa-comments mr-2"></i>My Blog</a
                    >
                  </li>
                  <?php if(!isset($_SESSION['id_user'])): ?>
                    <li class="px-6 text-[#595C5F] font-semibold">
                      <a href="register.php"
                        ><i class="fa-solid fa-right-to-bracket mr-2"></i>Login</a
                      >
                    </li>
                  <?php else: ?>
                    <li class="px-6 text-[#595C5F] font-semibold">
                      <button onclick="return confirmLogout(event)">
                        <i class="fa-solid fa-ban mr-2"></i>Logout
                      </button>
                    </li>
                  <?php endif; ?>
                </ul>
                <hr class="mx-4 mt-4 mb-2" />
                <div class="buttons flex flex-col justify-center items-center">
                  <a href="contact.php">
                  <button class="rounded-lg w-44 px-3 py-2 mt-2 border border-[#595C5F] text-[#595C5F]">
                    Butuh Bantuan?
                  </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="thread-menu md:col-span-3">
            <div
              class="berita-pilihan flex flex-col md:flex-row justify-between items-center mt-12 md:mt-0">
              <div class="title">
                <h1 class="text-[#595C5F] text-2xl font-bold">
                  Artikel dengan Kategori: <?= htmlspecialchars($category[0]['name_category'] ?? 'Tidak Ditemukan') ?>
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
                <?php if (empty($posts)): ?>
                    <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
                        <p class="text-center text-[#595C5F]">Belum ada artikel dalam kategori ini.</p>
                    </div>
                <?php else: ?>
                    <?php foreach($posts as $post): ?>
                    <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
                        <div class="profile flex items-center">
                            <div class="image">
                                <img src="../images/<?= htmlspecialchars($post['avatar']) ?>" class="w-12 h-12 rounded-full object-cover mr-2" />
                            </div>
                            <div class="title flex flex-col ml-1">
                                <h1 class="text-black font-bold text-sm md:text-base">
                                    <?= htmlspecialchars($post['full_name']) ?>
                                    <span class="text-[#595C5F] text-xs">| <?= htmlspecialchars($post['name_category']) ?></span>
                                </h1>
                                <h1 class="text-[#595C5F] text-sm">7 November 2024</h1>
                            </div>
                        </div>
                        <div class="hero-image mt-4 -mx-4">
                            <img src="../images/<?= htmlspecialchars($post['attachment']) ?>" class="w-full" />
                        </div>
                        <div class="tags flex gap-2 text-[#595C5F] mt-4 flex-wrap">
                            <?php $tags = explode(',', $post['tags']); ?>
                            <?php foreach($tags as $tag): ?>
                                <?php if(trim($tag) !== ''): ?>
                                <a href="tags.php?tag=<?= urlencode(trim($tag)) ?>">
                                    <p class="border rounded-full px-4 py-1 text-xs">
                                        #<?= htmlspecialchars(trim($tag)) ?>
                                    </p>
                                </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="judul-berita mt-4">
                            <a href="blog.php?id=<?= $post['id_post'] ?>" class="text-xl md:text-2xl font-bold">
                                <?= htmlspecialchars($post['title']) ?>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
              </div>
<div class="berita-aside w-full md:min-w-[265px]">
                <div
                  class="card bg-white py-4 px-4 mb-4 w-full rounded-lg border">
                  <div class="title">
                    <h2 class="font-bold text-lg">Daftar Kategori</h2>
                    <?php foreach($categories as $category): ?>
                    <div class="berita group">
                      <div class="flex flex-col">
                        <a href="category.php?id=<?= $category['id_category'] ?>" class="text-[#595C5F] mt-4 font-bold group-hover:text-black transition-all ease-in-out">
                          <?= $category['name_category']?>
                        </a>
                        <p class="text-[#595C5F] text-xs mt-1 group-hover:text-black transition-all ease-in-out">
                          <?= $articleCounts[$category['id_category']] ?? 0 ?> Total Articles
                        </p>
                      </div>
                      <hr class="mt-4" />
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>

                <div class="user-teraktif">
                    <h1 class="text-[#595C5F] text-xl font-bold">Author Teraktif</h1>
                    <p class="text-[#595C5F] text-sm mt-1">Menulis berita <span class="text-[#14A7A0]">paling banyak</span></p>
                    
                    <?php foreach($topAuthors as $index => $author): ?>
                    <div class="user">
                        <div class="card relative py-2 px-4 mt-6 bg-white rounded-xl flex items-center gap-x-2">
                            <img src="../images/<?= $author['avatar'] ?? 'default-avatar.jpg' ?>" class="w-12 h-12 object-cover rounded-full">
                            <h1 class="text-[#595C5F] font-bold"><?= $author['full_name'] ?></h1>
                            <span class="absolute -top-3 -left-2 bg-white border rounded-lg px-2"><?= $index + 1 ?></span>
                            <span class="text-sm text-[#14A7A0] ml-auto"><?= $author['post_count'] ?> artikel</span>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
    <script>
      function confirmLogout(event) {
        event.preventDefault();

        Swal.fire({
          title: "Apakah Anda yakin?",
          text: "Anda akan keluar dari akun ini",
          icon: "warning", 
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, Logout",
          cancelButtonText: "Batal"
        }).then((result) => {
          if (result.isConfirmed) {
            // Redirect ke halaman logout
            window.location.href = "logout.php";
          }
        });
      }
    </script>
  </body>
</html>
