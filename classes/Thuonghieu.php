<?php
class Thuonghieu extends Database{
    function layTatCa(){
        $sql="select * from thuong_hieu order by id_th asc";
        return $this->query($sql);
    }
    function layTenById($id){
        $data = $this->query("select ten_th from thuong_hieu where id_th='$id'");
        if(count($data)>0) return $data[0]["ten_th"];else return false;
    }
    function layMot($id){
        $sql ="select * from thuong_hieu where id_th='$id'";
        return $this->query($sql)[0];
    }
    function suaTen($id, $ten){
        $this->query("update thuong_hieu set ten_th='$ten' where id_th='$id'");
    }
    function suaAnh($id, $anh){
        $this->query("update thuong_hieu set anh='$anh' where id_th='$id'");
    }
    function xoa($id){
        $anh = $this->query("select anh from thuong_hieu where id_th='$id'")[0]["anh"];
        $this->query("delete from thuong_hieu where id_th='$id'");
        $link = ROOT."/assets/img/thuonghieu/".$anh;
        if(file_exists($link))
        unlink($link);
    }
    function ktTrungTen($ten){
        $sql = "select ten_th from thuong_hieu where ten_th='$ten'";
        $data = $this->query($sql);
        if(count($data)>0) return true; else return false;
    }
    function them($ten, $anh){
        $sql = "insert into thuong_hieu(ten_th, anh) values ('$ten', '$anh')";
        $this->query($sql);
    }
    function timMaxId(){
        $data = $this->query("select max(id_th) from thuong_hieu")[0];
        return $data["max(id_th)"];
    }
}

?>