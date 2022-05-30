<?php
class Admin extends Database{
    function layTen($id_tk){
        $data = $this->query("select ten_admin from admin where id_taikhoan='$id_tk'");
        if(count($data)>0) return $data[0]["ten_admin"]; else return false;
    }
}
?>