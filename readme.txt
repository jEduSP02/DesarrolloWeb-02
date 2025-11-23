Gracias por leer el presente documento. A continuación, se detalla de manera general tanto el funcionamiento como los criterios utilizados para generar el presente proyecto.

Nombre de la página: AmaruTECH
La página se ha dividido en cuatro secciones:
	1. Página inicial
	2. Biografía
	3. Pasatiempos
	4. Contacto

Procedimiento de Uso
Desde estas secciones (Página inicial, Biografía, Pasatiempos, Contacto), puedes dirigirte a cualquiera de las restantes.
La navegación es intuitiva; en todas las páginas se encuentra el menú desplegable. Además, en la página inicial (index.html) se visualizan tres imágenes o figuras que redirigen a:
	1. Biografía
	2. Pasatiempos
	3. Contacto

En la página de contacto (contacto php) se encuentra un formulario para enviar un mensaje, el cual será almacenado en una base de datos. Los atributos de esta base de datos son: id, nombre, correo y mensaje. Tanto el nombre como el correo pasan por una validación simple.

Tecnología utilizada
Se emplearon dos lenguajes de programación
	- PHP
	- JavaScript
Además, se utilizó HTML como lenguaje de marcado, en conjunto con CSS para el diseño.
Para manejar la base de datos se empleó MySQL.

Criterios de seguridad
Se emplearon ciertos criterios de seguridad para evitar que se ingresen campos vacíos o inyección XSS. También se verifica que el correo ingresado por el usuario sea válido. En la base de datos se incluyen los siguientes campos: id, nombre, correo, mensaje. En el formulario, el usuario puede modificar los tres últimos (nombre correo, mensaje); mientras que el id se genera de manera automática.

El enlace es: edusp.gamer.gd
usando el hosting gratuito InfinityFree