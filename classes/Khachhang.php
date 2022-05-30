<?php
class Khachhang extends Database
{
    public function layTen($id){
        $sql = "select ten_kh from khach_hang where id_kh = ".$id;
        $data = $this->query($sql);
        if(count($data)==1) return $data[0]["ten_kh"]; else return false;
    }
    public function getUsername($id){
        $sql = "select ten_kh from tai_khoan where id_taikhoan = ".$id;
        $data = $this->query($sql);
        if(count($data)==1) return $data[0]["ten_kh"]; else return false;
    }
    function getByID($id_kh){
        $sql = "select * from khach_hang where id_kh = ".$id_kh;
        $data = $this->query($sql);
        if(count($data)==1) return $data[0]; else return false;
    }
    function layAvt($id_kh){
        $sql = "select * from khach_hang join tai_khoan on khach_hang.id_taikhoan=tai_khoan.id_taikhoan where khach_hang.id_kh=".$id_kh;
        $data = $this->query($sql);
        if(count($data)==1) return $data[0]["avatar"]; else return false;
    }
    function getAllByTK($id_tk)
    {
        $arr = array("$id_tk");
        $this->data = $this->query("select * from khach_hang where id_taikhoan = ?", $arr);
        return $this->data;
    }
    function them($ten, $ns, $gt, $sdt, $e, $id){
        $arr = array("$ten", "$ns", "$gt","$sdt", "$e", "$id");
        $sql = "insert into khach_hang (ten_kh, ngaysinh, gioitinh, sdt, email, id_taikhoan) ";
        $sql .= "values(?, ?, ?, ?, ?, ?)";
        return $this->query($sql, $arr);
    }
    function sua($ten, $ns, $gt, $sdt, $e, $id){
        $arr = array("$ten", "$ns", "$gt","$sdt", "$e", "$id");
        $sql = "update khach_hang set ten_kh=?, ngaysinh=?, gioitinh=?, sdt=?, email=? where id_taikhoan=?";
        return $this->query($sql, $arr);
    }
    function layId($id_tk){
        $arr = array("$id_tk");
        $this->data = $this->query("select id_kh from khach_hang where id_taikhoan = ?", $arr);
        return $this->data[0]["id_kh"];
    }
    function getOne($ma)
    {
        $arr = array("$ma");
        $sql = "select * from khachhang where MaKH = ?";
        return $this->query($sql, $arr);
    }

    function getByOne($em, $pw)
    {
        $arr = array($em, $pw);
        $sql = "select * from khachhang where Email = ? and MatKhau = ?";
        return $this->query($sql, $arr);
    }
    function search($ma)
    {
        $arr = array("%$ma%");
        $sql = "select * from khachhang where TenKH like ? ";
        return $this->query($sql, $arr);
    }

    function queryLogin($username, $password)
    {
        $sql = "select * from tai_khoan where level = :username";
        $stm = $this->conn->prepare($sql);
        $stm->bindValue(":username", $username, PDO::PARAM_STR);
        $stm->execute();
        $this->data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $this->data;
    }
    function insert($ma, $ten, $em, $mk, $ns, $dc, $sdt)
    {
        $sql = "insert into khachhang(MaKH, TenKH, Email, MatKhau, NgaySinh, DiaChi, SDT) ";
        $sql .= " values(?, ?, ?, ?, ?, ?,?)";
        $arr = array($ma, $ten, $em, $mk, $ns, $dc, $sdt);
        return $this->query($sql, $arr);
    }


    function delete($ma)
    {
        $sql = "delete from khachhang where MaKH= ? ";
        $arr = array($ma);
        return $this->query($sql, $arr);
    }

    function update($ma, $ten, $em, $mk, $ns, $dc, $sdt)
    {
        $arr = array(":M" => $ma, ":T" => $ten, ":E" => $em, ":K" => $mk, ":N" => $ns, ":D" => $dc, ":S" => $sdt);
        $sql = "update khachhang set TenKH = :T,
									Email = :E,
									MatKhau = :K,
									NgaySinh = :N,
									DiaChi = :D,
									SDT = :S
									where MaKH= :M ";

        return $this->query($sql, $arr);
    }
}
