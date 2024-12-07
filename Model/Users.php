<?php 


require_once __DIR__ . '../../DB/Connection.php';
require_once __DIR__ . '../../Interface/ModelInterface.php';
require_once __DIR__ . '/Model.php';

class User extends Model {
    private $table = "user";
    private $primary_key = "id_user";

    public function create($data)
    {
        parent::createData($data, $this->primary_key ,$this->table);
    }

    public function all()
    {
        return parent::allData($this->table);
    }

    public function find($id)
    {
        return parent::findData($id, $this->primary_key, $this->primary_key ,$this->table);
    }

    public function update($id, $data) 
    {
        return parent::updateData($id, $this->primary_key, $data, $this->primary_key ,$this->table);
    }

    public function delete($id) 
    {
        return parent::deleteData($id, $this->primary_key, $this->primary_key ,$this->table);
    }

    public function register($data)
    {
        $email = $data['post']['email'];
        $name = $data['post']['full_name'];
        $password = $data['post']['password'];
        $gender = $data['post']['gender'];

        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);

        if(mysqli_num_rows($result) > 0) {
            return "Email Sudah Terdaftar";
        }

        $nama_file = $data["files"]["avatar"]["name"];
        $tmp_name = $data["files"]["avatar"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "png", "jpeg", "gif", "webp", "heic"];

        if(!in_array($ekstensi_file, $ekstensi_allowed)) {
            echo "<script>
            alert('Ekstensi Tidak Diperbolehkan');
            window.location.href = 'register.php';
            </script>";
        }

        if($data["files"]["avatar"]["size"] > 2000000) {
        echo "<script>
            alert('Gambar tidak boleh lebih dari 2 MB');
            window.location.href = 'register.php';
            </script>";
        }

        $nama_file = uniqid() . "." . $ekstensi_file;   

        move_uploaded_file($tmp_name, "../images/" . $nama_file);

        $password = base64_encode($password);

        $query_register = "INSERT INTO {$this->table} (full_name, password, email, gender, avatar) VALUES ('$name', '$password', '$email', '$gender',  '$nama_file')";

        $result = mysqli_query($this->db, $query_register);

        if(!$result) {
            return "Register Gagal";
        }

        $new_user_id = mysqli_insert_id($this->db);

        $query_user = "SELECT * FROM {$this->table} WHERE id_user = '$new_user_id'";
        $result_user = mysqli_query($this->db, $query_user);

        $user = mysqli_fetch_assoc($result_user);
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['full_name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['avatar'] = $nama_file;

        $detail_user = [        
            'full_name' => $name,
            'email' => $email,
            'avatar' => $nama_file
        ];

        return $detail_user;
    }

    public function register_dashboard($data)
    {
        $email = $data['post']['email'];
        $name = $data['post']['full_name'];
        $password = $data['post']['password'];
        $gender = $data['post']['gender'];

        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);

        if(mysqli_num_rows($result) > 0) {
            return "Email Sudah Terdaftar";
        }

        $nama_file = $data["files"]["avatar"]["name"];
        $tmp_name = $data["files"]["avatar"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "png", "jpeg", "gif", "webp", "heic"];

        if(!in_array($ekstensi_file, $ekstensi_allowed)) {
            echo "<script>
            alert('Ekstensi Tidak Diperbolehkan');
            window.location.href = 'register.php';
            </script>";
        }

        if($data["files"]["avatar"]["size"] > 2000000) {
        echo "<script>
            alert('Gambar tidak boleh lebih dari 2 MB');
            window.location.href = 'register.php';
            </script>";
        }

        $nama_file = uniqid() . "." . $ekstensi_file;   

        move_uploaded_file($tmp_name, "../../../images/" . $nama_file);

        $password = base64_encode($password);

        $query_register = "INSERT INTO {$this->table} (full_name, password, email, gender, avatar) VALUES ('$name', '$password', '$email', '$gender',  '$nama_file')";

        $result = mysqli_query($this->db, $query_register);

        if(!$result) {
            return "Register Gagal";
        }

        $new_user_id = mysqli_insert_id($this->db);

        $query_user = "SELECT * FROM {$this->table} WHERE id_user = '$new_user_id'";
        $result_user = mysqli_query($this->db, $query_user);

        $user = mysqli_fetch_assoc($result_user);
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['full_name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['avatar'] = $nama_file;

        $detail_user = [        
            'full_name' => $name,
            'email' => $email,
            'avatar' => $nama_file
        ];

        return $detail_user;
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);

        if(mysqli_num_rows($result) == 0) {
            return "User Tidak Ditemukan";
        }

        $user = mysqli_fetch_assoc($result);
        if(base64_decode($user['password'], false) == $password) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['avatar'] = $user['avatar'];
    
            $detail_user = [
                'full_name' => $user['full_name'],
                'email' => $email,
                'avatar' => $user['avatar']
            ];
    
            return $detail_user;
        } else {
            return "Password Tidak Sesuai";
        }
    }

    public function logout() {
        session_destroy();
        return "Logout Berhasil";
    }
    
    public function updatePassword($id, $oldpass, $newpass) 
    {
        $query = "SELECT * FROM {$this->table} WHERE id_user = '$id'";
        $result = mysqli_query($this->db, $query);

        if(mysqli_num_rows($result) == 0) {
            return "User Tidak Ditemukan";
        }
        $user = mysqli_fetch_assoc($result);
        
        if(base64_decode($user['password'], false) !== $oldpass) {
            return "Password Lama Tidak Sesuai";
        }

        $newpass = base64_encode($newpass);

        $queryUpdate = "UPDATE {$this->table} SET password = '$newpass' WHERE id_user = '$id'";
        $resultUpdate = mysqli_query($this->db, $queryUpdate);

        if($resultUpdate === false) {
            return "Update Password Gagal";
        }

        return [
            'full_name' => $user['full_name'],
            'email' => $user['email'],
            'avatar' => $user['avatar']
        ];
    }
}

?>
