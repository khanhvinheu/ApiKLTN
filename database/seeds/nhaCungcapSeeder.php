<?php

use Illuminate\Database\Seeder;

class nhaCungcapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
		DB::table('tbl_nhacungcaps')->truncate();

		$users = array(
            array('id' => '1','tenNhacungcap' => 'nhacungcap1','diaChi' => 'bui tan dien','soDienthoai' => '090510101010','email' => 'ncc@gmail.com','thongTin' => NULL,'moTa' => 'mota','hinhAnh' => '7VRD_tải xuống.jpg','trangThai' => '1','idTaiKhoan' => '2'),
            array('id' => '2','tenNhacungcap' => 'nhacungcap2','diaChi' => 'bui tan dien','soDienthoai' => '090510101010','email' => 'ncc2@gmail.com','thongTin' => NULL,'moTa' => 'mota','hinhAnh' => '7VRD_tải xuống.jpg','trangThai' => '1','idTaiKhoan' => '3'),
			

		);
		foreach ($users as $item) {
			App\tbl_nhacungcap::create([
                'tenNhacungcap' => $item['tenNhacungcap'],
                'diaChi'=>$item['diaChi'],
                'soDienthoai'=>$item['soDienthoai'],
				'email'=>$item['email'],
				'thongTin'=>$item['thongTin'],
				'moTa'=>$item['moTa'],
				'hinhAnh'=>$item['hinhAnh'],
                'trangThai'	=>$item['trangThai'],
                'idTaiKhoan'=>$item['idTaiKhoan']		
			]);
			}

			Schema::enableForeignKeyConstraints();
		}
    
}
