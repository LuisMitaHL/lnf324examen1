DROP DATABASE BDLuis;
CREATE DATABASE BDLuis;
USE BDLuis;

CREATE TABLE Persona(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    activo INT
);

INSERT INTO Persona (nombre, direccion, telefono, activo)
VALUES ('Luis', 'Juan Manuel Loza #420', '65498732', 1),
       ('Maria', 'Miraflores 320', '74125896', 1),
       ('Ivan', 'Tres Tigres 14', '77777777', 0);

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


