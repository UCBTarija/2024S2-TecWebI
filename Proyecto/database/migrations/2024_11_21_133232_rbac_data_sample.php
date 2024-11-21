<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(<<<SQL
        INSERT INTO rbac_permiso (id) VALUES 
        ('producto-update'),
        ('producto-delete'),
        ('producto-create');
        SQL);

        DB::statement(<<<SQL
        INSERT INTO rbac_rol (id) VALUES 
        ('vendedor'),
        ('admin');
        SQL);

        DB::statement(<<<SQL
        INSERT INTO rbac_rol_permiso (rol_id, permiso_id) VALUES 
        ('vendedor', 'producto-create'),
        ('admin', 'producto-create'),
        ('admin', 'producto-update'),
        ('admin', 'producto-delete');
        SQL);

        DB::statement(<<<SQL
        INSERT INTO rbac_usuario_rol (usuario_id, rol_id) VALUES 
        (4, 'vendedor');
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(<<<SQL
        DELETE FROM rbac_usuario_rol;
        SQL);

        DB::statement(<<<SQL
        DELETE FROM rbac_rol_permiso;
        SQL);

        DB::statement(<<<SQL
        DELETE FROM rbac_rol;
        SQL);

        DB::statement(<<<SQL
        DELETE FROM rbac_permiso;
        SQL);
    }
};
