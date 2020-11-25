drop database if exists sistemainventario;
create database sistemainventario;
use  sistemainventario;
create table proveedores(
idproveedor int auto_increment,
proveedor varchar(50),
direccion varchar(60),
telefono int(09),
email varchar(50),
primary key(idproveedor));

create table categorias(
idcategoria int auto_increment,
categoria varchar(40),
descripcion varchar(40),
primary key(idcategoria));

create table almacenes(
idalmacen int auto_increment,
almacen varchar(30),
descripcion varchar(40),
primary key(idalmacen));


create table productos(
idproducto int auto_increment,
producto varchar(40),
descripcion varchar(40),
fechaRegistro date,
precioVenta decimal(8,2),
precioCompra decimal(8,2),
idalmacen int,
idcategoria int,
foreign key(idalmacen)references almacenes(idalmacen),
foreign key(idcategoria)references categorias(idcategoria),
primary key(idproducto));

create table compras(
idcompra int auto_increment,
idproveedor int,
fecha date,
costoTotal decimal(8,2),
cantidad int,
estado  char(07),
foreign key(idproveedor)references proveedores(idproveedor),
primary key(idcompra));

create table compraproductos(idcompra int,idproducto int,primary key(idcompra,idproducto),
foreign key(idcompra) references compras(idcompra) on delete cascade,foreign key(idproducto) references productos(idproducto));

create table users(
    id int auto_increment primary key not null,
    name varchar(20) not null,
    email varchar(255) not null,
    email_verified_at timestamp null DEFAULT null,
    password varchar(255),
    remember_token varchar(100) null DEFAULT null,
    created_at timestamp null DEFAULT null,
    updated_at timestamp null DEFAULT null
);

insert users values(null,'admin','admin@gmail.com',null,'$2y$10$afvKROp.QS0m9ON7WDextO56ReB0xKeyWEWKahXz65iXHYtvTx.Cq',null,'2020-09-09 06:40:45','2020-10-14 05:04:30');
insert proveedores values(null,'LALITA EIRL','LOS INCAS','044462414','lalita@gmail.com');
insert proveedores values(null,'LOS FAUSTOS SA','LOS GIRASOLES','123456789','faustos@gmail.com');

insert into categorias values(null,'BEBIDAS','BEBIDA ENERGIZANTE');
insert into categorias values(null,'GALLETAS','MUY DULCES');

insert into almacenes values(null,'almacen01','almacena todo bebidas');
insert into almacenes values(null,'almacen02','almacena todo golosinas');

set delimiter !
create procedure grabacompra(in idproveedor int,in fecha date,in costoTotal decimal(8,2),in cantidad int,in estado varchar(07))
begin
    declare exit handler for sqlexception
    begin
        rollback;
    end;  
    start transaction;
        insert compras values(null,idproveedor,fecha,costoTotal,cantidad,estado);
    commit;
end!
create procedure grabacompraproductos(in idcompra int,in idproducto int)
begin
    declare exit handler for sqlexception
    begin
        rollback;
    end;  
    start transaction;
        insert compraproductos values(idcompra,idproducto);
    commit;
end!
set delimiter ;


