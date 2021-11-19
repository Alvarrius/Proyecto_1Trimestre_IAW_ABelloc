/* EMPEZAMOS CON LA CREACIÓN DE LA BASE DE DATOS */

create database if not exists cpus_alvarrius;
use cpus_alvarrius;

/* CREACIÓN DE LAS TABLAS */

CREATE TABLE IF NOT EXISTS productos (
id_producto INT AUTO_INCREMENT PRIMARY KEY,
nombre_producto VARCHAR(100) NOT NULL,
descripcion VARCHAR(500) NOT NULL,
precio_producto DECIMAL(6,2) UNSIGNED NOT NULL,
imagen VARCHAR(1000) NOT NULL
);

CREATE TABLE IF NOT EXISTS pedidos ( 
pedido_id INT NOT NULL AUTO_INCREMENT, 
producto_id INT NOT NULL, 
nombre_producto VARCHAR(100) NOT NULL, 
precio_producto DECIMAL(6.2) NOT NULL, 
fecha DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
n_pedido INT(11) NOT NULL, 
PRIMARY KEY (pedido_id)
);

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion`, `precio_producto`, `imagen`) VALUES
(30, 'AMD Ryzen™ 5 5600X', 'Núcleos: 6, Hilos: 12, TDP/TDP predeterminado 65W, Reloj base 3.7GHz, Reloj de aumento máx. Hasta 4.6GHz', '298.72', '1637271046_amd5600x.jpg'),
(31, 'AMD Ryzen™ 5 3400G', 'N.° de núcleos de CPU 4, N.° de subprocesos 8, TDP/TDP predeterminado 65W, Reloj base 3.7GHz, Reloj de aumento máx. Hasta 4.2GHz', '200.00', '1637271134_5400g.jpg'),
(32, 'AMD Ryzen™ 9 5900X', 'Núcleos de CPU 12, Hilos 24, TDP/TDP predeterminado 105W, Reloj base 3.7GHz, Reloj de aumento máx. Hasta 4.8GHz', '457.22', '1637271204_ryzen9.jpg'),
(33, 'Intel® Core™ i3-1005G1', 'Nucleos: 2, Hilos: 4, TDP 15W, Frecuencia básica del procesador 1,20 GHz, Frecuencia turbo máxima 3,40 GHz', '167.56', '1637271614_intel-core-i3.jpg'),
(34, 'Intel® Core™ i7-4790K', 'Nucleos: 4, Hilos: 8, TDP 88W, Frecuencia básica del procesador 4,00 GHz, Frecuencia turbo máxima 4,40 GHz', '278.45', '1637271704_4790k.jpg'),
(35, 'Intel® Xeon® E-2386G', 'Nucleos: 6, Hilos: 12, TDP 95W, Frecuencia básica del procesador 3,50 GHz, Frecuencia turbo máxima 5,10 GHz', '450.78', '1637271831_xeon.png'),
(36, 'AMD Ryzen™ Threadripper™ 3990X', 'Núcleos de CPU 64, Nº Hilos 128, TDP/TDP predeterminado 280W, Reloj base 2.9GHz, Reloj de aumento máx. Hasta 4.3GHz', '586.27', '1637271999_threa.png'),
(37, 'AMD EPYC™ 7F72', 'Núcleos de CPU 24, Hilos 48, TDP/TDP predeterminado 240W, Reloj base 3.2GHz, Reloj de aumento máx. Hasta 3.7GHz', '789.57', '1637272130_epyc.jpg');




