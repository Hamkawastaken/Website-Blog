<?php

require_once '../../../Model/Model.php';
require_once '../../../Model/Post.php';
require_once '../../../Model/Users.php';
require_once '../../../Model/Category.php';

if(!isset($_SESSION["full_name"])) {
header("Location: ../auth/login.php");
exit;
}

$posts = new Post();


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$limit = 6; 
$start = ($page - 1) * $limit;
$totalData = count($posts->all()); 
$totalPages = ceil($totalData / $limit); 
$posts = $posts->all_3($start, $limit);



// var_dump($posts);
// die;

?>


<!DOCTYPE html>
<html   lang="en" >

<head>
	<!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/png" href="../../../images/logo-mobile.png" />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
  rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
<!-- Core Css -->
<link rel="stylesheet" href="../assets/css/theme.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  .grid {
    display: grid;
  }

  .grid-cols-1 {
    grid-template-columns: repeat(1, minmax(0, 1fr));
  }

@media (min-width: 768px) {
    .md\:grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

  .gap-3 {
    gap: 1.2rem;
  }

  .gap-x {
    -moz-column-gap: 1.2rem;
    column-gap: 0.5rem;
  }

  .mt-2 {
    margin-top: 0.5rem;
  }

  .category {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ccc;
    width: fit-content;
    border-radius: 5px;
    padding: 4px 8px;
    background-color: #f0f0f0;
  }

  .bg-green-600 {
    --tw-bg-opacity: 1;
    background-color: rgb(5 150 105 / var(--tw-bg-opacity));
  }

  .bg-green-700 {
    --tw-bg-opacity: 1;
    background-color: rgb(4 120 87 / var(--tw-bg-opacity));
  }

  .bg-red-600 {
    --tw-bg-opacity: 1;
    background-color: rgb(220 38 38 / var(--tw-bg-opacity));
  }
</style>
	<title>Tags</title>
</head>

<body class="DEFAULT_THEME bg-white">
	<main>
		<!--start the project-->
		<div id="main-wrapper" class=" flex">
			<aside id="application-sidebar-brand"
				class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white  left-sidebar   transition-all duration-300" >
				<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->

<?php require_once '../components/sidebar.php'?>

<div id="myModal" style="
        display: none; 
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%; 
        background-color: rgba(0, 0, 0, 0.5); 
        justify-content: center; 
        align-items: center;
    ">
        <div style="
            background-color: white; 
            width: 90%; 
            max-width: 400px; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            text-align: center;
        ">
            <h2 style="margin-top: 0;">Modal Title</h2>
            <p>This is a simple modal example.</p>
            <button onclick="closeModal()" style="
                padding: 10px 20px; 
                background-color: #FF5733; 
                color: white; 
                border: none; 
                border-radius: 5px; 
                cursor: pointer;
            ">Close</button>
        </div>
    </div>

<!-- </aside> -->
			</aside>
			<div class="w-full page-wrapper overflow-hidden">

				<!--  Header Start -->
				<header class="container full-container w-full text-sm   py-4">
					<div class=" w-full">

<!-- ========== HEADER ========== -->

<?php require_once '../components/navbar.php'?>

  <!-- ========== END HEADER ========== --></div>
				</header>
				<!--  Header End -->

				<!-- Main Content -->
        
        <main class="h-full overflow-y-auto  max-w-full  pt-4">
          <div class="container full-container py-5 flex flex-col gap-6">
            <div class="card">
              <h6 class="text-lg text-gray-600 font-semibold card-body">Posts List</h6>
              <div class="card-body grid grid-cols-1 md:grid-cols-3 gap-5">
                <?php foreach ($posts as $post) : ?>
                  <div class="card overflow-hidden">
                    <div class=" bg-white">
                      <img class="w-full rounded-t-xl" style="height: 200px;" src="../../../images/<?= $post['attachment']?>" alt="Image Description">
                        <div class="card-body">
                          <h3 class="text-lg font-medium text-gray-700"><?= $post['title']?></h3>
                          <p class="mt-1 text-sm text-gray-500 pr-10 "><?= $post['full_name']?></p>
                          <div class="category mt-4">
                            <a href="">
                              <p class="text-sm text-gray-500"><?= $post['name_category']?></p>
                            </a>
                          </div>
                          <div class="tags mt-4 flex flex-wrap gap-x">
                            <?php $tags = explode(',', $post['tags']);
                                foreach ($tags as $tag) :?>
                            <a href="">
                              <p class="text-sm text-gray-500">#<?= $tag?></p>
                            </a>
                            <?php endforeach;?>
                          </div>
                          <a class="mt-4 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white" href="./detail-post.php?id=<?=$post['id_post']?>"><i class="ti ti-eye"></i>Details</a>
                          <a class="mt-4 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-green-600 text-white" href="./edit-post.php?id=<?=$post['id_post']?>"><i class="ti ti-pencil"></i>Edit</a>
                          <a class="mt-4 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-600 text-white" href="./delete-post.php?id=<?=$post['id_post']?>" onclick="return alertDelete(event, '<?= $post['id_post']?>')"><i class="ti ti-trash"></i>Delete</a>
                        </div>
                    </div>                                                
                  </div>
                  <?php endforeach;?>
            </div>
          </div>
        </div>
      </main>

				<!-- Main Content End -->
			</div>
		</div>
		<!--end of project-->
	</main>


	
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="../assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
<script src="../assets/libs/@preline/dropdown/index.js"></script>
<script src="../assets/libs/@preline/overlay/index.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script>
      $(document).ready(function() {
      $("#search").on("keyup", function() {
        $("#content").load("../components/post.php?keyword=" + $(this).val());
      });
    });
function alertDelete(event, idPost) {
  event.preventDefault(); // Mencegah aksi bawaan tombol

  Swal.fire({
    title: "Are You Sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect ke URL delete jika dikonfirmasi
      window.location.href = `delete-post.php?id=${idPost}`;
    }
  });
}

       // Open Modal
        function openModal() {
            document.getElementById('myModal').style.display = 'flex';
        }

        // Close Modal
        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }


</script>
</body>

</html>