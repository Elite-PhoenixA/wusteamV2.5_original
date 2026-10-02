<?php
/**
 * @author Vương Thanh Diệu
 */
if (!class_exists('DatabaseConnection')){header('location: /');}
class Authentication extends DatabaseConnection {
    public function Admin($taikhoan) {
        global $TD;
        if (isset($_COOKIE['admin'])) {
            if (decrypt($_COOKIE['admin'], $TD->Setting('key-aes'))) {
                $user = $this->Administrator($taikhoan);
                if ($user !== null && isset($user['rank']) && (THANHDIEU($user['rank']) !== 'admin' && THANHDIEU($user['rank']) !== 'partner')) {
                    $this->___Logout("/admin/auth/logout");
                }
                if (isset($user['banned']) && THANHDIEU($user['banned']) == 1) {
                    $this->___Logout("/admin/auth/logout");
                }
            } else {
                $this->___Logout("/admin/auth/logout");
            }
        } else {
            $this->___Login("/admin/auth/login");
        }
    }
    
    private function Administrator($taikhoan) {
        return self::ThanhDieuDB()->query("SELECT * FROM `users` WHERE `username`='$taikhoan'")->fetch_assoc();
    }

    private function ___Logout($oOo) {
        setcookie('admin', '', time() - 3600, "/", "", true, true);
        $this->___Login($oOo);
    }

    private function ___Login($oOo) {
        header("Location: $oOo");
        exit;
    }
}
(new Authentication())->Admin($taikhoan);
class WSTitle {
    private $current_url;
    private $titles = [
        'dashboard' => 'Dashboard',
        'analytics' => 'Dữ Liệu Thống Kê',
        'card' => 'Lịch Sử Nạp Thẻ Cào',
        'bank' => 'Lịch Sử Nạp Ngân Hàng',
        'payment' => 'Cấu Hình Nạp Tiền',
        'banned' => 'Thành Viên Bị Cấm',
        'logs' => 'Hoạt Động Gần Đây',
        'log' => 'Nhật Ký Hoạt Động',
        'report' => 'Quản Lý Đơn Tố Cáo',
        'comments' => 'Quản Lý Bình Luận',
        'verify' => 'Duyệt Phiếu Xác Minh',
    ];
    public function __construct($current_url) {
        $this->current_url = $current_url;
    }
    public function v3() {
        $parse_url = trim(parse_url($this->current_url,PHP_URL_PATH),'/');
        if(strpos($parse_url,'users/list')!==false)return'Danh Sách Thành Viên';    
        if(strpos($parse_url,'create/product')!==false)return'Đăng Sản Phẩm Mới'; 
        if(strpos($parse_url,'history/product')!==false)return'Lịch Sử Mua Mã Nguồn';  
        if(strpos($parse_url,'manager/plan')!==false)return'Quản Lý Gói Thành Viên';                            
        if(strpos($parse_url,'settings')!== false)return'Cài Đặt Hệ Thống';
        if(strpos($parse_url,'view-report/t/')!==false)return'Xem Đơn Tố Cáo';   
        if(strpos($parse_url,'edit/')!==false)return'Chỉnh Sửa Thành Viên';   
        if(strpos($parse_url,'products/list')!==false)return'Danh Sách Sản Phẩm';      
        return $this->titles[pathinfo(basename($parse_url),PATHINFO_FILENAME)]??'Trang Quản Trị';
    }
}
class AdminURL {
  public function Path() {
      return '/admin';
  }
}