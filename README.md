# Web Service Gestión de Empresas

Este proyecto fue desarrollado en Laravel para gestionar empresas mediante Web Services (API REST).

## Funcionalidades
- Crear empresa (por defecto en estado 'Activo')
- Actualizar datos (nombre, dirección, teléfono, estado)
- Consultar empresa por NIT
- Consultar todas las empresas
- Eliminar empresas con estado 'Inactivo'

## Requisitos
- PHP 8.x
- Composer
- Laravel 10 o 12
- MySQL / MariaDB
- Postman (para probar la API)

## Instalación

```bash
git clone https://github.com/Valentinaochoa24/webServiceEmpresas.git
cd webServiceEmpresas
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


DOCUMENTACION
Endpoints de la API

Método	Ruta	                Acción
GET	    /api/empresas	        Obtener todas las empresas
GET	    /api/empresas/{nit}	    Obtener empresa por NIT
POST	/api/empresas/store	    Crear nueva empresa
PUT	    /api/empresas/{nit}	    Actualizar empresa por NIT
DELETE	/api/empresas/{nit}	    Eliminar empresa (solo si está inactiva)

Endpoints de la API

Ejemplos de Uso y Respuestas

🔹 GET `/api/empresas`
**Respuesta:**
```json
{
  "success": true,
  "message": "Proceso exitoso",
  "data": [
    {
      "nit": "899",
      "nombre": "GlobalTech Ltda",
      "direccion": "Av Siempre Viva 742",
      "telefono": "315123456",
      "estado": "Activo"
    }
  ]
}
```

---

🔹 GET `/api/empresas/899`
**Respuesta exitosa:**
```json
{
  "success": true,
  "message": "Proceso exitoso",
  "data": {
    "nit": "899",
    "nombre": "GlobalTech Ltda",
    "direccion": "Av Siempre Viva 742",
    "telefono": "315123456",
    "estado": "Activo"
  }
}
```

---

🔹 POST `/api/empresas`
**Body:**
```json
{
  "nit": "900",
  "nombre": "TechNova",
  "direccion": "Calle 123",
  "telefono": "3123456789"
}
```
**Respuesta:**
```json
{
  "success": true,
  "message": "Proceso exitoso",
  "data": {
    "nit": "900",
    "nombre": "TechNova",
    "direccion": "Calle 123",
    "telefono": "3123456789",
    "estado": "Activo"
  }
}
```

---

🔹 PUT `/api/empresas/900`
**Body:**
```json
{
  "nombre": "TechNova Updated",
  "direccion": "Carrera 45",
  "telefono": "3000000000"
}
```
**Respuesta:**
```json
{
  "success": true,
  "message": "Proceso exitoso",
  "data": {
    "nit": "900",
    "nombre": "TechNova Updated",
    "direccion": "Carrera 45",
    "telefono": "3000000000",
    "estado": "Activo"
  }
}
```

🔹 DELETE `/api/empresas/900`
Solo se elimina si `estado = Inactivo`

**Respuesta exitosa:**
```json
{
  "success": true,
  "message": "Proceso exitoso",
  "data": ""
}
```

**Respuesta fallida (empresa activa):**
```json
{
  "success": false,
  "message": "La empresa se encuentra activa",
  "data": {
    "nit": "900",
    "estado": "Activo"
  }
}

Manejo de errores

- **Validación fallida:**
```json
{
  "success": false,
  "message": "Validación fallida",
  "data": {
    "telefono": ["El campo teléfono es obligatorio."]
  }
}
```

**No se encuentra el NIT:**
```json
{
  "success": false,
  "message": "No hay datos disponibles para el id:900",
  "data": ""
}
```
Autor

**Valentina Ochoa**  
💻 [GitHub](https://github.com/Valentinaochoa24)
