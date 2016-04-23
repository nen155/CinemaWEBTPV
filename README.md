# CinemaWEBTPV
Un proyecto que comprende un TPV que administra el contenido de una sala de cine sincronizado con una página web en la que se mostrarán los contenidos sincronizados.
Para desplegar este proyecto se necesita un servidor con Apache y una base de datos MYSQL y espacio para guardar los archivos de la página web.


# WindowsCinema

El proyecto está realizado con Visual Studio 2013 pero puede importarlo para versiones superiores. Se ha seguido un patrón de diseño DAO para gestionar los datos persistentes.
Dispone de tres formularios, uno introductorio a  la sala de cine que se quiere representar ChooseCinema, otro Main donde se gestiona la lógica de toda la sala de cine seleccionada y por último Login que sirve para gestionar el acceso a los usuarios a la aplicación.
Para añadir la Base de datos tiene una clase destinada para ello BaseDatos donde podrá indicar la BBDD a seleccionar, el usuario de la BBDD y la contraseña. Dicho esto, es posible que necesite instalar el mysql-connector-net-1.0.10.exe como dependencia para conectar con MYSQL desde C#.
Para subir las imágenes al servidor necesita un usuario y contraseña y una URL al servidor ftp donde quiere alojar las imágenges que sincronizarán con el proyecto web. Este servidor FTP, usuario y contraseña tendrá que establecerlos en el formulario Main en la sección FTP en la función enviarPorFTP().

Contiene una carpeta Setup ya que se ha personalizado la instalación de este proyecto para que incluya las carpetas que necesita. 

# WebCinema

Es la parte web del proyecto y está dedicada a presentar los datos que se suba a través del proyecto WindowsCinema.
Para gestionar la conexión con la BBDD necesita establecer los valores de servidor,usuario y contraseña en el archivo class.Constantes.php que se encuentra en el directorio class.
Las imágenes que son subidas por FTP desde WindowsCinema se dirigen al directorio images de este proyecto.
Las librerías de jquery están desactualizadas, por lo que se recomienda para su uso actualizarlas y comprobar que con las versiones actuales funciona.
