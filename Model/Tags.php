<?php 

require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Interface/ModelInterface.php';
require_once __DIR__ . '/Model.php';

class Tags extends Model {
    protected $table = "tags";
    protected $primary_key = "id_tag";

    public function create($data)
    {
        return parent::createData($data, $this->table);
    }

    public function all()
    {
        return parent::allData($this->table);
    }

    public function all_id($id)
    {
        $query = "SELECT posts.*,
                categories.name_category, 
                users.full_name AS author_name 
                FROM posts 
                JOIN categories ON posts.category_id = categories.id_category 
                JOIN users ON posts.user_id = users.id_user 
                WHERE posts.user_id = '$id' 
                ORDER BY title";
        $result = mysqli_query($this->db, $query);
        return parent::convertData($result);
    }

    public function find($id)
    {
        return parent::findData($id, $this->primary_key, $this->table);
    }

    public function update($id, $data) 
    {
        return parent::updateData($id, $this->primary_key, $data, $this->table);
    }

    public function delete($id) 
    {
        return parent::deleteData($id, $this->primary_key, $this->table);
    }

    public function search($keyword)
    {
        $keyword = "WHERE name_tag LIKE '%$keyword%'";
        return parent::search_data($keyword, $this->table);
    }

    public function paginate($start, $limit) 
    {
        return parent::paginate_data($start, $limit, $this->table);
    }

    public function all_blog()
    {
        $query = "SELECT posts.id_post, posts.content, posts.attachment, posts.title, categories.name_category, posts.user_id, user.full_name, user.avatar, pivot_posts_tags.post_id_pivot, pivot_posts_tags.tag_id_pivot, tags.name_tag FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN user ON posts.user_id = user.id_user JOIN pivot_posts_tags ON pivot_posts_tags.post_id_pivot = posts.id_post JOIN tags ON pivot_posts_tags.tag_id_pivot = tags.id_tag";
        $result = mysqli_query($this->db, $query);
        return $this->convertData($result);
    }

}