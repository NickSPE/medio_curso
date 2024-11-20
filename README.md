
![image](https://github.com/user-attachments/assets/502ac05a-ae67-4e65-bfc9-b67f0f97ac9f)


# 🌐 **Sistema de Inicio de Sesión Moderno**

> **Un sistema de autenticación seguro, modular y profesional diseñado para aplicaciones modernas.**

Este proyecto implementa un sistema de inicio de sesión diseñado con las mejores prácticas en desarrollo web. Proporciona una experiencia de usuario fluida y segura, soportado por un backend robusto en PHP, una base de datos gestionada con **phpMyAdmin**, y un diseño responsivo creado con HTML y CSS.

---

## 🚀 **Características Clave**

### 🔒 **Seguridad y Control**
- **Autenticación Segura**: Validación robusta de credenciales y gestión de sesiones.
- **Opciones de Recordatorio**: Permite recordar credenciales en sesiones futuras.
- **Cierre de Sesión**: Módulo de cierre de sesión confiable que garantiza la limpieza de la sesión activa.

### 🎨 **Diseño y Experiencia de Usuario**
- **Interfaz Moderna**: Diseñada con CSS personalizado para una experiencia atractiva y profesional.
- **Iconografía de Seguridad**: Elementos visuales como candados y nubes que refuerzan la percepción de protección de datos.
- **Diseño Responsivo**: Compatible con dispositivos móviles, tablets y escritorios.

### 🧩 **Arquitectura Modular**
- Organización en carpetas clave (`controllers`, `models`, `views`) para facilitar el desarrollo y la escalabilidad.
- Scripts de prueba (`test`) para garantizar la funcionalidad y consistencia del sistema.

### 💾 **Gestión de Datos con phpMyAdmin**
- Base de datos **MySQL** gestionada con **phpMyAdmin**:
  - Almacena usuarios, contraseñas cifradas y registros de actividades.
  - Relación optimizada para búsquedas rápidas y eficientes.

---

## 📂 **Estructura del Proyecto**

El sistema está organizado en una arquitectura clara y funcional:

### 1. **Controllers**
Controladores responsables de la lógica del sistema:
- `logout.php`: Maneja la funcionalidad de cierre de sesión de usuarios.

### 2. **CSS**
Estilización personalizada:
- `style.css`: Estilo global para el sistema.
- Archivos específicos como `estilodashboard.css` y `estilomodificar.css` para módulos individuales.

### 3. **etc**
Configuración esencial del sistema:
- `config.php`: Contiene las credenciales de conexión a la base de datos y parámetros clave.

### 4. **Models**
Gestión de datos:
- `conexion.php`: Conexión centralizada a la base de datos MySQL.

### 5. **Test**
Scripts de prueba para validación:
- `testconfig.php`: Verifica la configuración del sistema.
- `borrarvariables.php`: Limpieza de variables para pruebas.

### 6. **Views**
Capa de presentación:
- `dashboard.php`: Panel principal del usuario.
- `ingresardatos.php`: Página para añadir datos al sistema.
- `modificardatos.php`: Interfaz para modificar registros existentes.

### 7. **img**
Recursos gráficos utilizados en la interfaz.

---

## 🛠️ **Tecnologías Utilizadas**
- **PHP**: Backend seguro y modular.
- **MySQL (phpMyAdmin)**: Gestión eficiente de datos.
- **HTML y CSS**: Diseño moderno y responsivo.
- **Servidor Local**: Compatible con servidores como XAMPP y WAMP.

---

## 📋 **Requisitos Previos**

Antes de comenzar, asegúrate de tener instalados:
1. **Servidor Local** (XAMPP, WAMP, etc.).
2. **phpMyAdmin** para gestionar la base de datos.
3. **Navegador web** actualizado para probar el sistema.

---

## 📝 **Configuración del Sistema**

1. **Clonar el Repositorio**
   ```bash
   git clone <[https://github.com/NickSPE/medio_curso.git]>
2. **Configurar la Base de Datos**
- Importa el archivo SQL proporcionado en **phpMyAdmin** para crear la base de datos requerida.
- Edita el archivo `etc/config.php` con las credenciales de tu base de datos:
 `define('DB_HOST', 'localhost') `;
 `define('DB_USER', 'root') `;
 `define('DB_PASS', '') `;
 `define('DB_NAME', 'nombre_base_de_datos') `;
3. **Iniciar el Servidor**
1- Coloca los archivos en la carpeta raíz del servidor local (htdocs en XAMPP).
2- Abre el archivo index.php en tu navegador.
---
## 💻 Cómo Usar el Sistema

### **Acceder a la Interfaz**
- Abre `http://localhost/index.php` en tu navegador.

### **Iniciar Sesión**
1. Introduce tu nombre de usuario y contraseña.
2. Haz clic en el botón **LOGIN**.

### **Gestionar Datos**
- Ingresa, modifica o elimina información desde las vistas correspondientes.
- Visualiza los registros almacenados en el panel.

### **Cerrar Sesión**
- Utiliza el botón de cierre de sesión para finalizar tu actividad.

---

## 📊 Base de Datos

**phpMyAdmin** se utiliza para gestionar la base de datos del sistema. La estructura incluye:

### **Tabla `usuarios`**
- **Campos**:
  - `id`: Identificador único.
  - `username`: Nombre de usuario.
  - `password`: Contraseña (cifrada).
  - `perfil`: Perfil del usuario.

---

## 🌟 Futuras Mejoras
- **Cifrado Avanzado**: Implementar bcrypt para contraseñas.
- **Validación en Tiempo Real**: Añadir validación con JavaScript para mejorar la experiencia.
- **Roles de Usuario**: Gestión de permisos y acceso según roles.
