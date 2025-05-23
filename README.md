# 🛒 ShopNexus – eCommerce PHP

Este es un proyecto de eCommerce desarrollado como parte de la materia **"Implementación de Sistemas en la Nube"**. El objetivo es simular un sitio web funcional de tienda online utilizando tecnologías de desarrollo web tradicionales y experimentar su despliegue tanto **en la nube** como **on-premise**.

## 🌐 Tecnologías utilizadas

- **HTML5** + **CSS3**
- **JavaScript (JS)**
- **Bootstrap 5**
- **PHP 8+**
- **MySQL**
- **XAMPP** (para entorno local)
- Preparado para pruebas en plataformas **cloud** y **locales**

---

## 📦 Requisitos del sistema

Antes de comenzar, asegurate de tener instalado lo siguiente:

- [XAMPP](https://www.apachefriends.org/es/index.html) (PHP, Apache, MySQL)
- Editor de código (ej: [Visual Studio Code](https://code.visualstudio.com/))
- Navegador web moderno (Chrome, Firefox, etc.)

---

## 🚀 Instrucciones de instalación

### 1. Clonar o descargar este repositorio**

    git clone https://github.com/usuario/shopnexus.git

### 2. Ubicar en htdocs

Ubicate en la carpeta htdocs dentro de xamp

    C:\
    └── xampp\
        └── htdocs\

Una vez dentro de esta carpeta abri una consola de git para clonar el repositorio

    git clone https://github.com/usuario/shopnexus.git

Nota: Verificar que la carpeta creada lleve el nombre "ecomerce" para validar las rutas usadas.

### 3. Importar la base de datos

Abrí phpMyAdmin

Creá una nueva base de datos llamada shopnexus

Importá el archivo SQL incluido (shopnexus.sql) desde la opción Importar

### 4. Levantar el servidor

Abrí el panel de control de XAMPP

Iniciá los servicios de Apache y MySQL

Accedé al proyecto en tu navegador:

## 📁 Estructura del proyecto

    ecomerce/
    ├── components/        # Header, Footer, Navbar reutilizables
    ├── css/               # Estilos personalizados + Bootstrap
    ├── js/                # Scripts propios
    ├── img/               # Imágenes del sitio
    ├── pages/             # Páginas HTML secundarias
    ├── index.php          # Página principal
    ├── shopnexus.sql      # Archivo SQL de base de datos
    └── README.md          # Este archivo

## ☁️ Despliegue en la nube

El sitio está preparado para ser desplegado tanto en servicios cloud (como Heroku, Render, AWS EC2, etc.) como en entornos locales. 

El uso de tecnologías estándar permite portabilidad y facilidad de adaptación.

## 📚 Créditos

Proyecto desarrollado por el Grupo 1 como parte del cursado de "Implementación de Sistemas en la Nube" – IFTS 18.

<ul>
    <li>Costas Gonzalo</li>
    <li>Diaz Nestor</li>
    <li>Orihuela Elias</li>
    <li>Otero Matias</li>
</ul>

## 📃 Licencia

Este proyecto está bajo licencia MIT. Podés usarlo, modificarlo y distribuirlo con fines educativos.

