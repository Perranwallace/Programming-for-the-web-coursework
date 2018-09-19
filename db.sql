CREATE TABLE users (
id INTEGER PRIMARY KEY auto_increment ,
username VARCHAR (30) ,
password VARCHAR (100),
UNIQUE (username)
);

INSERT INTO users VALUES (NULL , "pw354" , "password");



CREATE TABLE ships (
id INTEGER PRIMARY KEY auto_increment ,
ship_name VARCHAR (100) ,
year_built VARCHAR(4) ,
capacity INT ,
builder_name VARCHAR (100) ,
operating_company VARCHAR (100) 
);


INSERT INTO ships VALUES (NULL , "AL QIBLA" , "2012" , 13296, 
"Samsung Heavy Industries Co Ltd" , "UASC" );

INSERT INTO ships VALUES (NULL , "ALMA" , "1998" , 508, 
"J.J. Sietas KG Schiffswerft GmbH & Co KG" , "Holwerda Shipmanagement" );

INSERT INTO ships VALUES (NULL , "BARZAN" , "2015" , 19870, 
"Hyundai Samho Heavy Industries Co Ltd" , "UASC" );

INSERT INTO ships VALUES (NULL , "CMA CGM BENJAMIN FRANKLIN" , "2015" , 17859, 
"Shanghai Jiangnan Changxing Heavy Industries Co Ltd" , "CMA CGM" );

INSERT INTO ships VALUES (NULL , "CMA CGM JAMAICA" , "2006" , 4298, 
"Hyundai Heavy Industries Co Ltd" , "CMA CGM" );

INSERT INTO ships VALUES (NULL , "CMA CGM VERLAINE" , "2001" , 6712, 
"Shanghai Jiangnan Changxing Heavy Industries Co Ltd" , "CMA CGM" );

INSERT INTO ships VALUES (NULL , "EMMA MAERSK" , "2006" , 15550, 
"Odense Staalskibsvaerft A/S" , "Maersk Line" );

INSERT INTO ships VALUES (NULL , "HYUNDAI FAITH" , "2008" , 8566, 
"Hyundai Samho Heavy Industries Co Ltd" , "HYUNDAI" );

INSERT INTO ships VALUES (NULL , "HYUNDAI DREAM" , "2014" , 13154, 
"Daewoo Heavy Industries Co Ltd" , "HYUNDAI" );

INSERT INTO ships VALUES (NULL , "LARS MAERSK" , "1984" , 3016, 
"Odense Staalskibsvaerft A/S" , "Maersk Line" );

INSERT INTO ships VALUES (NULL , "LEVERKUSEN EXPRESS" , "2014" , 13167, 
"Hyundai Heavy Industries Co Ltd" , "Hapag Lloyd" );

INSERT INTO ships VALUES (NULL , "MAERSK MC-KINNEY MOLLER" , "2013" , 18340, 
"Daewoo Shipbuilding & Marine Engineering Co Ltd" , "Maersk Line" );

INSERT INTO ships VALUES (NULL , "MSC ALEXA" , "1996" , 3300, 
"Fincantieri-Cant. Nav. Italiani SpA" , "MSC" );

INSERT INTO ships VALUES (NULL , "MSC ARUSHI R" , "2002" , 4112, 
"Samsung Heavy Industries Co Ltd" , "MSC" );

INSERT INTO ships VALUES (NULL , "SOVEREIGN MAERSK" , "1997" , 9578, 
"Odense Staalskibsvaerft A/S" , "Maersk Line" );

INSERT INTO ships VALUES (NULL , "VORONEZH" , "2009" , 1728, 
"Stocznia Szczecinska Nowa Sp z oo" , "FESCO" );

INSERT INTO ships VALUES (NULL , "YM UNISON" , "2006" , 8208, 
"Hyundai Heavy Industries Co Ltd" , "Yang Ming" );

INSERT INTO ships VALUES (NULL , "YM WISH" , "2015" , 14080, 
"Hyundai Heavy Industries Co Ltd" , "Yang Ming" );




