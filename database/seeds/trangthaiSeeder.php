<?php

use Illuminate\Database\Seeder;

class trangthaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	DB::table('tbl_trangthais')->truncate();

    	$trangthai = [
    		['Chưa xử lý'],
    		['Đã đóng gói'],
    		['Đang giao hàng'],
            ['Đã giao hàng'],
			['Đã hủy'],
			['Đã thanh toán'],
    	];

    	foreach ($trangthai as $item) {
    		App\tbl_trangthai::create([
    			'tenTrangthai' => $item[0]
    		]);
    	}

    	Schema::enableForeignKeyConstraints();
    }
}
