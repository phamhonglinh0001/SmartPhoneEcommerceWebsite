<?php
class Diachi extends Database{
    function layTatCa($id_kh){
        $sql = "select * from dia_chi where id_kh = ".$id_kh;
        
        return $this->query($sql);
    }
    function layTatCaByDC($id_dc){
        $sql = "select * from dia_chi where id_dc = ".$id_dc;
        
        return $this->query($sql);
    }
    function xoa($id){
        $data = $this->query("select * from don_hang where id_dc='$id' and(trangthai_dh='Chờ xác nhận' or trangthai_dh='Đang giao hàng')");
        if(count($data)==0){
            $sql = "delete from dia_chi where id_dc = ".$id;
            $this->query($sql);
            return true;
        }else return false;
        
    }
    function capnhatmacdinh($id_kh, $id_dc){
        $sql = "update dia_chi set macdinh=1 where id_dc = ".$id_dc;
        $this->query($sql);
        $sql = "update dia_chi set macdinh=0 where id_kh = ".$id_kh." and not(id_dc=".$id_dc.")";
        $this->query($sql);
    }
    function capnhatdiachi($diachi, $id_dc){
        $arr = array("$diachi");
        $sql = "update dia_chi set chitietdiachi=? where id_dc = ".$id_dc;
        $this->query($sql, $arr);
    }
    function them($id_kh,$diachi, $md){
        $arr = array("$id_kh", "$diachi", "$md");
        $sql = "insert into dia_chi (id_kh, chitietdiachi, macdinh) ";
        $sql .= "values(?, ?, ?)";
        return $this->query($sql, $arr);
    }
}

?>