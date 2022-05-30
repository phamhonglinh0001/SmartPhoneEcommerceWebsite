<?php
    class Soluong extends Database{
        function getAll($id_ddt){
            $sql = "select * from so_luong join mau_sac on so_luong.id_ms=mau_sac.id_ms where so_luong.so_luong>0 and so_luong.id_ddt='$id_ddt'";
            $data = $this->query($sql);
            if(count($data)>0) return $data; else return false;
        }
        function getSoLuong($id_ms, $id_ddt){
            $sql = "select * from so_luong join mau_sac on so_luong.id_ms=mau_sac.id_ms where so_luong.so_luong>0 and so_luong.id_ddt='$id_ddt' and so_luong.id_ms='$id_ms'";
            $data = $this->query($sql);
            if(count($data)>0) return $data[0]; else return false;
        }
        function update($sl, $id_ms, $id_ddt){
            $sql = "update so_luong set so_luong='$sl' where id_ddt='$id_ddt' and id_ms='$id_ms'";
            $this->query($sql);
        }
        function add($sl, $id_ms, $id_ddt){
            $sql = "insert into so_luong(id_ms, id_ddt, so_luong) values ('$id_ms','$id_ddt','$sl')";
            $this->query($sql);
        }
        function delete($id_ms, $id_ddt){
            $sql = "delete from so_luong where id_ddt='$id_ddt' and id_ms='$id_ms'";
            $this->query($sql);
        }
        function getFullMS(){
            $sql = "select * from mau_sac";
            $data = $this->query($sql);
            if(count($data)>0) return $data; else return false;
        }
    }
?>