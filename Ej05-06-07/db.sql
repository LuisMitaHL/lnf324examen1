DROP DATABASE BDLuis;
CREATE DATABASE BDLuis;
USE BDLuis;

CREATE TABLE Persona(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    departamento VARCHAR(3),
    activo INT
);

INSERT INTO Persona (nombre, direccion, telefono, departamento, activo)
VALUES ('Luis', 'Juan Manuel Loza #420', '65498732', 'lpz', 1),
       ('Maria', 'Miraflores 320', '74125896', 'scz', 1),
       ('Ivan', 'Tres Tigres 14', '77777777', 'tja', 0);

CREATE TABLE CuentaBancaria(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_persona INT,
    saldo DECIMAL(10,2),
    fecha_creacion DATE,
    tipo VARCHAR(255),
    activo INT
);

INSERT INTO CuentaBancaria (id_persona, saldo, fecha_creacion, tipo, activo)
VALUES (1, 1000.00, '2024-01-01', 'cajadeahorro', 1),
       (2, 2000.00, '2024-01-02', 'cuentacorriente', 1),
       (3, 15000.00, '2024-01-09', 'dpf', 1);

CREATE TABLE Transacciones(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cuenta INT,
    monto DECIMAL(10,2),
    fecha_transaccion DATE,
    tipo_transaccion VARCHAR(20)
);

INSERT INTO Transacciones (id_cuenta, monto, fecha_transaccion, tipo_transaccion)
VALUES (1, 1100.00, '2022-01-01', 'Deposito'),
       (1, -100.00, '2022-01-04', 'Retiro'),
       (2, 2000.00, '2022-01-04', 'Deposito'),
       (3, 15000.00, '2022-01-04', 'Deposito');


CREATE TABLE Usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255),
    contrasena VARCHAR(255),
    id_persona INT,
    rol VARCHAR(24)
);

INSERT INTO Usuarios (usuario, contrasena, id_persona, rol)
VALUES ('user1', 'password1', 1, 'cliente'),
       ('user2', 'password2', 2, 'cliente'),
       ('user3', 'password3', 3, 'cliente'),
       ('admin', 'admin', null, 'administrador'),
       ('director', 'director', null, 'director');


-- Ejercicio 7
-- Resumen por departamento
-- SELECT p.departamento,
--       SUM(cb.saldo) AS total_saldo
-- FROM Persona p
-- JOIN CuentaBancaria cb ON p.id = cb.id_persona
-- GROUP BY p.departamento;


-- Pivotado con case when
--SELECT 
--    SUM(CASE WHEN p.departamento = 'lpz' THEN cb.saldo ELSE 0 END) AS 'lpz',
--    SUM(CASE WHEN p.departamento = 'scz' THEN cb.saldo ELSE 0 END) AS 'scz',
--    SUM(CASE WHEN p.departamento = 'tja' THEN cb.saldo ELSE 0 END) AS 'tja'
--FROM Persona p
--JOIN CuentaBancaria cb ON p.id = cb.id_persona;
