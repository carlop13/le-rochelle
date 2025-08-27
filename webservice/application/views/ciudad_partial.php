<option value="0">-- Seleccione Ciudad --</option>
<?php foreach ($ciudades as $ciudad) : ?>
    <option value="<?= $ciudad->id ?>"><?= $ciudad->nombre ?></option>
<?php endforeach; ?>
