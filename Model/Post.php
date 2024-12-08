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

        
        $tags_id = explode(',', $data["post"]["tags"][0]);   

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
            if(!move_uploaded_file($tmp_name, "/../images/" . $name_file)) {
                return "Failed to upload file";
            }

            $attachment = $name_file;
        }

        $data = [
            'title' => $data['post']['title'],
            'content' => $data['post']['content'],
            'category_id' => $data['post']['category'],
            'user_id' => $data['post']['user_id']
        ];
        
        if($attachment) {
            $data['attachment'] = $attachment;
        }

        parent::createData($data, $this->table);

        $query_id = mysqli_insert_id($this->db);
        foreach ($tags_id as $tag) {
            $query = "INSERT INTO pivot_posts_tags (post_id_pivot, tag_id_pivot) VALUES ('$query_id', '$tag')";

            $result = mysqli_query($this->db, $query);
        };

        return $data;   
        
    }

    public function all()
    {
        return parent::allData($this->table);
    }

    public function find($id)
    {
        return parent::findData($id, $this->primary_key, $this->table);
    }

    public function update($id, $datas)
    {
        $tags_id = $datas["post"]["tags"];
        $attachment = '';
        if ($datas["files"]["attachment"]["name"] !== '') {
            $nama_file = $datas["files"]["attachment"]["name"];
            $tmp_name = $datas["files"]["attachment"]["tmp_name"];
            $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $ekstensi_allowed = ["jpg", "png", "heic", "gif", "webp", "raw"];
            if (!in_array($ekstensi_file, $ekstensi_allowed)) {
                return "Ektensi file tidak sesuai";
            }

            if ($datas["files"]["attachment"]["size"] > 5000000) {
                return "Ukuran file tidak boleh lebih dari 5MB";
            }

            $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
            move_uploaded_file($tmp_name, "./../public/img/konten/" . $nama_file);
            $attachment = $nama_file;
        }

        $datas = [
            "title" => $datas["post"]["title"],
            "content" => $datas["post"]["content"],
            "user_id" => $datas["post"]["user_id"],
            "category_id" => $datas["post"]["category_id"],
        ];

        if ($attachment !== '') {
            $datas["attachment"] = $attachment;
        }
        parent::updateData($this->table, $id, $datas, $this->primary_key);

        $query_delete = "DELETE FROM pivot_posts_tags WHERE post_id_pivot = '$id'";
        $result_delete = mysqli_query($this->db, $query_delete);

        foreach ($tags_id as $tag) {
            $query_insert = "INSERT INTO pivot_posts_tags (post_id_pivot, tag_id_pivot) VALUES ('$id', '$tag')";
            $result = mysqli_query($this->db, $query_insert);
        };
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

    public function all_3($start, $limit)
    {
      // ambil semua data post dengan semua tag yan ada di pivot_posts_tags
      $query = "SELECT categories.id_category, categories.name_category, user.id_user, user.full_name, user.password, user.email, user.bio, user.title, user.gender, user.avatar, user.phone, posts.id_post, posts.title, posts.content, posts.attachment, posts.user_id, posts.category_id, GROUP_CONCAT(tags.name_tag SEPARATOR ', ') AS tags FROM posts JOIN pivot_posts_tags ON posts.id_post = pivot_posts_tags.post_id_pivot JOIN tags ON pivot_posts_tags.tag_id_pivot = tags.id_tag JOIN categories ON posts.category_id = categories.id_category JOIN user ON posts.user_id = user.id_user WHERE posts.id_post = pivot_posts_tags.post_id_pivot GROUP BY posts.id_post, posts.title, posts.attachment, posts.content, categories.name_category, user.full_name, user.avatar LIMIT $start, $limit";
      $result = mysqli_query($this->db, $query);
      return $this->convertData($result);
    }

    public function getPostsByTag($tag) {
        $query = "SELECT posts.*, user.full_name, user.avatar, categories.name_category 
                FROM posts 
                JOIN user ON posts.user_id = user.id_user
                JOIN categories ON posts.category_id = categories.id_category
                JOIN pivot_posts_tags ON posts.id_post = pivot_posts_tags.post_id_pivot
                JOIN tags ON pivot_posts_tags.tag_id_pivot = tags.id_tag
                WHERE tags.name_tag = ?
                ORDER BY posts.id_post DESC";
        $stmt = mysqli_prepare($this->db, $query);
        mysqli_stmt_bind_param($stmt, "s", $tag);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        return $this->convertData($result);
    }

public function getArticleCountByCategory() {
        $sql = "SELECT category_id, COUNT(*) as total 
                FROM posts 
                GROUP BY category_id";
        $result = mysqli_query($this->db, $sql);
        
        $counts = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $counts[$row['category_id']] = $row['total'];
        }
        
        return $counts;
    }

    public function getPostsByCategory($category_id) {
    $query = "SELECT posts.*, user.full_name, user.avatar, categories.name_category, 
              GROUP_CONCAT(tags.name_tag SEPARATOR ', ') as tags
              FROM posts 
              JOIN user ON posts.user_id = user.id_user
              JOIN categories ON posts.category_id = categories.id_category
              LEFT JOIN pivot_posts_tags ON posts.id_post = pivot_posts_tags.post_id_pivot
              LEFT JOIN tags ON pivot_posts_tags.tag_id_pivot = tags.id_tag
              WHERE posts.category_id = ?
              GROUP BY posts.id_post
              ORDER BY posts.id_post DESC";
              
    $stmt = mysqli_prepare($this->db, $query);
    mysqli_stmt_bind_param($stmt, "i", $category_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return $this->convertData($result);
}

public function getTopAuthors($limit = 5) {
    $sql = "SELECT u.id_user, u.full_name, u.avatar, COUNT(p.id_post) as post_count 
            FROM user u
            LEFT JOIN posts p ON u.id_user = p.user_id 
            GROUP BY u.id_user
            ORDER BY post_count DESC
            LIMIT ?";
            
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

}