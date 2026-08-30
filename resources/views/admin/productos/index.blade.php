@extends('layouts.admin')

@section('title', 'Gestionar Productos')
@section('nav_title', 'Administrar Productos')

@section('styles')
<style>
/* CSS para el Modal de Producto */
.product-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(4px);
    z-index: 10000;
    display: none;
    justify-content: center;
    align-items: center;
    padding: 20px;
}
.product-modal-overlay.active {
    display: flex;
}
.product-modal-card {
    background: #fff;
    width: 100%;
    max-width: 1000px;
    max-height: 90vh;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    display: flex;
    flex-direction: column;
    overflow: hidden;
}
.product-modal-header {
    background: #fdf7f9;
    padding: 20px 25px;
    border-bottom: 1px solid #fae1ed;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.product-modal-header h3 { margin: 0; color: #d63384; font-size: 20px; font-weight: bold; }
.product-modal-close {
    background: transparent;
    border: none;
    font-size: 24px;
    color: #666;
    cursor: pointer;
    line-height: 1;
}
.product-modal-body {
    padding: 25px;
    overflow-y: auto;
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 30px;
}
.product-modal-img {
    width: 100%;
    border-radius: 10px;
    border: 2px solid #fae1ed;
    aspect-ratio: 1;
    object-fit: cover;
}
.product-form-group {
    margin-bottom: 15px;
}
.product-form-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #555;
    margin-bottom: 5px;
}
.product-form-group input, 
.product-form-group select, 
.product-form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-family: inherit;
    font-size: 14px;
}
.product-form-group input:disabled, 
.product-form-group select:disabled, 
.product-form-group textarea:disabled {
    background-color: #f9f9f9;
    color: #333;
    border-color: #eee;
    cursor: not-allowed;
}
.product-modal-footer {
    padding: 20px 25px;
    background: #fcfcfc;
    border-top: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.sizes-grid {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}
.size-btn {
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
    font-weight: bold;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s;
}
/* Activo = Guinda */
.size-btn.active { background: #87505D; color: white; }
/* Inactivo = Gris oscuro */
.size-btn.inactive { background: #6c757d; color: white; }

.size-btn:disabled { opacity: 0.8; cursor: not-allowed; }

@media (max-width: 768px) {
    .product-modal-body {
        grid-template-columns: 1fr;
    }
    .product-modal-img {
        max-width: 250px;
        margin: 0 auto;
        display: block;
    }
}
</style>
@endsection

@section('content')
<div class="container-box">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Catálogo de Lencería</h2>
        <a href="{{ route('admin.productos.create') }}" class="btn"><i class="fas fa-plus"></i> Registrar Nuevo Producto</a>
    </div>

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio Unit.</th>
                    <th>Precio 1/4</th>
                    <th>Precio Docena</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="productsTableBody">
                @foreach($products as $product)
                    @php
                        $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                        $mainImage = (is_array($images) && count($images) > 0) ? $images[0] : 'assets/img/default-product.png';
                    @endphp
                    <tr id="tr-product-{{ $product->id }}">
                        <td>
                            <img src="{{ asset($mainImage) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; border: 2px solid #ffc0cb;">
                        </td>
                        <td class="td-name">{{ $product->name }}</td>
                        <td class="td-category">{{ ucfirst($product->category) }}</td>
                        <td class="td-price-unit">S/. {{ number_format($product->price_unit, 2) }}</td>
                        <td class="td-price-quarter">S/. {{ number_format($product->price_quarter, 2) }}</td>
                        <td class="td-price-dozen">S/. {{ number_format($product->price_dozen, 2) }}</td>
                        <td class="td-stock">{{ $product->stock }}</td>
                        <td class="td-status">
                            @if($product->is_active ?? true)
                                <span class="badge badge-success">Activo</span>
                            @else
                                <span class="badge badge-danger">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-secondary" onclick="openProductModal({{ $product->id }})">
                                <i class="fas fa-eye"></i> Ver
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL DE PRODUCTO -->
<div class="product-modal-overlay" id="productModal" onclick="handleModalClick(event)">
    <div class="product-modal-card" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="product-modal-header">
            <h3 id="modalTitle">Detalle del Producto</h3>
            <button type="button" class="product-modal-close" aria-label="Cerrar" onclick="closeProductModal()">&times;</button>
        </div>
        <div class="product-modal-body">
            <!-- Izquierda: Imagen -->
            <div>
                <img id="modImg" src="" alt="Producto" class="product-modal-img">
                <div class="product-form-group" style="margin-top: 15px;" id="modStatusContainer">
                    <label>Estado en la Tienda</label>
                    <select id="modIsActive" disabled>
                        <option value="1">Activo (Visible)</option>
                        <option value="0">Inactivo (Oculto)</option>
                    </select>
                </div>
            </div>
            
            <!-- Derecha: Datos -->
            <div>
                <form id="productEditForm" onsubmit="saveProduct(event)">
                    <input type="hidden" id="modId">
                    
                    <div class="product-form-group">
                        <label>Nombre del Producto *</label>
                        <input type="text" id="modName" required disabled>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="product-form-group">
                            <label>Categoría *</label>
                            <select id="modCategory" required disabled>
                                <option value="cacheteros">Cacheteros</option>
                                <option value="bikinis">Bikinis</option>
                                <option value="semihilos">Semi Hilos</option>
                                <option value="trusas">Trusas</option>
                                <option value="conjuntos">Conjuntos</option>
                            </select>
                        </div>
                        <div class="product-form-group">
                            <label>Stock Global *</label>
                            <input type="number" id="modStock" min="0" required disabled>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px;">
                        <div class="product-form-group">
                            <label>Unidad (S/.) *</label>
                            <input type="number" id="modPriceUnit" step="0.10" min="0" required disabled>
                        </div>
                        <div class="product-form-group">
                            <label>1/4 Doc. (S/.) *</label>
                            <input type="number" id="modPriceQuarter" step="0.10" min="0" required disabled>
                        </div>
                        <div class="product-form-group">
                            <label>Docena (S/.) *</label>
                            <input type="number" id="modPriceDozen" step="0.10" min="0" required disabled>
                        </div>
                    </div>

                    <div class="product-form-group">
                        <label>Disponibilidad de Tallas (Clic para alternar en modo edición)</label>
                        <div class="sizes-grid" id="modSizes">
                            <button type="button" class="size-btn inactive" data-size="XS" disabled>XS</button>
                            <button type="button" class="size-btn inactive" data-size="S" disabled>S</button>
                            <button type="button" class="size-btn inactive" data-size="M" disabled>M</button>
                            <button type="button" class="size-btn inactive" data-size="L" disabled>L</button>
                            <button type="button" class="size-btn inactive" data-size="XL" disabled>XL</button>
                            <button type="button" class="size-btn inactive" data-size="XXL" disabled>XXL</button>
                        </div>
                    </div>

                    <div class="product-form-group">
                        <label>Descripción *</label>
                        <textarea id="modDescription" rows="3" required disabled></textarea>
                    </div>

                    <button type="submit" id="btnSubmitSave" style="display: none;"></button>
                </form>
            </div>
        </div>
        <div class="product-modal-footer">
            <div id="footerViewMode">
                <button type="button" class="btn" style="background-color: #dc3545;" onclick="deleteProduct()"><i class="fas fa-trash"></i> Eliminar</button>
            </div>
            <div id="footerViewModeRight">
                <button type="button" class="btn btn-secondary" onclick="closeProductModal()">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="enableEditMode()"><i class="fas fa-pen"></i> Editar Producto</button>
            </div>

            <div id="footerEditMode" style="display: none; width: 100%; justify-content: flex-end; gap: 10px;">
                <button type="button" class="btn btn-secondary" onclick="cancelEditMode()">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('btnSubmitSave').click()" id="btnRealSave"><i class="fas fa-save"></i> Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
let currentProduct = null;
let currentSizes = {};
const csrfToken = '{{ csrf_token() }}';

// Abrir modal e ir a buscar info
function openProductModal(id) {
    document.getElementById('productModal').classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Set loading state
    document.getElementById('modalTitle').innerText = "Cargando...";
    resetModalFields();

    fetch(`/admin/productos/${id}/api`)
        .then(res => res.json())
        .then(data => {
            currentProduct = data;
            fillModalData(data);
            setMode('view');
        })
        .catch(err => {
            alert("Error al cargar producto");
            closeProductModal();
        });
}

function closeProductModal() {
    document.getElementById('productModal').classList.remove('active');
    document.body.style.overflow = 'auto';
    currentProduct = null;
}

function handleModalClick(e) {
    if (e.target.id === 'productModal') {
        closeProductModal();
    }
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && document.getElementById('productModal').classList.contains('active')) {
        closeProductModal();
    }
});

function resetModalFields() {
    document.getElementById('productEditForm').reset();
    document.getElementById('modImg').src = "";
    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.className = 'size-btn inactive';
    });
}

