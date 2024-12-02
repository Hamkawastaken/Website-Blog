<?php

require_once '../../../Model/Model.php';
require_once '../../../Model/Category.php';

if(!isset($_SESSION["full_name"])) {
  header("Location: ../auth/login.php");
  exit;
}

$categories = new Category();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$limit = 3; 
$start = ($page - 1) * $limit;
$totalData = count($categories->all()); 
$totalPages = ceil($totalData / $limit); 

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
                <h6 class="text-lg text-gray-600 font-semibold">Category List</h6>
                <div class="input-group">
                  <input type="text" id="search" placeholder="Search Category" class="h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5" style="border-radius: 999px;">
                </div>
                </div>
            <div class="grid grid-cols-1 gap-y-6">
						  <div class="col-span-2">
							<div class="card h-full bg-gray-300">
								<div class="card-body">
									<div id="content" class="relative overflow-x-auto">
										<!-- table -->
										<table class="text-left w-full whitespace-nowrap text-sm">
											<thead class="text-gray-700">
												<tr class="font-semibold text-gray-600">
													<th scope="col" class="p-4">Id</th>
													<th scope="col" class="p-4">Category Name</th>
													<th scope="col" class="p-4">Total Articles</th>
													<th scope="col" class="p-4">Actions</th>
												</tr>
											</thead>
											<tbody>
                        <?php $no = ($page - 1) * $limit;?>
                        <?php foreach ($categories->paginate($start, $limit) as $category) :?>
                        <?php $no++;?>
												<tr>
													<td class="p-4 font-semibold text-gray-600"><?= $no?></td>
													<td class="p-4">
                            <div class="flex flex-col gap-1">
                              <h3 class="font-semibold text-gray-600"><?= $category['name_category']?></h3>
														</div>
													</td>
                          <td class="p-4">
														<span class="font-semibold text-base text-gray-600 text-center"><?= $category['article_total']?></span>
													</td>
													<td class="p-4 flex gap-x-1">
                            <button class="inline-flex items-center py-[10px] px-[10px] rounded-2xl font-semibold text-white" style="background-color: rgb(34 197 94);"><a href="edit-category.php?id=<?=$category['id_category']?>">Edit</a><i class="ti ti-pencil" style="margin-left: 4px;"></i></button>
                            <button class="inline-flex items-center py-[10px] px-[10px] rounded-2xl font-semibold text-white" style="	background-color: rgb(239 68 68);" onclick="return alertDelete(event, '<?= $category['id_category']?>')"><i class="ti ti-trash" style="margin-left: 4px;" ></i>Delete</button>
													</td>
												</tr>
                        <?php endforeach;?>
											</tbody>
										</table>
									</div>		
                <div class="flex mt-4 gap-x-2">
                  <!-- Tombol Previous -->
                  <li style="list-style: none;" class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                    <a href="<?= $page > 1 ? '?page=' . ($page - 1) : '#' ?>" 
                      class="page-link px-4 py-2 border border-gray-300 rounded-md text-gray-600 bg-white hover:bg-gray-100 hover:text-blue-600 
                      <?= $page <= 1 ? 'cursor-not-allowed opacity-50' : '' ?>">
                      Previous
                    </a>
                  </li>

                  <!-- Nomor Halaman -->
                  <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li style="list-style: none;" class="page-item <?= $page == $i ? 'active' : '' ?>">
                      <a href="?page=<?= $i ?>" 
                        class="page-link px-4 py-2 border rounded-md 
                        <?= $page == $i ? 'text-white bg-blue-600 border-blue-600' : 'text-gray-600 bg-white hover:bg-gray-100 hover:text-blue-600' ?>">
                        <?= $i ?>
                      </a>
                    </li>
                  <?php endfor; ?>

                  <!-- Tombol Next -->
                  <li style="list-style: none;" class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                    <a href="<?= $page < $totalPages ? '?page=' . ($page + 1) : '#' ?>" 
                      class="page-link px-4 py-2 border border-gray-300 rounded-md text-gray-600 bg-white hover:bg-gray-100 hover:text-blue-600 
                      <?= $page >= $totalPages ? 'cursor-not-allowed opacity-50' : '' ?>">
                      Next
                    </a>
                  </li>
                </div>
							
								</div>
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
<script>
      $(document).ready(function() {
      $("#search").on("keyup", function() {
        $("#content").load("../components/category.php?keyword=" + $(this).val());
      });
    });
function alertDelete(event, idCategory) {
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
      window.location.href = `delete-category.php?id=${idCategory}`;
    }
  });
}


</script>
</body>

</html>