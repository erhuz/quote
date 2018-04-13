-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2018-04-13 11:17:10.733

-- tables
-- Table: quote
CREATE TABLE quote (
    id int  NOT NULL,
    quoted_id int  NOT NULL,
    user_id int  NOT NULL,
    text varchar(256)  NOT NULL,
    creation_date timestamp  NOT NULL,
    CONSTRAINT quote_pk PRIMARY KEY (id)
);

-- Table: quoted
CREATE TABLE quoted (
    id int  NOT NULL,
    name varchar(64)  NOT NULL,
    creation_date timestamp  NOT NULL,
    CONSTRAINT quoted_pk PRIMARY KEY (id)
);

-- Table: user
CREATE TABLE "user" (
    id int  NOT NULL,
    username varchar(64)  NOT NULL,
    firstname varchar(64)  NOT NULL,
    lastname varchar(64)  NOT NULL,
    password varchar(256)  NOT NULL,
    email varchar(64)  NOT NULL,
    creation_date timestamp  NOT NULL,
    CONSTRAINT user_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: quoted_quote (table: quote)
ALTER TABLE quote ADD CONSTRAINT quoted_quote
    FOREIGN KEY (quoted_id)
    REFERENCES quoted (id)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: user_quote (table: quote)
ALTER TABLE quote ADD CONSTRAINT user_quote
    FOREIGN KEY (user_id)
    REFERENCES "user" (id)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- End of file.

