CREATE DATABASE carental;
use carental;

create table auto (
    kenteken varchar(255) NOT NULL,
    merk varchar(255) NOT NULL,
    zitplaatsen varchar(255),
    primary key (kenteken)
);
create table klant (
    klant_id int AUTO_INCREMENT not null,
    klant_naam varchar(255) NOT NULL,
    telefoonnummer varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    primary key (klant_id)
);
create table reservering (
    reserverings_code int AUTO_INCREMENT not null,
    kenteken varchar(255),
    begin_datum DATE,
    eind_datum DATE,
    aantal_auto int,
    klant_id int,
    primary key (reserverings_code),
    foreign key (kenteken) references auto(kenteken) ON DELETE CASCADE,
    foreign key (klant_id) references klant(klant_id) ON DELETE CASCADE
);
create table factuur (
    factuur_no int AUTO_INCREMENT not null,
    kenteken varchar(255) not null,
    klant_id int not null,
    bedrag decimal(6,2) NOT NULL,
    primary key (factuur_no),
    foreign key (kenteken) references auto(kenteken) ON DELETE CASCADE,
    foreign key (klant_id) references klant(klant_id) ON DELETE CASCADE
);
create table medewerker (
    medewerker_id int AUTO_INCREMENT not null,
    username varchar(255) NOT NULL UNIQUE,
    password varchar(255),
    primary key (medewerker_id)
);