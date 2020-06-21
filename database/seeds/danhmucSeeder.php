<?php

use Illuminate\Database\Seeder;

class danhmucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	DB::table('tbl_danhmucs')->truncate();

      $danhmucs = [
        ["id"=>"1","tenDanhmuc"=>"Điện thoại","danhMuccha"=>null,"hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:56:02"],
        ["id"=>"2","tenDanhmuc"=>"Điện gia dụng","danhMuccha"=>null,"hinh"=>"fas fa-tv","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:51:39"],
        ["id"=>"3","tenDanhmuc"=>"Điện lạnh","danhMuccha"=>null,"hinh"=>"fas fa-blender","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:53:01"],
        ["id"=>"4","tenDanhmuc"=>"Kỹ thuật số","danhMuccha"=>null,"hinh"=>"fa fa-camera-retro","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"5","tenDanhmuc"=>"Laptop","danhMuccha"=>null,"hinh"=>"fa fa-laptop","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"6","tenDanhmuc"=>"Thiết bị văn phòng","danhMuccha"=>null,"hinh"=>"fas fa-book","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:54:17"],
        ["id"=>"7","tenDanhmuc"=>"Tai nghe","danhMuccha"=>null,"hinh"=>"fas fa-headphones","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:46:47"],
        ["id"=>"8","tenDanhmuc"=>"Phụ kiện","danhMuccha"=>null,"hinh"=>"far fa-keyboard","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:49:45"],
        ["id"=>"9","tenDanhmuc"=>"Bếp ga","danhMuccha"=>"2","hinh"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"10","tenDanhmuc"=>"Bếp điện","danhMuccha"=>"2","hinh"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"11","tenDanhmuc"=>"Nồi cơm điện","danhMuccha"=>"2","hinh"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"12","tenDanhmuc"=>"Máy lọc nước","danhMuccha"=>"2","hinh"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"13","tenDanhmuc"=>"Quạt điện","danhMuccha"=>"2","hinh"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"14","tenDanhmuc"=>"Samsung","danhMuccha"=>"1","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"15","tenDanhmuc"=>"Iphone","danhMuccha"=>"1","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"16","tenDanhmuc"=>"Asus","danhMuccha"=>"1","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"17","tenDanhmuc"=>"Nokia","danhMuccha"=>"1","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-08-26 10:21:45"],
        ["id"=>"18","tenDanhmuc"=>"Xiaomi","danhMuccha"=>"1","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"19","tenDanhmuc"=>"Oppo","danhMuccha"=>"1","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"20","tenDanhmuc"=>"LG","danhMuccha"=>"1","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"21","tenDanhmuc"=>"Sony","danhMuccha"=>"1","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"22","tenDanhmuc"=>"Samsung A","danhMuccha"=>"14","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"23","tenDanhmuc"=>"Samsung J","danhMuccha"=>"14","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"24","tenDanhmuc"=>"Samsung S","danhMuccha"=>"14","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"25","tenDanhmuc"=>"Samsung Note","danhMuccha"=>"14","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"26","tenDanhmuc"=>"Iphone X","danhMuccha"=>"15","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"27","tenDanhmuc"=>"Iphone 8","danhMuccha"=>"15","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"28","tenDanhmuc"=>"Iphone 7","danhMuccha"=>"15","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"29","tenDanhmuc"=>"Iphone 6","danhMuccha"=>"15","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"30","tenDanhmuc"=>"Iphone 5","danhMuccha"=>"15","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"31","tenDanhmuc"=>"Iphone 4","danhMuccha"=>"15","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"32","tenDanhmuc"=>"Asus 4","danhMuccha"=>"16","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"33","tenDanhmuc"=>"Asus 3","danhMuccha"=>"16","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"34","tenDanhmuc"=>"Asus 2","danhMuccha"=>"16","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"35","tenDanhmuc"=>"Asus 1","danhMuccha"=>"16","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"36","tenDanhmuc"=>"Nokia Lumia 1020","danhMuccha"=>"17","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"37","tenDanhmuc"=>"Nokia Lumia 930","danhMuccha"=>"17","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"38","tenDanhmuc"=>"Nokia Lumia 630","danhMuccha"=>"17","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"39","tenDanhmuc"=>"Nokia 1080","danhMuccha"=>"17","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"40","tenDanhmuc"=>"Xiaomi Redmi","danhMuccha"=>"18","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"41","tenDanhmuc"=>"Xiaomi Redmi Note","danhMuccha"=>"18","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"42","tenDanhmuc"=>"Xiaomi MI","danhMuccha"=>"18","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"43","tenDanhmuc"=>"Sony Xperia","danhMuccha"=>"21","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"44","tenDanhmuc"=>"Quạt Điện Media","danhMuccha"=>"13","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"45","tenDanhmuc"=>"Quạt Điện Panasonic","danhMuccha"=>"13","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"46","tenDanhmuc"=>"Quạt Điện Mitsubishi","danhMuccha"=>"13","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"47","tenDanhmuc"=>"Quạt Điện Asia","danhMuccha"=>"13","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"48","tenDanhmuc"=>"Quạt Điện Komasu","danhMuccha"=>"13","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"49","tenDanhmuc"=>"Quạt Điện Sunhouse","danhMuccha"=>"13","hinh"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ["id"=>"50","tenDanhmuc"=>"Quat dien Samsung","danhMuccha"=>"13","hinh"=>"far fa-trash","created_at"=>"2019-04-29 04:29:16","updated_at"=>"2019-04-29 04:34:20"],
        ["id"=>"51","tenDanhmuc"=>"Điều hòa, máy lạnh","danhMuccha"=>"3","hinh"=>"far fa-trash","created_at"=>"2019-04-30 15:55:14","updated_at"=>"2019-04-30 15:55:14"],
        ["id"=>"52","tenDanhmuc"=>"Tủ lạnh","danhMuccha"=>"3","hinh"=>"far fa-trash","created_at"=>"2019-04-30 15:55:32","updated_at"=>"2019-04-30 15:55:32"],
        ["id"=>"53","tenDanhmuc"=>"Máy giặt","danhMuccha"=>"3","hinh"=>"far fa-trash","created_at"=>"2019-04-30 15:55:50","updated_at"=>"2019-04-30 15:55:50"],
        ["id"=>"54","tenDanhmuc"=>"Điều hòa Panasonic","danhMuccha"=>"51","hinh"=>"far fa-trash","created_at"=>"2019-04-30 15:57:37","updated_at"=>"2019-04-30 15:57:37"],
        ["id"=>"55","tenDanhmuc"=>"Điều hòa Samsung","danhMuccha"=>"51","hinh"=>"far fa-trash","created_at"=>"2019-04-30 15:58:07","updated_at"=>"2019-04-30 15:58:07"],
        ["id"=>"56","tenDanhmuc"=>"Tủ lạnh Samsung","danhMuccha"=>"52","hinh"=>"far fa-trash","created_at"=>"2019-04-30 15:58:27","updated_at"=>"2019-04-30 15:58:27"],
        ["id"=>"57","tenDanhmuc"=>"Tủ lạnh Hatachi","danhMuccha"=>"52","hinh"=>"far fa-trash","created_at"=>"2019-04-30 15:59:14","updated_at"=>"2019-04-30 15:59:14"],
        ["id"=>"58","tenDanhmuc"=>"Máy ảnh DSRL","danhMuccha"=>"4","hinh"=>"far fa-trash","created_at"=>"2019-04-30 16:00:17","updated_at"=>"2019-04-30 16:00:17"],
        ["id"=>"59","tenDanhmuc"=>"Máy ảnh thường","danhMuccha"=>"4","hinh"=>"far fa-trash","created_at"=>"2019-04-30 16:00:28","updated_at"=>"2019-04-30 16:00:28"],
        ["id"=>"60","tenDanhmuc"=>"Tivi","danhMuccha"=>"4","hinh"=>"far fa-trash","created_at"=>"2019-04-30 16:00:34","updated_at"=>"2019-04-30 16:00:34"],
        ["id"=>"61","tenDanhmuc"=>"Tivi Samsung","danhMuccha"=>"60","hinh"=>"far fa-trash","created_at"=>"2019-04-30 16:01:02","updated_at"=>"2019-04-30 16:01:02"],
        ["id"=>"62","tenDanhmuc"=>"Tivi Panasonic","danhMuccha"=>"60","hinh"=>"far fa-trash","created_at"=>"2019-04-30 16:01:30","updated_at"=>"2019-04-30 16:01:30"],
        ["id"=>"63","tenDanhmuc"=>"Tủ lạnh BeKo","danhMuccha"=>"52","hinh"=>"far fa-trash","created_at"=>"2019-06-01 17:29:37","updated_at"=>"2019-06-01 17:29:37"],
        ["id"=>"64","tenDanhmuc"=>"Tủ lạnh LG","danhMuccha"=>"52","hinh"=>"far fa-trash","created_at"=>"2019-06-01 17:29:53","updated_at"=>"2019-06-01 17:29:53"],
        ["id"=>"65","tenDanhmuc"=>"Máy giặt BeKo","danhMuccha"=>"53","hinh"=>"far fa-trash","created_at"=>"2019-06-01 17:32:49","updated_at"=>"2019-06-01 17:32:49"],
        ["id"=>"66","tenDanhmuc"=>"Máy giặt SamSung","danhMuccha"=>"53","hinh"=>"far fa-trash","created_at"=>"2019-06-01 17:34:46","updated_at"=>"2019-06-01 17:34:46"],
        ["id"=>"67","tenDanhmuc"=>"Máy giặt Aqua","danhMuccha"=>"53","hinh"=>"far fa-trash","created_at"=>"2019-06-01 17:35:02","updated_at"=>"2019-06-01 17:35:02"],
        ["id"=>"68","tenDanhmuc"=>"Tivi LG","danhMuccha"=>"60","hinh"=>"far fa-trash","created_at"=>"2019-06-01 17:40:47","updated_at"=>"2019-06-01 17:40:47"]

      ];

      foreach ($danhmucs as $danhmuc) {
        App\tbl_danhmuc::create([
         'tenDanhmuc' => $danhmuc['tenDanhmuc'],
         'hinh'=>$danhmuc['hinh'],
         'danhMuccha'=>$danhmuc['danhMuccha']

       ]);
      }
      Schema::enableForeignKeyConstraints();
    }
}
