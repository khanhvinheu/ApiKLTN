<?php

use Illuminate\Database\Seeder;

class danhMuchinhanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	DB::table('tbl_danhmuchinhanhs')->truncate();

    	$danh_muc_hinhs = [
            [13,"a500dc8997e108534e6ab8473fc451ef.jpg",8,"2019-09-19 10:03:38","2019-09-19 10:03:38"],
            [14,"s8.png",8,"2019-09-19 10:03:44","2019-09-19 10:03:44"],
            [15,"s8-2.jpg",8,"2019-09-19 10:03:47","2019-09-19 10:03:47"],
            [16,"s83.jpg",8,"2019-09-19 10:03:52","2019-09-19 10:03:52"],
            [17,"s83.png",8,"2019-09-19 10:03:58","2019-09-19 10:03:58"],
            // [18,"NUpghA8fmDJyylOGDQufQxn9ltuf6m2PkTOsLr15.jpeg",8,"2019-09-19 10:04:41","2019-09-19 10:04:41"],
            // [19,"c7ZwMBO5uppab5YnWVqJ2XIcqNh7GaVkH4DtLfDA.jpeg",8,"2019-09-19 10:04:50","2019-09-19 10:04:50"],
            // [20,"R9b5aZMJOeCFTqRB44vMAI5jY361lLdofevsivPQ.jpeg",8,"2019-09-19 10:06:13","2019-09-19 10:06:13"],
            // [21,"1QsJCi6OoVLZlU1Sfl8xHNXuXmRYOg5HzOUnZACO.jpeg",8,"2019-09-19 10:06:48","2019-09-19 10:06:48"],
            // [22,"FQMWVelI1iZlwvzUhBavS2DhdJAyTPpVrq0QOx2f.jpeg",8,"2019-09-19 10:06:55","2019-09-19 10:06:55"],
            // [27,"0q3eGG9RDvwBfoDvs1Pk1krSqUrVGBjQVIA9Xdxw.jpeg",8,"2019-09-19 13:28:28","2019-09-19 13:28:28"]
        ];

    	foreach ($danh_muc_hinhs as $danhmuc) {
    		App\tbl_danhmuchinhanh::create([
    			'idSanPham' => $danhmuc[2],
    			'hinhAnh'=>$danhmuc[1]
    		]);
    	}
    	Schema::enableForeignKeyConstraints();
    }
}
