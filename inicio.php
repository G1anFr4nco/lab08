<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Personal - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100 bg-light">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">JOFRALE</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="index.html">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="inicio.php">Registro</a></li>
                            <li class="nav-item"><a class="nav-link" href="categorias.html">Categorias</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Promociones</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page Content-->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Registro</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Divider-->
                        <div class="pb-5"></div>
                        <!-- Skills Section-->
                        <section>
                            <!-- Skillset Card-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <!-- Professional skills list-->
                                    <div class="mb-5">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-envelope"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline" href="registrar.php">Registrar clientes</span></h3>
                                        </div>
                                        
                                        <div class="container mt-5">

                                        <div class="container mt-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-7">
                                                
                                                <div class="card">
                                                    <div class="card-header">
                                                        Lista de personas
                                                    </div>
                                                    <div class="p-4">
                                                        <table class="table align-middle">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Nombres</th>
                                                                    <th scope="col">Apellido Paterno</th>
                                                                    <th scope="col">Apellido Materno</th>
                                                                    <th scope="col">F.Nacimiento</th>
                                                                    <th scope="col">Celular</th>
                                                                    <th scope="col" colspan="2">Opciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                <?php 
                                                                    foreach($persona as $dato){ 
                                                                ?>

                                                                <tr>
                                                                    <td scope="row"><?php echo $dato->id; ?></td> 
                                                                    <td><?php echo $dato->nombres; ?></td>
                                                                    <td><?php echo $dato->apellido_paterno; ?></td>
                                                                    <td><?php echo $dato->apellido_materno; ?></td>
                                                                    <td><?php echo $dato->fecha_nacimiento; ?></td>
                                                                    <td><?php echo $dato->celular; ?></td>
                                                                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                                                    <td><a class="text-success" href="agregarPromocion.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cart3"></i></a></td>
                                                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
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
                                        <form method="post" action = "crear.php">
                                            <div class="row mb-3 d-flex justify-content-center">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Nombre" class="form-control" name="txtNombres"">
                                                </div>
                                            </div>

                                            <div class="row mb-3 d-flex justify-content-center">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Apellido Paterno" class="form-control" name="txtApPaterno">
                                                </div>
                                            </div>

                                            <div class="row mb-3 d-flex justify-content-center">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Apellido Materno" class="form-control" name="txtApMaterno" >
                                                </div>
                                            </div>

                                            <div class="row mb-3 d-flex justify-content-center">
                                                <div class="col-sm-6">
                                                    <input type="date" class="form-control" name="txtFechaNacimiento">
                                                </div>
                                            </div>

                                            <div class="row mb-3 d-flex justify-content-center">
                                                <div class="col-sm-6">
                                                    <input type="number" placeholder="Celular" class="form-control" name="txtCelular">
                                                </div>
                                            </div>          

                                            <div class="d-grid">
                                                <input type="hidden" name="oculto" value="1">
                                                <input type="submit" class="btn btn-primary" value="Registrar">
                                            </div>
                                        </form>

                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Clientes normales</span></h3>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3 mb-4">
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">SEO/SEM Marketing</div></div>
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">Statistical Analysis</div></div>
                                            <div class="col"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">Web Development</div></div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3">
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">Network Security</div></div>
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">Adobe Software Suite</div></div>
                                            <div class="col"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">User Interface Design</div></div>
                                        </div>
                                    </div>
                                    <!-- Languages list-->
                                    <div class="mb-0">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-code-slash"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Clientes premium</span></h3>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3 mb-4">
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">HTML</div></div>
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">CSS</div></div>
                                            <div class="col"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">JavaScript</div></div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3">
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">Python</div></div>
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">Ruby</div></div>
                                            <div class="col"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">Node.js</div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy; Your Website 2023</div></div>
                    <div class="col-auto">
                        <a class="small" href="#!">Privacy</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Terms</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>