<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/ProyectoTeclab/Vista/css/productos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista de Entradas</title>
</head>
<body>
    <!-- Encabezado -->
    <div class="encabezado">
        <img src="http://localhost/ProyectoTeclab/Vista/img/logo.png" alt="">
    </div>
    
    <!-- Seccion Productos -->
    <section class="entradas">
        <div class="navBar">
            <div class="atras">
                <button id="atras"><a id=a href="http://localhost/ProyectoTeclab/inicio.html"><i class="fa-solid fa-arrow-left"></i></a></button>
            </div>
            <div class="buscador">
                <form action="" method="POST">
                    <input type="text" name="campo" id="campo">
                    <label for="campo"><button><i class="fa-solid fa-magnifying-glass"></i></button></label>
                </form>
            </div>
        </div>
        <div class="tabla">
            <table>
                <thead>
                    <tr>
                        <th id="id-producto">ID</th>
                        <th id="nombre-producto">Producto</th>
                        <th id="fecha">Cantidad</th>
                        <th id="cantidad">Fecha</th>
                        <th id="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody id="content">
                    
                </tbody>
            </table>
            <script>
                        getData()

                        document.getElementById("campo").addEventListener("keyup", getData)

                        function getData() {
                            let input = document.getElementById("campo").value
                            let content = document.getElementById("content")
                            let url = "http://localhost/ProyectoTeclab/Entradas/buscadorEntradas.php"
                            let formaData = new FormData()
                            formaData.append('campo', input)

                            fetch(url, {
                                method: "POST",
                                body: formaData
                            }).then(response => response.json())
                            .then(data => {
                                content.innerHTML = data
                            }).catch(err => console.log(err))
                        }

                </script>
        </div>
        <!-- <div class="botones">
            <button class="boton" id="btn-editar">Editar</button>
            <button class="boton" id="btn-borrar">Borrar</button>
        </div> -->
    </section>
</body>
</html>