<?php
class Danhgia extends Database{
    function getAll(){
        return $this->query("select * from danh_gia order by ngay_dg desc");
    }
    function layDanhGia($id){
        $sql = "select giatri_dg from danh_gia where id_ddt=".$id;
        $data = $this->query($sql);
        $tong = 0;
        $sl = count($data);
        if($sl>0){
            foreach($data as $item){
                $tong += $item["giatri_dg"];
            }
            return round($tong/$sl, 1);
        }else return false;
    }
    function layDanhGiaByKH($id_kh, $id_ddt){
        $sql = "select giatri_dg from danh_gia where id_kh=$id_kh and id_ddt=$id_ddt";
        $data = $this->query($sql);
        $sl = count($data);
        if($sl==1){
            return $data[0]["giatri_dg"];
        }else return false;
    }
    function them($id_ddt, $id_kh, $dg){
        
        $sql = "insert into danh_gia(id_ddt, id_kh, ngay_dg, giatri_dg) values('$id_ddt', '$id_kh', NOW(), '$dg')";
        $this->query($sql);
    }
    function sua($id_ddt, $id_kh, $dg){
        
        $sql = "update danh_gia set ngay_dg=NOW(), giatri_dg='$dg' where id_ddt='$id_ddt' and id_kh='$id_kh'";
        $this->query($sql);
    }
    function xoa($id_ddt, $id_kh){
        $sql = "delete from danh_gia where id_ddt='$id_ddt' and id_kh='$id_kh'";
        $this->query($sql);
    }
}

?>