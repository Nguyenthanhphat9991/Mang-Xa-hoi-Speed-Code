<?php 
	Class Ketnoi{
		#khởi tạo các biến
		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "mang_xa_hoi";
		public $con;
		
		#__construct kiểm tra kết nối
		public function __construct(){
			try {
				$this->con = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "kết nối lỗi" . $e->getMessage();
			}
		}
    
        #đăng nhập
		public function select_dangnhap($data){
            $email =$data['email'];
            $pass =$data['pass'];
            $query = "select * from user_1 where user_email='$email' AND user_pass='$pass' AND status='hoatdong'";
            $check_user = $this->con->query($query);

			if ($sql = $this->con->query($query)) {
                if($check_user == 1){
                    $_SESSION['user_email'] = $data['email'];
                    echo "<script>window.open('../view/home.php', '_self')</script>";
                }else{
                    echo"<script>alert('tài khoản hoặc mật khẩu không chính xác')</script>";
                }
			}
			return $data;
        }

        #header
		public function select_header(){
            $user_email = $_SESSION['user_email'];
            $data = null;
            $query = "select * from user_1 where user_email='$user_email'";
            $run_user = $this->con->query($query);
            $row=mysqli_fetch_assoc($run_user);
            return $row;
        }

        #thêm tài khoản
		public function insert_dangki($insert){
			$query = 
            "insert into user_1 (f_name,l_name,user_name,describe_user,Relationship,user_pass,
                                user_email,user_country, user_gender,user_birthday,user_image,
                                user_cover,user_reg_date,status,posts,recovery_account)
                values ('$insert[first_name]','$insert[last_name]','$insert[user_name]','$insert[describe_user]','$insert[Relationship]',
                '$insert[user_pass]','$insert[user_email]','$insert[user_country]','$insert[user_gender]','$insert[user_birthday]',
                '$insert[user_image]','$insert[user_cover]',NOW(),'$insert[status]','$insert[posts]','$insert[recovery_account]')
            ";
            
            $email =$insert['user_email'];
            $check_email = "select * from user_1 where user_email='$email'";
            $run_email = $this->con->query($check_email);
            $check = mysqli_num_rows($run_email);
            if($check == 1){
                echo "<script>alert('Email đã tồn tại, vui lòng chọn email khác!')</script>";
                echo "<script>window.open('../view/v_dangki.php', '_self')</script>";
                exit();
            }    
			if ($sql = $this->con->query($query)) {
                
				return true;
			}else{
				return false;
			}
		}

        #select home
        public function select_home(){
            
            $get_user = "select * from user_1 where user_email='$user'";
            $run_user = mysqli_query($con,$get_user);
            $row = mysqli_fetch_array($run_user);
        }
        #thêm bài viết vơi hình ảnh và nội dung
		public function insert_post($insert_post){
            $query = "insert into posts (user_id,post_content,upload_image,post_date) 
            values ('$insert_post[user_id]','No','$insert_post[upload_image]',NOW())";
            var_dump($query);die;
            $run = $this->con->query($query);
            if($run){
                echo "<script>alert('Bài viết đã được gửi lên!!')</script>";
                echo "<script>window.open('../view/home.php', '_self')</script>";

                $update = "update user_1 set posts='yes' where user_id='$user_id'";
                $run_update = $this->con->query($update);
			}
        }
        
		#__destruct dừng kết nối csdl
		function __destruct() {
			mysqli_close($this->con);  
		}
	}
 ?>