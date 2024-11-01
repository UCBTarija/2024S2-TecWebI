<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(<<<SQL
        CREATE TABLE producto (
            id SERIAL NOT NULL PRIMARY KEY,
            codigo VARCHAR(64) NOT NULL,
            nombre VARCHAR(255) NOT NULL,
            precio DECIMAL(10,2) NOT NULL
        )    
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(<<<SQL
        DROP TABLE IF EXISTS producto;
        SQL);
    }
};
