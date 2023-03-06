USE btth01_cse485;

-- a. Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình (2 đ)
    SELECT * FROM baiviet AS bv
    JOIN theloai AS tl ON bv.ma_tloai = tl.ma_tloai
    WHERE tl.ten_tloai = "Nhạc trữ tình";

-- b. Liệt kê các bài viết của tác giả “Nhacvietplus”
    SELECT * FROM baiviet AS bv
    JOIN tacgia AS tg ON bv.ma_tgia = tg.ma_tgia
    WHERE tg.ten_tgia = "Nhacvietplus";
-- c. Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào
    SELECT * FROM theloai AS tl
    WHERE tl.ma_tloai NOT IN (SELECT bv.ma_tloai 
    FROM baiviet AS bv 
    GROUP BY (bv.ma_tloai)) 
-- d. Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết

    SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tg.ten_tgia, tl.ten_tloai, bv.ngayviet FROM baiviet AS bv
    JOIN tacgia AS tg ON tg.ma_tgia = bv.ma_tgia
    JOIN theloai AS tl ON tl.ma_tloai = bv.ma_tloai
-- e. Tìm thể loại có số bài viết nhiều nhất
    SELECT MAX(result.cs) FROM (SELECT COUNT(bv.ma_tloai) AS cs FROM baiviet AS bv
    JOIN theloai AS tl ON tl.ma_tloai = bv.ma_tloai
    GROUP BY (bv.ma_tloai)) AS result
    
    SELECT tln.*
    FROM baiviet AS bvn
    JOIN theloai AS tln ON tln.ma_tloai = bvn.ma_tloai
    GROUP BY (bvn.ma_tloai)
    HAVING COUNT(bvn.ma_tloai) = (
        SELECT MAX(result.cs) FROM (SELECT COUNT(bv.ma_tloai) AS cs FROM baiviet AS bv
        JOIN theloai AS tl ON tl.ma_tloai = bv.ma_tloai
        GROUP BY (bv.ma_tloai)) AS result
    )

-- f. Liệt kê 2 tác giả có số bài viết nhiều nhất
    SELECT bv.ma_tgia, tg.ten_tgia, COUNT(bv.ma_bviet) FROM tacgia AS tg 
    JOIN baiviet AS bv ON bv.ma_tgia = tg.ma_tgia
    GROUP BY (bv.ma_tgia)
    ORDER BY COUNT(bv.ma_bviet) DESC 
    LIMIT 2;

-- g. Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”,“em” (2 đ)

    SELECT * FROM baiviet AS bv 
    WHERE bv.ten_bhat LIKE "%yêu%" 
    OR bv.ten_bhat LIKE "thương"
    OR bv.ten_bhat LIKE "anh"
    OR bv.ten_bhat LIKE "em"

-- h. Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ“yêu”, “thương”, “anh”, “em” (2 đ)
    SELECT * FROM baiviet AS bv 
    WHERE bv.ten_bhat LIKE "%yêu%" 
    OR bv.ten_bhat LIKE "thương"
    OR bv.ten_bhat LIKE "anh"
    OR bv.ten_bhat LIKE "em"
    OR bv.tieude LIKE "%yêu%" 
    OR bv.tieude LIKE "thương"
    OR bv.tieude LIKE "anh"
    OR bv.tieude LIKE "em";

-- i. Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả (2 đ)

CREATE VIEW [vw_Music] AS 
    SELECT bv.*, tg.ten_tgia, tl.ten_tloai
        FROM baiviet AS bv
        JOIN tacgia AS tg ON tg.ma_tgia = bv.ma_tgia
        JOIN theloai AS tl ON tl.ma_tloai = bv.ma_tloai;

-- j. Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi. (2 đ)

CREATE PROCEDURE sp_DSBaiViet(
    IN ten VARCHAR(50)
)
BEGIN
    DECLARE id INT DEFAULT -1;
    SET id = (SELECT ma_tloai
    FROM theloai WHERE ten_tloai = ten);
    IF id >= 0
    THEN 
        SELECT * FROM baiviet 
        WHERE ma_tloai = id;
    ELSE 
        SELECT "Khong ton tai the loai tren";
    END IF;
END;


CALL sp_DSBaiViet("Nhạc trữ tình");
-- k. Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo. (2 đ)

CREATE OR REPLACE TRIGGER "teref"
AFTER INSERT OR UPDATE OR DELETE ON baiviet
FOR EACH ROW
BEGIN
    
END

-- l. Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web. (5 đ)