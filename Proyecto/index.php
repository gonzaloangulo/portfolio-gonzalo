<!-- TFG Gonzalo Angulo -->
<!-- codigo php para la conexion con la base de datos donde realizamos la conexion, 
donde iniciamos la sesion y obtenemos la variables de la sesion -->
<?php 
	include 'conexion.php'; 
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['user'];
	$id = $_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- indicamos al navegador de que tipo va a ser nuestra pagina -->
    <meta content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo de la pagina -->
    <title>Corta y Ladra</title>
    <!-- enlazamos la pagina de estilos -->
    <link rel="stylesheet" href="css/style_index.css">
     <!-- enlazamos imagen para establecer el favicon -->
     <link rel="icon" type="image/jpg" href="img/icons8-huella-de-perro-40.png"/>
     <!-- Esta línea enlaza una hoja de estilos CSS externa donde cojo íconos vectoriales -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<!-- conexion a la api de google para coger fuentes de ella -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- nos conectamos tambien a la api de gstatic  -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Enlazamos una fuente personalizada llamada ubuntu -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
    </head>
    
    
    <!-- inicio del body -->
    <body>
    <header class="header" id="inicio">
    <p class="sesion"><?php 
    // Verificar si la variable sesion $varsesion está vacia o no está definida
    if($varsesion == null || $varsesion = ''){
        ?>
        <a href="login.php">Iniciar Sesion</a>

        <?php
        }else{
            // Si la sesión está iniciada
            // Mostrar el nombre de usuario y su ID almacenados en la sesión
            echo $_SESSION['user'];
            echo $_SESSION['user_id']; ?>
            <!-- Mostramos el enlace para cerrar la sesion -->
            <a href="logout.php">Cerrar Sesion</a>
        <?php
        } //fin del bucle if else			
            ?>
    </p>
    
    <!-- Imagen Vectorial para abrir el menu desplegable -->
    <img src="img/MenuIcon.svg" class="logomenu">
    
    <!-- menu desplegable -->
    <nav class="menu_navegacion">
        <a href="#inicio">Inicio</a>
        <a href="#servicio">Servicio</a>
        <a href="#portfolio">Galeria</a>
        <a href="#contactos">Contacto</a>
    </nav>

    <!-- texto encima de la imagen del index -->
    <div class="contenedor head">
        <h1 class="titulo">Cuidamos de tu mascota</h1>
        <p class="copy">En Corta Y Ladra trataremos a tu mascota para que se sienta como nueva</p>
    </div>

    </header>  <!--Fin header-->
    
    <!-- primer contenedor de la pagina donde explicaremos los pasos que se siguen para el servicio del corte de pelo canino  -->
    <section class="contenedor" id="servicio">
        <!-- titulo -->
			<h2 class="subtitulo">Información</h2>
			<div class="contenedor_servicio">
                <!-- imagen vectorial a la izquierda -->
				<img src="img/Checklist.svg">
                <!-- servicios -->
				<div class="checklist_servicio">

                <!-- contenedor del primer servicio -->
					<div class="servicio">
                    <!-- titulo -->
					<h3 class="n-servicio"><span class="numero">1</span>Corte de pelo</h3>
                    <!-- parrafo -->
					<p>Para empezar a cortar el pelo a un perro primero habra que dejarlo bien peinado para un mejor corte y que el profesional vea bien lo que hace, por lo que es importante traer a tu mascota peinada para quitarle trabajo al profesional, una vez peinado el profesional le cortara el pelo al perro al gusto del cliente. <br/><br/>

					En Corta y Ladra disponemos del material necesario para que tu mascota quede de pasarela. </p>
				</div>

                <!-- contenedor del segundo servicio -->
				<div class="servicio">
                    <!-- titulo -->
					<h3 class="n-servicio"><span class="numero">2</span>Baño</h3>
                    <!-- parrafo -->
					<p> Despues de cortarle el pelo al perro habra que asearle dandole un buen baño.<br/><br/>

					Para bañar a un animal se necesitan productos especiales para no dañar su piel y preveer enfermedades</p>
				</div>

                <!-- contenedor del tercer servicio -->
                    <!-- titulo -->
				<div class="servicio">
					<h3 class="n-servicio"><span class="numero">3</span>Secado</h3>
                    <!-- parrafo -->
					<p>Y por ultimo, secarle el pelo es una tarea importante ya que sino tu mascota puede coger frio.<br/><br/>

					Una buena presentacion es importante.</p>
				</div>
					
			</div>
		</div>
	    </section>

        <!-- Sección de la galeria de fotos de perros -->
		<section class="galeria" id="portfolio">
			<div class="contenedor">
                <!-- Titulo -->
				<h2 class="subtitulo">Galeria</h2>
                <!-- Imagenes galeria -->
				<div class="contenedor_galeria">
					<img src="img/galeria1.jpg" class="img_galeria">
					<img src="img/galeria2.png" class="img_galeria">
					<img src="img/galeria3.jpg" class="img_galeria">
					<img src="img/galeria4.jpg" class="img_galeria">
					<img src="img/galeria5.jpg" class="img_galeria">
					<img src="img/galeria6.jpg" class="img_galeria">
					<img src="img/galeria7.jpg" class="img_galeria">
					<img src="img/galeria8.jpeg" class="img_galeria">
					<img src="img/galeria9.jpg" class="img_galeria">

				</div>
			</div>
		</section>
		
        <!-- seccion para cuando clickemos en una imagen se amplie -->
		<section class="img_light">
            <!-- imagen representada por X para cerrar la imagen cuando esta abierta por eso lleva la clase cerrar -->
			<img src="img/Cross.svg" class="cerrar" >
            <!-- elemento para abrir la imagen con un scale luego -->
			<img src="img/galeria4.jpg" class="agregar-imagen">
		</section>

        <!-- seccion para poner los 3 svg para pedir cita, ver las tarifas, y ver los profesionales -->
        <section class="contenedor" id="expertos">
            <!-- imagen para pedir cita donde lleva enlazado javascript para cuando clickes se abra una ventana emergente donde lo podras realizar -->
			<section class="expertos">
				<div class="cont-expertos" onclick="mostrar();">
                    <!-- imagen -->
					<img  src="img/Info.svg">
                    <!-- titulo abajo de la imagen -->
					<h3 class="n-expert">Pedir cita</h3>
				</div>
            <!-- las tarifas donde al pinchar se te descargara una imagen donde podras ver el precio de todos nuestros cortes -->
				<div class="cont-expertos">
					<a class="tarifas" href="descarga/TarifaP.png" download>
                        <!-- imagen -->
						<img  src="img/Tarifas.svg">
                        <!-- titulo abajo de la imagen -->
						<h3 class="n-expert">Tarifas</h3>
					</a>
				</div>
            <!-- profesionales donde al clickar se abrira una ventana emergente donde se vera la foto y la descripcion del profesional de nuestra peluquería -->
				<div class="cont-expertos" onclick="mostrarP();">
                    <!-- imagen -->
					<img src="img/User.svg">
                    <!-- titulo abajo de la imagen -->
					<h3 class="n-expert">Profesionales</h3>
				</div>
			</section>
		</section> <!-- fin de seccion-->


        <!-- inicio php formulario citas -->
		<?php 

        // Incluye el archivo de conexión a la base de datos
		include 'conexion.php';

        // Inicia la sesión
		session_start();

        //verifica si se ha enviado el formulario
		if(isset($_POST['submit'])){
            //este IF verifica que los campos no estan vacios y tienen por lo menos un caracter
			if(($_POST['fecha_hora'])!= null && strlen($_POST['animal'])>=1 && strlen($_POST['corte_pelo'])>=1 ){
				//obtiene los datos y los guardo en variables
                $fecha = ($_POST['fecha_hora']);
				$animal = ($_POST['animal']);
                $servicio = ($_POST['servicio']);
				$pelo = ($_POST['corte_pelo']);
				$id = ($_POST['id_users']);
				//realizamos una consulta de inserccion a la base de datos con el insert guardado en la variable consulta
				$consulta = "INSERT INTO citas(id, fecha_hora, animal, servicio, corte_pelo) VALUES ('$id','$fecha','$animal','$servicio','$pelo')";

                //ejecutamos la consulta
				$resultado = mysqli_query($con, $consulta);

				if ($resultado === TRUE){
					//codigo si la consulta es correcta
					// aqui no imprimo nada por que lo voy a imprimir con js en la segunda comprobación x
				} else {
                    //codigo si la consulta es erronea
					echo "Error: " . $consulta . "<br>" . mysqli_error($con);
				}
                //nuevamente hacemos una comprobacion y muestra un mensaje si es correcta la consulta
				if($resultado === TRUE) {
				echo'<script type="text/javascript">
	    		alert("Datos de la cita ingresados correctamente");
                // si es valida devuelvo al usuario al index
	    		window.location.href="index.php";
	    		</script>';
				}else{
                // Muestra un mensaje de error si la consulta falla
				echo'<script type="text/javascript">
	    		alert("Error los datos de la cita no se pudieron ingresar a la base de datos");
                // si no es valida devuelvo al usuario al index
	    		window.location.href="index.php"; 
	    		</script>';
				}
			}	
		}
        // Cierra la conexión a la base de datos
		mysqli_close($con);
		?>

        <!-- Seccion para rellenar el formulario de las citas -->
		<section id="citas_light" class="citas_light">

            <!-- incluye en la ventana emergente una X para poder cerrar enlazado con el evento de ocultar-->
			<img src="img/Cross.svg" class="cerrar" onclick="ocultar();"> 
            
            <!-- Formulario para pedir cita -->
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="citas_cont">		

			<img style="text-align=center" src="img/icons8-huella-de-perro-40.png" alt="">
			<h1 class="titulo_form">Pedir Cita</h1>

            <!-- Campo para seleccionar fecha y hora -->
				<label>Selecciona una fecha y una hora</label>
				<input class="input_form" type="datetime-local" name="fecha_hora">

			<!-- Campo para seleccionar tipo de animal -->	
				<label>Animal:</label>		
				<select class="input_form" name="animal">
					<option>Perro</option>
					<option>Gato</option>
				</select>

            <!-- Campo para seleccionar tipo de servicio -->  		
				<label>Tipo de servicio:</label>		
				<select class="input_form" name="servicio">
					<option>Baño perro pequeño 13€</option>
					<option>Baño perro pequeño + pelado 24€</option>
                    <option>Baño perro mediano 19€</option>
                    <option>Baño perro mediano + pelado 28€</option>
                    <option>Baño perro grande 26€</option>
                    <option>Baño perro grande + pelado 35€</option>
                    <option>Baño perro gigante 35€</option>
                    <option>Baño perro gigante + pelado 46€</option>
                    <option>Anudados DESDE 5€</option>
				</select>

                <!-- Campo para ingresar una breve descripción del pelo del animal -->
				<label>Breve descripcion del pelo del animal:</label>
				<input class="input_form desc" type="text" name="corte_pelo"
				placeholder="Ej: Es un perro de agua con pelo rizado y largo.">

                
                <!-- Campo OCULTO para almacenar el ID del usuario -->
				<input type="hidden" name="id_users" value="<?php echo $id; ?>">

                 <!-- Verifica si hay una sesión de usuario iniciada -->
				<?php 
				
				$varsesion = $_SESSION['user'];
				if($varsesion == null || $varsesion = ''){
                     // Si no hay sesión iniciada, muestra un enlace para iniciar sesion

					?><a class="link_citas" href="login.php">Inicio de sesion requerido</a><?php
				}else{
					
                    // Si hay sesión iniciada, muestra un botón de enviar para enviar el formulario
					?><input class="input_submit" type="submit" name="submit" value="Enviar" ><?php 
				}
				?>
		</form>
		</section> <!-- fin de la seccion del formulario -->

		
		<!-- seccion para el cuadro del profesional -->
		<section id="profesional_light" class="profesional_light">
			<img src="img/Cross.svg" class="cerrar" onclick="ocultarP();">
			
			<div class="contenedorDesc">
				<!-- imagen del profesional -->
				
				<img  style="width: 70%; height: 80%;" src="img/peluqueroGonzalo.jfif" class="imgPeluquero">
				<!-- descripcion que va a aparecer dentro del cuadro del profesional -->
				<h2 class="nombreP">Gonzalo</h2>
				<p class="textoP">Un peluquero canino con 2 años de experiencia. 
					Apasionado de su trabajo y domina tecnicas en tijera y maquina.<br>
					como cualidad la atención al detalle, fidelizacion de el cliente y capaz de calmar perros difíciles de manejar.</p>
			</div>
		</section>


		<!-- pie de pagina con las redes sociales -->
		<footer id="contactos">
		<div class="redes-sociales">
			<!-- enlaces a redes sociales  -->
			<a href="https://es-es.facebook.com/" class="redes-sociales-icon">
				<i class='bx bxl-facebook-circle'></i>
			</a>
			<a href="https://www.instagram.com/" class="redes-sociales-icon">
				<i class='bx bxl-instagram'></i>
			</a>
			<a href="https://twitter.com/" class="redes-sociales-icon">
				<i class='bx bxl-twitter' ></i>
			</a>
			<a href="https://whatsapp.com/" class="redes-sociales-icon">
				<i class='bx bxl-whatsapp' ></i>
			</a>
			
		</div>
		
	</footer>

        <!-- Links de Scripts -->
        <script src="js/menu.js"></script>
        <script src="js/lightbox.js"></script>
        <script src="js/Citas.js"></script>
        <script src="js/profesionales.js"></script>
    </body>
</html> 