function fillModalData(p) {
    document.getElementById('modalTitle').innerText = "Viendo Producto: " + p.name;
    document.getElementById('modId').value = p.id;
    document.getElementById('modName').value = p.name;
    document.getElementById('modCategory').value = p.category;
    document.getElementById('modPriceUnit').value = parseFloat(p.price_unit).toFixed(2);
    document.getElementById('modPriceQuarter').value = parseFloat(p.price_quarter).toFixed(2);
    document.getElementById('modPriceDozen').value = parseFloat(p.price_dozen).toFixed(2);
    document.getElementById('modStock').value = p.stock;
    document.getElementById('modDescription').value = p.description;
    document.getElementById('modIsActive').value = p.is_active ? "1" : "0";
    
    let images = p.images;
    if(typeof images === 'string') images = JSON.parse(images);
    document.getElementById('modImg').src = (images && images.length > 0) ? '/' + images[0] : '/assets/img/default-product.png';

    // Sizes
    currentSizes = p.sizes || {};
    document.querySelectorAll('.size-btn').forEach(btn => {
        const size = btn.getAttribute('data-size');
        if (currentSizes[size] === true) {
            btn.className = 'size-btn active';
        } else {
            btn.className = 'size-btn inactive';
        }
    });
}

// Alternar Tallas
document.querySelectorAll('.size-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        if (!this.disabled) {
            const size = this.getAttribute('data-size');
            currentSizes[size] = !currentSizes[size];
            this.className = currentSizes[size] ? 'size-btn active' : 'size-btn inactive';
        }
    });
});

