<?php
    include("../config.php");
    include("../autoload.php");
    session_start();
   
        if(isset($_GET["id_ddt"])&&$_GET["id_ddt"]!="0"){
           $x = (new Thongso)->layTatCa($_GET["id_ddt"]);
           if($x!=false){
               echo
               '
               <a class="btn btn-primary" href="suathongso.php?id_ddt='.$_GET["id_ddt"].'" >Sửa</a>
               <a class="btn btn-danger" href="xoathongso.php?id_ddt='.$_GET["id_ddt"].'" >Xóa</a><br>
               ';
               echo
               '
               <div class="table-responsive">
               ';
               echo
               '
               <table class="table table-hover">
               ';
               
                   echo
                   '
                   <tr>
                    <th>
                        Công nghệ màn hình
                    </th>
                    <td>
                        '.$x["congnghemanhinh"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Độ phân giải
                    </th>
                    <td>
                        '.$x["dophangiai"].'
                    </td>
                   </tr>
                   <tr>
                   <th>
                       Kích thước màn hình
                   </th>
                   <td>
                       '.$x["kichthuocmanhinh"].'
                   </td>
                  </tr>
                  <tr>
                    <th>
                        Camera sau
                    </th>
                    <td>
                        '.$x["camsau"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Camera trước
                    </th>
                    <td>
                        '.$x["camtruoc"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Hệ điều hành
                    </th>
                    <td>
                        '.$x["hedieuhanh"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        CPU
                    </th>
                    <td>
                        '.$x["cpu"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Tốc độ CPU
                    </th>
                    <td>
                        '.$x["tocdocpu"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        GPU
                    </th>
                    <td>
                        '.$x["gpu"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        RAM
                    </th>
                    <td>
                        '.$x["ram"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        ROM
                    </th>
                    <td>
                        '.$x["rom"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Cổng sạc
                    </th>
                    <td>
                        '.$x["congsac"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Cổng tai nghe
                    </th>
                    <td>
                        '.$x["congtainghe"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Loại pin
                    </th>
                    <td>
                        '.$x["loaipin"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Dung lượng pin
                    </th>
                    <td>
                        '.$x["dungluongpin"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Công suất sạc
                    </th>
                    <td>
                        '.$x["congsuatsac"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Dài x rộng x dày
                    </th>
                    <td>
                        '.$x["dai"].' x '.$x["rong"].' x '.$x["day"].' 
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Ngày ra mắt
                    </th>
                    <td>
                        '.$x["ngayramat"].'
                    </td>
                   </tr>
                   <tr>
                    <th>
                        Trọng lượng
                    </th>
                    <td>
                        '.$x["nang"].'
                    </td>
                   </tr>

                   ';
              
               echo
               '
               </table>
               ';
               echo
               '
               </div>
               ';
           }else{
               echo 
               '
               <a class="btn btn-success" href="themthongso.php?id_ddt='.$_GET["id_ddt"].'" >Thêm thông số</a>
               ';
               echo
               '
               Không có thông số
               ';
           }
        }else{
            if($_GET["id_ddt"]=="0") echo "";
        }
?>