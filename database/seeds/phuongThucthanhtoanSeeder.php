<?php

use Illuminate\Database\Seeder;

class phuongThucthanhtoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	DB::table('tbl_phuongthucthanhtoans')->truncate();

    	$thanhtoans = [
    		['Thanh toán khi nhận hàng'],
    		['Ship COD'],
    		['Thanh toán quan ATM'],
    	];

    	foreach ($thanhtoans as $thanhtoan) {
    		App\tbl_phuongthucthanhtoan::create([
    			'tenPhuongthuc' => $thanhtoan[0]
    		]);
    	}

    	Schema::enableForeignKeyConstraints();
    }
}
