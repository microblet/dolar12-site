# Dolar12.News - Monitor Laravel

Monitor de cotizaciones del dólar en tiempo real usando Laravel, optimizado para streaming en OBS.

## ✅ Características

- **Laravel 12**: Framework robusto y escalable
- **Scraping en Tiempo Real**: Datos actualizados cada minuto de dolarhoy.com
- **Cache Inteligente**: Sistema de cache para optimizar rendimiento
- **API RESTful**: Endpoints estructurados con manejo de errores
- **Dashboard Moderno**: Diseño minimalista optimizado para OBS
- **Ruta Personalizada**: Disponible en `/monitor`

## 🚀 Instalación

### Requisitos Previos
- PHP 8.1 o superior
- Composer
- Extensiones PHP: dom, curl, json

### Pasos de Instalación

1. **Clonar o descargar el proyecto**
   ```bash
   git clone [repository-url]
   cd dolar-monitor-laravel
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

5. **Iniciar servidor**
   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

## 📊 Uso

### Dashboard Principal
```
http://localhost:8000/monitor
```

### API Endpoints

**Obtener cotizaciones:**
```
GET /api/monitor/cotizaciones
```

**Actualizar datos manualmente:**
```
POST /api/monitor/actualizar
```

### Para OBS (desde WSL)

1. **Obtener IP de WSL:**
   ```bash
   ip addr show eth0 | grep inet
   ```

2. **Configurar en OBS:**
   - Fuente: "Navegador"
   - URL: `http://[IP_WSL]:8000/monitor`
   - Dimensiones: 1920x1080

## 🏗️ Arquitectura

### Estructura Laravel
```
app/
├── Http/Controllers/
│   └── DolarMonitorController.php    # Controlador principal
├── Services/
│   └── DolarScrapingService.php      # Lógica de scraping
└── Providers/
    └── AppServiceProvider.php        # Registro de servicios

resources/views/monitor/
└── dashboard.blade.php               # Vista principal

routes/
└── web.php                          # Definición de rutas
```

### API Response Format
```json
{
  "success": true,
  "timestamp": "2025-07-31 20:54:52",
  "cotizaciones": {
    "oficial": {
      "compra": 950.70,
      "venta": 955.70,
      "variacion": 1.9,
      "tendencia": "down"
    },
    "mep": {
      "valor": 1269.20,
      "variacion": 7.3,
      "tendencia": "down"
    },
    // ... más cotizaciones
  },
  "fuente": "dolarhoy.com",
  "scraping_success": true
}
```

## ⚙️ Configuración

### Cache
- **Duración**: 2 minutos por defecto
- **Driver**: File (configurable en `.env`)
- **Actualización**: Automática cada minuto desde frontend

### Logging
- **Nivel**: Info/Error
- **Ubicación**: `storage/logs/laravel.log`
- **Scraping Events**: Registrados automáticamente

### Performance
- **Timeout HTTP**: 30 segundos
- **Cache Hits**: Reducen latencia a <50ms
- **Fallback**: Valores por defecto si falla scraping

## 🔧 Desarrollo

### Comandos Útiles

```bash
# Limpiar cache
php artisan cache:clear

# Ver logs en tiempo real
tail -f storage/logs/laravel.log

# Ejecutar tests
php artisan test

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Personalización

**Cambiar frecuencia de actualización:**
```javascript
// En dashboard.blade.php, línea ~520
setInterval(fetchDolarData, 60000); // 60 segundos
```

**Modificar duración de cache:**
```php
// En DolarScrapingService.php
private $cacheMinutes = 2; // Cambiar valor
```

**Agregar nuevos tipos de dólar:**
1. Actualizar patrones en `DolarScrapingService.php`
2. Agregar HTML en `dashboard.blade.php`
3. Actualizar JavaScript para nuevos tipos

## 🛠️ Troubleshooting

### Problemas Comunes

**Error 500 - Internal Server Error**
```bash
# Verificar logs
tail -f storage/logs/laravel.log

# Verificar permisos
chmod -R 775 storage bootstrap/cache
```

**Datos no actualizan**
```bash
# Limpiar cache manualmente
php artisan cache:clear

# Verificar conectividad
curl "http://localhost:8000/api/monitor/cotizaciones"
```

**Scraping fallido**
- El sistema usa valores por defecto automáticamente
- Verificar en logs la causa del error
- dolarhoy.com puede haber cambiado estructura

### Debugging

**Habilitar debug en `.env`:**
```
APP_DEBUG=true
LOG_LEVEL=debug
```

**Verificar servicios:**
```bash
php artisan route:list | grep monitor
```

## 📈 Monitoreo

### Métricas Disponibles
- Tiempo de response del scraping
- Éxito/fallo de scraping
- Cache hits/misses
- Requests por minuto

### Logs Importantes
- `Scraping exitoso`: Datos obtenidos correctamente
- `Error en scraping`: Problema con la fuente
- `Cache miss`: Datos actualizados desde fuente

## 🚀 Producción

### Deployment
```bash
# Optimizar
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Configurar web server (Nginx/Apache)
# Apuntar document root a: /public
```

### Variables de Entorno
```env
APP_ENV=production
APP_DEBUG=false
CACHE_DRIVER=redis  # Para mejor performance
LOG_LEVEL=error
```

## 📄 API Documentation

Documentación completa de la API disponible en [docs/api.md](docs/api.md)

---

**Desarrollado con ❤️ para la comunidad de streaming**
**Dolar12.News** - Laravel Edition
