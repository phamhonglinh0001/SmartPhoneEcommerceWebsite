<?php
class Khuyenmai extends Database{
    function layTatCa($id){
        $gio = date('Y-m-d H:i:s');
        $sql = "select * from khuyen_mai where thoigian_bd<'$gio' and thoigian_kt>'$gio' and id_km=".$id;
        $data = $this->query($sql);
        $sl = count($data);
        if($sl == 1){
            return $data[0];
        }else return false;
    }
    function layGtKMById($id){
        $data = $this->query("select giatri_km from khuyen_mai where id_km='$id'");
        if(count($data)>0) return $data[0]["giatri_km"]; else return false;
    }
    function ad_layAll(){
        $sql = "select * from khuyen_mai";
        return $this->query($sql);
    }
    function getOne($id){
        return $this->query("select * from khuyen_mai where id_km='$id'")[0];
    }
    function sua($id, $ten, $gt, $bd, $kt){
        $sql = "update khuyen_mai set ten_km='$ten', giatri_km='$gt', thoigian_bd='$bd', thoigian_kt='$kt' where id_km='$id'";
        $this->query($sql);
    }
    function xoa($id){
        $this->query("delete from khuyen_mai where id_km='$id'");//có set null trong dong_dienthoai rồi
    }
    function them($ten, $gt, $bd, $kt){
        $sql = "insert into khuyen_mai(ten_km, giatri_km, thoigian_bd, thoigian_kt) values('$ten', '$gt', '$bd', '$kt')";
        $this->query($sql);
    }
}

?>