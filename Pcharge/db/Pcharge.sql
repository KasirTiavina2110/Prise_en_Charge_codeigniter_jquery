create database Pcharge;

create extension pgcrypto;

CREATE OR REPLACE FUNCTION sha1(bytea) returns text AS $$
    SELECT encode(digest($1, 'sha1'), 'hex')
$$ LANGUAGE SQL STRICT IMMUTABLE;

create table Profile(
    id INT primary key not null,
    valeur varchar(50)
);

INSERT INTO Profile VALUES(1,'employe');
INSERT INTO Profile VALUES(10,'chef');

create table Users(
    userkey varchar(10) not null,
    userid serial primary key,
    profile INT,
    login varchar(50),
    email varchar(50),
    password varchar(500),
    FOREIGN KEY(Profile) REFERENCES Profile(id)
);

Insert into Users values('UT',default,10,'Veloptic','veloptic@gmail.com',sha1('Veloptic1234'));
Insert into Users values('UT',default,1,'Jason','jason@yahoo.fr',sha1('Jason123'));
Insert into Users values('UT',default,1,'Be','be@yahoo.fr',sha1('Be123'));
Insert into Users values('UT',default,10,'Kininike','kininike@yahoo.fr',sha1('Kininike123'));

create table Assureur(
    id serial primary key,
    Code varchar(200),
    Assurance varchar(200),
    Societe varchar(250)
);
create table Facture(
    id serial primary key not null,
    numfacture Varchar(200),
    datefacture timestamp default now(),
    datedelai timestamp,
    Reference varchar(200),
    Client varchar(150),
    montant NUMERIC(10,2),
    statut varchar(100),
    idAssureur serial,
    type varchar(200),
    numcompte varchar(200),
     CONSTRAINT fk_assureur
      FOREIGN KEY(idAssureur) 
	  REFERENCES Assureur(id)
);


CREATE VIEW Details AS SELECT Facture.numfacture,Facture.datefacture,
Facture.datedelai,Facture.Reference,Facture.Client,Facture.montant,Facture.statut,
Facture.type,Assureur.id,Assureur.Code,Assureur.Assurance,Assureur.Societe FROM Facture,Assureur
where Facture.idAssureur = Assureur.id;

CREATE VIEW JOINDETAILS AS SELECT*from Facture inner join Assureur on Facture.idAssureur = Assureur.id;

