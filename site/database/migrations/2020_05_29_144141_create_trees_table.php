<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('parent');
            $table->unsignedBigInteger('size');
            $table->string('name', 100);
            $table->enum('type', ['dir', 'file']);
            $table->boolean('in_process')->default(false);
            $table->timestamps();
        });

        $wwwId = DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => 0,
                'name' => 'www',
                'type' => 'dir',
                'size' => 4096
            )
        );
        $htmlId = DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => $wwwId,
                'name' => 'html',
                'type' => 'dir',
                'size' => 4096
            )
        );
        // error_log($t);

        $blogId = DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => $htmlId,
                'name' => 'blog',
                'type' => 'dir',
                'size' => 4096
            )
        );

        $siteId = DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => $htmlId,
                'name' => 'site',
                'type' => 'dir',
                'size' => 4096
            )
        );
        DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => $siteId,
                'name' => 'img.png',
                'type' => 'file',
                'size' => 1254570
            )
        );

        $configId = DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => $htmlId,
                'name' => 'config',
                'type' => 'dir',
                'size' => 4096
            )
        );

        $dataId = DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => $htmlId,
                'name' => 'data',
                'type' => 'dir',
                'size' => 4096
            )
        );

        DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => $dataId,
                'name' => '1.bin',
                'type' => 'file',
                'size' => 1325457
            )
        );

        DB::table('trees')->insertGetId(
            array(
                'user_id' => 1,
                'parent' => $dataId,
                'name' => 'backup.bin',
                'type' => 'file',
                'size' => 5000000000
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trees');
    }
}
