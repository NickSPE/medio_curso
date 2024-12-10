
**Dashboard del sistema**

![image](https://github.com/user-attachments/assets/502ac05a-ae67-4e65-bfc9-b67f0f97ac9f)

# 🌐 Sistema de Gestión de Acceso Seguro

> **Un sistema de autenticación moderno, escalable y seguro para aplicaciones web profesionales.**

El proyecto es un sistema integral de gestión y autenticación que combina un inicio de sesión seguro con un dashboard dinámico para la administración eficiente de usuarios y datos. Diseñado para garantizar la seguridad de los usuarios, este sistema también prioriza la experiencia de uso fluida y moderna. Su arquitectura modular no solo facilita el mantenimiento, sino también su expansión futura, mientras que su diseño responsivo asegura una visualización óptima en dispositivos móviles y de escritorio.

---

## 🚀 **Características Principales**

### 🔒 **Seguridad**
- **Validaciones en el Servidor y Cliente:** Protección contra inyecciones SQL, XSS y CSRF.
- **Gestión de Sesiones Segura:** Uso de tokens únicos para cada sesión, con validación de tiempo de expiración.

### 🎨 **Diseño y Usabilidad**
- **Notificaciones de Error Dinámicas:** Feedback inmediato al usuario mediante ventanas emergentes.
- **Diseño Moderno:** Estilo profesional para páginas clave como inicio de sesión, dashboard y formularios.

### 🧩 **Arquitectura Modular (MVC)**
- **Separación de Responsabilidades:** `Controllers`, `Models` y `Views` bien definidos.
- **Escalabilidad:** Fácil integración de nuevas funcionalidades sin comprometer el código base.
- **Código Limpio:** Organización clara para facilitar la colaboración en equipos de desarrollo.

### 💾 **Gestión de Datos con MySQL**
- **Base de Datos Relacional:** Optimizada para manejar operaciones CRUD de usuarios.
- **Estructura Clara:** Tablas diseñadas con índices para búsquedas rápidas.
- **Soporte para Roles de Usuario:** Diferenciación de permisos según perfiles (e.g., Administrador, Usuario).

### ⚙️ **Funcionalidades Dinámicas con JavaScript**
- **Validaciones en Tiempo Real:** Formularios interactivos para mejorar la experiencia del usuario.
- **Integración de `Fetch API`:** Manejo de solicitudes en segundo plano para validaciones sin recargar la página.
- **Interactividad:** Efectos visuales y notificaciones dinámicas.

---

## 📂 **Estructura del Proyecto**

El sistema utiliza una arquitectura modular y está organizado en las siguientes carpetas:

### **Directorio de Proyecto:**
```
📦 Proyecto
├── 📁 controllers          # Controladores (Lógica de negocio)
├── 📁 css                  # Archivos CSS (Estilos)
├── 📁 img                  # Imágenes para la interfaz
├── 📁 js                   # Archivos JavaScript (Interactividad)
├── 📁 generador            # Generador (Creación de código y configuración tablas)
├── 📁 models               # Modelos (Acceso a datos)
├── 📁 views                # Vistas (Interfaz de usuario)
├── 📄 index.php            # Punto de entrada al sistema
└── 📄 README.md            # Documentación del proyecto
```
-----------------

### **Descripción de Carpetas Clave:**
#### 📁 `controllers`
- `controladorLogin.php`: Maneja la lógica de inicio de sesión.
- `controladorUsuario.php`: Gestiona las operaciones CRUD para usuarios.
- `logout.php`: Cierra la sesión de manera segura.

### 📁 **generator**

- **`ArtisanMakeModelProducto.cpp`**: 
  Genera automáticamente un archivo PHP para la clase `Producto`, que incluye métodos CRUD para la tabla `productos`.

- **`ArtisanMakeModelPropiedadesProducto.cpp`**: 
  Genera automáticamente un archivo PHP para la clase `PropiedadesProductos`, con métodos CRUD para la tabla `PROPIEDADESPRODUCTOS`.

- **`productos.sql`**: 
  Contiene el esquema SQL para la tabla `productos`, incluyendo su estructura y datos iniciales si es necesario.

- **`propiedadesProductos.sql`**: 
  Define la estructura y esquema de la tabla `PROPIEDADESPRODUCTOS` en SQL, junto con posibles datos iniciales.

- **`provar.bat`**: 
  Script de prueba para automatizar la ejecución de un conjunto de comandos o scripts relacionados con el sistema.

- **`provarProducto.bat`**: 
  Script específico para probar las funcionalidades generadas para el modelo de `productos`.

- **`registroProductos.php`**: 
  Código generado automáticamente para manejar la clase `Producto`, que incluye métodos CRUD para interactuar con la base de datos.

- **`registroPropiedadesProductos.php`**: 
  Código generado automáticamente para la clase `PropiedadesProductos`, que gestiona métodos CRUD para la tabla `PROPIEDADESPRODUCTOS`.


#### 📁 `models`
- `conexion.php`: Configuración de conexión a MySQL.
- `modelousuario.php`: Métodos para interactuar con la base de datos (e.g., validación de credenciales, hash de contraseñas).

#### 📁 `views`
- `vistaLogin.php`: Página de inicio de sesión con diseño intuitivo.
- `dashboard.php`: Panel principal con opciones de administración.
- `vistaIngresarUsuario.php`: Formulario para registrar usuarios.

#### 📁 `js`
- `validacionLogin.js`: Validaciones en tiempo real para formularios de inicio de sesión.

#### 📁 `css`
- `estilodashboard.css`: Estilos para el panel de administración.
- `estilologin.css`: Estilos para la página de inicio de sesión.

---

## 🛠️ **Requisitos del Sistema**
### **Software Necesario:**
1. **Servidor Local**: XAMPP, Laragon o WAMP.
2. **PHP**: Versión 7.4 o superior.
3. **MySQL**: Configurado con phpMyAdmin.

### **Librerías y Herramientas:**
- PHP `PDO` para interacción con MySQL.
- `bcrypt` para el hash de contraseñas.
- `Fetch API` para manejar solicitudes en segundo plano.

---

## ⚙️ **Instalación y Configuración**

### 1. **Clonar el Repositorio:**
      ```bash
      git clone https://github.com/NickSPE/medio_curso.git
      ```

### 2. **Configurar la Base de Datos:**

1. Crear una base de datos llamada **sistema_usuarios**.
2. Importar el archivo SQL ubicado en `/etc/sistema_usuarios.sql`.

### 3. **Configurar el Proyecto:**

1. Editar el archivo `/models/conexion.php` para añadir tus credenciales de MySQL.
      ```php
      define('DB_HOST', 'localhost');
      define('DB_USER', 'tu_usuario');
      define('DB_PASS', 'tu_contraseña');
      define('DB_NAME', 'sistema_usuarios');
      ```

### 4. **Iniciar el Servidor Local**

1. Abrir **XAMPP** o **Laragon** y activar los módulos de **Apache** y **MySQL**.

### 5. **Acceder al Sistema**

1. Abrir el navegador y dirigirse a:  
      [http://localhost/medio_curso](http://localhost/medio_curso)

---

## 🌟 Futuras Implementaciones

- **Roles y Permisos Avanzados**: Diferentes niveles de acceso para Administradores y Usuarios.
- **Reportes en PDF**: Exportar listados y datos en formato PDF.
- **Notificaciones en Tiempo Real**: Uso de WebSockets para actualizaciones instantáneas.
- **Autenticación de Dos Factores (2FA)**: Aumentar la seguridad del inicio de sesión.

---

## ✍️ Contribuciones

¡Las contribuciones son bienvenidas! Si tienes ideas para mejorar este sistema, por favor:

1. **Crea un fork** del repositorio.
2. Realiza tus cambios.
3. Envía un **pull request** con una breve descripción de tus mejoras.

---

## 📞 Contacto

📧 **Correo Electrónico**: [evaristoj108@gmail.com](mailto:evaristoj108@gmail.com)  
📌 **GitHub**: [NickSPE](https://github.com/NickSPE)