Insert into Assureur values(Default,'BSA ARTEC','BSA','ARTEC OMERT');
Insert into Assureur values(Default,'BSA GULFSAT','BSA','GULFSAT');
Insert into Assureur values(Default,'BSA MAPICAN SKY','BSA','MAPICAN SKY');
Insert into Assureur values(Default,'BSA LAND O LAKES','BSA','LAND O LAKES');
Insert into Assureur values(Default,'BSA LP','BSA','LP');
Insert into Assureur values(Default,'BSA IMPERIAL TOBACCO','BSA','IMPERIAL TOBACCO');
Insert into Assureur values(Default,'BSA SOCOTEC','BSA','SOCOTEC');
Insert into Assureur values(Default,'BSA CABINET ACS','BSA','CABINET ACS');
Insert into Assureur values(Default,'BSA E2F','BSA','E2F');
Insert into Assureur values(Default,'BSA BFV-SG','BSA','BFV-SG');
Insert into Assureur values(Default,'BSA FORMAPROD','BSA','FORMAPROD');
Insert into Assureur values(Default,'BSA FTL','BSA','FTL');
Insert into Assureur values(Default,'BSA ECOCERT ','BSA','ECOCERT ');
Insert into Assureur values(Default,'BSA ANALOGH','BSA','ANALOGH');
Insert into Assureur values(Default,'BSA GAZIM','BSA','GAZIM');
Insert into Assureur values(Default,'BSA GIZ','BSA','GIZ');
Insert into Assureur values(Default,'BSA HKJURFIS','BSA','HKJURFIS');
Insert into Assureur values(Default,'BSA MEAR-MALSHIP','BSA','MEAR-MALSHIP');
Insert into Assureur values(Default,'BSA NEWREST','BSA','NEWREST');
Insert into Assureur values(Default,'BSA M&C AVIATION ','BSA','M&C AVIATION');
Insert into Assureur values(Default,'BSA SYMRISE','BSA','SYMRISE');
Insert into Assureur values(Default,'BSA VIACONS','BSA','VIACONS');
Insert into Assureur values(Default,'BSA VIVO','BSA','VIVO');
Insert into Assureur values(Default,'BSA HOLCIM','BSA','HOLCIM');
Insert into Assureur values(Default,'BSA AIDE & ACTION','BSA','AIDE & ACTION');
Insert into Assureur values(Default,'BSA JSI-CBIHP','BSA','JSI-CBIHP');
Insert into Assureur values(Default,'BSA MC3','BSA','MC3');
Insert into Assureur values(Default,'BSA QTE M/CAR','BSA','QTE M/CAR');
Insert into Assureur values(Default,'BSA SEPM','BSA','SEPM');
Insert into Assureur values(Default,'BSA SFOI','BSA','SFOI');
Insert into Assureur values(Default,'BSA ZEUS','BSA','ZEUS');
Insert into Assureur values(Default,'BSA ACCES BANQUE','BSA','ACCES BANQUE');
Insert into Assureur values(Default,'BSA BOCASAY','BSA','BOCASAY');
Insert into Assureur values(Default,'BSA ACTIVE ASSURANCE','BSA','ACTIVE ASSURANCE');
Insert into Assureur values(Default,'BSA CARE','BSA','CARE');
Insert into Assureur values(Default,'BSA FILATEX','BSA','FILATEX');
Insert into Assureur values(Default,'BSA AIRESPRO','BSA','AIRESPRO');
Insert into Assureur values(Default,'BSA MCHIP','BSA','MCHIP');
Insert into Assureur values(Default,'BSA PASSION FOR HUMANITY','BSA','PASSION FOR HUMANITY');
Insert into Assureur values(Default,'BSA WEBHELP','BSA','WEBHELP');
Insert into Assureur values(Default,'BSA INT.SOS','BSA','INT.SOS');
Insert into Assureur values(Default,'BSA AVIATION M/CAR','BSA','AVIATION M/CAR');
Insert into Assureur values(Default,'BSA CANAL PLUS','BSA','CANAL PLUS');
Insert into Assureur values(Default,'BSA CMT','BSA','CMT');
Insert into Assureur values(Default,'BSA EXCEL SERVICE','BSA','EXCEL SERVICE');
Insert into Assureur values(Default,'BSA FDL','BSA','FDL');
Insert into Assureur values(Default,'BSA FIARO','BSA','FIARO');
Insert into Assureur values(Default,'BSA FUTURMAP','BSA','FUTURMAP');
Insert into Assureur values(Default,'BSA GRET M/CAR','BSA','GRET M/CAR');
Insert into Assureur values(Default,'BSA KIMA','BSA','KIMA');
Insert into Assureur values(Default,'BSA BRICOBAT','BSA','BRICOBAT');
Insert into Assureur values(Default,'BSA ONT','BSA','ONT');
Insert into Assureur values(Default,'BSA PERSONA','BSA','PERSONA');
Insert into Assureur values(Default,'BSA SOMAPHAR','BSA','SOMAPHAR');
Insert into Assureur values(Default,'BSA TOTAL','BSA','TOTAL');
Insert into Assureur values(Default,'BSA TRANS OCEAN','BSA','TRANS OCEAN');
Insert into Assureur values(Default,'BSA ADER','BSA','ADER');
Insert into Assureur values(Default,'BSA AIRPORTS','BSA','AIRPORTS');
Insert into Assureur values(Default,'BSA AMBAFRSU','BSA','AMBAFRSU');
Insert into Assureur values(Default,'BSA ASA','BSA','ASA');
Insert into Assureur values(Default,'BSA BIODO','BSA','BIODO');
Insert into Assureur values(Default,'BSA OPERATION SMILE','BSA','OPERATION SMILE');
Insert into Assureur values(Default,'BSA CAMANE(MADINTER)','BSA','CAMANE(MADINTER)');
Insert into Assureur values(Default,'BSA ETP','BSA','ETP');
Insert into Assureur values(Default,'BSA ETECH','BSA','ETECH');
Insert into Assureur values(Default,'BSA FTHM','BSA','FTHM');
Insert into Assureur values(Default,'BSA NUMEN (DIAD)','BSA','NUMEN (DIAD)');
Insert into Assureur values(Default,'BSA SALAMA','BSA','SALAMA');
Insert into Assureur values(Default,'BSA US EMBASSY','BSA','US EMBASSY');
Insert into Assureur values(Default,'BSA OSO F','BSA','OSO F');
Insert into Assureur values(Default,'BSA AURLAC','BSA','AURLAC');
Insert into Assureur values(Default,'BSA AFI','BSA','AFI');
Insert into Assureur values(Default,'BSA APMF','BSA','APMF');
Insert into Assureur values(Default,'BSA AFRO','BSA','AFRO');
Insert into Assureur values(Default,'BSA BASAN','BSA','BASAN');
Insert into Assureur values(Default,'BSA CICR','BSA','CICR');
Insert into Assureur values(Default,'BSA MADOIL','BSA','MADOIL');
Insert into Assureur values(Default,'BSA NOVOCOM','BSA','NOVOCOM');
Insert into Assureur values(Default,'BSA NZZ','BSA','NZZ');
Insert into Assureur values(Default,'BSA SIPEM','BSA','SIPEM');
Insert into Assureur values(Default,'BSA R KOTOM','BSA','R KOTOM');
Insert into Assureur values(Default,'BSA ABT ASSOCIATES','BSA','ABT ASSOCIATES');
Insert into Assureur values(Default,'BSA Catholics RS','BSA','Catholics RS');
Insert into Assureur values(Default,'BSA LEXEL','BSA','LEXEL');
Insert into Assureur values(Default,'BSA HAMAC','BSA','HAMAC');
Insert into Assureur values(Default,'BSA MAUVILAC','BSA','MAUVILAC');
Insert into Assureur values(Default,'BSA NOKIA','BSA','NOKIA');
Insert into Assureur values(Default,'BSA ODITY','BSA','ODITY');
Insert into Assureur values(Default,'BSA PWC','BSA','PWC');
Insert into Assureur values(Default,'BSA SOLIDIS GARANTIE','BSA','SOLIDIS GARANTIE');
Insert into Assureur values(Default,'BSA WORLD TRADE CENTER','BSA','WORLD TRADE CENTER');
Insert into Assureur values(Default,'BSA ALGIM','BSA',' ALGIM');
Insert into Assureur values(Default,'BSA CARLTON','BSA','CARLTON');
Insert into Assureur values(Default,'BSA HAREL MALLAC','BSA','HAREL MALLAC');
Insert into Assureur values(Default,'BSA HATCH','BSA','HATCH');
Insert into Assureur values(Default,'BSA HAIRUN','BSA','HAIRUN');
Insert into Assureur values(Default,'BSA LINKEO','BSA','LINKEO');
Insert into Assureur values(Default,'BSA AGGREKO','BSA','AGGREKO');
Insert into Assureur values(Default,'BSA MADACAN','BSA','MADACAN');
Insert into Assureur values(Default,'BSA METRO','BSA','METRO');
Insert into Assureur values(Default,'BSA MFTP','BSA','MFTP');
Insert into Assureur values(Default,'BSA MICROCRED','BSA','MICROCRED');
Insert into Assureur values(Default,'BSA PACTMADA','BSA','PACTMADA');
Insert into Assureur values(Default,'BSA UATA22','BSA','UATA22');
Insert into Assureur values(Default,'BSA AQUALMA','BSA','AQUALMA');
Insert into Assureur values(Default,'BSA TERRA NITIDAE','BSA','TERRA NITIDAE');
Insert into Assureur values(Default,'BSA DYNATEC M/CAR','BSA','DYNATEC M/CAR');
Insert into Assureur values(Default,'BSA GRAS SAVOYE','BSA','GRAS SAVOYE');
Insert into Assureur values(Default,'BSA ILS','BSA','ILS');
Insert into Assureur values(Default,'BSA MADECASSE','BSA','MADECASSE');
Insert into Assureur values(Default,'BSA NEXX','BSA','NEXX');
Insert into Assureur values(Default,'BSA SICAM','BSA','SICAM');
Insert into Assureur values(Default,'BSA SYMURGH','BSA','SYMURGH');
Insert into Assureur values(Default,'BSA CMAR','BSA','CMAR');
Insert into Assureur values(Default,'BSA VELOPTIC','BSA','VELOPTIC');
Insert into Assureur values(Default,'MCI CARE AUSTRAL TURBOMACHINE','MCI CARE','AUSTRAL TURBOMACHINE (catégorie 3)');
Insert into Assureur values(Default,'BGFI BANK BGFI ','MCI CARE','BGFI BANK');
Insert into Assureur values(Default,'MCI CARE DG BGFI  ','MCI CARE','DG BGFI ');
Insert into Assureur values(Default,'MCI CARE DHL INTERNATIONAL','MCI CARE','DHL INTERNATIONAL');
Insert into Assureur values(Default,'MCI CARE ERNEST & YOUNG','MCI CARE','ERNEST & YOUNG');
Insert into Assureur values(Default,'MCI CARE GIVAUDAN INTERNATIONAL','MCI CARE','GIVAUDAN INTERNATIONAL');
Insert into Assureur values(Default,'MCI CARE HOLCIM ANTSIRABE','MCI CARE','HOLCIM ANTSIRABE');
Insert into Assureur values(Default,'MCI CARE HOLCIM TOAMASINA ','MCI CARE','HOLCIM TOAMASINA');
Insert into Assureur values(Default,'MCI CARE JOVENNA','MCI CARE','JOVENNA');
Insert into Assureur values(Default,'MCI CARE JOVENA DIRECTEURS','MCI CARE','JOVENA DIRECTEURS');
Insert into Assureur values(Default,'MCI CARE PAMF','MCI CARE','PAMF');
Insert into Assureur values(Default,'MCI CARE TELMA','MCI CARE','TELMA');
Insert into Assureur values(Default,'MCI CARE TELMA VIP-DIRECTION ','MCI CARE','TELMA VIP-DIRECTION');
Insert into Assureur values(Default,'MCI CARE BASE TOLIARA','MCI CARE','BASE TOLIARA ');
Insert into Assureur values(Default,'MCI CARE GROUPE AXIAN','MCI CARE','GROUPE AXIAN (AITS-TOM-ASS-EDM-FIRST IMMO-CONNECTEO-WE LIGHT)');
Insert into Assureur values(Default,'MCI CARE ONG ASMAE','MCI CARE','ONG ASMAE ');
Insert into Assureur values(Default,'MCI CARE SOBATRA ','MCI CARE','SOBATRA');
Insert into Assureur values(Default,'MCI CARE TAG IP','MCI CARE','TAG IP ');
Insert into Assureur values(Default,'MCI CARE EUROSIA','MCI CARE','EUROSIA ');
Insert into Assureur values(Default,'MCI CARE SAGECOM','MCI CARE','SAGECOM');
Insert into Assureur values(Default,'MCI CARE EQUATION-FTHM','MCI CARE','EQUATION-FTHM');
Insert into Assureur values(Default,'MCI CARE EQUATION- OBS','MCI CARE','EQUATION- OBS');
Insert into Assureur values(Default,'MCI CARE TRIMETA ','MCI CARE','TRIMETA');
Insert into Assureur values(Default,'MCI CARE MCB','MCI CARE','MCB');
Insert into Assureur values(Default,'MCI CARE RAZAFINDRAKOTO FALIHERY ','MCI CARE','RAZAFINDRAKOTO FALIHERY');
Insert into Assureur values(Default,'MCI CARE EASY TECH  60%','MCI CARE','EASY TECH  60% ');
Insert into Assureur values(Default,'MCI CARE EASY TECH  80%','MCI CARE','EASY TECH  80% ');
Insert into Assureur values(Default,'MCI CARE GROUPE SANIFER','MCI CARE','GROUPE SANIFER (SANIFER 1-SANIFER 2- SANIFER 3-STMB-ARTEMIS-CINEPAX-TAMBOHO BOUTIK-TAMBOHO SUITE-GROUPE TALYS)');
Insert into Assureur values(Default,'MCI CARE DIRECTEUR STMB','MCI CARE','DIRECTEUR STMB (Famille Mr GOULAMABASSE)');
Insert into Assureur values(Default,'MCI CARE SIMAD','MCI CARE','SIMAD (Famille RAMAHOLISON Eva)');
Insert into Assureur values(Default,'MCI CARE MILLOT SA','MCI CARE','MILLOT SA');
Insert into Assureur values(Default,'MCI CARE MEDICAL INTERNATIONAL','MCI CARE','MEDICAL INTERNATIONAL');
Insert into Assureur values(Default,'MCI CARE MADCOM SARL','MCI CARE','MADCOM SARL');
Insert into Assureur values(Default,'MCI CARE Mr ARNOU PHILIPPE JEAN','MCI CARE','Mr ARNOU PHILIPPE JEAN');
Insert into Assureur values(Default,'MCI CARE RAVALOMANANA EJA HARINIRINA','MCI CARE','RAVALOMANANA EJA HARINIRINA');
Insert into Assureur values(Default,'MCI CARE CRIF MADAGASCAR','MCI CARE','CRIF MADAGASCAR');
Insert into Assureur values(Default,'MCI CARE TAMBOHO EXPLOITATION','MCI CARE','TAMBOHO EXPLOITATION');
Insert into Assureur values(Default,'MCI CARE ','MCI CARE','MADAME ANDRIANOELISON HERY MIADANA');
Insert into Assureur values(Default,'MCI CARE MADAME ANDRIANOELISON HERY MIADANA','MCI CARE','');
Insert into Assureur values(Default,'MCI CARE ORANGE MADAGASCAR/ ORANGE MONEY','MCI CARE','ORANGE MADAGASCAR/ ORANGE MONEY');
Insert into Assureur values(Default,'MCI CARE RABEZANAHARY ANJA','MCI CARE','RABEZANAHARY ANJA');
Insert into Assureur values(Default,'MCI CARE ONG TAOTSARA','MCI CARE','ONG TAOTSARA');
Insert into Assureur values(Default,'MCI CARE HENRI CARINE','MCI CARE','HENRI CARINE');
Insert into Assureur values(Default,'MCI CARE SYMBION POWER (OPTION 2)','MCI CARE','SYMBION POWER (OPTION 2)');
Insert into Assureur values(Default,'MCI CARE SYMBION POWER (OPTION 1)','MCI CARE','SYMBION POWER (OPTION 1)');
Insert into Assureur values(Default,'MCI CARE VIVETIC -COLLEGE AGENTS DE MAITRISE','MCI CARE','VIVETIC -COLLEGE AGENTS DE MAITRISE');
Insert into Assureur values(Default,'MCI CARE VIVETIC-COLLEGE CADRE','MCI CARE','VIVETIC-COLLEGE CADRE');
Insert into Assureur values(Default,'MCI CARE SOCOTA','MCI CARE','SOCOTA');
Insert into Assureur values(Default,'MCI CARE INITIATIVES INTERNATIONAL','MCI CARE','INITIATIVES INTERNATIONAL');
Insert into Assureur values(Default,'MCI CARE INSUCU MADAGASCAR - TOAMASINA','MCI CARE','INSUCU MADAGASCAR - TOAMASINA');
Insert into Assureur values(Default,'MCI CARE INSUCU MADAGASCAR -TANA','MCI CARE','INSUCU MADAGASCAR -TANA');
Insert into Assureur values(Default,'MCI CARE GROUPE BASAN -COLLEGE DIRECTEUR AUTOFIN. (Famille RAKOTOARISON JEAN MARIE & FAMILLE RAKOTONDRAZAKA ROVATIANA LALAINA)','MCI CARE','GROUPE BASAN -COLLEGE DIRECTEUR AUTOFIN. (Famille RAKOTOARISON JEAN MARIE & FAMILLE RAKOTONDRAZAKA ROVATIANA LALAINA )');
Insert into Assureur values(Default,'MCI CARE GROUPE BASAN COLLEGE MANAGER','MCI CARE','GROUPE BASAN COLLEGE MANAGER');
Insert into Assureur values(Default,'MCI CARE GROUPE BASAN COLLEGE CADRE','MCI CARE','GROUPE BASAN COLLEGE CADRE');
Insert into Assureur values(Default,'MCI CARE GROUPE BASAN(J.B - LECOFRUIT-OIM-OIM EXPORT-OMNIVEST)','MCI CARE','GROUPE BASAN (J.B - LECOFRUIT-OIM-OIM EXPORT-OMNIVEST)');
Insert into Assureur values(Default,'MCI CARE GROUPE BASAN-COLLEGE DIRECTEURS','MCI CARE','GROUPE BASAN - COLLEGE DIRECTEURS');
Insert into Assureur values(Default,'MCI CARE RAZAFIMAHEFA NATHALIE','MCI CARE','RAZAFIMAHEFA NATHALIE');
Insert into Assureur values(Default,'MCI CARE WRI','MCI CARE','WRI');
Insert into Assureur values(Default,'MCI CARE SOGEDIPROMA  COLLEGE 80%','MCI CARE','SOGEDIPROMA  COLLEGE 80%');
Insert into Assureur values(Default,'MCI CARE SOGEDIPROMA COLLEGE 90%','MCI CARE','SOGEDIPROMA COLLEGE 90%');
Insert into Assureur values(Default,'MCI CARE MADAMA RATSARAMALAZAVOLA NATHALIE','MCI CARE','MADAMA RATSARAMALAZAVOLA NATHALIE');
Insert into Assureur values(Default,'MCI CARE TAKASAGO MADAGASCAR SA','MCI CARE','TAKASAGO MADAGASCAR SA');
Insert into Assureur values(Default,'MCI CARE AERIAL METRIC','MCI CARE','AERIAL METRIC');
Insert into Assureur values(Default,'MCI CARE ENAC','MCI CARE','ENAC');
Insert into Assureur values(Default,'MCI CARE BUY YOUR WAY','MCI CARE','BUY YOUR WAY');
Insert into Assureur values(Default,'MCI CARE DEMAD','MCI CARE','DEMAD');
Insert into Assureur values(Default,'MCI CARE ARAWAK','MCI CARE','ARAWAK');
Insert into Assureur values(Default,'MCI CARE INGENOSYA','MCI CARE','INGENOSYA');
Insert into Assureur values(Default,'MCI CARE RAKOTOARINALA TOKY','MCI CARE','RAKOTOARINALA TOKY');
Insert into Assureur values(Default,'MCI CARE RAKOTOMALALA SYLVIANE TIANA','MCI CARE','RAKOTOMALALA SYLVIANE TIANA');
Insert into Assureur values(Default,'MCI CARE CGHV','MCI CARE','CGHV');
Insert into Assureur values(Default,'MCI CARE PHARMACIE HARY SOA','MCI CARE','PHARMACIE HARY SOA');
Insert into Assureur values(Default,'MCI CARE Mr PHILIPPLE THIERRY ','MCI CARE','Mr PHILIPPLE THIERRY');
Insert into Assureur values(Default,'MCI CARE UPNNC','MCI CARE','UPNNC');
Insert into Assureur values(Default,'MCI CARE LE CLEZIO','MCI CARE','LE CLEZIO');
Insert into Assureur values(Default,'MCI CARE PAGOSE','MCI CARE','PAGOSE');	
Insert into Assureur values(Default,'NY HAVANA ANALAKELY','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA ACTII ANKORONDRANO','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA ACTIII AMBATOMENA ','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA CAP 3000 ANDRAHARO','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA CMAR 67 Ha','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA ACT 02	67Ha','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA APMF	67 Ha','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA SAMASS AMPANDRANA','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA MINORIS AMBOHIBAO','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA ITAOSY','NY HAVANA','');
Insert into Assureur values(Default,'NY HAVANA TSIAZOTAFO','NY HAVANA','');
Insert into Assureur values(Default,'MADAUTO','MADAUTO','');
Insert into Assureur values(Default,'MSH INTERANTIONAL','MSH INTERANTIONAL','');
Insert into Assureur values(Default,'OSTIE','OSTIE','');
Insert into Assureur values(Default,'SONAPAR','SONAPAR','');
Insert into Assureur values(Default,'WWF','WWF','');
Insert into Assureur values(Default,'UGIP','UGIP','');
Insert into Assureur values(Default,'BOA','BOA','');
Insert into Assureur values(Default,'BCM','BCM','');
Insert into Assureur values(Default,'ARO','ARO','');
Insert into Assureur values(Default,'BNI','BNI','');
Insert into Assureur values(Default,'CEM','CEM','');
Insert into Assureur values(Default,'ASCOMA','ASCOMA','');
Insert into Assureur values(Default,'COLAS','COLAS','');
Insert into Assureur values(Default,'CNAPS','CNAPS','');
Insert into Assureur values(Default,'JIRAMA','JIRAMA','');






