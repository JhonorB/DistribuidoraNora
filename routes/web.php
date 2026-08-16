<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Public Customer Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/{id}', [ProductController::class, 'show'])->name('products.show');

// Page Controller Routes
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('page.nosotros');
Route::get('/contacto', [PageController::class, 'contacto'])->name('page.contacto');
Route::post('/contacto', [PageController::class, 'enviarContacto'])->name('page.contacto.submit');
Route::get('/marbelover', [PageController::class, 'marbelover'])->name('page.marbelover');
Route::get('/preguntas-frecuentes', [PageController::class, 'preguntasFrecuentes'])->name('page.preguntas');
Route::get('/politica-privacidad', [PageController::class, 'politicaPrivacidad'])->name('page.privacidad');
Route::get('/terminos', [PageController::class, 'terminos'])->name('page.terminos');
Route::get('/cambios-devoluciones', [PageController::class, 'cambiosDevoluciones'])->name('page.cambios');
Route::get('/tarifaenvio', [PageController::class, 'tarifaEnvio'])->name('page.tarifaenvio');
Route::get('/distribuidora', [PageController::class, 'distribuidora'])->name('page.distribuidora');
Route::get('/libro-reclamaciones', [PageController::class, 'libroReclamaciones'])->name('page.reclamaciones');
Route::post('/libro-reclamaciones', [PageController::class, 'enviarReclamacion'])->name('page.reclamaciones.submit');
Route::get('/catalogo', [PageController::class, 'catalogo'])->name('page.catalogo');

// Cart & Checkout Flow
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/pago', [CartController::class, 'pago'])->name('cart.pago');
Route::post('/checkout/procesar', [CartController::class, 'procesarOrder'])->name('cart.procesar');
Route::get('/pedido/resumen/{id}', [CartController::class, 'resumen'])->name('cart.resumen');

// Customer Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [AuthController::class, 'profile'])->name('auth.profile');

    // Admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/productos', [AdminController::class, 'productos'])->name('admin.productos');
        Route::get('/productos/registro', [AdminController::class, 'registroProducto'])->name('admin.productos.create');
        Route::post('/productos/registro', [AdminController::class, 'guardarProducto'])->name('admin.productos.store');
        Route::get('/pedidos', [AdminController::class, 'pedidos'])->name('admin.pedidos');
        Route::get('/pedidos/{id}', [AdminController::class, 'detallePedido'])->name('admin.pedidos.show');
        Route::post('/pedidos/{id}/actualizar', [AdminController::class, 'actualizarPedido'])->name('admin.pedidos.update');
        Route::get('/contactos', [AdminController::class, 'contactos'])->name('admin.contactos');
        Route::get('/reclamaciones', [AdminController::class, 'reclamaciones'])->name('admin.reclamaciones');
    });
});
