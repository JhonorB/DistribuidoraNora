{{-- resources/views/admin/dashboard/components/delete-confirm-modal.blade.php --}}
<div id="deleteConfirmModal" class="dash-modal-backdrop" onclick="handleDeleteModalBackdropClick(event)">
    <div class="dash-modal-card" style="max-width: 460px; text-align: center;">
        <div class="dash-modal-body" style="padding: 35px 28px 20px 28px; align-items: center;">
            <div style="width: 70px; height: 70px; background: #fde8ea; color: #dc3545; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 30px; margin-bottom: 18px;">
                <i class="fas fa-trash-can"></i>
            </div>
            
            <h3 style="font-size: 20px; font-weight: 800; color: var(--dash-dark); margin: 0 0 10px 0;">¿Eliminar este producto?</h3>
            <p style="color: var(--dash-gray-500); font-size: 14px; margin: 0 0 16px 0; line-height: 1.5;">
                Estás a punto de remover <strong id="deleteProductName" style="color: var(--dash-dark);">este producto</strong> del catálogo. Esta acción no se podrá deshacer en la interfaz.
            </p>
            <input type="hidden" id="deleteProductId" value="">
        </div>

        <div class="dash-modal-footer" style="justify-content: center; background: transparent; padding-top: 0;">
            <button type="button" class="dash-btn-secondary" onclick="closeDeleteModal()">Cancelar</button>
            <button type="button" class="dash-action-btn btn-delete" style="padding: 10px 20px; font-size: 13.5px;" onclick="confirmDeleteProduct()">
                <i class="fas fa-trash"></i>
                <span>Eliminar Producto</span>
            </button>
        </div>
    </div>
</div>
