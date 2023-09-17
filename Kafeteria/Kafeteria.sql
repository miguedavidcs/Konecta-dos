-- Database: kafeteria

-- DROP DATABASE IF EXISTS kafeteria;

CREATE DATABASE kafeteria
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Colombia.1252'
    LC_CTYPE = 'Spanish_Colombia.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;
 -- Table: public.productos

-- DROP TABLE IF EXISTS public.productos;

CREATE TABLE IF NOT EXISTS public.productos
(
    id bigint NOT NULL DEFAULT nextval('productos_id_seq'::regclass),
    nombre_producto character varying(255) COLLATE pg_catalog."default" NOT NULL,
    referencia character varying(255) COLLATE pg_catalog."default" NOT NULL,
    precio numeric(10,2) NOT NULL,
    peso integer NOT NULL,
    categoria character varying(255) COLLATE pg_catalog."default" NOT NULL,
    stock integer NOT NULL,
    fecha_de_creacion date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT productos_pkey PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.productos
    OWNER to postgres;

    -- Table: public.ventas

-- DROP TABLE IF EXISTS public.ventas;

CREATE TABLE IF NOT EXISTS public.ventas
(
    id bigint NOT NULL DEFAULT nextval('ventas_id_seq'::regclass),
    id_producto bigint NOT NULL,
    fecha_venta date NOT NULL,
    cantidad_vendida integer NOT NULL,
    monto_total numeric(10,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT ventas_pkey PRIMARY KEY (id),
    CONSTRAINT ventas_id_producto_foreign FOREIGN KEY (id_producto)
        REFERENCES public.productos (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.ventas
    OWNER to postgres;
