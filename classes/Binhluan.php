<?php
class Binhluan extends Database{
    function layTatCa($id_kh, $id_ddt){
        $sql = "select * from binh_luan where id_kh=$id_kh and id_ddt=$id_ddt";
        $data = $this->query($sql);
        $sl = count($data);
        if($sl==1){
            return $data[0];
        }else return false;
    }
    function getAll(){
        return $this->query("select * from binh_luan");
    }
    function them($id_ddt, $nd, $id_kh){
        
        $sql = "insert into binh_luan(id_ddt, id_kh, thoigian_bl, noidung_bl) values('$id_ddt', '$id_kh', NOW(), '$nd')";
        $this->query($sql);
    }
    function sua($id_ddt, $nd, $id_kh){
        
        $sql = "update binh_luan set thoigian_bl=NOW(), noidung_bl='$nd' where id_ddt='$id_ddt' and id_kh='$id_kh'";
        $this->query($sql);
    }
    function xoa($id_ddt, $id_kh){
        $sql = "delete from binh_luan where id_ddt='$id_ddt' and id_kh='$id_kh'";
        $this->query($sql);
    }
}
?>