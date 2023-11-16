CREATE TABLE myyja(
    myyjaID int(11) NOT NULL, 
    nimi varchar(100) NOT NULL,
    kayttajatunnus varchar(22) NOT NULL UNIQUE,
    salasana varchar(255) NOT NULL,
    rooli varchar(22) NOT NULL,
    PRIMARY KEY (myyjaID)
);