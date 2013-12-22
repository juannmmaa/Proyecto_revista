Proyecto_revista
proyecto ingenieria de software

Para utilizar de manera correcta la base de datos se debe crear una base de datos en el motor Postgre, esta base de datos debe tener el nombre de: revista (textual, todo escrito con minuscula). Luego de crear la base de datos vamos a la seccion para generar consultas SQL, aquí en vez de hacer las consultas linea a linea lo que tenemos que hacer es abrir el archivo ModeloRevista.sql que se encuentra dentro de la carpeta del proyecto, luego de esto ejecutamos la consulta con lo cual tendremos las tablas generadas (tabla administrador, tabla articulos y tabla categorias). Aparte de generar las tablas este script sql tambien nos agregará un usuario administrador maestro con el cual podremos acceder al panel de administrador.

Una vez generada la base de datos ya podemos abrir nuestro proyecto sin ningun tipo de problemas, para esto debemos entrar en nuestro navegador en la direccion: http://localhost/revista(18-12-2013)v2 con lo cual accederemos al index del proyecto para revisar el CRUD debemos entrar al link de "Logeo Administrador", este link nos mostrará un formulario que nos pedira un usuario y una contraseña, los datos para acceder son:

usuario: admin pass: 1234

Con esto ya estamos logeados en nuestro panel de administracion (http://localhost/revista(18-12-2013)v2/usuarios) y es aqui donde elegimos las acciones que queremos realizar. En este momento el CRUD esta habilitado para las tres tablas, por lo tanto da igual cual se quiera revisar, aunque sugerimos usar la de administrador que es la que tiene mas campos. Esta tabla cuenta de los campos: pk, nombres, apellidos, rut, login, pass. Al agregar un nuevo usuario este nos permitirá ingresar al sistema con estos datos y ya no seran necesarios los datos de usuario y pass antes mensionados.

Para realizar las acciones del CRUD de adminsitrador lo que debemos hacer es:

para CREAR: hacer click en el link "Crear un nuevo administrador" (http://localhost/revista(18-12-2013)v2/usuarios/usuario)

para LEER: hacer click en el link "Lista de administradores"(http://localhost/revista(18-12-2013)v2/usuarios/listar)

para EDITAR: hacer click en el link "Lista de administradores" y posteriormente hacer click en "Editar" al costado del usuario que deseemos editar (http://localhost/revista(18-12-2013)v2/usuarios/edit_usuario/1) el 1 de la url es el valor de la primary key que maneja el codigo por lo tanto varia segun el usuario a editar *se debe editar un usuario agregado previamente el usuario admin no es editable

para ELIMINAR: hacer click en el link "Lista de administradores" y posteriormente hacer click en "Eliminar" al costado del usuario que deseemos eliminar *el eliminar se hace directamente por lo tanto no existe una url especifica, ya que al eliminar un administrador se redireccion a la lista de adminisradores

Cabe destacar que para hacer una correcta conexión a la base de datos tenemos que modificar los datos de autentificación de Postgre, esto lo debemos realizar entrando en el archivo que database.php el cual se encuentra dentro del proyecto en application/config. De este debemos modificar los campos: $db['default']['username'] = 'postgres'; $db['default']['password'] = '1369';

con el username y password que nosotros manejemos para conectarnos a Postgre
