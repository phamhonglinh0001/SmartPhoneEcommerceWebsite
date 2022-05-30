<?php
class Mausac extends Database{
    function getTen($id){
        $sql = "select * from mau_sac where id_ms='$id'";
        $data = $this->query($sql);
        if(count($data)>0) return $data[0]["ten_ms"]; else return false;
    }
    function kiemTraTrungTen($ten){
        $sql = "select * from mau_sac where ten_ms='$ten'";
        $data = $this->query($sql);
        if(count($data)>0) return true; else return false;
    }
    function add($ten){
        $sql = "insert into mau_sac(ten_ms) values ('$ten')";
        $this->query($sql);
    }
}
?>