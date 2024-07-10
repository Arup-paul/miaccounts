<?php

namespace Database\Seeders;

use App\Models\AccountHead;
use App\Models\Group;
use App\Models\Transaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Group::insert([
            ['id' => 1, 'name' => 'Group 1', 'parent_id' => null],
            ['id' => 2, 'name' => 'Group 2', 'parent_id' => 1],
            ['id' => 3, 'name' => 'Group 3', 'parent_id' => null],
            ['id' => 4, 'name' => 'Group 5', 'parent_id' => null],
            ['id' => 5, 'name' => 'Group 6', 'parent_id' => 4],
            ['id' => 6, 'name' => 'Group 4', 'parent_id' => 5],
            ['id' => 7, 'name' => 'Group 7', 'parent_id' => null],
            ['id' => 8, 'name' => 'Group 8', 'parent_id' => null],
            ['id' => 9, 'name' => 'Group 9', 'parent_id' => 8],
            ['id' => 10, 'name' => 'Group 10', 'parent_id' => 9],
        ]);

//        AccountHead::insert([
//            ['id' => 1, 'name' => 'Account Head 1', 'group_id' => 2],
//            ['id' => 2, 'name' => 'Account Head 2', 'group_id' => 2],
//            ['id' => 3, 'name' => 'Account Head 3', 'group_id' => 3],
//            ['id' => 4, 'name' => 'Account Head 4', 'group_id' => 1],
//            ['id' => 5, 'name' => 'Account Head 5', 'group_id' => 1],
//            ['id' => 6, 'name' => 'Account Head 6', 'group_id' => 6],
//            ['id' => 7, 'name' => 'Account Head 7', 'group_id' => 6],
//            ['id' => 8, 'name' => 'Account Head 8', 'group_id' => 4],
//        ]);

        for ($i = 0; $i < 100; $i++) {
            AccountHead::insert([
                ['name' => 'Account Head ' . $i+1, 'group_id' => rand(1, 10)],
            ]);
        }




//        Transaction::insert([
//            ['account_head_id' => 1, 'date' => now()->format('Y-m-d'),'credit' => 0,'debit' => 35],
//            ['account_head_id' => 1, 'date' => now()->format('Y-m-d'),'credit' => 15,'debit' => 0],
//            ['account_head_id' => 2, 'date' => now()->format('Y-m-d'),'credit' => 35,'debit' => 0],
//            ['account_head_id' => 2, 'date' => now()->format('Y-m-d'),'credit' => 0,'debit' => 50],
//            ['account_head_id' => 3, 'date' => now()->format('Y-m-d'),'credit' => 0,'debit' => 40],
//            ['account_head_id' => 4, 'date' => now()->format('Y-m-d'),'credit' => 0,'debit' => 40],
//            ['account_head_id' => 4, 'date' => now()->format('Y-m-d'),'credit' => 10,'debit' => 0],
//            ['account_head_id' => 5, 'date' => now()->format('Y-m-d'),'credit' => 30,'debit' => 50],
//            ['account_head_id' => 6, 'date' => now()->format('Y-m-d'),'credit' => 50,'debit' => 55],
//            ['account_head_id' => 7, 'date' => now()->format('Y-m-d'),'credit' => 0,'debit' => 10],
//            ['account_head_id' => 8, 'date' => now()->format('Y-m-d'),'credit' => 0,'debit' => 65],
//            ['account_head_id' => 8, 'date' => now()->format('Y-m-d'),'credit' => 50,'debit' => 0],
//        ]);

        for ($i = 0; $i <= 10000; $i++){
            Transaction::insert([
                'account_head_id' => rand(1,100),'date' => now()->format('Y-m-d'),'credit' => rand(100,200),'debit' => rand(200,300)
            ]);
        }



    }
}
