@extends('layouts.home_layout')

@section('title', 'Inicio Ferxxo')

@section('content')
    <div id="welcome-section"> {{-- Nuevo contenedor para la sección de bienvenida y productos --}}
        <div id="login-container"> {{-- Tu cuadro central existente para el mensaje de bienvenida --}}
            <div class="welcome-content">
                ¡BIENVENIDO A LA PAGINA DE CENTRO COMERCIAL SAN PEDRO PLAZA!
            </div>
            <div class="welcome-subtitle">
                Explora nuestros productos exclusivos.
            </div>
        </div>

        <section class="products-section">
            <h2 class="section-title">Nuestras marcas</h2>
            <div class="product-grid">
                {{-- Ejemplo de una carta de producto estática --}}
                <div class="product-card">
                    <img src="{{ asset('images/producto1.webp') }}" alt="Producto 1" class="product-image">
                    <h3 class="product-name">Camiseta Neón</h3>
                    <p class="product-price">$ 45.000 COP</p>
                    <button class="buy-button">Comprar Ahora</button>
                </div>

                <div class="product-card">
                    <img src="{{ asset('images/producto2.webp') }}" alt="Producto 2" class="product-image">
                    <h3 class="product-name">Gorra Ferxxo</h3>
                    <p class="product-price">$ 30.000 COP</p>
                    <button class="buy-button">Comprar Ahora</button>
                </div>

                <div class="product-card">
                    <img src="{{ asset('images/producto3.webp') }}" alt="Producto 3" class="product-image">
                    <h3 class="product-name">Set de Stickers</h3>
                    <p class="product-price">$ 15.000 COP</p>
                    <button class="buy-button">Comprar Ahora</button>
                </div>
                {{-- Puedes añadir más cartas de productos estáticas aquí por ahora --}}
            </div>
        </section>
    </div>
@endsection

