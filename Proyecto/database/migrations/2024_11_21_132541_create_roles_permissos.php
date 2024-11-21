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
        CREATE TABLE rbac_rol_permiso (
            rol_id VARCHAR(64) NOT NULL,
            permiso_id VARCHAR(64) NOT NULL,
            PRIMARY KEY(rol_id, permiso_id),            
            FOREIGN KEY (rol_id) REFERENCES rbac_rol(id),
            FOREIGN KEY (permiso_id) REFERENCES rbac_permiso(id)
        )    
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rbac_rol_permiso');
    }
};
