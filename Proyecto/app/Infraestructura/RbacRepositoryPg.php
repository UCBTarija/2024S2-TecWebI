<?php

namespace App\Infraestructura;

use Illuminate\Support\Facades\DB;
use App\Core\Dominio\Rbac\RbacRepository;

class RbacRepositoryPg implements RbacRepository
{
    public function hasPermission(string $userId, string $permission): bool
    {
        $data = DB::select(
            "
            select rbac_rol_permiso.permiso_id 
            from users
            join rbac_usuario_rol
                on rbac_usuario_rol.usuario_id = users.id
            join rbac_rol_permiso
                on rbac_rol_permiso.rol_id = rbac_usuario_rol.rol_id
            where users.id = :USER_ID
            and rbac_rol_permiso.permiso_id = :PERMISO_ID
            ",
            [
                ':USER_ID' => $userId,
                ':PERMISO_ID' => $permission,
            ]
        );

        return count($data) > 0;
    }
}