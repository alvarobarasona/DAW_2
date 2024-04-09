<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Pokémon</title>
    </head>
    <body>
        <h1>Modificar Pokémon</h1>
        <?php
            $data = json_decode($_POST['update']);
            echo "<p>Nombre: {$data-> name}</p><p>Tipo: {$data-> type}</p><p>Sexo: {$data-> sex}</p>";
        ?>
        <form action="/ejercicios_php/web_pokemon/modifydata" method="post">
                <div>
                    <label for="name-input">Nombre:</label>
                    <input type="text" name="name" id="name-input">
                </div>
                <div>
                    <label for="type-selector">Tipo:</label>
                    <select name="type" id="type-selector">
                        <option value="fire">Fuego</option>
                        <option value="water">Agua</option>
                        <option value="grass">Planta</option>
                        <option value="fly">Volador</option>
                        <option value="steel">Acero</option>
                        <option value="electric">Eléctrico</option>
                        <option value="dark">Siniestro</option>
                        <option value="ghost">Fantasma</option>
                        <option value="fairy">Hada</option>
                        <option value="normal">Normal</option>
                        <option value="fight">Lucha</option>
                        <option value="rock">Roca</option>
                        <option value="ground">Tierra</option>
                        <option value="ice">Hielo</option>
                        <option value="dragon">Dragon</option>
                        <option value="psiquic">Psíquico</option>
                        <option value="poison">Veneno</option>
                    </select>
                </div>
                <div>
                    <label for="sex-selector">Sexo:</label>
                    <select name="sex" id="sex-selector">
                        <option value="male">macho</option>
                        <option value="female">hembra</option>
                    </select>
                </div>
                <button type="submit" value='<?php echo $data-> id ?>' name="modify">Modificar</button>
            </form>
    </body>
</html>