{{-- resources/views/admin/dashboard/components/recent-activity.blade.php --}}
<div class="dash-side-card">
    <div class="dash-card-header" style="margin-bottom: 8px;">
        <div class="dash-card-header-left">
            <h3>Actividad y Notificaciones</h3>
            <p>Eventos recientes en la plataforma</p>
        </div>
    </div>

    <div class="dash-activity-timeline">
        <div class="dash-timeline-item">
            <div class="dash-timeline-dot"></div>
            <p class="dash-timeline-title">Nuevo pedido #PED-0142 recibido</p>
            <p class="dash-timeline-desc">Camila Rodriguez realizó compra por S/. 185.00 con Yape.</p>
            <span class="dash-timeline-time">Hace 15 minutos</span>
        </div>

        <div class="dash-timeline-item">
            <div class="dash-timeline-dot" style="border-color: #0dcaf0;"></div>
            <p class="dash-timeline-title">Nuevo mensaje de contacto</p>
            <p class="dash-timeline-desc">Consulta sobre catálogo por mayor desde Trujillo.</p>
            <span class="dash-timeline-time">Hace 1 hora</span>
        </div>

        <div class="dash-timeline-item">
            <div class="dash-timeline-dot" style="border-color: #28a745;"></div>
            <p class="dash-timeline-title">Pedido #PED-0139 entregado</p>
            <p class="dash-timeline-desc">El courier confirmó la recepción en Lima Norte.</p>
            <span class="dash-timeline-time">Hace 3 horas</span>
        </div>

        <div class="dash-timeline-item">
            <div class="dash-timeline-dot" style="border-color: #fd7e14;"></div>
            <p class="dash-timeline-title">Alerta de stock bajo</p>
            <p class="dash-timeline-desc">Quedan menos de 5 unidades en "Cachetero Encaje Royal".</p>
            <span class="dash-timeline-time">Hace 5 horas</span>
        </div>
    </div>
</div>
