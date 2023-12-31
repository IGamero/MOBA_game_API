# Proyecto de MODA CRUD

Este proyecto se enfoca en la creación, actualización y consulta de datos relacionados con campeones de videojuegos. A continuación, se detallan las principales características y funcionalidades del proyecto:

## Resumen

El sistema permite gestionar información sobre campeones de videojuegos, incluyendo estadísticas y habilidades.

## Cómo usar

Sigue estos pasos para utilizar las funcionalidades del proyecto:

1. **Página de Inicio**: La página de inicio muestra un menú con las opciones disponibles.

2. **Gestión de Campeones**:

   - **Estadísticas**: Aquí puedes ingresar las estadísticas de los campeones, como su vida máxima, maná, daño físico y mágico, entre otros. También puedes consultar las estadísticas existentes.
   - **Descripciones**: Puedes ingresar información adicional sobre los campeones, como la región de la que proceden o el título que tienen asignado.

3. **Gestión de Habilidades**:

   - **Habilidad Pasiva**: Permite ingresar o consultar la descripción y estadísticas de las habilidades pasivas.
   - **Habilidad 1, 2 y 3**: Puedes ingresar o consultar la descripción y estadísticas de las habilidades 1, 2 y 3.
   - **Habilidad Definitiva**: Aquí encontrarás la opción para ingresar o consultar la descripción y estadísticas de las habilidades definitivas.

## Requisitos

Antes de utilizar el proyecto, asegúrate de cumplir con los siguientes requisitos:

- Acceso a un servidor web para ejecutar la aplicación.
- Entorno de desarrollo configurado para Laravel.

## Preparación

1. Clona el repositorio desde GitHub.

```bash
git clone https://github.com/IGamero/MOBA_game_API.git
```

2. Entra en el directorio del proyecto.

```bash
cd MOBA_BOARDGAME
```

3. Instala las dependencias de Composer.

```bash
composer install
```

4. Copia el archivo de configuración .env.example y configura las variables de entorno.

```bash
cp .env.example .env
```

5. Genera una clave de aplicación.

```bash
php artisan key:generate
```

6. Ejecuta las migraciones para configurar la base de datos.

```bash
php artisan migrate
```

7. Inicia el servidor.

```bash
php artisan serve
```

8. Abre la aplicación en tu navegador.

```bash
http://localhost:8000
```


