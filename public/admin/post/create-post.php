<?php


require_once __DIR__ . '../../../../Model/Model.php';
require_once __DIR__ . '../../../../Model/Post.php';
require_once __DIR__ . '../../../../Model/Users.php';
require_once __DIR__ . '../../../../Model/Category.php';
require_once __DIR__ . '../../../../Model/Tags.php';

if(!isset($_SESSION["full_name"])) {
  header("Location: ../auth/login.php");
  exit;
}

$categories = new Category();
$categories = $categories->all();

$tags = new Tags();
$tags = $tags->all();

$users = new User();
$users = $users->all();

if (isset($_POST["submit"])) {

    $post = [
    "post" => $_POST,
    "files" => $_FILES
    ];

if(strlen(($_POST["title"])) > 255){
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire("Tidak Boleh Melebihi 255 Karakter!");
        setTimeout(() => {
            window.location.href = "index-post.php";
        }, 2000)
    })
    </script>';
}

  $posts = new Post();
  $result = $posts->create($post);
  if($result !== false){
    echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
        title: "Succes!",
        text: "Post Successfully Created",
        icon: "success"
        });
        setTimeout(() => {
            window.location.href = "index-post.php";
        }, 2000)
    })
    </script>';
  } else{
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire("Post Failed to Create!");
        setTimeout(() => {
            window.location.href = "create-post.php";
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

  /* Container */
.mx-auto {
  margin-left: auto;
  margin-right: auto;
}
.mt-5 {
  margin-top: 1.25rem; /* 20px */
}
.w-full {
  width: 100%;
}
.max-w-md {
  max-width: 28rem; /* 448px */
}

/* Label */
.block {
  display: block;
}
.text-sm {
  font-size: 0.875rem; /* 14px */
  line-height: 1.25rem; /* 20px */
}
.font-medium {
  font-weight: 500;
}
.text-gray-700 {
  color: #374151;
}
.mb-1 {
  margin-bottom: 0.25rem; /* 4px */
}

/* Select */
.p-2 {
  padding: 0.5rem; /* 8px */
}
.border {
  border-width: 1px;
}
.border-gray-300 {
  border-color: #d1d5db;
}
.rounded-md {
  border-radius: 0.375rem; /* 6px */
}
.shadow-sm {
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}
.focus\:ring-blue-500:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
  box-shadow: 0 0 0 2px #3b82f6; /* Ring effect */
}
.focus\:border-blue-500:focus {
  border-color: #3b82f6;
}
.sm\:text-sm {
  font-size: 0.875rem; /* 14px */
  line-height: 1.25rem; /* 20px */
}

/* Hint Text */
.mt-2 {
  margin-top: 0.5rem; /* 8px */
}
.text-gray-500 {
  color: #6b7280;
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
                <h6 class="text-lg text-gray-600 font-semibold">Add Post</h6>
                </div>

                                <div class="flex flex-col md:flex-row justify-between gap-4">
                                    <div class="card w-full">
                                        <div class="card-body">
                                            <img src="../../../images/post.gif" class="">
                                        </div>
                                    </div>
                                    <div class="card w-full">
                                        <div class="card-body">
                                        <form class="flex flex-col gap-6" action="" method="post">
                                            <div>
                                                <label for="title"
                                                    class="block text-sm font-semibold mb-2 text-gray-600">Add Title</label>
                                                <input type="text" name="title" id="title"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                                    aria-describedby="hs-input-helper-text">
                                            </div>
                                            <div>
                                                <label for="content"
                                                    class="block text-sm font-semibold mb-2 text-gray-600">Add Content</label>
                                                <textarea type="text" name="content" id="content" 
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0" style="height: 14rem;"
                                                    aria-describedby="hs-input-helper-text"></textarea>
                                            </div>
                                            <div>
                                                <label for="attachment"
                                                    class="block text-sm font-semibold mb-2 text-gray-600">New Image</label>
                                                <input type="file" name="attachment" id="attachment" style="border: 1px solid rgb(229 231 235);"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                                    aria-describedby="hs-input-helper-text">
                                            </div>
                                            <div class="mb-4">
                                                <label for="user_id"
                                                class="block text-sm font-semibold mb-2 text-gray-600">Author Name</label>
                                                <select name="user_id" id="user_id" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                                <?php foreach ($users as $user) :?>
                                                <option value="<?= $user['id_user']?>"><?= $user['full_name']?></option>
                                                <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="category"
                                                class="block text-sm font-semibold mb-2 text-gray-600">Category</label>
                                                <select name="category" id="category" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                                <?php foreach ($categories as $category) :?>
                                                <option value="<?= $category['id_category']?>"><?= $category['name_category']?></option>
                                                <?php endforeach?>
                                                </select>
                                            </div>
                                          <div class="w-full bg-white p-6 rounded shadow-md">
                                              <label for="tags[]" class="block text-sm font-medium text-gray-700 mb-2">Select Tags</label>
                                              <select id="tagSelector" name="tags[]" multiple="multiple" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                  <option value="" disabled selected>Choose a tag</option>
                                                  <?php foreach ($tags as $tag) :?>
                                                  <option value="<?= $tag['id_tag']?>"><?= $tag['name_tag']?></option>
                                                  <?php endforeach?>
                                              </select>

                                              <!-- Display selected tags -->
                                              <div id="selectedTags" class="mt-4 flex flex-wrap gap-2"></div>


                                              <input type="hidden" name="tags[]" id="tagsInput">

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

        const tagSelector = document.getElementById('tagSelector');
        const selectedTagsContainer = document.getElementById('selectedTags');
        const tagsInput = document.getElementById('tagsInput');
        let selectedTags = [];

        // Handle the selection of tags
        tagSelector.addEventListener('change', () => {
            const selectedValue = tagSelector.value;

            // Avoid duplicate tags
            if (!selectedTags.includes(selectedValue)) {
                selectedTags.push(selectedValue);
                updateSelectedTagsUI();
                updateHiddenInput();
            }

            // Reset select input to placeholder
            tagSelector.value = "";
        });

        // Update the UI with selected tags
        function updateSelectedTagsUI() {
            selectedTagsContainer.innerHTML = ""; // Clear the container
            selectedTags.forEach(tag => {
                const tagElement = document.createElement('div');
                tagElement.className = 'bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full flex items-center gap-2';
                tagElement.innerHTML = `
                    <span>${tag}</span>
                    <button type="button" class="text-indigo-700 hover:text-red-600" onclick="removeTag('${tag}')">x</button>
                `;
                selectedTagsContainer.appendChild(tagElement);
            });
        }

        // Update the hidden input with all selected tags
        function updateHiddenInput() {
            tagsInput.value = selectedTags.join(","); // Store as a comma-separated string
        }

        // Remove a tag
        function removeTag(tag) {
            selectedTags = selectedTags.filter(t => t !== tag);
            updateSelectedTagsUI();
            updateHiddenInput();
        }


</script>
</body>

</html>