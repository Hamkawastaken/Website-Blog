<?php
require_once __DIR__ . '../../DB/Connection.php';
require_once __DIR__ . '../../Model/Model.php';
require_once __DIR__ . '../../Model/Post.php';


// Sesuaikan dengan struktur session yang ada
$loggedInUser = null;
if (isset($_SESSION['id_user'])) {
    $loggedInUser = [
        'id' => $_SESSION['id_user'],
        'full_name' => $_SESSION['full_name'],
        'avatar' => $_SESSION['avatar'],
        // Level bisa ditambahkan nanti jika ada
    ];
}

// Debug untuk melihat isi session
// var_dump($_SESSION);

// Tambahkan ini untuk debugging
if (!$loggedInUser) {
    // echo "User belum login";
}

// Inisialisasi koneksi database menggunakan class Connection
$connection = new Connection();
$conn = $connection->db;

// Ambil post_id dari URL atau sesuaikan dengan kebutuhan
$post_id = isset($_GET['id']) ? $_GET['id'] : 1; // default ke 1 jika tidak ada

// Ambil data interaksi dari database
$query = "SELECT likes_count, bookmarks_count FROM post_interactions WHERE post_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $likes_count = $row['likes_count'];
    $bookmarks_count = $row['bookmarks_count'];
} else {
    // Jika belum ada data, buat data baru
    $query = "INSERT INTO post_interactions (post_id, likes_count, bookmarks_count) VALUES (?, 0, 0)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    
    $likes_count = 0;
    $bookmarks_count = 0;
}

$id = $_GET['id'];

$posts = new Post(); 
$detail_post = $posts->find($id);

$post_tag = new Post();
$articleCounts = $post_tag->getArticleCountByCategory();
$topAuthors = $post_tag->getTopAuthors(5);

$post = new Post();
$post = $post->all_3(0, 1000);

// var_dump($post);
// die;


