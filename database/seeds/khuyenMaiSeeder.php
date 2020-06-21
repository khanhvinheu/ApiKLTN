<?php

use Illuminate\Database\Seeder;

class khuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	DB::table('tbl_khuyenmais')->truncate();

      $danhmucs = [
        ["id"=>"1","tieuDe"=>"KM 10%","noiDungKm"=>'Khuyen mai 10%',"created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:56:02"],
        ["id"=>"2","tieuDe"=>"KM 20%","noiDungKm"=>'Khuyen mai 20%',"created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:51:39"],
        ["id"=>"3","tieuDe"=>"KM 30%","noiDungKm"=>'Khuyen mai 30%',"created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:53:01"],      

      ];

      foreach ($danhmucs as $danhmuc) {
        App\tbl_khuyenmai::create([
         'tieuDe' => $danhmuc['tieuDe'],
         'noiDungKm'=>$danhmuc['noiDungKm'],  
       ]);
      }
      Schema::enableForeignKeyConstraints();
    }
}
