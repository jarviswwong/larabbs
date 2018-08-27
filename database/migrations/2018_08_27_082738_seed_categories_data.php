<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categroies = [
            [
                'name' => '分享',
                'description' => '分享技术上的创造与发现'
            ],
            [
                'name' => '教程',
                'description' => 'Web开发技术教程'
            ],
            [
                'name' => '公告',
                'description' => '站点公告'
            ],
        ];
        DB::table('categories')->insert($categroies);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
