<?php
                $bl = (new Binhluan)->layTatCa($id_kh, $id);
                $dgsp = (new Danhgia)->layDanhGiaByKH($id_kh, $id);
                $check_dg = '<option value="1">1 sao</option>
                    <option value="2">2 sao</option>
                    <option value="3">3 sao</option>
                    <option value="4">4 sao</option>
                    <option value="5">5 sao</option>';
                $check_dg = str_replace('value="' . $dgsp . '"', 'value="' . $dgsp . '" selected', $check_dg);
                if ($bl != false) {
                    echo
                    '
                        <form action="xulybinhluan.php?cn=sua&id_ddt='.$id.'" style="width:700px;" class="mx-auto" method="post">
                        <div class="mb-3 mt-3">
                            <label for="comment">Bạn đã bình luận</label>
                            <br>
                            <textarea class="form-control" rows="5" id="comment" name="noidung" required>'
                        . $bl["noidung_bl"] .
                        '</textarea>
                        </div>
                        <div>
                            <select name="danhgiasao" class="form-select d-inline-block">
                            ' . $check_dg . '
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" style="width: 100px;">Sửa</button>
                        <a class="btn btn-danger" href="xulybinhluan.php?cn=xoa&id_ddt='.$id.'" >Xóa bình luận</a>
                        </form>
                        
                        ';
                } else {
                    if((new Dongdienthoai)->coMuaDt($id_kh, $id)==true){
                        echo
                    '
                        <form action="xulybinhluan.php?cn=them&id_ddt='.$id.'" style="width:700px;" class="mx-auto" method="post">
                        
                        <div class="mb-3 mt-3">
                            <label for="comment">Bình luận sản phẩm</label>
                            <br>
                            <textarea class="form-control" rows="5" id="comment" name="noidung" required></textarea>
                        </div>
                        <div>
                            <select name="danhgiasao" class="form-select d-inline-block">
                                <option value="1">1 sao</option>
                                <option value="2">2 sao</option>
                                <option value="3">3 sao</option>
                                <option value="4">4 sao</option>
                                <option value="5">5 sao</option>
                                
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" style="width: 100px;">Thêm</button>
                        </form>
                        ';
                    }
                    
                }
?>
