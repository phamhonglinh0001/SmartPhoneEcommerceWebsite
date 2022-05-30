<?php
class Thongso extends Database{
    function layTatCa($id){
        $sql = "select * from thong_so where id_ddt=".$id;
        $data = $this->query($sql);
        
        $sl = count($data);
        if($sl==1){
            
            return $data[0];
        }else return false;
    }
    function update(
       $id_ddt, $congnghemanhinh,$dophangiai,	$kichthuocmanhinh,	$camsau,	$camtruoc,	$hedieuhanh,	$cpu,	$tocdocpu,	$gpu,	$ram,	$rom,	$congsac,	$congtainghe,	$loaipin,	$dungluongpin,	$congsuatsac,	$dai,	$rong,	$day,	$ngayramat,	$nang
    ){
        $sql=
        "update thong_so set congnghemanhinh='$congnghemanhinh',	dophangiai='$dophangiai',	kichthuocmanhinh='$kichthuocmanhinh',	camsau='$camsau',	camtruoc='$camtruoc',	hedieuhanh='$hedieuhanh',	cpu='$cpu',	tocdocpu='$tocdocpu',	gpu='$gpu',	ram='$ram',	rom='$rom',	congsac='$congsac',	congtainghe='$congtainghe',	loaipin='$loaipin',	dungluongpin='$dungluongpin',	congsuatsac='$congsuatsac',	dai='$dai',	rong='$rong',	day='$day',	ngayramat='$ngayramat',	nang='$nang' where
        id_ddt='$id_ddt'
        ";
        $this->query($sql);
    }
    function xoa($id_ddt){
        $this->query("delete from thong_so where id_ddt='$id_ddt'");
    }
    function them(
        $id_ddt, $congnghemanhinh,$dophangiai,	$kichthuocmanhinh,	$camsau,	$camtruoc,	$hedieuhanh,	$cpu,	$tocdocpu,	$gpu,	$ram,	$rom,	$congsac,	$congtainghe,	$loaipin,	$dungluongpin,	$congsuatsac,	$dai,	$rong,	$day,	$ngayramat,	$nang
     ){
         $sql=
         "insert into thong_so(id_ddt	,congnghemanhinh	,dophangiai	,kichthuocmanhinh	,camsau	,camtruoc	,hedieuhanh	,cpu	,tocdocpu	,gpu	,ram	,rom	,congsac	,congtainghe	,loaipin	,dungluongpin	,congsuatsac	,dai	,rong	,day	,ngayramat	,nang
            ) 
            values('$id_ddt',	'$congnghemanhinh',	'$dophangiai',	'$kichthuocmanhinh',	'$camsau',	'$camtruoc',	'$hedieuhanh',	'$cpu',	'$tocdocpu',	'$gpu',	'$ram',	'$rom',	'$congsac',	'$congtainghe',	'$loaipin',	'$dungluongpin',	'$congsuatsac',	'$dai',	'$rong',	'$day',	'$ngayramat',	'$nang'
            )
         ";
         $this->query($sql);
     }
}

?>