<?php
    $get_id = $_GET['post_id'];
    $get_cmt = "select * from binh_luan where post_id='$get_id' ORDER by 1 DESC";
    $run_cmt = mysqli_query($con, $get_cmt);
    while($row = mysqli_fetch_array($run_cmt)) 
    {
        $cmt =$row['binh_luan'];
        $cmt_name = $row['nguoi_binh_luan'];
        $date =$row['thoi_gian'];
            echo"
                <div class='row'>
                    <div class='col-md-6 col-md-offset-3'>
                        <div class='panel panel-info'>
                            <div class='panel-body'>
                                <div>
                                    <h4><strong>$cmt_name</strong><i> đã bình luận</i> lúc $date</h4>
                                    <p class='text-primary'style='margin-left:5px; font-size:20pxx;'>$cmt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";

    }
?>
