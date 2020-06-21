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
          [1,'Samsung S1','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','22','1'],
          [2,'Samsung S2','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','23','1'],
          [3,'Samsung S3','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','2','22','1'],
          [4,'Samsung S1','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','22','1'],
          [5,'Samsung S2','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','23','1'],
          [6,'Samsung S3','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','2','22','1'],
          [7,'Samsung S1','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','24','1'],
          [8,'Samsung S2','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','1','25','1'],
          [9,'Samsung S3','1000000','5','Mới 100%','7VRD_tải xuống.jpg','thông tin','2','26','1'],
        ];

        foreach ($sanpham as $sp) {
            App\tbl_sanpham::create([
                'tenSanpham' => $sp[1],
                'gia' => $sp[2],
                'soLuong' => $sp[3],
                'moTa' => $sp[4],
                'hinhAnh' => $sp[5],
                'thongTin' => $sp[6],
                'idNhacungcap'=>$sp[7],
                'idDanhMuc'=>$sp[8],
                'idKhuyenmai'=>$sp[9],

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
