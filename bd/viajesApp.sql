-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-05-24 15:21:16.203

-- tables
-- Table: alojamientos
CREATE TABLE unc_246364.alojamientos (
    id_viajes integer  NOT NULL,
    id_alojamiento integer  NOT NULL,
    nombre character varying(40)  NULL,
    ciudad character varying(40)  NULL,
    fecha_inicio date  NULL,
    fecha_fin date  NULL,
    descripcion character varying(120)  NULL,
    CONSTRAINT alojamientos_pkey PRIMARY KEY (id_viajes,id_alojamiento)
);

-- Table: viajes
CREATE TABLE unc_246364.viajes (
    id_viajes integer  NOT NULL,
    origen character varying(40)  NULL,
    destino character varying(40)  NULL,
    fecha_inicio date  NULL,
    fecha_fin date  NULL,
    CONSTRAINT viajes_pkey PRIMARY KEY (id_viajes)
);

-- foreign keys
-- Reference: alojamientos_viajes (table: alojamientos)
ALTER TABLE unc_246364.alojamientos ADD CONSTRAINT alojamientos_viajes
    FOREIGN KEY (id_viajes)
    REFERENCES unc_246364.viajes (id_viajes)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- sequences
-- Sequence: unc_246364.alojamientos_id_alojamiento_seq
CREATE SEQUENCE "unc_246364.alojamientos_id_alojamiento_seq"
      NO MINVALUE
      NO MAXVALUE
      NO CYCLE
;

-- Sequence: unc_246364.alojamientos_id_viajes_seq
CREATE SEQUENCE "unc_246364.alojamientos_id_viajes_seq"
      NO MINVALUE
      NO MAXVALUE
      NO CYCLE
;

-- End of file.

