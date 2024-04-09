<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web Pokémon</title>
        <style>
            form {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
        </style>
    </head>
    <body>
        <h1>Formulario Pokémon</h1>
        <form action="/ejercicios_php/web_pokemon/insertdata" method="post">
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
            <input type="submit" value="Añadir">
        </form>
        <?php
            include("server.php");
        ?>
        <table>
            <tr>
                <thead>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Sexo</th>
                    <th>Fecha</th>
                    <th>Eliminar</th>
                    <th>Modificar</th>
                </thead>
                <?php
                    echo '<form action="/ejercicios_php/web_pokemon/deletedata" method="post">';                               
                    foreach($data as $row) {
                        echo '<tr>
                                <td>"' . $row['name'] . '"</td>
                                <td>"' . $row['type'] . '"</td>
                                <td>"' . $row['sex'] . '"</td>
                                <td>"' . $row['timestamp'] . '"</td>
                                <td>
                                    <input type="checkbox" name="checklist[]" value="' . $row['id'] . '">
                                </td>
                                <td>
                                    <input type="radio" name="update" value="' . htmlspecialchars(json_encode($row)) . '">
                                </td>
                            </tr>';
                        };
                        echo '<tr>
                            <td>
                                <input type="submit" value="Eliminar">
                            </td>
                            <td>
                                <button type="submit" formaction="/ejercicios_php/web_pokemon/modifypage">Modificar</button>
                            </td>
                        </tr>
                        <span>Número de página: ' . $_SESSION['page'] . ' de ' . get_total_pages() . '</span>
                        <select name="page">';
                        for($i = 0; $i < get_total_pages(); $i++) {
                            echo "<option value='" . $i + 1 . "'>" . $i + 1 . "</option>";
                        };
                        echo '</select>
                        <button formaction="/ejercicios_php/web_pokemon/" name="pagebutton">Paginar</button>';
                    echo '</form>';
                ?>
            </tr>
        </table>
    </body>
</html>