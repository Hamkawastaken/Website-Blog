<?php

require_once __DIR__ . '../../../../Model/Model.php';
require_once __DIR__ . '../../../../Model/Category.php';

if(!isset($_SESSION["full_name"])) {
  header("Location: ../auth/login.php");
  exit;
}

$id = $_GET['id'];

$categories = new Category(); 
$detail_category = $categories->find($id);

if (isset($_POST["submit"])) {

$category = [
    "name_category" => $_POST["name_category"],
    "article_total" => $_POST["article_total"]
];

if(strlen(($_POST["name_category"])) > 255){
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire("Tidak Boleh Melebihi 255 Karakter!");
        setTimeout(() => {
            window.location.href = "index-category.php";
        }, 2000)
    })
    </script>';
}

$result = $categories->update($id, $category);
if ($result !== false) {
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
        title: "Succes!",
        text: "Category Successfully Created",
        icon: "success"
        });
        setTimeout(() => {
            window.location.href = "index-category.php";
        }, 2000)
    })
    </script>';
} else {
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire("Category Failed to Edit!");
        setTimeout(() => {
            window.location.href = "edit-category.php";
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  .swal2-confirm {
    background-color: rgb(14 165 233);
    color: white;        
  }
</style>
<title>Edit Category</title>
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
								<h6 class="text-lg text-gray-600 font-semibold">Edit Category</h6>

                                <div class="flex justify-between gap-4">
                                    <div class="card w-full">
                                        <div class="card-body">
                                            <img src="../../../images/edit.gif" class="">
                                        </div>
                                    </div>
                                    <div class="card w-full">
                                        <div class="card-body">
                                        <form class="flex flex-col gap-6" action="" method="post">
                                            <div>
                                                <label for="name_category"
                                                    class="block text-sm font-semibold mb-2 text-gray-600">New Category Name</label>
                                                <input type="text" name="name_category" id="name_category" value="<?= $detail_category[0]['name_category']?>"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                                    aria-describedby="hs-input-helper-text">
                                            </div>
                                            <div>
                                                <label for="article_total"
                                                    class="block text-sm font-semibold mb-2 text-gray-600">New Total Article</label>
                                                <input type="number" name="article_total" id="article_total" value="<?= $detail_category[0]['article_total']?>"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                    aria-describedby="hs-input-helper-text">
                                            </div>
                                            <button class="btn text-sm text-white font-medium w-fit hover:bg-blue-700" name="submit" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

									</div>
								</div>
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

</body>

</html>