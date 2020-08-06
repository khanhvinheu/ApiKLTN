<?php

use Illuminate\Database\Seeder;

class taiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
		DB::table('users')->truncate();

		$users = array(
            array('id' => '1','hoTen' => 'admin','gioiTinh'=>'Nam','ngaySinh'=>'09/07/1998','dienThoai' => '0905101010','email' => 'admin@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '1v0j_Rj1j_ai.jpg','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '1','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),
            array('id' => '2','hoTen' => 'nhacungcap1','gioiTinh'=>'Nam','ngaySinh'=>'09/07/1998','dienThoai' => '0905101010','email' => 'nhacungcap1@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '2','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),
            array('id' => '3','hoTen' => 'nhacungcap2','gioiTinh'=>'Nam','ngaySinh'=>'09/07/1998','dienThoai' => '0905101010','email' => 'nhacungcap2@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '2','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),
            array('id' => '4','hoTen' => 'nhacungcap3','gioiTinh'=>'Nam','ngaySinh'=>'09/07/1998','dienThoai' => '0905101010','email' => 'nhacungcap3@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '2','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),
            array('id' => '5','hoTen' => 'nhacungcap4','gioiTinh'=>'Nam','ngaySinh'=>'09/07/1998','dienThoai' => '0905101010','email' => 'nhacungcap4@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '2','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),
            array('id' => '6','hoTen' => 'thanhvien','gioiTinh'=>'Nam','ngaySinh'=>'09/07/1998','dienThoai' => '0905101010','email' => 'thanhvien@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '3','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09')
			
            // array('id' => '1','hoTen' => 'admin','gioiTinh'=>'Nam','ngaySinh'=>'2020-06-10 20:56:18','dienThoai' => '090510101010','email' => 'admin@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '1','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),
            // array('id' => '2','hoTen' => 'nhacungcap','gioiTinh'=>'Nam','ngaySinh'=>'2020-06-10 20:56:18','dienThoai' => '090510101010','email' => 'nhacungcap@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '2','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),
            // array('id' => '3','hoTen' => 'nhacungcap2','gioiTinh'=>'Nam','ngaySinh'=>'2020-06-10 20:56:18','dienThoai' => '090510101010','email' => 'nhacungcap2@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '2','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),
            // array('id' => '3','hoTen' => 'thanhvien','gioiTinh'=>'Nam','ngaySinh'=>'2020-06-10 20:56:18','dienThoai' => '090510101010','email' => 'thanhvien@gmail.com','email_verified_at' => NULL,'diaChi' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','hinh' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','idQuyen' => '3','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09')
        );
		foreach ($users as $item) {
			App\tbl_taikhoan::create([
                'hoTen' => $item['hoTen'],
                'gioiTinh'=>$item['gioiTinh'],
                'ngaySinh'=>$item['ngaySinh'],
				'dienThoai'=>$item['dienThoai'],
				'email'=>$item['email'],
				'diaChi'=>$item['diaChi'],
                'password'=>$item['password'],
                'hinh'=>$item['hinh'],
				'idQuyen'	=>$item['idQuyen'],
				
				

			]);
			}

			Schema::enableForeignKeyConstraints();
		}
}

