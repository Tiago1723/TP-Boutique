


liste des event:

- afficher la list des event par ville : 

    SELECT * FROM `list` WHERE `Commune principale de déroulement` = ?

- afficher le nom avec le lieux : 

    SELECT `﻿Nom du festival`, `Région principale de déroulement` FROM `list`

- choisire un style de music  : 

    SELECT * FROM `list` WHERE `Sous-catégorie musique` LIKE '%?%' AND `Discipline dominante` = 'music';

- lister les style de musique 

    d

- lister les lieux des event

    SELECT `Commune principale de déroulement` FROM `list`