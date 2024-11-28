**Login del Sistema**

![image](https://github.com/user-attachments/assets/01e8742f-774b-4645-98f9-25c648af6c99)

**Dashboard del sistema**


![image](https://github.com/user-attachments/assets/502ac05a-ae67-4e65-bfc9-b67f0f97ac9f)

# 🌐 Sistema de Gestión de Acceso Seguro

> **Un sistema de autenticación moderno, modular y escalable para aplicaciones web profesionales.**

Este proyecto es una implementación robusta de un sistema de inicio de sesión, diseñado para garantizar la seguridad y ofrecer una experiencia de usuario intuitiva. Su arquitectura modular permite una fácil escalabilidad, mientras que el diseño responsivo asegura compatibilidad con dispositivos móviles y de escritorio.

---

## 🚀 **Características Principales**

### 🔒 **Seguridad de Primer Nivel**
- **Cifrado Seguro**: Contraseñas almacenadas utilizando algoritmos de hash confiables.
- **Gestión de Sesiones**: Control de sesiones seguro para evitar accesos no autorizados.
- **Protección de Datos**: Validación y sanitización de datos para prevenir inyecciones SQL y otros ataques.

### 🎨 **Diseño y Usabilidad**
- **Interfaz Responsiva**: Adaptada a cualquier dispositivo gracias a un diseño CSS moderno.
- **UX Optimizada**: Flujo intuitivo para usuarios y administradores.
- **Estilización Modular**: Cada vista tiene su propio archivo CSS, facilitando personalizaciones específicas.

### 🧩 **Arquitectura Modular**
- **Separación por Capas**: `Controllers`, `Models` y `Views` permiten un desarrollo limpio y organizado.
- **Código Escalable**: Preparado para implementar nuevas funcionalidades sin comprometer la estabilidad del sistema.
- **Estructura Clara**: Facilita la colaboración en equipos de desarrollo.

### 💾 **Gestión de Datos con MySQL**
- Base de datos gestionada con **phpMyAdmin** para un control eficiente.
- Relaciones optimizadas para búsquedas rápidas.
- Estructura diseñada para almacenar credenciales cifradas y roles de usuario.

---

## 📂 **Estructura del Proyecto**

El sistema sigue una arquitectura clara y modular, organizada en carpetas clave:

### 📁controllers
      ├── controladorLogin.php          # Gestión del inicio de sesión.
      ├── controladorUsuario.php        # Operaciones CRUD para usuarios.
      ├── logout.php                    # Manejo del cierre de sesión.
      └── ...
### 📁 css
      ├── estilodashboard.css           # Estilo para el panel de administración.
      ├── estilomodificar.css           # Estilo para la vista de edición.
      ├── estiloingresarUsuarios.css    # Estilo para el registro de usuarios.
      └── ...
### 📁 img
      └── (Archivos de imágenes utilizadas en la interfaz)
### 📁 js
      ├── (Proximante).
    
### 📁 models
      ├── conexion.php                  # Configuración y conexión con MySQL.
      ├── modelousuario.php             # Operaciones de datos para usuarios.
      └── ...
### 📁 views
      ├── vistaLogin.php                # Página de inicio de sesión.
      ├── dashboard.php                 # Panel principal del sistema.
      ├── vistaIngresarUsuario.php      # Formulario para registrar usuarios.
      └── ...
### index.php                             # Punto de entrada al sistema.


## 🛠️ **Tecnologías Utilizadas**
* PHP 8.1
* MySQL
* HTML5 y CSS3
* JavaScript
* Servidor Local (XAMPP, WAMP, Laragon)

## ⚙️ **Configuración del Sistema**
1. Clonar el repositorio: `git clone https://github.com/NickSPE/medio_curso.git`
2. Configurar la base de datos: ...
3. Iniciar el servidor: ...

## 💻 **Uso del Sistema**
* **Inicio de Sesión:** Ingresa tu usuario y contraseña en la pantalla principal.
* **Gestión de Datos:** Registrar, actualizar y eliminar usuarios.
* **Cierre de Sesión:** Cierra tu sesión de manera segura.

## 📊 **Base de Datos**
La base de datos está diseñada con una 
**tabla**`usuarios` que almacena información como `id`, `username`, `password` cifrado y `perfil`.

## 🌟 **Futuras Implementaciones**
**-Integración de JavaScript**
    -Validaciones en tiempo real para formularios.
    -Animaciones y transiciones dinámicas en la interfaz.
**-Roles y Permisos de Usuario**
**-Notificaciones en Tiempo Real**

## 📸 **Capturas del Sistema**
  -Pantalla de Inicio de Sesión
  -Dashboard del Sistema

## ✍️ **Contribuciones**
Las contribuciones son bienvenidas. Abre un issue o envía un pull request.
## 📞 **Contacto**

Si tienes preguntas, sugerencias o deseas colaborar en este proyecto, no dudes en ponerte en contacto:

📧 **Correo Electrónico**: [evaristoj108@gmail.com](mailto:tuemail@ejemplo.com)  
📌 **GitHub**: [NickSPE](https://github.com/tuusuario)  

También puedes abrir un **issue** en este repositorio si encuentras problemas o tienes ideas para mejorar el sistema.

