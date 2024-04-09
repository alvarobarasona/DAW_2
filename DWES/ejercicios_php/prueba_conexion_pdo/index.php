<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario con PDO</title>
    </head>
    <body>
        <h1>Formulario con PDO</h1>
        <form action="">
            <div>
                <label for="name-input">Nombre:</label>
                <input type="text" name="" id="name-input">
            </div>
            <div>
                <label for="first-surname-input">Primer apellido:</label>
                <input type="text" name="" id="first-surname-input">
            </div>
            <div>
                <label for="second-surname-input">Segundo apellido:</label>
                <input type="text" name="" id="second-surname-input">
            </div>
            <div>
                <label for="age-input">Edad:</label>
                <input type="text" name="" id="age-input">
            </div>
            <div>
                <label for="age-input">Sexo:</label>
                <select name="" id="age-input">
                    <option value="male">Hombre</option>
                    <option value="female">Mujer</option>
                </select>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>