create view chart as SELECT assurance,count(assurance) FROM assureur group by assurance;

SELECT COUNT(id), assurance
FROM assureur
GROUP BY assurance
ORDER BY COUNT(id) DESC;

SELECT COUNT(code), assurance
FROM assureur
GROUP BY assurance
ORDER BY COUNT(code) DESC;










/*create sequence Assureur_sequence;
--yesterday
SELECT NOW() - INTERVAL '1 DAY';

--Unrelated to the question, but PostgreSQL also supports some shortcuts:
SELECT 'yesterday'::TIMESTAMP, 'tomorrow'::TIMESTAMP, 'allballs'::TIME;

<input type="date" name="date" placeholder="YYYY-MM-DD"  
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" />
*/


Insert into Facture values(Default,'03/15/045','2015-03-17','2015-07-16','1182 N323','Andrianjafiharivelo Herisoa',263000,'PAYE',213,'CHEQUE','CHQ BOA N0030142');
Insert into Facture values(Default,'03/15/046','2015-03-17','2015-07-16','1181 N322','Andrihanjafiarivelo Johnson',312000,'PAYE',213,'CHEQUE','CHQ BOA N0030142');
Insert into Facture values(Default,'03/15/047','2015-03-17','2015-07-16','LA CITY N226','Rakotomalala Tiana',312000,'PAYE',213,'CHEQUE','CHQ BOA N0030142');
Insert into Facture values(Default,'03/15/054','2015-03-20','2015-07-20','1202 N290','Andriamanantsoa Raphael',197000,'PAYE',213,'CHEQUE','CHQ BOA N0030142');
Insert into Facture values(Default,'03/15/055','2015-03-20','2015-07-20','1203 N441','Andriamanantsoa Manoa',197000,'PAYE',213,'CHEQUE','CHQ BOA N0030142');
Insert into Facture values(Default,'03/15/056','2015-03-20','2015-07-20','1205 N353','Andriamanantsoa Lalaina',257000,'PAYE',213,'CHEQUE','CHQ BOA N0030142');
Insert into Facture values(Default,'03/15/051','2015-03-19','2015-07-19','1102 N002/2015 082','Rakotoniaina Jedy',250000,'PAYE',218,'CHEQUE','CHQ BFV N25640606');
Insert into Facture values(Default,'03/15/009','2015-03-10','2015-07-16','936 N0181880','Razafimboahangy Robine',194000,'PAYE',212,'VIREMENT',null);
Insert into Facture values(Default,'03/15/006','2015-03-06','2015-07-16','1121 49112/15','Ratafika Andrianaivo Andrianina',467136,'PAYE',211,'CHEQUE','CHQ BMOI N62504932');
Insert into Facture values(Default,'03/15/022','2015-07-16','2015-07-16','9619373/15','Rajaonson Lova',1047600,'PAYE',211,'CHEQUE','CHQ BMOI N62504932');
Insert into Facture values(Default,'03/15/042','2015-03-16','2015-07-16','961 N49373/15','Ramiandrisoa Norella',161000,'PAYE',211,'CHEQUE','CHQ BMOI N62504932');
Insert into Facture values(Default,'03/15/033','2015-03-16','2015-07-16','1184 N49328/15','Randrianasolo Mamy',300000,'PAYE',215,'CHEQUE',null);
Insert into Facture values(Default,'03/15/036','2015-03-16','2015-07-16','1031 N51/GB/08.15.18L','Randrianasolo Haritiana',300000,'PAYE',215,'CHEQUE',null);
Insert into Facture values(Default,'03/15/066','2015-03-16','2015-07-16','1224 NBI/GB/02.15.17L','Maheriniaina Miarintsoa',300000,'PAYE',215,'CHEQUE',null);
Insert into Facture values(Default,'04/15/012','2015-03-16','2015-07-16','44/OPT/AV','Randriamananjara Haja',300000,'PAYE',219,'CHEQUE',null);
Insert into Facture values(Default,'04/15/011','2015-03-16','2015-07-16','35/OPT/12','Randriamboavonjy Fanasina',300000,'PAYE',219,'CHEQUE',null);
Insert into Facture values(Default,'03/15/069','2015-03-16','2015-07-16','1043 67375','Andriamananjaona Madison',300000,'PAYE',203,'CHEQUE',null);
Insert into Facture values(Default,'03/15/080','2015-011-16','2015-07-16','1277 26087','Rajaona Michel',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'04/15/013','2015-01-16','2015-07-16','1255 1031011','Rajhonson Manitra',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'04/15/016','2015-01-16','2015-07-16','1305 49015','Randriamarivony Rojo',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'04/15/014','2015-01-16','2015-07-16','USAID 21973','Razafimahatratra Solomiaina',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'04/15/015','2015-01-16','2015-07-16','USAID 21970','Razafimahatratra Tiana',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'04/15/023','2015-01-16','2015-07-16','1242','Rajaona Henika',300000,'PAYE',220,'CHEQUE',null);
Insert into Facture values(Default,'04/15/024','2015-07-16','2015-07-16','1330 N2015/325 PR DRH','Raharison Valentine',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'04/15/022','2015-07-16','2015-07-16','1331 N15914 telma','Ralalarisoa Sylvie Heritiana',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'04/15/034','2015-07-16','2015-07-16','1150 SIM 49334/15','Andrianindrina Rica Ny Aina',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'04/15/035','2015-07-16','2015-07-16','1140 SIM 49334/15','Ranarivelo Hanitriniaina Lalatiana',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'04/15/033','2015-07-16','2015-07-16','1183 490384','Andriamahantsoa Claude',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'04/15/052','2015-07-16','2015-07-16','1206 288 PR DRH','Ramiandrisoa Bako',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'04/15/011','2015-07-16','2015-07-16','1261','Rajaonarivelo Lucien',300000,'PAYE',203,'CHEQUE',null);
Insert into Facture values(Default,'04/15/012','2015-07-16','2015-07-16','482 PR DRH','Randriamboavonjy Fanasina',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'04/15/061','2015-07-16','2015-07-16','1262','Randriamananjara Haja',300000,'PAYE',219,'CHEQUE',null);
Insert into Facture values(Default,'04/15/060','2015-07-16','2015-07-16','1262','Rakotondramivo Onella',300000,'PAYE',219,'CHEQUE',null);
Insert into Facture values(Default,'05/15/019','2015-07-16','2015-07-16','1118 302 PR','Raharivelotseheno Rado',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'05/15/010','2015-07-16','2015-07-16','1117 304 PR','Toky Basilide',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'05/15/010','2015-07-16','2015-07-16','1425 40/085','Randimbinirainy Kanto Malala',300000,'PAYE',219,'CHEQUE',null);
Insert into Facture values(Default,'05/15/015','2015-07-16','2015-07-16','19321','Ramarosaona Laurianne',300000,'PAYE',218,'VIREMENT',null);
Insert into Facture values(Default,'05/15/016','2015-07-16','2015-07-16','1138 N349PR','Randimbinirainy Itokiana Luc',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'05/15/034','2015-07-16','2015-07-16','LA CITY N769PR','Andriantsoa Zoly',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'05/15/016','2015-07-16','2015-07-16','LA CITY 767PR','Robinson Norosaholy',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'05/15/017','2015-07-16','2015-07-16','1563 N0185088','Razafindratsito Haina Miantsa',300000,'PAYE',212,'CHEQUE',null);
Insert into Facture values(Default,'05/15/030','2015-07-16','2015-07-16','1471 N011021','Rasoanaivo Onitiana',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'05/15/009','2015-07-16','2015-07-16','14712 N011021','Randrianjara Fara',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'05/15/029','2015-07-16','2015-07-16','14713 N011021','Lina Zizy Aimee',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'05/15/011','2015-07-16','2015-07-16','14712e2 N011021','Ravelotahiana Noelson',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'05/15/024','2015-07-16','2015-07-16','1471232 N011021','Rasolofomanana Helianja',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'05/15/028','2015-07-16','2015-07-16','1471425256 N011021','Razaimanoro Marcelle',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'06/15/001','2015-07-16','2015-07-16','14714312 N011021','Ralaiarivony Jacqueline',300000,'PAYE',192,'CHEQUE',null);
Insert into Facture values(Default,'06/15/002','2015-07-16','2015-07-16','14714566 N011021','Rajerison Dominique',300000,'PAYE',203,'CHEQUE',null);
Insert into Facture values(Default,'06/15/004','2015-07-16','2015-07-16','1471111 N011021','Rakotondravony Tsitohaina',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'06/15/005','2015-07-16','2015-07-16','1471322 N011021','Randriamifidy Francia Sariaka',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'06/15/002','2015-07-16','2015-07-16','147134667 N011021','Andriamifidy Alain',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'06/15/004','2015-07-16','2015-07-16','14767971 N011021','Rkotondratovo Harry',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'06/15/006','2015-07-16','2015-07-16','14717897 N011021','Rakotosalama Mema',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'06/15/007','2015-07-16','2015-07-16','14715464 N011021','Rasamoelina Mandimbiniaina Josette',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'06/15/010','2015-07-16','2015-07-16','14716758 N011021','Tsiorifitiavana Andoniaina',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'06/15/006','2015-07-16','2015-07-16','1479801 N011021','Raharimalala Laurence',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'06/15/007','2015-07-16','2015-07-16','147179890 N011021','Andriamihaja Andriantsiory',300000,'PAYE',219,'CHEQUE',null);
Insert into Facture values(Default,'06/15/010','2015-07-16','2015-07-16','147678689 N011021','Randrianandrasana Arisoa',300000,'PAYE',219,'CHEQUE',null);
Insert into Facture values(Default,'06/15/006','2015-07-16','2015-07-16','14712345 N011021','Andriamiharisoa  Dina Finoana',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'06/15/007','2015-07-16','2015-07-16','1471231 N011021','Rajoelison Josette',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'06/15/028','2015-07-16','2015-07-16','14712121 N011021','Andrianarimanga Davidson',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'06/15/029','2015-07-16','2015-07-16','14715647 N011021','Ralison Rakotoson Hery',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'07/15/004','2015-07-16','2015-07-16','147158 N011021','Ralijaona Floriano',300000,'PAYE',192,'CHEQUE',null);
Insert into Facture values(Default,'07/15/005','2015-07-16','2015-07-16','147187568 N011021','Rasoharivelo Ismaelle Rayanne',300000,'PAYE',221,'CHEQUE',null);
Insert into Facture values(Default,'07/15/010','2015-07-16','2015-07-16','147156756856 N011021','Raobelina',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'07/15/025','2015-07-16','2015-07-16','1471 N011021','Randria Hazavana',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'07/15/037','2015-08-16','2015-07-16','1471346547 N011021','Razanamasoa Perline',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'07/15/033','2015-08-16','2015-07-16','147136445 N011021','Ravaovary Jeanette',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'07/15/022','2015-08-16','2015-07-16','14714523 N011021','Rantoarivelo Benja',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'07/15/024','2015-08-16','2015-07-16','147163432 N011021','Ramanoelina Sesena',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'07/15/023','2015-08-16','2015-07-16','14715875685 N011021','Ratsaratoetra Zo',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'07/15/022','2015-08-16','2015-07-16','14716 N011021','Harimbolatsoa Andry',300000,'PAYE',221,'CHEQUE',null);
Insert into Facture values(Default,'09/15/054','2015-06-16','2015-07-16','567575 N011021','Raobelina Harimbolatsoa',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'09/15/055','2015-06-16','2015-07-16','1471564675 N011021','Ny Hasina Tiavina',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'09/15/052','2015-06-16','2015-07-16','1471324 635N011021','Ranjakasoa Marco',300000,'PAYE',215,'CHEQUE',null);
Insert into Facture values(Default,'09/15/051','2015-06-16','2015-07-16','14714564567 N011021','Rajoelina Andry',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'07/15/035','2015-05-16','2015-07-16','1471857 N011021','Ravalomanana Marc',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'07/15/044','2015-05-16','2015-07-16','14785851 N011021','CHUK HEN SHUN MARC',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'08/15/011','2015-05-16','2015-07-16','14717585685 N011021','Raobelina David',300000,'PAYE',219,'CHEQUE',null);
Insert into Facture values(Default,'08/15/012','2015-05-16','2015-07-16','1471 679568 N011021','CHUK HEN SHUN KARINE',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'08/15/027','2015-10-16','2015-07-16','1471345345 N011021','Merimandimby Davidson',300000,'PAYE',210,'CHEQUE',null);
Insert into Facture values(Default,'07/15/048','2015-10-16','2015-07-16','1471535534 N011021','CHUK HEN SHUN KEVIN',300000,'PAYE',218,'CHEQUE',null);
Insert into Facture values(Default,'08/15/056','2015-10-16','2015-07-16','14713453534 N011021','Razanabary Miarantiana',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'08/15/057','2015-10-16','2015-07-16','14713456 N011021','Fanomezantso Avo',300000,'PAYE',213,'CHEQUE',null);
Insert into Facture values(Default,'09/15/066','2015-11-16','2015-07-16','1471685 N011021','Rafanaperana Gertrude',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'09/15/071','2015-11-16','2015-07-16','1471-977 N011021','Rabarisoa Miora Fanantenana',300000,'PAYE',211,'CHEQUE',null);
Insert into Facture values(Default,'09/15/050','2015-12-16','2015-07-16','147186 N011021','Ralobo BOLO',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'10/15/006','2015-12-16','2015-07-16','1471-09 N011021','Rabarifenitra Mika',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'10/15/013','2015-12-16','2015-07-16','147180-67 N011021','Randriatsalama Tinasoa',300000,'PAYE',214,'CHEQUE',null);
Insert into Facture values(Default,'10/15/009','2015-12-16','2015-07-16','14718789 N011021','Rabekoto Tefihaja',300000,'PAYE',214,'CHEQUE',null);





create table events(
    id serial primary key not null,
    titre varchar(200),
    start timestamp default now(),
    fin timestamp
);