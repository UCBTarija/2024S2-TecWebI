<?php

namespace Ucb\Almacen\Adapters;

use PDO;
use Ucb\Almacen\Domain\Articulo;
use Ucb\Almacen\Domain\ArticuloRepository;

class ArticuloRepositoryImpl implements ArticuloRepository
{
    /**
     * @inheritdoc
     */
    public function getArticuloById(
        int $id
    ): Articulo|null {

        // obtiene la conexión
        $pdo = Db::getConnection();

        // prepara una consulta
        $query = $pdo->prepare("select id as id_articulo, nombre from articulo where id = :id");

        // ejecuta la consulta enviando parámetros
        $query->execute([':id' => $id]);

        // recupera los datos de UNA FILA en forma de un arreglo asociativo
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // pregunta si el arreglo obtenido tiene columnas, si no tiene significa 
        // que no existe un registro con el id proporcionado
        if (count($row) == 0) {
            return null;
        }

        // crea un objeto con los datos de la fila recuperada
        return new Articulo(
            $row['id_articulo'],
            $row['nombre'],
        );
    }

    /**
     * @inheritdoc
     */
    public function insert(Articulo $articulo): bool
    {
        $pdo = Db::getConnection();

        // prepara y ejecuta la consulta de inserción
        $sql = <<<SQL
        INSERT into articulo (id, nombre) 
        values(:id, :nombre)
        SQL;

        $query = $pdo->prepare($sql);
        $query->execute([
            ':id' => $articulo->id(),
            ':nombre' => $articulo->nombre()
        ]);

        // si se afectó alguna fila se devuelve true
        return $query->rowCount() > 0;
    }

    /**
     * @inheritdoc
     */
    public function update(Articulo $articulo): bool
    {
        $pdo = Db::getConnection();

        $sql = <<<SQL
        UPDATE articulo set
        nombre :nombre
        WHERE id = :id
        SQL;

        $query = $pdo->prepare($sql);
        $query->execute([
            ':id' => $articulo->id(),
            ':nombre' => $articulo->nombre()
        ]);

        return $query->rowCount() > 0;
    }

    /**
     * @inheritdoc
     */
    public function remove(int $articuloId): bool
    {
        $pdo = Db::getConnection();

        $sql = <<<SQL
        DELETE FROM  articulo
        WHERE id = :id
        SQL;

        $query = $pdo->prepare($sql);
        $query->execute([
            ':id' => $articuloId,
        ]);

        return $query->rowCount() > 0;
    }

    /**
     * @inheritdoc
     */
    public function getAll(): array
    {
        $pdo = Db::getConnection();

        // prepara y ejecuta la consulta para recuperar filas
        $sql = <<<SQL
        SELECT id, nombre
        FROM articulo
        SQL;

        $query = $pdo->prepare($sql);
        $query->execute();

        // recupera los datos como un arreglo donde cada elemento es otro arreglo 
        // con los datos de la fila obtenida
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        // recorre el arreglo obtenido creando un objeto Artículo por cada fila y
        // lo guarda en el arreglo list, que será devuelto al llamador de la función
        $list = [];
        foreach ($rows as $row) {
            $list[$row['id_articulo']] = new Articulo(
                $row['id_articulo'],
                $row['nombre'],
            );
        }
        return $list;
    }
}
