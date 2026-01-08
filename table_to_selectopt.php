

SELECT `id`, nhanvien.`nhanvien_id`, nhanvien.hoten, `trangthai`, `nguoinhan`, `dienthoai`, `diachi`, `ngaygiaohang`, `ghichu`,                     
                        CASE 
                            WHEN trangthai = 1 THEN 'Giao hàng thành công'
                            WHEN trangthai = 0 THEN 'Đang giao hàng'
                            ELSE 'KO RÕ'
                        END as trang_thai
                        FROM `vandon`
                        JOIN nhanvien on nhanvien.nhanvien_id = vandon.nhanvien_id


<!-- lietke + timkiem -->

 	<?php
            $sql = "SELECT nhanvien_id, hoten FROM nhanvien";
            $result = $conn->query($sql);
        ?>
                <div class="mb-3 mt-3">
                    <label for="nhanvien_id" class="form-label">Nhân viên:</label>
                    <select name="nhanvien_id" id="nhanvien_id">
                        <?php
                            while($row = $result->fetch_assoc()){
                                echo '<option value="'.$row["nhanvien_id"].'">'.$row["hoten"].'</option>';
                            }
                        ?>
                    </select>
                </div>
<!-- formSua -->
    <?php
            $sql1 = "SELECT nhanvien_id, hoten FROM nhanvien";
            $result1 = $conn->query($sql1);
        ?>
            <div class="mb-3 mt-3">
                <label for="nhanvien_id" class="form-label">Nhân viên:</label>
                <select name="nhanvien_id" id="nhanvien_id">
                    <?php
                            while($row1 = $result1->fetch_assoc()){
                                echo '<option '.($row1["nhanvien_id"] == $row["nhanvien_id"] ? "selected" : "")
                                .' value="'.$row1["nhanvien_id"].'">'.$row1["hoten"].'</option>';
                            }
                        ?>
                </select>
            </div>