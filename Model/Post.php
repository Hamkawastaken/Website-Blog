<?php 

require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Interface/ModelInterface.php';
require_once __DIR__ . '/Model.php';

class Post extends Model {
    protected $table = "posts";
    protected $primary_key = "id_post";

    public function create($data)
    {

        $attachment = null;

        if(isset($data['files']['attachment']) && $data['files']['attachment']['error'] == UPLOAD_ERR_OK) {
            $name_file = $data['files']['attachment']['name'];
            $tmp_name = $data['files']['attachment']['tmp_name'];
            $ekstensi_file = pathinfo($name_file, PATHINFO_EXTENSION);
            $ekstensi_allowed = ["jpg", "png", "jpeg", "gif", "webp", "heic"];

            if(!in_array(strtolower($ekstensi_file), $ekstensi_allowed)) {
                return "Invalid File Type";
            }

            if($data['files']['attachment']['size'] > 2000000) {
                return "File too large";
            }

            $name_file = uniqid() . "." . $ekstensi_file;
            if(!move_uploaded_file($tmp_name, "../images/" . $name_file)) {
                return "Failed to upload file";
            }

            $attachment = $name_file;
        }

        $data = [
            'title' => $data['post']['title'],
            'content' => $data['post']['content'],
            'attachment' => $data['post']['attachment'],
            'category_id' => $data['post']['category'],
            'user_id' => $data['post']['user_id']
        ];

        if($attachment) {
            $data['attachment'] = $attachment;
        }

        return parent::createData($data, $this->table);
    }

    public function all()
    {
        return parent::allData($this->table);
    }

    public function find($id)
    {
        return parent::findData($id, $this->primary_key, $this->table);
    }

    public function update($id, $data) 
    {
        $attachment = null;

        if(isset($data['files']['attachment']) && $data['files']['attachment']['error'] == UPLOAD_ERR_OK) {
            $name_file = $data['files']['attachment']['name'];
            $tmp_name = $data['files']['attachment']['tmp_name'];
            $ekstensi_file = pathinfo($name_file, PATHINFO_EXTENSION);
            $ekstensi_allowed = ["jpg", "png", "jpeg", "gif", "webp", "heic"];

            if(!in_array(strtolower($ekstensi_file), $ekstensi_allowed)) {
                return "Invalid File Type";
            }

            if($data['files']['attachment']['size'] > 2000000) {
                return "File too large";
            }

            $name_file = uniqid() . "." . $ekstensi_file;
            if(!move_uploaded_file($tmp_name, "../images/" . $name_file)) {
                return "Failed to upload file";
            }

            $attachment = $name_file;
        }

        $data = [
            'title' => $data['post']['title'],
            'content' => $data['post']['content'],
            'attachment' => $data['post']['attachment'],
            'category_id' => $data['post']['category'],
            'user_id' => $data['post']['user_id']
        ];

        if($attachment) {
            $data['attachment'] = $attachment;
        }

        return parent::updateData($id, $this->primary_key, $data, $this->table);
    }

    public function delete($id) 
    {
        return parent::deleteData($id, $this->primary_key, $this->table);
    }

    public function search($keyword)
    {
        $keyword = "WHERE title LIKE '%$keyword%'";
        return parent::search_data($keyword, $this->table)  ;
    }

    public function paginate($start, $limit) 
    {
        return parent::paginate_data($start, $limit, $this->table);
    }

    public function all2($start = null, $limit = null)
    {
    // Base query tanpa LIMIT
    $query = "SELECT categories.id_category, categories.name_category, user.id_user, user.full_name, user.password, user.email, user.bio, user.title, user.gender, user.avatar, user.phone, posts.id_post, posts.title, posts.content, posts.attachment, posts.user_id, posts.category_id
        FROM posts 
        JOIN categories ON posts.category_id = categories.id_category 
        JOIN user ON posts.user_id = user.id_user";
    
    // Tambahin LIMIT kalau $start dan $limit ada nilainya
    if (!is_null($start) && !is_null($limit)) {
        $query .= " LIMIT $start, $limit";
    }

        $result = mysqli_query($this->db, $query);
        return $this->convertData($result);
    }
    
    public function all_id($id) 
    {
        $query = "SELECT posts.*, categories.name_category, user.full_name, AS author_name FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN user ON posts.user_id = user.id_user WHERE posts.user_id = $id ORDER BY title";
    }

}