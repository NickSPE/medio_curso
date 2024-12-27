
🎯 **Sistema de Gestión de Productos**

📄 **Descripción del Proyecto**
El Sistema de Gestión de Productos es una aplicación web diseñada para administrar productos de manera eficiente, 
permitiendo realizar operaciones como crear, leer, actualizar y eliminar productos en una base de datos. 
Este sistema utiliza una arquitectura basada en el modelo MVC (Modelo-Vista-Controlador) para garantizar la separación 
de responsabilidades y facilitar el mantenimiento.

🛠️ **Tecnologías Utilizadas**
- 🌐 Lenguaje Backend: PHP 8.1
- 🗄️ Base de Datos: MySQL
- 🎨 Framework Frontend: HTML5, CSS3, JavaScript
- 🚀 Servidor Web: Apache (Laragon como entorno de desarrollo)
- 🏗️ Arquitectura: Modelo-Vista-Controlador (MVC)

✨ **Características Principales**
1️⃣ **Gestión de Productos**:
   - 📝 Registro de nuevos productos con datos como nombre, detalle, cantidad, precio, entre otros.
   - 📋 Listado de productos con opciones de búsqueda y filtrado.
   - ✏️ Edición y actualización de datos de productos existentes.
   - 🗑️ Eliminación de productos.

2️⃣ **Sistema de Usuarios**:
   - 🔒 Autenticación y autorización basada en sesiones.
   - 🛡️ Protección de rutas mediante verificación de usuario autenticado.

3️⃣ **Compatibilidad y Escalabilidad**:
   - ⚙️ Diseñado para ser escalable y adaptable a nuevos requisitos.
   - ✅ Compatible con PHP 8.1 y estándares modernos de desarrollo web.

📁 **Estructura del Proyecto**
El proyecto sigue la arquitectura MVC, separando claramente la lógica de negocio, la presentación y el control.

```
├── controllers/             # Controladores para gestionar la lógica de la aplicación
│   ├── ControladorProducto.php
│   ├── ControladorVista.php
│   └── ControladorUsuario.php
├── models/                  # Modelos que interactúan con la base de datos
│   ├── ModeloProducto.php
│   └── ModeloUsuario.php
├── views/                   # Vistas HTML para la interfaz de usuario
│   ├── VistaProducto/
│   │   ├── VistaListaProductos.php
│   │   ├── VistaDetalleProducto.php
│   │   └── VistaIngresarProducto.php
│   └── VistaUsuario/
├── etc/                     # Configuraciones adicionales
│   └── config.php
├── index.php                # Punto de entrada principal
└── README.md                # Documentación del proyecto
```

📋 **Requisitos Previos**
Antes de iniciar el proyecto, asegúrate de tener instalado:
- 🔧 PHP 8.1 o superior
- 🗄️ MySQL 5.7 o superior
- 📦 Composer (para la gestión de dependencias)
- 🌐 Servidor Apache (incluido en Laragon, XAMPP o similar)

⚙️ **Configuración Inicial**
1️⃣ **Clona el repositorio**:
   ```bash
   git clone https://github.com/NickSPE/medio_curso.git
   cd medio_curso
   ```

2️⃣ **Configura la base de datos**:
   - 🛠️ Crea una base de datos en MySQL llamada `dbsistema`.
   - 📥 Importa el archivo SQL proporcionado para crear las tablas necesarias:
     ```bash
     mysql -u [usuario] -p dbsistema < dbsistema.sql
     ```

3️⃣ **Configura las credenciales de la base de datos en `etc/config.php`**:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'dbsistema');
   define('DB_USER', 'tu_usuario');
   define('DB_PASS', 'tu_contraseña');
   ```

4️⃣ **Inicia el servidor web**:
   ```bash
   php -S localhost:8000
   ```

5️⃣ **Abre la aplicación en tu navegador**:
   🌐 http://medio_curso.test/controllers/controladorLogin.php

🛠️ **Uso del Sistema**
1️⃣ **Autenticación de Usuario**:
   - 🔑 Inicia sesión utilizando un usuario registrado.
   - 📝 Si no tienes credenciales, regístrate en la página de registro.

2️⃣ **Gestión de Productos**:
   - ➕ **Crear Producto**:
     - 📋 Navega a la sección "Agregar Producto" para registrar un nuevo producto.
     - Completa los campos obligatorios y haz clic en "Registrar".
   - 🔍 **Listar Productos**:
     - En el menú principal, selecciona "Lista de Productos" para visualizar todos los productos registrados.
   - ✏️ **Editar Producto**:
     - Haz clic en el botón "Editar" junto al producto deseado, realiza los cambios y guarda.
   - 🗑️ **Eliminar Producto**:
     - Selecciona "Eliminar" para borrar un producto específico.

📌 **Buenas Prácticas de Desarrollo**
- 📂 **Estructura de Código**:
  - Mantén la lógica de negocio en los modelos, las operaciones en los controladores, y el diseño en las vistas.
- 🔐 **Seguridad**:
  - Usa funciones de sanitización (`htmlspecialchars`, `trim`) para evitar vulnerabilidades como inyección SQL o XSS.
- 🛠️ **Manejo de Errores**:
  - Captura errores con bloques `try-catch` y regístralos en los logs para facilitar la depuración.

🤝 **Contribuciones**
¡Las contribuciones son bienvenidas! Si deseas colaborar:
1️⃣ Realiza un fork del repositorio.
2️⃣ Crea una rama con tu funcionalidad:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3️⃣ Realiza tus cambios y súbelos:
   ```bash
   git push origin feature/nueva-funcionalidad
   ```
4️⃣ Abre un Pull Request y describe tu contribución.

📧 **Contacto**
Si tienes preguntas o necesitas soporte, no dudes en contactarme:
- **Autores**: NickSPE, RengiCodeMaster, The-Nasa, yimmy, Marry
- 📩 Email: soporte@nickproyectos.com
- 🔗 Repositorio: GitHub (https://github.com/NickSPE/medio_curso)

📜 **Licencia**
Este proyecto está licenciado bajo la MIT License. Puedes usarlo libremente, pero por favor menciona al autor original.
