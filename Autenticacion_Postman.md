
# Autenticación con Postman

### Pasos para obtener y usar el token JWT:

1. Ve a la pestaña **Authorization** y selecciona "Basic Auth".
2. Introduce el **correo electrónico** y la **contraseña** del usuario que deseas autenticar.
3. Realiza una solicitud `GET` al endpoint:  
   ```
   localhost/Modlog/api/users/token
   ```
4. El cuerpo de la respuesta contendrá un **JWT token**.
5. Cambia el tipo de **Authorization** a "Bearer Token".
6. Introduce el token recibido (sin incluir comillas).

### Consideraciones:

- Mientras el token esté configurado, las credenciales de usuario estarán activas.
- Solo los usuarios con permisos de **administrador** pueden realizar solicitudes `POST`, `PATCH` y `DELETE`.
- El token tiene una duración de **una hora**.
