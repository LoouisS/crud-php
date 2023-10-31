# crud-php

## Tareas
### F1: Gestión Jesuitas
- [x] **F1.1 Añadir (Alumno)**: Introducción del jesuita en la base de datos por parte del alumno.
- [x] **F1.2 Modificar (Alumno)**: Modificación de los datos de un jesuita introducido anteriormente por el alumno.
- [x] **F1.3 Borrar (Profesor)**: Borrar jesuitas registrados en la base de datos, proporcionando el ID.

### F2: Gestión Lugares
- [x] **F2.1 Añadir (Profesor)**: Introducir lugares en la base de datos por parte del profesor.
- [x] **F2.2 Modificar (Profesor)**: Modificar un lugar por su IP.
- [x] **F2.3 Listar (Profesor)**: Mostrar una lista de los lugares registrados en la base de datos.
- [x] **F2.4 Borrar (Profesor)**: Borrar un lugar por su IP.

### F3: Mostrar visitas (Profesor)
- [x] Mostrar todas las visitas realizadas.

### F4: Realizar visita (Alumno)
- [x] Alumno visita un lugar con su jesuita.

- [x] Solucionar los errores mediante try catch
- [x] Añadir los botones de eliminar, modificar y crear a la tabla con los jesuitas

## Dudas
- [ ] Como gestionamos el que haya una FK asignada

## Fixear
- [x] Ver si mi constructor hace la conexion
- [x] Reestructurar todo el codigo para el hosting
- [x] Modificar las carpetas en base a esto
    - https://codersfree.com/courses-status/aprende-laravel-avanzado/estructura-de-carpetas
- [ ] Meter Mysqli driver para los errores
- [ ] Testear los mensajes para el usuario
- [ ] Quitar CSS de los archivos PHP
- [x] Cambiar los returns de los strings pero almacenandolo en variable
- [ ] Quitar todas las validaciones de los archivos que contengan html
- [x] Listar las ultimas 5 visitas realizadas
- [?] Ver por que no se me modifica la IP
- [x] Dejar descripciones del lugar 
- [ ] Se puede visitar un mismo sitio mas de una vez?
- [ ] Valorar si pongo las modificaciones en cascada para que la cambie en visita

---
Si tengo en el diseño de base de datos las modificaciones y borrado en cascada, no puedo poner mensajes
para preguntas por dichas acciones. No permitir el borrado en cascada, preguntar por si quiere borrar sus visitas
y, en caso afirmativo, hago el delete en la tabla visitas y luego en la otra tabla.