<?php
class Giohang extends Database{
    function getGioHang($id_kh){
        $sql = "select * from chi_tiet_gio_hang
        join gio_hang on chi_tiet_gio_hang.id_gh=gio_hang.id_gh 
        join khach_hang on khach_hang.id_kh=gio_hang.id_kh 
        join dong_dienthoai on dong_dienthoai.id_ddt=chi_tiet_gio_hang.id_ddt
        join mau_sac on mau_sac.id_ms=chi_tiet_gio_hang.id_ms
        where khach_hang.id_kh='$id_kh' and chi_tiet_gio_hang.trang_thai='Trong giỏ'";
        $data = $this->query($sql);
        if(count($data)>0) return $data; else return false;
    }
    function update_tt($id, $tt, $gt){
        $sql = "update chi_tiet_gio_hang set $tt='$gt'
        where id='$id'";
        $this->query($sql);
    }
    function getItem($id){
        $sql = "select * from chi_tiet_gio_hang
        join mau_sac on mau_sac.id_ms=chi_tiet_gio_hang.id_ms
        where chi_tiet_gio_hang.id='$id'";
        $data = $this->query($sql);
        if(count($data)>0) return $data[0]; else return false;
    }
    
    function update($sl, $id){
        $sql = "update chi_tiet_gio_hang set so_luong='$sl'
        where chi_tiet_gio_hang.id='$id'";
        $this->query($sql);
    }
    function update2($sl, $ms, $ddt, $gh){
        $sql = "update chi_tiet_gio_hang set so_luong='$sl'
        where chi_tiet_gio_hang.trang_thai='Trong giỏ' and id_ms='$ms' and id_ddt='$ddt' and id_gh='$gh'";
        $this->query($sql);
    }
    function delete($id){
        $sql = "delete from chi_tiet_gio_hang
        where chi_tiet_gio_hang.id='$id'";
        $this->query($sql);
    }
    function getSlCu($id_ms,$id_ddt, $id_kh){
        $sql = "select * from chi_tiet_gio_hang
        join gio_hang on chi_tiet_gio_hang.id_gh=gio_hang.id_gh 
        join khach_hang on khach_hang.id_kh=gio_hang.id_kh 
        join dong_dienthoai on dong_dienthoai.id_ddt=chi_tiet_gio_hang.id_ddt
        join mau_sac on mau_sac.id_ms=chi_tiet_gio_hang.id_ms
        where chi_tiet_gio_hang.trang_thai='Trong giỏ' and khach_hang.id_kh='$id_kh' and chi_tiet_gio_hang.id_ms='$id_ms' and chi_tiet_gio_hang.id_ddt='$id_ddt'";
        $data = $this->query($sql);
        if(count($data)>0) return $data[0]["so_luong"]; else return false;
    }
    function getIdGioHang($id_kh){
        $sql = "select id_gh from gio_hang
        where id_kh='$id_kh'";
        $data = $this->query($sql);
        if(count($data)>0) return $data[0]["id_gh"]; else return false;
    }
    function add($id_ddt, $id_ms, $so_luong,$id_kh, $trang_thai='Trong giỏ'){
        $id_gh = (new Giohang)->getIdGioHang($id_kh);
        $sql = "insert into chi_tiet_gio_hang(id_ddt, id_gh, id_ms, so_luong, trang_thai)
        values ('$id_ddt','$id_gh','$id_ms','$so_luong','$trang_thai')"
        ;
        $this->query($sql);
    }
    function add2($id_ddt, $id_ms, $so_luong,$id_kh, $trang_thai='Đã thanh toán', $gia_mua, $id_dh){
        $id_gh = (new Giohang)->getIdGioHang($id_kh);
        $sql = "insert into chi_tiet_gio_hang(id_ddt, id_gh, id_ms, so_luong, trang_thai, gia_mua, id_dh)
        values ('$id_ddt','$id_gh','$id_ms','$so_luong','$trang_thai','$gia_mua', '$id_dh')"
        ;
        $this->query($sql);
    }
    function getFromDH($id_dh){
        $sql = "select * from chi_tiet_gio_hang join mau_sac on mau_sac.id_ms=chi_tiet_gio_hang.id_ms
        where id_dh='$id_dh'";
        $data = $this->query($sql);
        if(count($data)>0) return $data; else return false;
    }
    
   
}

?>