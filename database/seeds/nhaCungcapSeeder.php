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
            array('id' => '1','tenNhacungcap' => 'NCC Nguyễn Kim','diaChi' => 'bui tan dien','soDienthoai' => '090510101010','email' => 'ncc1@gmail.com','thongTin' => NULL,'moTa' => 'mota','hinhAnh' => 'nk.png','trangThai' => '1','idTaiKhoan' => '2'),
            array('id' => '2','tenNhacungcap' => 'NCC KV Store','diaChi' => 'bui tan dien','soDienthoai' => '090510101010','email' => 'ncc2@gmail.com','thongTin' => NULL,'moTa' => 'mota','hinhAnh' => 'kv.png','trangThai' => '1','idTaiKhoan' => '3'),
            array('id' => '1','tenNhacungcap' => 'NCC DM Store','diaChi' => 'bui tan dien','soDienthoai' => '090510101010','email' => 'ncc3@gmail.com','thongTin' => NULL,'moTa' => 'mota','hinhAnh' => 'dm.jpg','trangThai' => '1','idTaiKhoan' => '4'),
            array('id' => '2','tenNhacungcap' => 'NCC Hưng Nhân','diaChi' => 'bui tan dien','soDienthoai' => '090510101010','email' => 'ncc4@gmail.com','thongTin' => NULL,'moTa' => 'mota','hinhAnh' => 'hn.jpg','trangThai' => '1','idTaiKhoan' => '5'),
		

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
