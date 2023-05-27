<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from persona where id = ?;");
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia_promocion = $bd->prepare("select * from promociones where id_persona = ?;");
$sentencia_promocion->execute([$codigo]);
$promocion = $sentencia_promocion->fetchAll(PDO::FETCH_OBJ); 
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Promocion para el cliente <?php echo $persona->nombres.' '.$persona->apellido_paterno.' '.$persona->apellido_materno; ?>
                </div>
                <form class="p-4" method="POST" action="registrarPromocion.php">
                    <div class="mb-3">
                        <label class="form-label">Promocion: </label>
                        <input type="text" class="form-control" name="txtPromocion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Duración de la Promocion: </label>
                        <input type="text" class="form-control" name="txtDuracion" autofocus required>
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $persona->id; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $persona->id; ?>"><P></P>
                        <a class="btn btn-light" href="inicio.php" role="button">Cancelar</a>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Lista de Promociones
                </div>
                <div class="p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Promocion</th>
                                <th scope="col" colspan="4">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($promocion as $dato) {
                            ?>
                                <tr class="table">
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td>La promocion <?php echo $dato->promocion; ?> dura <?php echo $dato->duracion; ?></td>
                                    <td><a class="text-primary" href="enviarMensaje.php?codigo=<?php echo $dato->id; ?>">
                                            <div class="d-grid"><input type="button" class="btn btn-primary btn-sm" value="Mensaje"></div>
                                        </a>
                                    </td>
                                    <td><a class="text-primary" href="enviarImagen.php?codigo=<?php echo $dato->id; ?>">
                                            <div class="d-grid"><input type="button" class="btn btn-primary btn-sm" value="Imagen Promocional"></div>
                                        </a>
                                    </td>
                                    <td><a class="text-primary" href="enviarArchivo.php?codigo=<?php echo $dato->id; ?>">
                                            <div class="d-grid"><input type="button" class="btn btn-primary btn-sm" value="Catalogo"></div>
                                        </a>
                                    </td>
                                    <td><a class="text-primary" href="enviarUbicacion.php?codigo=<?php echo $dato->id; ?>">
                                            <div class="d-grid"><input type="button" class="btn btn-primary btn-sm" value="Ubicacion Tienda"></div>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

