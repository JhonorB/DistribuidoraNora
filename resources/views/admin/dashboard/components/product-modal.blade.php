{{-- resources/views/admin/dashboard/components/product-modal.blade.php --}}
<div id="productModal" class="dash-modal-backdrop" onclick="handleModalBackdropClick(event)">
    <div class="dash-modal-card">
        <div class="dash-modal-header">
            <h3 id="modalTitle">Agregar Nuevo Producto</h3>
            <button type="button" class="dash-modal-close" onclick="closeProductModal()" aria-label="Cerrar modal">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="productForm" onsubmit="saveProductForm(event)">
            <input type="hidden" id="modalProductId" value="">

            <div class="dash-modal-body">
                {{-- Sección de Imagen del Producto --}}
                <div class="dash-form-group">
                    <label>Imagen del Producto</label>
                    <div class="dash-img-upload-box">
                        <img id="modalImgPreview" src="{{ asset('assets/img/default-product.png') }}" alt="Vista previa" class="dash-img-preview" onerror="this.src='https://via.placeholder.com/64x64/ffe4f0/d63384?text=LN'">
                        <div style="flex-grow: 1;">
                            <input type="text" id="modalImgUrl" placeholder="URL de la imagen o selecciona un archivo..." oninput="updateModalImgPreview(this.value)" style="margin-bottom: 8px;">
                            <div style="font-size: 11.5px; color: var(--dash-gray-500);">
                                <i class="fas fa-info-circle"></i> Puedes ingresar una URL de imagen o dejar la predeterminada de catálogo.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Nombre y Categoría --}}
                <div class="dash-form-row">
                    <div class="dash-form-group">
                        <label for="modalName">Nombre del Producto *</label>
                        <input type="text" id="modalName" placeholder="Ej: Cachetero Encaje Royal" required>
                    </div>

                    <div class="dash-form-group">
                        <label for="modalCategory">Categoría *</label>
                        <select id="modalCategory" required>
                            <option value="cachetero">Cachetero</option>
                            <option value="bikini">Bikini</option>
                            <option value="semihilo">Semi Hilo</option>
                            <option value="topsito">Topsito</option>
                            <option value="conjunto">Conjunto</option>
                        </select>
                    </div>
                </div>

                {{-- Precios Escalonados --}}
                <div class="dash-form-row-3">
                    <div class="dash-form-group">
                        <label for="modalPriceUnit">Precio Unitario (S/.) *</label>
                        <input type="number" id="modalPriceUnit" step="0.50" min="0" placeholder="28.00" required>
                    </div>

                    <div class="dash-form-group">
                        <label for="modalPriceQuarter">Precio 1/4 Doc. (S/.)</label>
                        <input type="number" id="modalPriceQuarter" step="0.50" min="0" placeholder="24.00">
                    </div>

                    <div class="dash-form-group">
                        <label for="modalPriceDozen">Precio Docena (S/.)</label>
                        <input type="number" id="modalPriceDozen" step="0.50" min="0" placeholder="20.00">
                    </div>
                </div>

                {{-- Stock y Estado --}}
                <div class="dash-form-row">
                    <div class="dash-form-group">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <label for="modalStock">Cantidad en Stock *</label>
                            <span id="modalStockStatusBadge" class="dash-stock-tag good">Disponible</span>
                        </div>
                        <input type="number" id="modalStock" min="0" placeholder="50" required oninput="updateModalStockBadge(this.value)">
                    </div>

                    <div class="dash-form-group">
                        <label>Estado en Tienda Pública</label>
                        <div style="display: flex; align-items: center; gap: 12px; padding-top: 8px;">
                            <label class="dash-switch">
                                <input type="checkbox" id="modalStatusActive" checked>
                                <span class="dash-slider"></span>
                            </label>
                            <span id="modalStatusLabel" style="font-weight: 700; font-size: 13.5px; color: #28a745;">Activo (Visible)</span>
                        </div>
                    </div>
                </div>

                {{-- Descripción --}}
                <div class="dash-form-group">
                    <label for="modalDescription">Descripción para los Clientes</label>
                    <textarea id="modalDescription" rows="3" placeholder="Detalles de tela, ajuste, colores disponibles y acabados..."></textarea>
                </div>
            </div>

            <div class="dash-modal-footer">
                <button type="button" class="dash-btn-secondary" onclick="closeProductModal()">Cancelar</button>
                <button type="submit" class="dash-btn-primary">
                    <i class="fas fa-save"></i>
                    <span id="modalSubmitBtnText">Guardar Producto</span>
                </button>
            </div>
        </form>
    </div>
</div>
