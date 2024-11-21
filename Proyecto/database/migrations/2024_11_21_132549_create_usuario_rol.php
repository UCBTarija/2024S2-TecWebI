<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(<<<SQL
        CREATE TABLE rbac_usuario_rol (
            usuario_id bigint NOT NULL,
            rol_id VARCHAR(64) NOT NULL,
            PRIMARY KEY(usuario_id, rol_id),
            FOREIGN KEY (usuario_id) REFERENCES users(id),
            FOREIGN KEY (rol_id) REFERENCES rbac_rol(id)
        )    
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rbac_usuario_rol');
    }
};
