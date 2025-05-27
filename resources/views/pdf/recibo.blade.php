<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        .total { font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Recibo de Compra</h1>

    <p>Cliente: {{ $cliente }}</p>
    <p>Total a pagar: ${{ number_format($total, 2) }}</p>

    <p>Gracias por tu compra.</p>
</body>
</html>
