<?php
class Dongdienthoai extends Database {
    function updateKM($id, $id_km){
        $this->query("update dong_dienthoai set id_km=$id_km where id_ddt='$id'");
    }
    
    public function layMotSp($id){
        $sql = "select * from dong_dienthoai where id_ddt=".$id;
        $data = $this->query($sql);
        if(count($data)==1){
            return $data[0];
        }else return false;
    }
    function layTatCaByIdKm($id){
        return $this->query("select * from dong_dienthoai where id_km='$id'");
    }
    function them($ten, $th, $mota, $gia, $bh){
        $this->query("insert into dong_dienthoai(ten_ddt, id_th, mota, gia, tg_bh) values('$ten','$th', '$mota', '$gia', '$bh')");
    }
    function maxId(){
        $data = $this->query("select max(id_ddt) from dong_dienthoai")[0];
        return $data["max(id_ddt)"];
    }
    function update($id, $thuoctinh, $giatri){
        $sql = "update dong_dienthoai set $thuoctinh='$giatri' where id_ddt='$id'";
        $this->query($sql);
    }
    function getByTH($id){
        return $this->query("select * from dong_dienthoai where id_th='$id'");
    }
    function layTen($id_ddt){
        $sql = "select ten_ddt from dong_dienthoai where id_ddt=".$id_ddt;
        $data = $this->query($sql);
        if(count($data)==1){
            return $data[0]["ten_ddt"];
        }else return false;
    }
    function layKM($id_ddt){
        $sql = "select giatri_km from dong_dienthoai join khuyen_mai on dong_dienthoai.id_km=khuyen_mai.id_km where khuyen_mai.thoigian_kt > NOW() and id_ddt=".$id_ddt;
        $data = $this->query($sql);
        if(count($data)==1){
            return $data[0]["giatri_km"];
        }else return false;
    }
    function coMuaDt($id_kh, $id_ddt){
        $sql = "select dong_dienthoai.id_ddt from dong_dienthoai join chi_tiet_gio_hang on dong_dienthoai.id_ddt=chi_tiet_gio_hang.id_ddt 
                join don_hang on chi_tiet_gio_hang.id_dh=don_hang.id_dh 
                join khach_hang on don_hang.id_kh=khach_hang.id_kh 
                where (don_hang.trangthai_dh='Đã giao hàng') 
                 and dong_dienthoai.id_ddt='$id_ddt' and khach_hang.id_kh='$id_kh';
                ";
        $data = $this->query($sql);
        if(count($data)>0) return true; else return false;

    }
    function layGia($id_ddt){
        $sql = "select gia from dong_dienthoai where id_ddt=".$id_ddt;
        $data = $this->query($sql);
        if(count($data)==1){
            return $data[0]["gia"];
        }else return false;
    }
    function layAnh($id_ddt){
        $sql = "select anh from dong_dienthoai where id_ddt=".$id_ddt;
        $data = $this->query($sql);
        if(count($data)==1){
            return $data[0]["anh"];
        }else return false;
    }
    function layBl($id_ddt){
        $sql = "select * from binh_luan where binh_luan.id_ddt=".$id_ddt;
        $data = $this->query($sql);
        if(count($data)>0){
            return $data;
        }else return false;
    }
    public function laySpMoi(){
        $sql = "select * from dong_dienthoai order by id_ddt desc limit 10";
        $this->data = $this->query($sql);
        return $this->data;
    }
    public function layNgauNhien5(){
        $sql = "select * from dong_dienthoai order by rand() limit 5";
        $this->data = $this->query($sql);
        return $this->data;
    }
    public function layTatCa(){
        $sql = "select * from dong_dienthoai";
        $this->data = $this->query($sql);
        return $this->data;
    }
    public function layTatCaBangId($arr=[]){
        $sql = "select * from dong_dienthoai";
        if(count($arr)==0){
            return [];
        }else{
            $sql .= " where id_ddt in(";
            for($i=0; $i<count($arr); $i++){
                if($i == count($arr)-1) $sql .= $arr[$i];
                else $sql .= $arr[$i].",";
            }
            $sql .= ")";
        }
        return $this->query($sql);
    }
    public function layLimit($sl = 1){
        $limit = 10 * ($sl-1);
        $sql = "select * from dong_dienthoai order by id_ddt asc limit ".$limit.", 10";
        $this->data = $this->query($sql);
        return $this->data;
    }
    public function timKiem($ten="", $thuonghieu=[], $gia, $danhgiaduoi, $danhgiatren, $km, $ram, $rom, $manhinh, $pin, $nsx){
        $sql= 
        "select dong_dienthoai.id_ddt from ".
        "(".
        "dong_dienthoai ".
        "left join thuong_hieu on dong_dienthoai.id_th = thuong_hieu.id_th ".
        "left join khuyen_mai on khuyen_mai.id_km = dong_dienthoai.id_km ".
        "left join danh_gia on danh_gia.id_ddt = dong_dienthoai.id_ddt ".
        "left join thong_so on thong_so.id_ddt = dong_dienthoai.id_ddt ".
        ")". 
        " where dong_dienthoai.ten_ddt like '%".$ten."%'";
        if(count($thuonghieu)!=0){
            $sql .= " and( false";
            for($i=0; $i<count($thuonghieu); $i++){
                $sql .= " or thuong_hieu.id_th = $thuonghieu[$i]";
            }
            $sql .= " )";
        }
        if($gia!="0"){
            $sql .= " and ".$gia;
        }
        if($danhgiaduoi!="0"){
            $sql .= " and danh_gia.giatri_dg".$danhgiaduoi;
        }
        if($danhgiatren!="0"){
            $sql .= " and danh_gia.giatri_dg".$danhgiatren;
        }
        if($km!="0"){
            $sql .= " and ".$km." and khuyen_mai.thoigian_kt>NOW()";
        }
        if($ram!="0"){
            $sql .= " and ".$ram;
        }
        if($rom!="0"){
            $sql .= " and ".$rom;
        }
        if($manhinh!="0"){
            $sql .= " and ".$manhinh;
        }
        if($pin!="0"){
            $sql .= " and ".$pin;
        }
        if($nsx!="0"){
            $sql .= " and ".$nsx;
        }
        $sql .= " order by dong_dienthoai.id_ddt asc"
        ;
        
        return $this->query($sql);
    }

}

?>