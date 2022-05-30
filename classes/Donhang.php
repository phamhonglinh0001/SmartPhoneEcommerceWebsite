<?php
class Donhang extends Database{
    function getAll($id){
        $sql = "select * from don_hang where id_dh='$id'";
        $data = $this->query($sql);
        if(count($data)>0) return $data[0]; else return false;
    }
    function ad_laydonhang($trangthai){
        $sql = "select * from don_hang where trangthai_dh='$trangthai'";
        $data = $this->query($sql);
        if(count($data)>0) return $data; else return false;
    }
    function update($id, $tt, $gt){
        $sql = "update don_hang set $tt='$gt'
        where id_dh='$id'";
        $this->query($sql);
    }
    function ad_update_trangthai($id, $tt){
        if($tt=="Đã giao hàng") $this->query("update don_hang set trangthai_dh='$tt', ngaynhanhang=NOW() where id_dh='$id'");
        else $this->query("update don_hang set trangthai_dh='$tt' where id_dh='$id'");
    }
    function laydangdonggoi($id_kh){
        $sql = "select * from don_hang where trangthai_dh='Đang đóng gói' and id_kh='$id_kh'";
        $data = $this->query($sql);
        $sl = count($data);
        if($sl>0) return $data; else return false;
    }
    function layChoXN($id_kh){
        $sql = "select * from don_hang where trangthai_dh='Chờ xác nhận' and id_kh='$id_kh' order by id_dh desc";
        $data = $this->query($sql);
        $sl = count($data);
        if($sl>0) return $data; else return false;
    }
    function layDgGH($id_kh){
        $sql = "select * from don_hang where trangthai_dh='Đang giao hàng' and id_kh='$id_kh' order by id_dh desc";
        $data = $this->query($sql);
        $sl = count($data);
        if($sl>0) return $data; else return false;
    }
    function layDaGH($id_kh){
        $sql = "select * from don_hang where trangthai_dh='Đã giao hàng' and id_kh='$id_kh' order by id_dh desc";
        $data = $this->query($sql);
        $sl = count($data);
        if($sl>0) return $data; else return false;
    }
    function layHuy($id_kh){
        $sql = "select * from don_hang where trangthai_dh='Đã hủy' and id_kh='$id_kh' order by id_dh desc";
        $data = $this->query($sql);
        $sl = count($data);
        if($sl>0) return $data; else return false;
    }
    function them($id_kh, $id_dc){
        $gio = date('Y-m-d H:i:s');
        $sql = "insert into don_hang(ngaydathang, id_kh, id_dc, trangthai_dh) values ('$gio','$id_kh','$id_dc', 'Chờ xác nhận')";
        $this->query($sql);

    }
    function maxId(){
        $sql = "select max(id_dh) from don_hang";
        return $this->query($sql)[0]["max(id_dh)"];
    }
    function xoa($id){
        $sql = "update don_hang set trangthai_dh='Đã hủy' where id_dh='$id'";
        $this->query($sql);
        $sql = "update chi_tiet_gio_hang set trang_thai='Đã hủy' where id_dh='$id'";
        $this->query($sql);
        $sql = "select * from chi_tiet_gio_hang where id_dh='$id'";
        $data = $this->query($sql);
        foreach($data as $x){
            $id_ms = $x["id_ms"];
            $id_ddt = $x["id_ddt"];
            $sql = "select so_luong from so_luong where id_ms='$id_ms' and id_ddt='$id_ddt'";
            $sl_cu = $this->query($sql)[0]["so_luong"];

            $sl_moi = $x["so_luong"]+$sl_cu;
            $sql = "update so_luong set so_luong='$sl_moi' where id_ms='$id_ms' and id_ddt='$id_ddt'";
            $this->query($sql);

        }
        
    }
    function layIdddt($id){
        $sql = "select id_ddt_huy from don_hang where id_dh='$id'";
        $data = $this->query($sql);
        $sl = count($data);
        if($sl>0) return $data[0]["id_ddt_huy"]; else return false;
    }
}

?>