function setMode(mode) {
    const isEdit = mode === 'edit';
    
    // Enable/disable inputs
    document.getElementById('modName').disabled = !isEdit;
    document.getElementById('modCategory').disabled = !isEdit;
    document.getElementById('modPriceUnit').disabled = !isEdit;
    document.getElementById('modPriceQuarter').disabled = !isEdit;
    document.getElementById('modPriceDozen').disabled = !isEdit;
    document.getElementById('modStock').disabled = !isEdit;
    document.getElementById('modDescription').disabled = !isEdit;
    document.getElementById('modIsActive').disabled = !isEdit;
    
    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.disabled = !isEdit;
    });

    if (isEdit) {
        document.getElementById('modalTitle').innerText = "Editando: " + currentProduct.name;
        document.getElementById('footerViewMode').style.display = 'none';
        document.getElementById('footerViewModeRight').style.display = 'none';
        document.getElementById('footerEditMode').style.display = 'flex';
    } else {
        document.getElementById('modalTitle').innerText = "Viendo Producto: " + currentProduct.name;
        document.getElementById('footerViewMode').style.display = 'block';
        document.getElementById('footerViewModeRight').style.display = 'block';
        document.getElementById('footerEditMode').style.display = 'none';
    }
}

function enableEditMode() {
    setMode('edit');
}

function cancelEditMode() {
    // Restaurar info original
    fillModalData(currentProduct);
    setMode('view');
}

function saveProduct(e) {
    e.preventDefault();
    const btnSave = document.getElementById('btnRealSave');
    btnSave.disabled = true;
    btnSave.innerText = "Guardando...";

    const id = document.getElementById('modId').value;
    
    const payload = {
        name: document.getElementById('modName').value,
        category: document.getElementById('modCategory').value,
        price_unit: document.getElementById('modPriceUnit').value,
        price_quarter: document.getElementById('modPriceQuarter').value,
        price_dozen: document.getElementById('modPriceDozen').value,
        stock: document.getElementById('modStock').value,
        description: document.getElementById('modDescription').value,
        is_active: document.getElementById('modIsActive').value === "1",
        sizes: currentSizes,
        _method: 'PUT'
    };

    fetch(`/admin/productos/${id}/api`, {
        method: 'POST', // We use POST with _method=PUT for Laravel
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            alert(data.message);
            currentProduct = data.product; // Update cache
            updateTableRow(data.product);
            setMode('view');
        } else {
            alert("Error al guardar.");
        }
    })
    .catch(err => {
        alert("Ocurrió un error de red al guardar.");
        console.error(err);
    })
    .finally(() => {
        btnSave.disabled = false;
        btnSave.innerHTML = '<i class="fas fa-save"></i> Guardar Cambios';
    });
}

function updateTableRow(p) {
    const tr = document.getElementById(`tr-product-${p.id}`);
    if(tr) {
        tr.querySelector('.td-name').innerText = p.name;
        tr.querySelector('.td-category').innerText = p.category.charAt(0).toUpperCase() + p.category.slice(1);
        tr.querySelector('.td-price-unit').innerText = "S/. " + parseFloat(p.price_unit).toFixed(2);
        tr.querySelector('.td-price-quarter').innerText = "S/. " + parseFloat(p.price_quarter).toFixed(2);
        tr.querySelector('.td-price-dozen').innerText = "S/. " + parseFloat(p.price_dozen).toFixed(2);
        tr.querySelector('.td-stock').innerText = p.stock;
        tr.querySelector('.td-status').innerHTML = p.is_active 
            ? '<span class="badge badge-success">Activo</span>' 
            : '<span class="badge badge-danger">Inactivo</span>';
    }
}

function deleteProduct() {
    if(!confirm(`¿Estás completamente seguro de eliminar el producto "${currentProduct.name}"?`)) {
        return;
    }
    if(!confirm(`ADVERTENCIA FINAL: Esto ocultará permanentemente el producto de la tienda. ¿Continuar?`)) {
        return;
    }

    const id = currentProduct.id;
    
    fetch(`/admin/productos/${id}/api`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            alert(data.message);
            const tr = document.getElementById(`tr-product-${id}`);
            if(tr) {
                // Remove row visually or update to Inactivo
                tr.querySelector('.td-status').innerHTML = '<span class="badge badge-danger">Inactivo</span>';
            }
            closeProductModal();
        }
    })
    .catch(err => alert("Error al procesar eliminación"));
}
</script>
@endsection
