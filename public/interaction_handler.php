<?php
session_start();

// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log request yang masuk
file_put_contents('debug.log', date('Y-m-d H:i:s') . ' - Request received: ' . print_r($_POST, true) . "\n", FILE_APPEND);

require_once __DIR__ . '../../DB/Connection.php';

// Pastikan user sudah login
if (!isset($_SESSION['id_user'])) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Silakan login terlebih dahulu'
    ]);
    exit;
}

$connection = new Connection();
$conn = $connection->db;
$user_id = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_id']) && isset($_POST['action'])) {
    $post_id = (int)$_POST['post_id'];
    $action = $_POST['action'];
    
    // Cek apakah user sudah melakukan interaksi sebelumnya
    $check_query = "SELECT id FROM user_interactions 
                   WHERE user_id = ? AND post_id = ? AND interaction_type = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("iis", $user_id, $post_id, $action);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Mulai transaction
    $conn->begin_transaction();
    
    try {
        if ($result->num_rows > 0) {
            // Jika sudah ada interaksi, hapus (unlike/unbookmark)
            $delete_query = "DELETE FROM user_interactions 
                           WHERE user_id = ? AND post_id = ? AND interaction_type = ?";
            $stmt = $conn->prepare($delete_query);
            $stmt->bind_param("iis", $user_id, $post_id, $action);
            $stmt->execute();
            
            // Kurangi count
            $column = ($action === 'like') ? 'likes_count' : 'bookmarks_count';
            $update_query = "UPDATE post_interactions 
                           SET $column = GREATEST($column - 1, 0) 
                           WHERE post_id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
            
            $is_active = false;
        } else {
            // Jika belum ada interaksi, tambahkan
            $insert_query = "INSERT INTO user_interactions (user_id, post_id, interaction_type) 
                           VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("iis", $user_id, $post_id, $action);
            $stmt->execute();
            
            // Tambah count
            $column = ($action === 'like') ? 'likes_count' : 'bookmarks_count';
            $update_query = "UPDATE post_interactions 
                           SET $column = $column + 1 
                           WHERE post_id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
            
            $is_active = true;
        }
        
        // Commit transaction
        $conn->commit();
        
        // Ambil nilai terbaru
        $query = "SELECT likes_count, bookmarks_count FROM post_interactions WHERE post_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        echo json_encode([
            'success' => true,
            'likes_count' => $row['likes_count'],
            'bookmarks_count' => $row['bookmarks_count'],
            'is_active' => $is_active
        ]);
        
    } catch (Exception $e) {
        // Rollback jika terjadi error
        $conn->rollback();
        echo json_encode([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request'
    ]);
}
?>
