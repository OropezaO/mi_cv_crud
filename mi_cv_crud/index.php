<?php
require_once("db.php");

// Verificar si se envió el formulario correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (!empty($_POST['department']) && !empty($_POST['name']) && !empty($_POST['email'])) {
        $sql = $conn->prepare("INSERT INTO tbl_emp_details (department, name, email) VALUES (?, ?, ?)");
        $department = $_POST['department'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql->bind_param("sss", $department, $name, $email);

        if ($sql->execute()) {
            $success_message = "Registro agregado exitosamente.";
        } else {
            $error_message = "Hubo un problema al agregar el registro.";
        }
        $sql->close();
    } else {
        $error_message = "Todos los campos son obligatorios.";
    }
}

// Eliminar registro
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = $conn->prepare("DELETE FROM tbl_emp_details WHERE id=?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $sql->close();
}

// Obtener todos los registros
$sql = "SELECT * FROM tbl_emp_details";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum Vitae - Fernando Oropeza</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body>
    <!-- Hero Section -->
    <section id="hero">
        <div class="hero-content">
            <img src="images/mfoh_foto.jpg" alt="Fernando Oropeza" class="hero-photo">
            <h1>Fernando Oropeza Hernández</h1>
            <h2>Administrador SQL & Desarrollador Web</h2>
            <p>Transformando ideas en soluciones tecnológicas y optimizando procesos a través del análisis de datos y el desarrollo.</p>
            <a href="#habilidades" class="scroll-down">
            <span>&#8595;</span>
            </a>
        </div>
    </section>

    <!-- Perfil General -->
    <section id="perfil">
        <div class="perfil-introduccion">
            <h2>Hola, soy Fernando Oropeza. Mucho gusto.</h2>
            <p>
                Ingeniero en formación con más de 5 años de experiencia en análisis de datos, desarrollo de bases de datos y programación. Mi especialidad radica en transformar datos en decisiones estratégicas, logrando optimizar la eficiencia operativa mediante herramientas avanzadas como Python, SQL, Power BI y VBA.
            </p>
            <p>
                Desde el inicio de mi carrera, me he enfocado en diseñar e implementar soluciones innovadoras para la gestión de datos, automatización de procesos y desarrollo de sistemas robustos. Mi curiosidad natural y compromiso con la mejora continua me han llevado a transformar ideas complejas en resultados tangibles, siempre impulsando la innovación y el impacto positivo en cada proyecto.
            </p>
        </div>
        <div class="perfil-tarjetas">
            <div class="tarjeta">
            <div class="icono">
                <img src="icon/data.png" alt="Diseñador">
            </div>
            <h3>Analista de Datos</h3>
            <p>Transformación de datos en decisiones estratégicas utilizando herramientas como SQL, Power BI y Python.</p>
            </div>
            <div class="tarjeta">
            <div class="icono">
                <img src="icon/desarrollador.png" alt="Desarrollador">
            </div>
            <h3>Desarrollador</h3>
            <p>Diseño de sistemas automatizados y eficientes que optimizan los flujos de trabajo.</p>
            </div>
            <div class="tarjeta">
            <div class="icono">
                <img src="icon/leader.png" alt="Mentor">
            </div>
            <h3>Líder de Equipo</h3>
            <p>Coordinación equipos de analistas y capturistas para asegurar entregas de alta calidad.</p>
            </div>
        </div>
    </section>

    <section id="habilidades">
            <h2>Habilidades</h2>
            <div class="carrusel">
                <div class="fila">
                <div class="tarjeta">
                    <img src="icon/python-logo.svg" alt="Python">
                    <p>Python</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/sql-logo.svg" alt="SQL">
                    <p>SQL</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/powerbi-logo.svg" alt="Power BI">
                    <p>Power BI</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/javascript-logo.svg" alt="JavaScript">
                    <p>JavaScript</p>
                </div>
                </div>
                <div class="fila inversa">
                <div class="tarjeta">
                    <img src="icon/html-logo.svg" alt="HTML">
                    <p>HTML</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/css-logo.svg" alt="CSS">
                    <p>CSS</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/react-logo.svg" alt="React">
                    <p>React</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/github-logo.png" alt="GitHub">
                    <p>GitHub</p>
                </div>
                </div>
                <div class="fila">
                <div class="tarjeta">
                    <img src="icon/excel-logo.svg" alt="Excel">
                    <p>Excel</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/sap-logo.svg" alt="SAP">
                    <p>SAP</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/googlecloud-logo.svg" alt="Google Cloud">
                    <p>Google Cloud</p>
                </div>
                <div class="tarjeta">
                    <img src="icon/huawei-logo.svg" alt="Huawei Cloud">
                    <p>Huawei Cloud</p>
                </div>
                </div>
            </div>
    </section>

    <!-- Experiencia Laboral -->
    <section id="experiencia">
        <h2>Experiencia Laboral</h2>

        <!-- American Express -->
        <div class="experiencia-item">
            <div class="experiencia-header">
            <span class="fecha">Septiembre 2024 — Actualidad</span>
            <h3>American Express México - Administrador SQL</h3>
            </div>
            <p>En mi rol como Administrador SQL, he diseñado y mantenido bases de datos esenciales para el departamento GNS, asegurando su confiabilidad y rendimiento. Creé un programa en Python capaz de interpretar texto en imágenes, lo que automatizó procesos de análisis de datos, mejorando significativamente la eficiencia. Implementé un servidor centralizado en BigQuery, que optimizó la comunicación entre áreas y fortaleció la infraestructura de datos. Asimismo, lideré iniciativas para la optimización de redes globales, logrando un entorno más robusto y escalable.</p>
            <ul class="habilidades">
            <li>Python</li>
            <li>SQL</li>
            <li>BigQuery</li>
            <li>Optimización de Redes</li>
            </ul>
        </div>

        <!-- Merck -->
        <div class="experiencia-item">
            <div class="experiencia-header">
            <span class="fecha">Abril 2024 — Octubre 2024</span>
            <h3>Merck - Becario en Control de Calidad (QA)</h3>
            </div>
            <p>Durante mi estancia en Merck, desarrollé un sistema generador de códigos QR utilizando Python, integrado a una base de datos en Access mediante consultas SQL. Este sistema automatizó la trazabilidad y dictamen de los lotes de producción. Implementé bitácoras digitales que reemplazaron procesos manuales basados en papel, modernizando la gestión de expedientes. Gestioné una base de datos centralizada en Access para optimizar el flujo de información de los lotes, y conecté esta base con Excel mediante herramientas avanzadas como Power Query, Power Pivot, Dataverse y VBA, facilitando la coordinación entre áreas de producción. También diseñé dashboards en Power BI que permitieron visualizar indicadores clave como LeadTime y E2E, lo que apoyó la toma de decisiones estratégicas.</p>
            <ul class="habilidades">
            <li>Python</li>
            <li>Access</li>
            <li>SQL</li>
            <li>Power BI</li>
            <li>Power Query</li>
            <li>Automatización</li>
            </ul>
        </div>

        <!-- Urban Data -->
        <div class="experiencia-item">
            <div class="experiencia-header">
            <span class="fecha">Noviembre 2019 — Marzo 2024</span>
            <h3>Urban Data - Coordinador de Calidad de Datos y Optimización de Procesos</h3>
            </div>
            <p>En Urban Data, coordiné equipos de analistas y capturistas en proyectos de gran escala relacionados con ingeniería de tránsito y transporte. Diseñé e implementé un sistema de gestión de datos mediante App Script, adaptado a proyectos de ascensos y descensos, encuestas de origen-destino y preferencia declarada, lo que permitió una gestión más eficiente de la información. Supervisé la revisión y validación de bases de datos geográficas, garantizando la precisión y calidad de los datos entregados. Como analista y productor de mapas, utilicé herramientas como QGIS, MapSource, Google Earth y My Maps para crear representaciones visuales precisas. Además, desarrollé programas de capacitación para optimizar el uso de software y procesos internos, y diseñé croquis en AutoCAD que cumplieron con los estándares oficiales requeridos.</p>
            <ul class="habilidades">
            <li>App Script</li>
            <li>QGIS</li>
            <li>Google Earth</li>
            <li>My Maps</li>
            <li>MapSource</li>
            <li>AutoCAD</li>
            </ul>
        </div>
    </section>

    <!-- Portafolio -->
    <section id="portafolio">
  <div class="portafolio-titulo">
    <h2>Mi Portafolio</h2>
    <p>Explora algunos de los proyectos en los que he trabajado.</p>
  </div>
  <div class="portafolio-grid">
    <!-- Tarjeta 1 -->
    <a href="https://github.com/OropezaNtx/qw.git" target="_blank" class="tarjeta">
      <img src="icon/github-logo.png" alt="Proyecto 1">
      <h3>Proyecto 1</h3>
      <p>Sistema automatizado para la gestión de datos y generación de reportes.</p>
    </a>
    
    <!-- Tarjeta 2 -->
    <a href="https://github.com/OropezaNtx/q.git" target="_blank" class="tarjeta">
      <img src="icon/github-logo.png" alt="Proyecto 2">
      <h3>Proyecto 2</h3>
      <p>Dashboard interactivo para análisis de datos empresariales.</p>
    </a>
    
    <!-- Tarjeta 3 -->
    <a href="https://github.com/OropezaNtx/qwe.git" target="_blank" class="tarjeta">
      <img src="icon/github-logo.png" alt="Proyecto 3">
      <h3>Proyecto 3</h3>
      <p>Aplicación web para optimización de flujos de trabajo.</p>
    </a>
    
    <!-- Tarjeta 4 -->
    <a href="https://github.com/OropezaO/sapos-terminales.git" target="_blank" class="tarjeta">
    <img src="icon/github-logo.png" alt="Proyecto 4">
        <h3>Proyecto 4</h3>
        <p>Integración de sistemas en la nube para sincronización de datos.</p>
    </a>
  </div>
</section>


     <!-- Sección de Contacto -->
     <section id="contacto">
        <h2>Contacto</h2>
        <?php if (!empty($success_message)) { ?>
            <div class="success"><?php echo $success_message; ?></div>
        <?php } if (!empty($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php } ?>
        <form action="" method="POST">
            <label for="department">Departamento:</label>
            <input type="text" id="department" name="department" required>

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit" name="submit">Enviar</button>
        </form>
    </section>

    <!-- Lista de Contactos -->
    <section id="lista-contactos">
        <h2>Lista de Contactos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>
<script>
    gsap.registerPlugin(ScrollTrigger);
    gsap.from("h2", {
        scrollTrigger: "h2",
        y: 50,
        opacity: 0,
        duration: 1,
        stagger: 0.3,
    });
</script>
</body>
</html>
<?php $conn->close(); ?>