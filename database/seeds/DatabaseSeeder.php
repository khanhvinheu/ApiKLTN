<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(quyenSeeder::class);
        $this->call(trangthaiSeeder::class);
        $this->call(taiKhoanSeeder::class);
        $this->call(phuongThucthanhtoanSeeder::class);
        $this->call(danhmucSeeder::class);
        $this->call(nhaCungcapSeeder::class);
        $this->call(khuyenMaiSeeder::class);
        $this->call(sanPhamSeeder::class);
        $this->call(danhMuchinhanhSeeder::class);
        $this->call(chitietkhuyenMaiSeeder::class);  
             
    }
}
