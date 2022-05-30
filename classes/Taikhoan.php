<?php
class Taikhoan extends Database
{
    public function capNhatAnh($anh, $id_tk){
        $this->query("update tai_khoan set avatar='$anh' where id_taikhoan='$id_tk'");
    }
    public function getAll($u, $p){
        $arr = array("$u", "$p");
        $sql = "select * from tai_khoan where username = ? and password = ?";
        $this->data = $this->query($sql, $arr);
        return $this->data;
    }
    public function getUsername($id){
        $sql = "select username from tai_khoan where id_taikhoan = ".$id;
        return $this->query($sql);
    }
    public function getAvatar($id){
        $sql = "select avatar from tai_khoan where id_taikhoan = ".$id;
        $data = $this->query($sql);
        
        return $data;
    }
    public function doiMk($mk, $id){
        $arr = array("$mk","$id");
        $sql = "update tai_khoan set password=? where id_taikhoan=?";
        return $this->query($sql, $arr);
    }
    public function ktMk($mk, $id){
        $sql = "select password from tai_khoan where id_taikhoan = ".$id;
        $data = $this->query($sql);
        if($mk==$data[0]["password"]) return true; else return false;
    }
    public function isExist($u){
        $arr = array("$u");
        $sql = "select id_taikhoan from tai_khoan where username = ?";
        $data = $this->query($sql, $arr);
        if(empty($data)) return false; else return true;
    }
    public function insert($u, $p, $lv=0){
        $sql ="insert into tai_khoan(username, password, ngaytao, level) ";
		$sql .="values(?,?,NOW(),?)";
		$arr = array("$u","$p","$lv");
		return $this->query($sql, $arr);
    }
    public function kiemTra($u, $e){
        $sql = "select khach_hang.id_taikhoan from khach_hang join tai_khoan on khach_hang.id_taikhoan=tai_khoan.id_taikhoan where tai_khoan.username='$u' and khach_hang.email='$e' and tai_khoan.level=0";
        $data = $this->query($sql);
        if(count($data)>0) return $data[0]["id_taikhoan"]; else return false;
    }
    function resetMk($u, $e, $p){
        $idtk = (new Taikhoan)->kiemTra($u, $e);
        $sql = "update tai_khoan set password='$p' where id_taikhoan='$idtk'";
        $this->query($sql);
    }
    function kiemTraAd($u, $p){
        $sql = "select * from tai_khoan where username='$u' and password='$p' and level='1'";
        $data = $this->query($sql);
        if(count($data)>0) return $data[0]; else return false;
    }
}
