<?php

require_once __DIR__ . '../../../../Model/Model.php';
require_once __DIR__ . '../../../../Model/Users.php';

$user = new User();

if(isset($_SESSION["full_name"])) {
    header("Location: ../dashboard/dashboard.php");
    exit;
}

if(isset($_POST['submit'])) {
    $data = [
        "post" => $_POST,
        "files" => $_FILES
    ];
    $result = $user->register($data);

    if (gettype($result) == "string") {
        echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Email is Already Registered!",
        });
        setTimeout(() => {
            window.location.href = "register.php";
        }, 2000)
    })
    </script>';
    } else {
        echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
        title: "Succes!",
        text: "Register Success!",
        icon: "success"
        });
        setTimeout(() => {
            window.location.href = "../dashboard/dashboard.php";
        }, 2000)
    })
    </script>';
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
<link rel="stylesheet" href="../assets/css/theme.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  .swal2-confirm {
    background-color: rgb(14 165 233);
    color: white;        
  }
</style>
	<title>Register</title>
</head>

<body class="DEFAULT_THEME bg-white">
	<main>
				<!-- Main Content -->
                <div class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4 py-5">
                  
                    <div class="justify-center items-center w-full card lg:flex max-w-md ">
                        <div class=" w-full card-body">
                                <a href="" class="py-4 block"><img src="../../../images/logo-mobile.png" alt="" class="mx-auto"/></a>
                                <p class="mb-4 text-gray-500 text-sm text-center">Dashboard Blog Admin</p>
                            <!-- form -->
                            <form action="" method="post" enctype="multipart/form-data">

                                <!-- username -->
                                <div class="mb-4">
                                    <label for="full_name"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Name</label>
                                <input type="text" name="full_name" id="full_name" required
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Email Address</label>
                                <input type="email" name="email" id="email" required
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                </div>

                                <!-- Gender -->
                                <div class="mb-4">
                                    <label for="email"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Gender</label>
                                <select name="gender" id="gender"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                <option value="p">Laki - Laki</option>
                                <option value="l">Perempuan</option>
                            </select>
                                </div>

                                <!-- Avatar -->
                                <div class="mb-4">
                                    <label for="avatar"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Avatar</label>
                                    <input type="file" name="avatar" id="avatar" required class="py-3 px-4 block w-full rounded-md text-sm focus:border-blue-600 focus:ring-0" style="border: 1px solid rgb(229 231 235);" aria-describedby="hs-input-helper-text">
                                </div>

                                <!-- password -->
                                <div class="mb-4">
                                    <label for="password"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Password</label>
                                <input type="password" name="password" id="password" required
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                </div>
                                <div class="mb-4">
                                    <label for="confirmPassword"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Confirm Password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" required
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                </div>
                        
                                    <!-- button -->
                                      <div class="grid my-6">
                                        <button name="submit" type="submit" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Sign Up</button>
                                      </div>
        
                                    <div class="flex justify-center gap-2 items-center">
                                        <p class="text-base font-medium text-gray-500">Already have an Account?</p>
                                        <a href="./login.php" class="text-sm font-medium text-blue-600 hover:text-blue-700">Sign In</a>
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