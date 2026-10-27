# 🛒 CestaMCR - Aplicación Web de Comercio Electrónico

**CestaMCR** es una aplicación web de tienda en línea desarrollada en PHP y MySQL, containerizada mediante **Docker** y **Docker Compose** para garantizar un despliegue rápido, portátil y consistente.

---

## 🛠️ Tecnologías Utilizadas

* **Backend:** PHP 8.x
* **Base de Datos:** MySQL / MariaDB
* **Servidor Web:** Apache (incluido en el contenedor PHP)
* **Frontend:** HTML5, CSS3 (`tienda.css`)
* **Orquestación:** Docker & Docker Compose

---

## 📁 Estructura del Proyecto

```text
CestaMCR/
├── docker-compose.yml   # Configuración para orquestar contenedores (Web y BD)
├── Dockerfile           # Imagen personalizada de Apache + PHP y extensiones
├── init.sql             # Script SQL de inicialización (tablas y datos iniciales)
├── .gitignore           # Archivos omitidos en el control de versiones
├── README.md            # Documentación del proyecto
└── html/                # Código fuente de la aplicación web
    ├── cesta.php        # Gestión de la cesta / carrito de compras
    ├── cesta.png        # Recursos gráficos del carrito
    ├── db.php           # Conexión a la base de datos MySQL
    ├── index.php        # Página principal / Catálogo
    ├── login.php        # Autenticación e inicio de sesión
    ├── logoff.php       # Cierre de sesión de usuario
    ├── pagar.php        # Procesamiento del pago y checkout
    ├── productos.php    # Vista de detalle y gestión de productos
    ├── register.php     # Registro de nuevos usuarios
    └── tienda.css       # Hoja de estilos principal de la tienda
```

---

## 🚀 Requisitos Previos

Antes de comenzar, asegúrate de tener instalado en tu sistema:

* [Docker](https://www.docker.com/get-started)
* [Docker Compose](https://docs.docker.com/compose/install/)

---

## 🔧 Instalación y Despliegue

Sigue estos pasos para poner en marcha el proyecto:

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/tu-usuario/CestaMCR.git
   cd CestaMCR
   ```

2. **Levantar los servicios con Docker Compose:**
   ```bash
   docker-compose up -d --build
   ```

3. **Acceder a la aplicación:**
   Abre tu navegador e ingresa a:
   ```text
   http://localhost:8080
   ```
   *(o el puerto configurado en tu `docker-compose.yml`)*

---

## 🔐 Configuración de la Base de Datos

El archivo `init.sql` se ejecuta automáticamente al iniciar por primera vez el contenedor de base de datos MySQL, creando el esquema y insertando los datos iniciales de productos y usuarios.

La configuración predeterminada de conexión se gestiona en `html/db.php`:

```php
$host = 'db';          // Nombre del servicio definido en docker-compose
$db   = 'cestamcr';    // Nombre de la base de datos
$user = 'user';        // Usuario de la BD
$pass = 'password';    // Contraseña de la BD
```

---

## 🛠️ Comandos Útiles

* **Ver estado de los contenedores:**
  ```bash
  docker-compose ps
  ```

* **Ver los logs en tiempo real:**
  ```bash
  docker-compose logs -f
  ```

* **Detener los servicios:**
  ```bash
  docker-compose down
  ```

* **Detener los servicios eliminando volúmenes:**
  ```bash
  docker-compose down -v
  ```

---

## 📄 Licencia

Este proyecto está distribuido bajo la licencia MIT.