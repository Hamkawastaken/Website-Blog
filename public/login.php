<?php

require_once __DIR__ . '../../Model/Model.php';
require_once __DIR__ . '../../Model/Users.php';


// if(isset($_SESSION["full_name"])) {
//     header("Location: index.php");
// }

$user = new User();

if(isset($_POST['submit'])) {
    $result = $user->login($_POST['email'], $_POST['password']);
    if(gettype($result) == "string") {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{$result}'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        });
        </script>";
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Anda berhasil login'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
        });
        </script>";
    }
}

?>

<!DOCTYPE html>
<html   lang="en" dir="ltr" >

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
<link rel="stylesheet" href="../public/admin/assets/css/theme.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  .swal2-confirm {
    background-color: rgb(14 165 233);
    color: white;        
  }
</style>
	<title>Login</title>
</head>

<body class="DEFAULT_THEME bg-white">
	<main>
				<!-- Main Content -->
                <div class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">
                  
                    <div class="justify-center items-center w-full card lg:flex max-w-md ">
                        <div class=" w-full card-body">
                                <a href="" class="py-4 block"><img src="../images/logo-mobile.png" alt="" class="mx-auto"/></a>
                                <p class="mb-4 text-gray-500 text-sm text-center">Programmer Blog</p>
                            <!-- form -->
                            <form action="" method="post">
                                <!-- email -->
                                <div class="mb-4">
                                    <label for="email"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Email</label>
                                <input type="email" name="email" id="email"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                </div>
                                <!-- password -->
                                <div class="mb-6">
                                    <label for="password"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Password</label>
                                <input type="password" name="password" id="password"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                </div>
                                <!-- checkbox -->
                                  <div class="flex justify-between">
                                    <div class="flex">
                                        <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded-[4px] text-blue-600 focus:ring-blue-500 " id="hs-default-checkbox" checked>
                                        <label for="hs-default-checkbox" class="text-sm text-gray-600 ms-3">Remeber this Device</label>
                                      </div>
                                        <a href="./register.php" class="text-sm font-medium text-blue-600 hover:text-blue-700">Forgot Password ?</a>
                                  </div>
                                    <!-- button -->
                                      <div class="grid my-6">
                                        <button type="submit" name="submit" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Sign In</button>
                                      </div>
        
                                    <div class="flex justify-center gap-2 items-center">
                                        <p class="text-base font-medium text-gray-500">New User?</p>
                                        <a href="./register.php" class="text-sm font-medium text-blue-600 hover:text-blue-700">Create an account</a>
                                    </div>
                                </div>
                            </form>
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



</body>

</html>