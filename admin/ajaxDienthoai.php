<?php
    include("../config.php");
    include("../autoload.php");
    session_start();
   
        if(isset($_GET["id_ddt"])){
            $dt = (new Dienthoai)->layByIdDDT($_GET["id_ddt"]);
            if(isset($dt)&&!is_null($dt)){
                echo
                '
                <tr>
                        <th>
                            Số IMEI
                        </th>
                        <th>
                            Màu sắc
                        </th>
                        <th>
                            Trạng thái
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                ';
                foreach($dt as $x){
                    echo
                    '<tr>';
                    echo
                    '
                    <td>
                        '.$x["imei"].'
                    </td>
                    <td>
                        '.$x["mausac"].'
                    </td>
                    <td>
                        '.$x["trangthaidienthoai"].'
                    </td>
                    ';
                    if($x["trangthaidienthoai"]=="Còn hàng"){
                        echo
                        '
                        <td>
                            
                            <a href="xoadienthoai.php?id='.$x["imei"].'" class="btn btn-danger">Xóa</a>
                        </td>
                        ';
                    }else{
                        echo
                        '<td></td>';
                    }

                    echo
                    '</tr>';
                }
            }else{
                echo "Không có điện thoại";
            }
        }
?>