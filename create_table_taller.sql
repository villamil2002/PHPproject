create table Cliente(
Id_cliente int not null AUTO_INCREMENT primary key,
Numero_Documento int,
Tipo_documento varchar(10),
Nombre1 varchar(50) not null,
Nombre2 varchar(50),
Apellido1 varchar(50) not null,
Apellido2 varchar(50),
Direccion varchar(100),
Telefono int);


create table Vehiculo(
id_vehiculo int not null AUTO_INCREMENT primary key,
Matricula varchar(30),
Modelo varchar(50),
Color varchar(50) not null,
id_Cliente int,
 constraint fk_clienteVehiculo foreign key reference (Id_cliente)
 references Cliente(Id_cliente));
 
create table Mecanico(
Id_Mecanico int not null AUTO_INCREMENT primary key,
Numero_Documento int,
Tipo_documento varchar(10),
Nombre1 varchar(50) not null,
Nombre2 varchar(50),
Apellido1 varchar(50) not null,
Apellido2 varchar(50),
Direccion varchar(100),
Telefono int);

create table Repuesto(
Id_Repuesto int not null AUTO_INCREMENT primary key,
Descripcion varchar(100),
Cantidad int,
Precio_unitario float);

create table OrdenParte(
Id_OrdenParte int not null AUTO_INCREMENT primary key,
Cantidad int,
Id_Repuesto int,
Id_mecanico int,
constraint fk_OrdenParteRepuesto foreign key reference(Id_Repuesto)
references Repuesto(Id_Repuesto),
constraint fk_OrdenParteMecanico foreign key reference(Id_mecanico)
references Mecanico(Id_Mecanico)
);


create table OrdenServicio(
Id_servicio int not null AUTO_INCREMENT primary key,
Fecha_registro datetime,
id_vehiculo int,
Id_ordenParte int,
constraint fk_OrdenServicioVehiculo foreign key reference(id_vehiculo)
references Vehiculo(id_vehiculo),
constraint fk_OrdenServicioOrdenParte foreign key reference(Id_ordenParte)
references OrdenParte(Id_OrdenParte)
);


create table Factura(
Id_Factura int not null AUTO_INCREMENT primary key,
Id_servicio int,
constraint fk_FacturaOrdenServicio foreign key reference(Id_servicio)
references OrdenServicio(Id_servicio)
);