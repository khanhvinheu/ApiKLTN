<?php

use Illuminate\Database\Seeder;

class chitietkhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	DB::table('tbl_chitietkhuyenmais')->truncate();

      $danhmucs = [
        ["id"=>"1","idKhuyenMai"=>"1","idSanPham"=>'1','NgayBD'=>'2019-01-01','NgayKT'=>'2019-01-01',"created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:56:02"],
        ["id"=>"2","idKhuyenMai"=>"2","idSanPham"=>'1','NgayBD'=>'2019-01-01','NgayKT'=>'2019-01-01',"created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:51:39"],
        ["id"=>"3","idKhuyenMai"=>"3","idSanPham"=>'1','NgayBD'=>'2019-01-01','NgayKT'=>'2019-01-01',"created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:53:01"],      

      ];

      foreach ($danhmucs as $danhmuc) {
        App\tbl_chitietkhuyenmai::create([
         'idKhuyenMai' => $danhmuc['idKhuyenMai'],
         'idSanPham'=>$danhmuc['idSanPham'],  
         'NgayBD'=>$danhmuc['NgayBD'],
         'NgayKT'=>$danhmuc['NgayKT'],
        
       ]);
      }
      Schema::enableForeignKeyConstraints();
    }
}
