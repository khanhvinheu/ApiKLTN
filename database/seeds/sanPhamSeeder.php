<?php

use Illuminate\Database\Seeder;

class sanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	DB::table('tbl_sanphams')->truncate();
    	$sanpham=[
        //   [1,'Samsung S1','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','22','1'],
        //   [2,'Samsung S2','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','23','1'],
        //   [3,'Samsung S3','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','2','22','1'],
        //   [4,'Samsung S1','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','22','1'],
        //   [5,'Samsung S2','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','23','1'],
        //   [6,'Samsung S3','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','2','22','1'],
        //   [7,'Samsung S1','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','24','1'],
        //   [8,'Samsung S2','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','25','1'],
        //   [9,'Samsung S3','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','2','26','1'],
            [1,"Samsung S1","459000","20","\u003cul\u003e\u003cli\u003eSản phẩm Ch\u0026iacute;nh h\u0026atilde;ng, 
            Mới 100%, Nguy\u0026ecirc;n seal, Hộp tr\u0026ugrave;ng imei m\u0026aacute;y.\u003c/li\u003e\u003cli\u003eSản phẩm đ\u0026atilde; 
            được k\u0026iacute;ch hoạt bảo h\u0026agrave;nh điện tử qua tổng đ\u0026agrave;i\u0026nbsp;6060\u0026nbsp;của Samsung Việt Nam\u003c/li\u003e\u003cli\u003eSản phẩm được bao test 30 ng\u0026agrave;
            y 1 đổi 1 nếu m\u0026aacute;y c\u0026oacute; lỗi do nh\u0026agrave; sản xuất v\u0026agrave; được bảo h\u0026agrave;nh 12 th\u0026aacute;ng ch\u0026iacute;nh h\u0026atilde;
            ng\u0026nbsp;(xem chi tiết)\u003c/li\u003e\u003cli\u003eBạch Long cam kết Bảo H\u0026agrave;nh đủ 12 th\u0026aacute;ng từ khi nhận h\u0026agrave;ng theo ti\u0026ecirc;u chuẩn\u003c/li\u003e\u003cli\u003ePhụ kiện k\u0026egrave;
            m theo m\u0026aacute;y được bao test 30 ng\u0026agrave;y 1 đổi 1 từ thời điểm mua sản phẩm\u003c/li\u003e\u003cli\u003eGi\u0026aacute; đ\u0026atilde; bao gồm 10% V.A.T\u003c/li\u003e\u003c/ul\u003e",
            "s1.png","\u003ch2\u003eĐược xem như l\u0026agrave; một qu\u0026acirc;n b\u0026agrave;i chiến lược mới của\u0026nbsp;Samsung\u0026nbsp;v\u0026agrave;
            o đầu năm 2019, chiếc điện thoại\u0026nbsp;Galaxy M10\u0026nbsp;vừa ra mắt hứa hẹn sẽ g\u0026acirc;y n\u0026ecirc;n một l\u0026agrave;n s\u0026oacute;ng ho\u0026agrave;n to\u0026agrave;n 
            mới v\u0026agrave; đủ sức cạnh tranh với c\u0026aacute;c đối thủ kh\u0026aacute;c trong c\u0026ugrave;ng ph\u0026acirc;n kh\u0026uacute;c gi\u0026aacute; rẻ.\u003c/h2\u003e\u003ch3\u003eThiết kế m\u0026agrave;n 
            h\u0026igrave;nh mới Infinity-V\u003c/h3\u003e\u003cp\u003eGalaxy M10 l\u0026agrave; chiếc\u0026nbsp;smartphone\u0026nbsp;đầu ti\u0026ecirc;n của Samsung sở hữu m\u0026agrave;n h\u0026igrave;nh 
            tr\u0026agrave;n viền mới Infinity-V. C\u0026ugrave;ng với k\u0026iacute;ch thước lớn 6.2 inch v\u0026agrave; độ ph\u0026acirc;n giải\u0026nbsp;HD+, m\u0026aacute;y cho diện t\u0026iacute;ch trải nghiệm rộng r\u0026atilde;i, 
            h\u0026igrave;nh ảnh được hiển thị đầy đủ v\u0026agrave; tối đa.\u003c/p\u003e\u003cp\u003e\u003cimg alt=Màn hình điện thoại Samsung Galaxy M10 chính hãng src=https://cdn.tgdd.vn/Products/Images/42/195716/dtdd-samsung-galaxy-m10-6.jpg style=width:100% title=Màn hình điện thoại Samsung Galaxy M10 chính hãng /\u003e\u003c/p\u003e\u003cp\u003eHơn nữa,
             thiết kế nguy\u0026ecirc;n khối của m\u0026aacute;y c\u0026ugrave;ng phần viền được bo cong nhẹ\u0026nbsp;cho người d\u0026ugrave;ng cảm gi\u0026aacute;c cầm nắm được thoải m\u0026aacute;
             i.\u003c/p\u003e\u003cp\u003e\u003cimg alt=Màn hình điện thoại Samsung Galaxy M10 chính hãng src=https://cdn.tgdd.vn/Products/Images/42/195716/dtdd-samsung-galaxy-m10-2.jpg style=width:100% title=Màn hình điện thoại Samsung Galaxy M10 chính hãng /\u003e\u003c/p\u003e\u003ch3\u003eHiệu năng ổn định trong ph\u0026acirc;n kh\u0026uacute;c\u003c/h3\u003e\u003cp\u003eChiếc điện thoại Samsung mới n\u0026agrave;y\u0026nbsp;
             được trang bị chip\u0026nbsp;Exynos 7870\u0026nbsp;\u0026quot;c\u0026acirc;y nh\u0026agrave; l\u0026aacute; vườn\u0026quot; do ch\u0026iacute;nh h\u0026atilde;ng sản xuất c\u0026ugrave;ng với RAM 2 GB.\u003c/p\u003e\u003cp\u003e\u003cimg alt=Giao diện Android điện thoại Samsung Galaxy M10 chính hãng src=https://cdn.tgdd.vn/Products/Images/42/195716/dtdd-samsung-galaxy-m10-5.jpg style=width:100% title=Giao diện Android điện thoại Samsung Galaxy M10 chính hãng /\u003e\u003c/p\u003e\u003cp\u003eGalaxy M10 chạy tr\u0026ecirc;n hệ điều h\u0026agrave;
             nh\u0026nbsp;Android 8.1 Oreo\u0026nbsp;với giao diện Samsung Experience 9.5 gi\u0026uacute;p hiệu năng của m\u0026aacute;y được tối ưu tốt hơn, giao diện trực quan dễ sử dụng.\u003c/p\u003e\u003cp\u003e\u003cimg alt=Menu ứng dụng điện thoại Samsung Galaxy M10 chính hãng src=https://cdn.tgdd.vn/Products/Images/42/195716/dtdd-samsung-galaxy-m10-1.jpg style=width:100% title=Menu ứng dụng điện thoại Samsung Galaxy M10 chính hãng /\u003e\u003c/p\u003e\u003cp\u003eVới cấu h\u0026igrave;nh tr\u0026ecirc;n, Samsung M10\u0026nbsp;đ\u0026aacute;p ứng nhu cầu giải tr\u0026iacute; lướt web b\u0026igrave;nh thường hay chơi c\u0026aacute;c game nhẹ nh\u0026agrave;ng: N\u0026ocirc;ng trại, kim cương,...\u003c/p\u003e\u003cp\u003e\u003cimg alt=Hiệu năng điện thoại Samsung Galaxy M10 chính hãng src=https://cdn.tgdd.vn/Products/Images/42/195716/dtdd-samsung-galaxy-m10.jpg style=width:100% title=Hiệu năng điện thoại Samsung Galaxy M10 chính hãng /\u003e\u003c/p\u003e\u003ch3\u003eCamera k\u0026eacute;p c\u0026oacute; độ ph\u0026acirc;n giải cao\u003c/h3\u003e\u003cp\u003eCụm camera k\u0026eacute;p của Galaxy M10 c\u0026oacute; camera ch\u0026iacute;nh 13 MP v\u0026agrave; ống k\u0026iacute;nh thứ hai 5 MP cho ph\u0026eacute;p bạn c\u0026oacute; thể chụp ảnh xo\u0026aacute; ph\u0026ocirc;ng tốt, nổi bật ch\u0026acirc;
             n dung v\u0026agrave; chủ thể.\u003c/p\u003e\u003cp\u003e\u003cimg alt=Camera kép điện thoại Samsung Galaxy M10 chính hãng src=https://cdn.tgdd.vn/Products/Images/42/195716/dtdd-samsung-galaxy-m10-3.jpg style=height:50px; width:100% title=Camera kép điện thoại Samsung Galaxy M10 chính hãng /\u003e\u003c/p\u003e\u003cp\u003eỞ điều kiện \u0026aacute;nh s\u0026aacute;ng đầy đủ, cụm camera n\u0026agrave;y c\u0026ograve;n c\u0026oacute; thể cho bạn những tấm h\u0026igrave;nh ưng \u0026yacute; cũng như chụp h\u0026igrave;nh g\u0026oacute;c rộng tốt hơn.\u003c/p\u003e\u003cp\u003e\u003cimg alt=Ảnh chụp từ điện thoại Samsung Galaxy M10 chính hãng src=https://cdn.tgdd.vn/Products/Images/42/195716/dtdd-samsung-galaxy-m10-8.jpg style=width:100% title=Ảnh chụp từ điện thoại Samsung Galaxy M10 chính hãng /\u003e\u003c/p\u003e\u003cp\u003eCamera sefie c\u0026oacute; độ ph\u0026acirc;n giải 5 MP hỗ trợ\u0026nbsp;t\u0026iacute;nh năng l\u0026agrave;m đẹp\u0026nbsp;v\u0026agrave;\u0026nbsp;sefie ngược s\u0026aacute;ng HDR,\u0026nbsp;gi\u0026uacute;p bạn c\u0026oacute; được những tấm ảnh tự sướng đẹp mắt.\u003c/p\u003e\u003ch3\u003eDung lượng pin lớn 3400 mAh\u003c/h3\u003e\u003cp\u003eSamsung đ\u0026atilde; trang bị cho M10 vi\u0026ecirc;n pin c\u0026oacute; dung lượng ở mức kh\u0026aacute; cao 3400 mAh, gi\u0026uacute;p thiết bị c\u0026oacute; thể duy tr\u0026igrave; thời gian sử dụng trong khoảng 1 ng\u0026agrave;y với thao t\u0026aacute;
             c lướt web, đọc b\u0026aacute;o cơ bản.\u003c/p\u003e",1,24,1],
             [2,"SamSung S2","990000","20","u003cpu003enullu003c/pu003e","s2-2.jpg","u003cpu003e1u003c/pu003e",1,24,1],
             [3,"Samsung S3","1200000","20","u003cpu003enullu003c/pu003e","s3.jpg","u003cpu003e1u003c/pu003e",1,24,1],
             [4,"Samsung S4","1500000","20","u003cpu003enullu003c/pu003e","samsung-galaxy-s4-i9500-white.jpg","u003cpu003e1u003c/pu003e",1,24,1],
             [5,"Samsung S5","1750000","20","u003cpu003enullu003c/pu003e","s5-2.jpg","u003cpu003e1u003c/pu003e",1,24,1],
             [6,"Samsung S6","1900000","20","u003cpu003enullu003c/pu003e","s6.jpg","u003cpu003e1u003c/pu003e",1,24,1 ],
             [7,"Samsung S7","2500000","20","u003cpu003enull1u003c/pu003e","s7-3.jpg","u003cpu003e1u003c/pu003e",1,24,1 ],
             [8,"Samsung S8","3500000","20","u003cpu003enullu003c/pu003e","a500dc8997e108534e6ab8473fc451ef.jpg","u003cpu003e1u003c/pu003e",1,24,1 ],
             [9,"Samsung S9","4500000","20","u003cpu003enullu003c/pu003e","s9.png","u003cpu003e1u003c/pu003e",1,24,1 ],
             [10,"Sony 1","2000000","20","u003cpu003enullu003c/pu003e","sony1.jpg","u003cpu003e1u003c/pu003e",2,43,1 ],
             [11,"Sony 2","3000000","20","u003cpu003eqqu0026lt;/pu0026gt;u003c/pu003e","sony2.jpg","u003cpu003e1u003c/pu003e",2,43,1 ],
             [12,"Sony 3","4000000","20","u003cpu003eqqu0026lt;/pu0026gt;u003c/pu003e","78a80fa96d71a21b0afd0383dd86e7b4.jpg","u003cpu003e1u003c/pu003e",2,43,1 ],
             [13,"Quat media 1","700000","20","u003cpu003enullu003c/pu003e","quat1.jpg","u003cpu003e1u003c/pu003e",5,44,1 ],
             [14,"Quat panasonic 1","800000","20","u003cpu003enullu003c/pu003e","quat2.jpg","u003cpu003e1u003c/pu003e",6,45,2 ],
             [15,"Quat mitsubishi 1","900000","20","u003cpu003enullu003c/pu003e","quat3.jpg","u003cpu003e15u003c/pu003e",7,46,2 ],
             [16,"Quat asia 1","1000000","20","u003cpu003enullu003c/pu003e","quat4.jpg","u003cpu003e1u003c/pu003e",8,47,2 ],
             [17,"Quat komasu 1","1100000","20","u003cpu003enullu003c/pu003e","quat5.jpg","u003cpu003e1u003c/pu003e",9,48,2 ],
             [18,"Quat sunhouse 1","1500000","20","u003cpu003enullu003c/pu003e","quat6.jpg","u003cpu003e1u003c/pu003e",10,49,3 ],
             [19,"Tủ lạnh Hatachi cao cấp","7500000","20","u003cpu003emtu003c/pu003e","tl1.jpg","u003cpu003e1u003c/pu003e",11,57,3 ],
             [20,"Tivi Samsung 32IN Led thường","9000000","20",
             "u003cpu003eLoại tivi:Tivi LED thườngu003cbr /u003eSố inch: 32 inchu003cbr /u003eĐộ phu0026acirc;n giải:HDu003cbr /u003eCổng HDMI:2 cổngu003cbr /u003eCổng USB:1 cổngu003c/pu003e",
             "tl2.jpg","u003cpu003e1u003c/pu003e",1,61 ,1],
             [21,"Tủ lạnh LG Inverter 393 lít GN-L422GB","9900000","20","u003cpu003e1u003c/pu003e","tl3.jpg","u003cpu003e1u003c/pu003e",13,64,3 ],
             [22,"Máy giặt Beko Inverter 8 kg WTV 8512 XS0","8700000","20",
             "u003culu003eu003cliu003eCu0026ocirc;ng nghệ Prosmart Inverter giu0026uacute;p mu0026aacute;y tiết kiệm điện, vận hu0026agrave;nh u0026ecirc;m, độ bền cao.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghệ Aqua Wave Tech - giặt sạch mạnh mẽ nhưng vẫn bảo vệ quần u0026aacute;o bền đẹp.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eDiệt khuẩn với chế độ giặt bằng nước nu0026oacute;ng lu0026ecirc;n đến 90 độ C.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026oacute; chế độ giặt nhanh 2 kg quần u0026aacute;o u0026iacute;t bẩn chỉ trong 14 phu0026uacute;t.u0026lt;/liu0026gt;u0026lt;/ulu0026gt;u003c/liu003eu003c/ulu003e","mg4.jpg","u003cpu003e1u003c/pu003e",12,65,1 ],
             [23,"Máy giặt Samsung Inverter 9 kg WW90J54E0BW/SV","12000000","20","u003culu003eu003cliu003eCu0026ocirc;ng nghệ Digital Inverter giu0026uacute;p tiết kiệm điện năng, vận hu0026agrave;nh u0026ecirc;m, giặt sạch hiệu quả.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghệ Eco Bubble hạn chế cặn bột giặt bu0026aacute;m vu0026agrave;o quần u0026aacute;o.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eLồng giặt kim cương bảo vệ sợi vải bền đẹp.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghệ giặt hơi nước giu0026uacute;p diệt khuẩn.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eTiện u0026iacute;ch kiểm tra lỗi thu0026ocirc;ng minh SmartCheck giu0026uacute;p người du0026ugrave;ng tiết kiệm thời gian vu0026agrave; chi phu0026iacute; sửa chữa mu0026aacute;y.u0026lt;/liu0026gt;u0026lt;/ulu0026gt;u003c/liu003eu003c/ulu003e",
             "mg.jpg","u003cpu003e1u003c/pu003e",1,66,3 ],
             [24,"Máy giặt Aqua 9 kg AQW-S90AT","6500000","20",
             "u003culu003eu003cliu003eCu0026ocirc;ng nghệ giặt MultiJet - nhiều luồng nước phun liu0026ecirc;n tục trong lồng giặt, hu0026ograve;a tan bột giặt thấm su0026acirc;u vu0026agrave;o quần u0026aacute;o.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eTốc độ quay vắt cao 840 vu0026ograve;ng/phu0026uacute;t - vắt cực khu0026ocirc; trong thời gian ngắn.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eBộ lọc xơ vải tiện lợi.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eĐa dạng sự lựa chọn với 8 chương tru0026igrave;nh hoạt động.u0026lt;/liu0026gt;u0026lt;/ulu0026gt;u003c/liu003eu003c/ulu003e",
             "mg2.jpg","u003cpu003e1u003c/pu003e",14,67,3 ],
             [25,"Smart Tivi LG 4K 43 inch 43UK6200PTA","14000000","20",
             "u003culu003eu003cliu003eĐộ phu0026acirc;n giảiu0026nbsp;4Ku0026lt;/au0026gt;u0026nbsp;sắc nu0026eacute;t gấp 4 lần Full HD.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghệu0026nbsp;4K Active HDRu0026lt;/au0026gt;u0026nbsp;cho hu0026igrave;nh ảnh chu0026acirc;n thật, ấn tượng.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eNu0026acirc;ng cấp chất lượng hu0026igrave;nh ảnh nhờ cu0026ocirc;ng nghệu0026nbsp;4K Upscaleru0026lt;/au0026gt;.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghệ u0026acirc;m thanh DTS Virtual:X cho u0026acirc;m thanh vu0026ograve;m sống động.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eHu0026ecirc;̣ điu0026ecirc;̀u hànhu0026nbsp;WebOSu0026lt;/au0026gt;u0026nbsp;du0026ecirc;̃ sử dụng, kho ứng dụng phong phu0026uacute;.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eRemote thu0026ocirc;ng minh hu0026ocirc;̃ trợu0026nbsp;tìm kiu0026ecirc;́m giọng nói bằng tiu0026ecirc;́ng Viu0026ecirc;̣tu0026lt;/au0026gt;u0026nbsp;cả 3 miu0026ecirc;̀n.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eHu0026ocirc;̃ trợu0026nbsp;chiu0026ecirc;́u màn hình điu0026ecirc;̣n thoại lu0026ecirc;n tiviu0026lt;/au0026gt;u0026nbsp;và điu0026ecirc;̀u khiu0026ecirc;̉n tivi bằng điu0026ecirc;̣n thoại qua ứng dụngu0026nbsp;LG TV Plusu0026lt;/au0026gt;.u0026lt;/liu0026gt;u0026lt;/ulu0026gt;u003c/liu003eu003c/ulu003e",
             "tv1.jpg","u003cpu003e1u003c/pu003e",13,68,4 ],
            [26,"Smart Tivi QLED Samsung 4K 49 inch QA49Q6FN","29900000","20","u003culu003eu003cliu003eĐu0026ocirc;̣ phu0026acirc;n giảiu0026nbsp;4Ku0026lt;/au0026gt;u0026nbsp;cực nét cùng cu0026ocirc;ng nghu0026ecirc;̣u0026nbsp;Q HDR Eliteu0026lt;/au0026gt;u0026nbsp;hiu0026ecirc;̉n thị hình ảnh cực kì chi tiu0026ecirc;́t trong cả vùng sáng hoặc tu0026ocirc;́i nhu0026acirc;́t.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghu0026ecirc;̣ mu0026agrave;n hu0026igrave;nh chấm lượng tử (Quantum Dot) cho dải màu sắc rực rỡ, sống động.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghu0026ecirc;̣u0026nbsp;Supreme UHD Dimmingu0026lt;/au0026gt;u0026nbsp;tăng cường đu0026ocirc;̣ tương phản, cho hình ảnh có đu0026ocirc;̣ su0026acirc;u u0026acirc;́n tượng.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eKhu0026ocirc;ng gian sống tinh tế hơn với cu0026aacute;p quang siu0026ecirc;u mảnh kết nối giữa mu0026agrave;n hu0026igrave;nh vu0026agrave; bộ xử lu0026yacute;.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghu0026ecirc;̣ Dolby Digital Plus cu0026ugrave;ng loa Bass tu0026iacute;ch hợp mang đến u0026acirc;m thanh vòm bùng nu0026ocirc;̉, su0026ocirc;́ng đu0026ocirc;̣ng.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eHu0026ecirc;̣ điu0026ecirc;̀u hànhu0026nbsp;Tizenu0026lt;/au0026gt;u0026nbsp;du0026ecirc;̃ sử dụng đi kèmu0026nbsp;one remoteu0026lt;/au0026gt;u0026nbsp;thu0026ocirc;ng minh, điu0026ecirc;̀u khiu0026ecirc;̉n được nhiu0026ecirc;̀u thiu0026ecirc;́t bị khác ngoài tivi như: dàn u0026acirc;m thanh, đu0026acirc;̀u đĩa...u0026lt;/liu0026gt;u003c/liu003eu003cliu003eHu0026ocirc;̃ trợu0026nbsp;chiu0026ecirc;́u màn hình điu0026ecirc;̣n thoại lu0026ecirc;n tiviu0026lt;/au0026gt;u0026nbsp;và điu0026ecirc;̀u khiu0026ecirc;̉n tivi bằng điu0026ecirc;̣n thoại qua ứng dụngu0026nbsp;SmartThings.u0026lt;/liu0026gt;u0026lt;/ulu0026gt;u003c/liu003eu003c/ulu003e",
            "tv2.jpg","u003cpu003e1u003c/pu003e",1,61,4 ],
            [27,"Smart Tivi LG 4K 43 inch 43UK6340PTF","9900000","20","u003culu003eu003cliu003eĐộ phu0026acirc;n giảiu0026nbsp;4Ku0026lt;/au0026gt;u0026nbsp;sắc nu0026eacute;t gấp 4 lần tivi Full HD thu0026ocirc;ng thường.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghệu0026nbsp;Active HDRu0026lt;/au0026gt;u0026nbsp;vu0026agrave; HDR Effect cho hu0026igrave;nh ảnh chu0026acirc;n thật từng chi tiết.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eNu0026acirc;ng cấp hu0026igrave;nh ảnh độ phu0026acirc;n giải thấp lu0026ecirc;n gần bằng 4K vớiu0026nbsp;4K Upscaleru0026lt;/au0026gt;.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghệ u0026acirc;m thanh DTS Virtual:X mang đến u0026acirc;m thanh vu0026ograve;m sống động mạnh mẽ.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eHệ điều hu0026agrave;nh WebOS 4.0 dễ sử dụng, đi ku0026egrave;m remote thu0026ocirc;ng minh hỗ trợu0026nbsp;tu0026igrave;m kiếm giọng nu0026oacute;i bằng tiếng Việtu0026lt;/au0026gt;u0026nbsp;cả 3 miền.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eHỗ trợ chiếu mu0026agrave;n hu0026igrave;nh điện thoại lu0026ecirc;n tivi vu0026agrave; điều khiển tivi bằng điện thoại qua ứng dụngu0026nbsp;LG TV Plusu0026lt;/au0026gt;.u0026lt;/liu0026gt;u0026lt;/ulu0026gt;u003c/liu003eu003c/ulu003e",
            "tv3.jpg","u003cpu003e1u003c/pu003e",13,68,4 ],
            [28,"Smart Tivi Samsung 32 inch UA32N4300","2900000","20","u003culu003eu003cliu003eĐộ phu0026acirc;n giải HD sắc nu0026eacute;t tru0026ecirc;n mu0026agrave;n hu0026igrave;nh tivi 32 inch.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng nghệ Wide Color Enhancer cho dải mu0026agrave;u rộng, mu0026agrave;u sắc sống động rực rỡ.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eMu0026agrave;u đen su0026acirc;u, mu0026agrave;u su0026aacute;ng tươi mới hơn với cu0026ocirc;ng nghệu0026nbsp;Contrast Enhanceru0026lt;/au0026gt;.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eCu0026ocirc;ng suất loa lu0026ecirc;n đến 10W cho u0026acirc;m thanh ru0026otilde; ru0026agrave;ng, mạnh mẽ.u0026lt;/liu0026gt;u003c/liu003eu003cliu003eTu0026iacute;ch hợp đầu thuu0026nbsp;DVB-T2u0026lt;/au0026gt;u0026nbsp;giu0026uacute;p xem được nhiều ku0026ecirc;nh truyền hu0026igrave;nh miễn phu0026iacute;.u0026lt;/liu0026gt;u0026lt;/ulu0026gt;u003c/liu003eu003c/ulu003e",
            "tv4.jpg","u003cpu003e1u003c/pu003e",1,61,4 ],
            [29,"Tai nghe LG Awei Q19Hi","125000","20","\u003cp\u003eu003cpu003eJack cắm 3.5 mmĐộ du0026agrave;i du0026acirc;y 1.2 mPhu0026iacute;m điều khiển Mic thoại, Nghe/nhận cuộc gọi, Tăng/giảm u0026acirc;m lượngu0026lt;/pu0026gt;u003c/pu003\u0026egrave;\u003c/p\u003e",
            "tnakg.png",
            "\u003cp\u003e\u003cimg alt= src=https://www.dropbox.com/s/drh93qpaechpjhh/tuixach1.jpg?dl=1 style=width:100% /\u003eu003cpu003e1u003c/pu003e\u003c/p\u003e",13,7,1 ]
        ];

        foreach ($sanpham as $sp) {
            App\tbl_sanpham::create([
                'tenSanpham' => $sp[1],
                'gia' => $sp[2],
                'soLuong' => $sp[3],
                'moTa' => $sp[4],
                'hinhAnh' => $sp[5],               
                'thongTin' => $sp[6],
                 'idNSX' => $sp[7],
                'idNhacungcap'=>$sp[9],
                'idDanhMuc'=>$sp[8],
                //'idKhuyenmai'=>$sp[10],

            ]);
        }
        // foreach ($sanpham2 as $sp) {
        //     App\SanPhamBanMua::create([
        //         'TenSanPham' => $sp['TenSanPham'],
        //         'Hinh' => $sp['Hinh'],
        //         'idNSX' => $sp['idNSX'],
        //         'idDanhMuc' => $sp['idDanhMuc'],
        //         'MoTa' => $sp['MoTa']

        //     ]);
        // }
        Schema::enableForeignKeyConstraints();
    }
}
