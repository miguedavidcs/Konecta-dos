Producto con el Mayor Stock:
SELECT * FROM productos ORDER BY stock DESC LIMIT 1;
Producto Más Vendido:
SELECT p.*, SUM(v.cantidad_vendida) AS total_vendido
FROM productos AS p
JOIN ventas AS v ON p.id = v.id_producto
GROUP BY p.id
ORDER BY total_vendido DESC
LIMIT 1;
