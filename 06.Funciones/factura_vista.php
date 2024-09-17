<h1>Factura</h1>

<table border="1">
    <tr>
        <th>Item</th>
        <th>Precio Unitario</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
    </tr>
    <?php foreach($items as $item): ?>
        <tr>
            <td><?= $item['item'] ?></td>
            <td><?= $item['precioU'] ?></td>
            <td><?= $item['cantidad'] ?></td>
            <td><?= $item['subtotal'] ?></td>
        </tr>
    <?php endforeach;?>
</table>
<h3>Total: <?= $total ?></h3>