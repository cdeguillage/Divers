INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Peugeot', '807', 'noir', 'AB-355-CA');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Citroen', 'C8', 'bleu', 'CE-122-AE');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Mercedes', 'Cls', 'vert', 'FG-953-HI');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Volkswagen', 'Touran', 'noir', 'SO-322-NV');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Skoda', 'Octavia', 'gris', 'PB-631-TK');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Volkswagen', 'Passat', 'gris', 'XN-973-MM');

INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Julien', 'Avigny');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Morgane', 'Alamia');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Philippe', 'Pandre');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Amelie', 'Blondelle');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Alex', 'Richy');

INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('501', '1');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('502', '2');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('503', '3');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('504', '4');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('501', '3');
