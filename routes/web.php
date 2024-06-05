<?php

use Illuminate\Support\Facades\Route;

// Ruta para la pantalla de inicio (note)
Route::get('/note', function () {
    return view('note'); // Asegúrate de tener una vista llamada 'note.blade.php' en tu carpeta de vistas
})->name('note');

// Grupo de rutas para el sistema de productos (products)
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

// Grupo de rutas para el sistema de sistemas (systems)
Route::prefix('systems')->group(function () {
    Route::get('/', [SystemController::class, 'index'])->name('systems.index');
    Route::get('/create', [SystemController::class, 'create'])->name('systems.create');
    Route::post('/', [SystemController::class, 'store'])->name('systems.store');
    Route::get('/{system}', [SystemController::class, 'show'])->name('systems.show');
    Route::get('/{system}/edit', [SystemController::class, 'edit'])->name('systems.edit');
    Route::put('/{system}', [SystemController::class, 'update'])->name('systems.update');
    Route::delete('/{system}', [SystemController::class, 'destroy'])->name('systems.destroy');
});