// Tambahkan query untuk mengambil artikel dari author yang sama
$author_id = $post[0]['id_user']; // ambil ID user dari artikel yang sedang dibaca
$other_posts = new Post();
$author_posts = $other_posts->getPostsByAuthor($author_id, 5); // ambil 5 artikel terbaru



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

        <aside class="w-full md:w-1/12">
            <div class="card flex md:flex-col w-fit h-fit gap-x-8 mx-auto bg-white rounded-xl border md:sticky md:top-4 py-4 px-4 md:p-4">
                <!-- Like Button -->
                <div class="like flex flex-col justify-center items-center md:my-2 group">
                    <a href="javascript:void(0)" 
                       onclick="handleInteraction(<?php echo $post_id; ?>, 'like')" 
                       class="like-button rounded-full border border-[#595C5F] group-hover:bg-[#595c5f] transition-all ease-in-out py-2 px-3">
                        <i class="fa-solid fa-heart text-[#595c5f] group-hover:text-white transition-all ease-in-out"></i>
                    </a>
                    <p class="text-[#595c5f] mt-1 likes-count"><?php echo $likes_count; ?></p>
                </div>

                <!-- Bookmark Button -->
                <div class="bookmark flex flex-col justify-center items-center md:my-2 group">
                    <a href="javascript:void(0)" 
                       onclick="handleInteraction(<?php echo $post_id; ?>, 'bookmark')" 
                       class="bookmark-button rounded-full border border-[#595C5F] group-hover:bg-[#595c5f] transition-all ease-in-out py-2 px-3">
                        <i class="fa-solid fa-bookmark text-[#595c5f] group-hover:text-white transition-all ease-in-out"></i>
                    </a>
                    <p class="text-[#595c5f] mt-1 bookmarks-count"><?php echo $bookmarks_count; ?></p>
                </div>

                <!-- Share Button -->
                <div class="share flex flex-col justify-center items-center md:my-2 group">
                    <a href="javascript:void(0)" 
                       onclick="handleShare()" 
                       class="share-button rounded-full border border-[#595C5F] group-hover:bg-[#595c5f] transition-all ease-in-out py-2 px-3">
                        <i class="fa-solid fa-share text-[#595c5f] group-hover:text-white transition-all ease-in-out"></i>
                    </a>
                    <p class="text-[#595c5f] mt-1">Share</p>
                </div>
            </div>
        </aside>

            <main class="w-full mx-auto px-2">
                <div class="card bg-white rounded-lg border md:px-10 py-6">
                    <div class="navigasi flex px-4 md:px-0">
                        <a href="index.php" class="text-[#14A7A0] text-sm md:text-base">Home</a>
                        <p class="mx-2 text-sm md:text-base">></p>
                        <p class="text-[#595c5f] text-sm md:text-base truncate"><?= $detail_post[0]['title'] ?></p>
                    </div>
                    <hr class="mx-4 md:mx-0 font-bold my-4">
                    <div class="tags flex gap-x-2 px-4 md:px-0">
                    <?php 
                    if (isset($post[0]['tags']) && !empty($post[0]['tags'])) {
                        $tags = explode(',', $post[0]['tags']);
                        foreach($tags as $tag): 
                            $tag = trim($tag);
                            if (!empty($tag)):
                    ?>
                            <a href="tags.php?tag=<?= urlencode($tag) ?>" class="hover:bg-gray-100 transition-all duration-200">
                                <p class="border border-[#14A7A0] text-[#14A7A0] rounded-full px-4 py-1 text-xs">
                                    #<?= htmlspecialchars($tag) ?>
                                </p>
                            </a>
                    <?php 
                            endif;
                        endforeach;
                    }
                    ?>
                    </div>
                    <hr class="mx-4 md:mx-0 font-bold my-4">
                    <div class="title mt-4 px-4 md:px-0">
                        <h1 class="text-[#595C5F] text-2xl md:text-3xl font-bold line-clamp-3"><?= $detail_post[0]['title'] ?></h1>
                    </div>
                    <div class="author flex gap-x-2 items-center my-4 px-4 md:px-0">
                        <div class="author-image"><img src="../images/<?= $post[0]['avatar']?>" class="w-8 h-8 rounded-full object-cover"></div>
                        <div class="author-info flex flex-col">
                            <h1 class="text-[#595C5F] font-semibold text-sm md:text-base">
                            <?= $post[0]['full_name']?>
                            <span class="text-[#595C5F] font-extralight text-xs">| <?= date('d F Y', strtotime($post[0]['created_at'])) ?></span>
                            </h1>
                        </div>
                    </div>
                    <div class="hero-image px-4 md:px-0">
                        <img src="../images/<?= $detail_post[0]['attachment']?>" class="rounded-xl">
                    </div>
                    <div class="px-4 md:px-0">
                        <h1 class="text-[#595c5f] text-sm md:text-base mt-4"><?= $detail_post[0]['content'] ?></h1>
                    </div>
                </div>
            </main>

            <aside class="md:w-1/3 w-full mx-auto px-2">
                <div class="author-blog bg-white pb-4 rounded-lg">
                    <div class="bg-[#EAEEF3] w-full h-16 rounded-t-lg"></div>
                    <?php if ($loggedInUser): ?>
                        <a href="detail-author.php?id=<?= $loggedInUser['id'] ?>" class="flex justify-center items-center">
                            <img src="../images/<?= $loggedInUser['avatar'] ?>" 
                                 class="w-24 h-24 -mt-12 rounded-full object-cover">
                        </a>
                        <h2 class="text-center text-black font-bold text-lg mx-4">
                            <?= strtoupper($loggedInUser['full_name']) ?>
                        </h2>
                        <p class="bg-[#14A7A0] text-white w-fit mx-auto px-2 py-1 rounded-full text-center text-xs font-bold mt-2 mb-4">
                            <?= strtoupper('ROOKIE I') // Default level karena belum ada di session ?>
                        </p>
                    <?php else: ?>
                        <div class="text-center px-4 py-6">
                            <p class="text-gray-600 mb-4">Silakan login untuk melihat profil Anda</p>
                            <a href="login.php" class="bg-[#14A7A0] text-white px-4 py-2 rounded-full text-sm hover:bg-[#118F89]">
                                Login
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg mt-3">
                  <div class="title">
                    <h2 class="font-bold text-lg">Lainnya Dari <?= strtoupper($post[0]['full_name']) ?></h2>
                    <?php foreach($author_posts as $author_post): ?>
                        <?php if($author_post['id'] != $post_id): ?> <!-- Skip artikel yang sedang dibaca -->
                            <div class="berita group">
                                <div class="flex flex-col">
                                    <a href="blog.php?id=<?= $author_post['id'] ?>" 
                                       class="text-[#595C5F] mt-4 font-bold group-hover:text-black transition-all ease-in-out">
                                        <?= $author_post['title'] ?>
                                    </a>
                                    <span class="text-[#595C5F] text-sm mt-1">
                                        <?= date('d M Y', strtotime($author_post['created_at'])) ?>
                                    </span>
                                </div>
                                <hr class="mt-4" />
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    
                    <?php if(count($author_posts) <= 1): ?>
                        <p class="text-[#595C5F] mt-4 text-sm">Belum ada artikel lain dari penulis ini.</p>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="card bg-white py-4 px-4 mb-4 w-full rounded-lg mt-3">
                  <div class="title">
                    <h2 class="font-bold text-lg">Berita Terbaru</h2>
                    <?php 
                    // Ambil 5 berita terbaru dari array $post yang sudah ada
                    $latest_posts = array_slice($post, 0, 5);
                    
                    foreach($latest_posts as $latest): 
                    ?>
                      <div class="berita-3 group">
                        <div class="flex flex-col">
                          <a
                            href="blog.php?id=<?= $latest['id_post'] ?>"
                            class="text-[#595C5F] mt-4 font-bold group-hover:text-black transition-all ease-in-out"
                          ><?= $latest['title'] ?></a>
                          <span class="text-[#595C5F] text-sm mt-1">
                            <?= date('d M Y', strtotime($latest['created_at'])) ?>
                          </span>
                        </div>
                        <hr class="mt-4" />
                      </div>
                    <?php endforeach; ?>
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
    <script>
    function handleInteraction(postId, action) {
        console.log('Function called:', postId, action); // Debug log

        const button = action === 'like' ? 
            document.querySelector('.like-button') : 
            document.querySelector('.bookmark-button');
        
        console.log('Button found:', button); // Debug log

        fetch('interaction_handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `post_id=${postId}&action=${action}`
        })
        .then(response => {
            console.log('Raw response:', response); // Debug log
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data); // Debug log
            
            if (data.success) {
                // Update tampilan counter
                if (action === 'like') {
                    document.querySelector('.likes-count').textContent = data.likes_count;
                } else if (action === 'bookmark') {
                    document.querySelector('.bookmarks-count').textContent = data.bookmarks_count;
                }
                
                // Toggle kelas active berdasarkan status
                if (data.is_active) {
                    button.classList.add('bg-[#595c5f]');
                    button.querySelector('i').classList.add('text-white');
                } else {
                    button.classList.remove('bg-[#595c5f]');
                    button.querySelector('i').classList.remove('text-white');
                }
            } else {
                if (data.message === 'Silakan login terlebih dahulu') {
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Silakan login terlebih dahulu untuk melakukan interaksi',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#14A7A0'
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal memperbarui interaksi',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#14A7A0'
                    });
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat memproses permintaan',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#14A7A0'
            });
        });
    }

    // Tambahkan event listener untuk debugging
    document.addEventListener('DOMContentLoaded', function() {
        const likeButton = document.querySelector('.like-button');
        const bookmarkButton = document.querySelector('.bookmark-button');
        
        console.log('Like button found:', likeButton);
        console.log('Bookmark button found:', bookmarkButton);
    });

    function handleShare() {
        if (navigator.share) {
            navigator.share({
                title: document.title,
                url: window.location.href
            })
            .then(() => {
                const shareButton = document.querySelector('.share-button');
                shareButton.classList.add('bg-[#595c5f]');
                shareButton.querySelector('i').classList.add('text-white');
                setTimeout(() => {
                    shareButton.classList.remove('bg-[#595c5f]');
                    shareButton.querySelector('i').classList.remove('text-white');
                }, 1000);
            })
            .catch(error => console.error('Error sharing:', error));
        } else {
            // Fallback untuk browser yang tidak mendukung Web Share API
            const url = window.location.href;
            const tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = url;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            alert('URL telah disalin ke clipboard!');
        }
    }
    </script>
</body>
</html>