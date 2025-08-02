// Estado global para almacenar datos
let lastData = null;
let isLoading = false;

// Función para actualizar el timestamp
function updateTimestamp() {
    const now = new Date();
    const day = String(now.getDate()).padStart(2, '0');
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const year = String(now.getFullYear()).slice(-2);
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const ampm = now.getHours() >= 12 ? 'PM' : 'AM';
    const hours12 = now.getHours() % 12 || 12;
    
    const timestamp = `${day}/${month}/${year} ${hours12}:${minutes}${ampm}`;
    document.getElementById('timestamp').textContent = timestamp;
}

// Función para actualizar efectos visuales
function updateVisualEffects() {
    const priceElements = document.querySelectorAll('.price-value');
    priceElements.forEach(element => {
        element.style.animation = 'none';
        element.offsetHeight; // Trigger reflow
        element.style.animation = 'pulse 0.5s ease-in-out';
    });
}

// Función para obtener datos reales del servidor
async function fetchDolarData() {
    if (isLoading) return;
    isLoading = true;

    // Mostrar estado de actualización
    const indicator = document.getElementById('autoUpdateIndicator');
    if (indicator) {
        indicator.classList.add('updating');
        indicator.querySelector('span').textContent = 'Actualizando...';
    }

    try {
        console.log('Obteniendo datos del servidor...');
        const response = await fetch('/api/monitor/cotizaciones', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        console.log('Datos recibidos:', data);
        
        if (data.success) {
            updateDashboard(data.data);
            lastData = data.data;
            // Actualizar timestamp solo cuando hay nuevos datos
            updateTimestamp();
        } else {
            console.error('Error en la respuesta:', data.error);
        }
    } catch (error) {
        console.error('Error al obtener datos:', error);
        // Si hay error, usar últimos datos conocidos o mantener valores actuales
    } finally {
        isLoading = false;
        
        // Restaurar estado normal del indicador
        if (indicator) {
            indicator.classList.remove('updating');
            indicator.querySelector('span').textContent = 'Actualización automática cada 2 min';
        }
    }
}

// Función para actualizar el dashboard con datos reales
function updateDashboard(data) {
    const cotizaciones = data.cotizaciones;

    // Actualizar Dólar Oficial
    updateDolarCard('oficial', {
        compra: cotizaciones.oficial.compra,
        venta: cotizaciones.oficial.venta
    });

    // Actualizar Dólar Blue
    updateDolarCard('blue', {
        compra: cotizaciones.blue.compra,
        venta: cotizaciones.blue.venta
    });

    // Actualizar Dólar MEP
    updateDolarCard('mep', {
        compra: cotizaciones.mep.compra,
        venta: cotizaciones.mep.venta
    });

    // Actualizar CCL
    updateDolarCard('ccl', {
        compra: cotizaciones.ccl.compra,
        venta: cotizaciones.ccl.venta
    });

    // Actualizar Cripto
    updateDolarCard('cripto', {
        compra: cotizaciones.cripto.compra,
        venta: cotizaciones.cripto.venta
    });

    // Actualizar Tarjeta
    updateDolarCard('tarjeta', {
        valor: cotizaciones.tarjeta.valor,
        impuestos: cotizaciones.tarjeta.impuestos,
        descripcion: cotizaciones.tarjeta.descripcion
    });

    // Actualizar Freelance
    updateDolarCard('freelance', {
        valor: cotizaciones.freelance.valor
    });

    updateVisualEffects();
    console.log('Dashboard actualizado con datos reales');
}

// Función para actualizar una tarjeta específica
function updateDolarCard(type, data) {
    const card = document.querySelector(`.dolar-card.${type}`);
    if (!card) return;

    // Actualizar precios
    const priceValues = card.querySelectorAll('.price-value');
    
    if (type === 'tarjeta' || type === 'freelance') {
        // Tarjeta y Freelance tienen compra vacía y venta con el valor
        if (priceValues[0]) priceValues[0].textContent = '-';
        if (priceValues[1]) priceValues[1].textContent = `$${parseFloat(data.valor || 0).toLocaleString('es-AR')}`;
    } else {
        // Todos los demás tipos tienen compra y venta
        if (priceValues[0]) priceValues[0].textContent = `$${parseFloat(data.compra || 0).toLocaleString('es-AR')}`;
        if (priceValues[1]) priceValues[1].textContent = `$${parseFloat(data.venta || 0).toLocaleString('es-AR')}`;
    }
}

// Inicializar aplicación
function initialize() {
    console.log('Inicializando dashboard con datos del servidor...');
    // Generar timestamp inicial con la zona horaria del usuario
    updateTimestamp();
    // No hacer fetchDolarData() aquí porque los datos ya vienen del servidor
}

// Configurar intervalos
setInterval(fetchDolarData, 120000); // Actualizar datos cada 2 minutos (120 segundos)

// Inicializar cuando se carga la página
document.addEventListener('DOMContentLoaded', initialize);
initialize(); // También ejecutar inmediatamente por si el DOM ya está listo