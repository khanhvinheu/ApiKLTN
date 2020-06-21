<?php

use Illuminate\Database\Seeder;

class quyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	DB::table('tbl_quyens')->truncate();

    	$quyens = [
    		['Admin'],
    		['Nhà Cung Cấp'],
    		['Thành Viên'],
    	];

    	foreach ($quyens as $quyen) {
    		App\tbl_quyen::create([
    			'tenQuyen' => $quyen[0]
    		]);
    	}

    	Schema::enableForeignKeyConstraints();
    }
}
