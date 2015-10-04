<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['firstName' => 'Mulodo', 'lastName'  => 'Test', 'email' => 'test@mulodo.com', 'password' => bcrypt('mulodotest')],
            ['firstName' => 'Tuan', 'lastName'  => 'Vu', 'email' => 'vu.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Nguyen', 'email' => 'nguyen.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Ngoc', 'email' => 'ngoc.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Hung', 'email' => 'hung.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Truong', 'email' => 'truong.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Minh', 'email' => 'minh.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Duong', 'email' => 'duong.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Phung', 'email' => 'phung.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Le', 'email' => 'le.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Tuan', 'lastName'  => 'Pham', 'email' => 'hua.tuan@mulodo.com', 'password' => bcrypt('tuan')],
            ['firstName' => 'Hung', 'lastName'  => 'Vu', 'email' => 'vu.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Nguyen', 'email' => 'nguyen.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Ngoc', 'email' => 'ngoc.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Hung', 'email' => 'hung.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Truong', 'email' => 'truong.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Minh', 'email' => 'minh.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Duong', 'email' => 'duong.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Phung', 'email' => 'phung.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Le', 'email' => 'le.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Hung', 'lastName'  => 'Pham', 'email' => 'pham.hung@mulodo.com', 'password' => bcrypt('hung')],
            ['firstName' => 'Cuong', 'lastName'  => 'Vu', 'email' => 'vu.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Nguyen', 'email' => 'nguyen.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Ngoc', 'email' => 'ngoc.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Hung', 'email' => 'hung.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Truong', 'email' => 'truong.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Minh', 'email' => 'minh.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Duong', 'email' => 'duong.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Phung', 'email' => 'phung.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Le', 'email' => 'le.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Cuong', 'lastName'  => 'Pham', 'email' => 'pham.cuong@mulodo.com', 'password' => bcrypt('cuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Vu', 'email' => 'vu.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Nguyen', 'email' => 'nguyen.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Ngoc', 'email' => 'ngoc.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Hung', 'email' => 'hung.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Truong', 'email' => 'truong.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Minh', 'email' => 'minh.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Duong', 'email' => 'duong.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Phung', 'email' => 'phung.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Le', 'email' => 'le.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Phuong', 'lastName'  => 'Pham', 'email' => 'pham.phuong@mulodo.com', 'password' => bcrypt('phuong')],
            ['firstName' => 'Minh', 'lastName'  => 'Vu', 'email' => 'vu.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Nguyen', 'email' => 'nguyen.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Ngoc', 'email' => 'ngoc.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Hung', 'email' => 'hung.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Truong', 'email' => 'truong.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Minh', 'email' => 'minh.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Duong', 'email' => 'duong.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Phung', 'email' => 'phung.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Le', 'email' => 'le.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Minh', 'lastName'  => 'Pham', 'email' => 'pham.minh@mulodo.com', 'password' => bcrypt('minh')],
            ['firstName' => 'Son', 'lastName'  => 'Vu', 'email' => 'vu.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Nguyen', 'email' => 'nguyen.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Ngoc', 'email' => 'ngoc.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Hung', 'email' => 'hung.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Truong', 'email' => 'truong.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Minh', 'email' => 'minh.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Duong', 'email' => 'duong.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Phung', 'email' => 'phung.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Le', 'email' => 'le.son@mulodo.com', 'password' => bcrypt('son')],
            ['firstName' => 'Son', 'lastName'  => 'Pham', 'email' => 'pham.son@mulodo.com', 'password' => bcrypt('son')]
        ]);
    }
}
