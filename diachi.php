<?php
    $dc = new Diachi();
    $ttdc = $dc->layTatCa($ttkh[0]["id_kh"]);

?>

<div class="row" style="margin-bottom: 100px;">
    <div>
        <div class="float-end">
            <button class="btn btn-success">
                <a href="themdiachi.php" class="text-white text-decoration-none">Thêm địa chỉ</a>
            </button>
        </div>
        <h3>Địa chỉ</h3>
        <span class="text-danger">
            <?php
                if(isset($_SESSION["err"])){
                    echo $_SESSION["err"];
                    unset($_SESSION["err"]);
                }
            ?>
        </span>
        <br>
        <div class="row">
            <hr>
        </div>
    </div>
    <?php 
    foreach($ttdc as $dc){
        if($dc["macdinh"]==1) $macdinh ='  <span class="badge bg-success">Mặc định</span>'; else $macdinh='';
        if($macdinh=='') $tlmacdinh = '
        <div>
        <a href="xulydiachi.php?cn=md&id='
        .$dc["id_dc"].
        '">
            <button class="btn btn-warning">Thiết lập mặc định</button>
        </a>
        <br>
        <br>
        </div>'
        ; else $tlmacdinh = '';
        echo
        '
        <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table thongtin table-borderless">
                   
                    <tr>
                        
                        <td>
                        '.$macdinh.'&nbsp;&nbsp;'.$dc["chitietdiachi"].'
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        
        <div class="col-md-4 text-end">
            <a href="xulydiachi.php?cn=sua&id='
            .$dc["id_dc"].
            '">Sửa</a>
            &#160;
            <a href="xulydiachi.php?cn=xoa&id='
            .$dc["id_dc"].
            '">Xóa</a>
            <br><br>
            '.$tlmacdinh.'
        </div>
        <hr>
    </div>
        ';
    }
    
    ?>
</div>