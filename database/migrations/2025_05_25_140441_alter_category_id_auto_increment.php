<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement('ALTER TABLE categories MODIFY category_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
