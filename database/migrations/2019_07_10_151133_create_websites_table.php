<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50)->nullable();
            $table->text('description');
            $table->string('url', 1000)->nullable();
            $table->bigInteger('rating')->nullable();
            $table->text('keywords');
            $table->string('country', 50)->nullable();
            $table->text('temp_words')->nullable();
            $table->string('temp_company', 50)->nullable();
            $table->timestamps();

        });

        DB::statement('ALTER TABLE websites ADD FULLTEXT fulltext_webbsite_index (url,title,description,keywords)');
        DB::statement('ALTER TABLE websites ADD FULLTEXT fulltext_title_index (title)');
        DB::statement('ALTER TABLE websites ADD FULLTEXT fulltext_description_index (description)');
        DB::statement('ALTER TABLE websites ADD FULLTEXT fulltext_url_index (url)');
        DB::statement('ALTER TABLE websites ADD FULLTEXT fulltext_keywords_index (keywords)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
