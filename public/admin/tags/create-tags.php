<?php


require_once __DIR__ . '../../../../Model/Model.php';
require_once __DIR__ . '../../../../Model/Tags.php';

if(!isset($_SESSION["full_name"])) {
  header("Location: ../auth/login.php");
  exit;
}

if (isset($_POST["submit"])) {
  $tag = [
    "name_tag" => $_POST["name_tag"]
  ];

if(strlen(($_POST["name_tag"])) > 255){
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire("Tidak Boleh Melebihi 255 Karakter!");
        setTimeout(() => {
            window.location.href = "index-tags.php";
        }, 2000)
    })
    </script>';
}

  $tags = new Tags();
  $result = $tags->create($tag);
  if($result !== false){
    echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
        title: "Succes!",
        text: "Tags Successfully Created",
        icon: "success"
        });
        setTimeout(() => {
            window.location.href = "index-tags.php";
        }, 2000)
    })
    </script>';
  } else{
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire("Tags Failed to Create!");
        setTimeout(() => {
            window.location.href = "create-tags.php";
        }, 2000)
    })
    </script>';
  }
}

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
  <script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .swal2-confirm {
    background-color: rgb(14 165 233);
    color: white;        
  }
</style>
</style>
	<title>Category</title>
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
				<div class="card-body flex flex-col gap-6">
                <div class="flex justify-between items-center">
                <h6 class="text-lg text-gray-600 font-semibold">Add Tags</h6>
                </div>

                                <div class="flex flex-col md:flex-row justify-between gap-4">
                                    <div class="card w-full">
                                        <div class="card-body">
                                            <img src="../../../images/add.gif" class="">
                                        </div>
                                    </div>
                                    <div class="card w-full">
                                        <div class="card-body">
                                        <form class="flex flex-col gap-6" action="" method="post">
                                            <div>
                                                <label for="name_tag"
                                                    class="block text-sm font-semibold mb-2 text-gray-600">Add Tags Name</label>
                                                <input type="text" name="name_tag" id="name_tag"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                                    aria-describedby="hs-input-helper-text">
                                            </div>
                                            <button class="btn text-sm text-white font-medium w-fit hover:bg-blue-700" name="submit" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
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
        $("#content").load("../components/tags.php?keyword=" + $(this).val());
      });
    });
function alertDelete(event, idTags) {
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
      window.location.href = `delete-tags.php?id=${idTags}`;
    }
  });
}


</script>
</body>

</html>