<?php

namespace Webkul\GSN\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class syncData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
            //
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `attribute_id` = 32 ");
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 3 ");
            // INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '267');
             // 3 => compta
            // compta precompta
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '444');");
            // Rapprochement bancaire et lettrage
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '32');");
            // Module de facturation compatible facturation électronique
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '37');");
            // Gestion de l'IR
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '39');");
            // Gestion des notes de frais
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '40');");
            // Module OCR intégré
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '41');");
            // Prévisionnels de budget
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '46');");
            // Utilise un RPA (robotic Process Automation)
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '51');");
            // Intègre une solution IA
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '52');");
            // Import de données
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '349');");
            // Export de données personnalisable
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '385');");
            // Intégration bureautique type Excel ou Power BI
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '60');");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '82');");
            $this->info(string: "end");
            //  4 => social rh
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 4 ");
            // Gestion de la paie
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '320');");
            // Gestion des temps de travail
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '101');");
            // Gestion des carrieres et entretiens
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '104');");
            // Gestion des notes de frais
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '40');");
            // Bilan social
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '106');");
            // Modèle de paie par catégories de salariés
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '107');");
            // Déclaration préalable à l'embauche
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '108');");
            // Coffre-fort électronique et archivage électronique des bulletins de paie
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '111');");
            // Démarrage des dossiers en cours d'année (import de DSN)
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '120');");
            // Génération des écritures comptables de Paie
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '132');");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('4', '138');");

            // $
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 8 ");
            // Contrôle des FEC
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '225');");
            // Génération automatisée du compte-rendu de mission
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '226');");
            // Importation de la liasse fiscale
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '229');");
            // Gestion des formalités juridiques (création / modification)
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '232');");
            // Gestion des AG
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '233');");
            // Recouvrement de créances
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '235');");
            // Rédaction, analyse de documents juridiques
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '236');");
            // Gestion des contrats
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '239');");
            // Génération des lettres de mission
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '241');");
            // Intègre une solution IA
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '52');");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('8', '138');");


            // $
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 12 ");
            // Solution d'archivage électronique (SAE)
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '303');");
            // Solution d'archivage électronique à valeur probante
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '304');");
            // Solution de signature électronique
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '305');");
            // Télétransmissions fiscales
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '311');");
            // télétransmissions sociales
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '312');");
            // Récupération des relevés bancaires
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '313');");
            // Intègre une solution IA
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '52');");
            // Certifié eIDAS
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '315');");
            DB::statement(query:"update `attribute_translations` set `name` = 'Certifié eIDAS' where `id` = 629");
            DB::statement(query:"update `attribute_translations` set `name` = 'Certifié eIDAS' where `id` = 630");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('12', '138');");



            // $
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 5 ");
            // Importation et exploitation d'Open data
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '159');");
            // Datavisualisation / tableaux de bord
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '160');");
            // Comparaison sectorielle
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '161');");
            // Rapports personnalisables
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '163');");
            // Module prédictif
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '166');");
            // Intègre une solution IA
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '52');");
            // API disponibles
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '330');");
            // Interconnexions à des sources de données
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '172');");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('5', '138');");



            // $
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 6 ");
            // Gestion des clients
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '175');");
            // Historique des interactions
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '178');");
            // Relance automatique des tâches
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '180');");
            // Gestion des devis
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '181');");
            // Création des factures
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '182');");
            // Gestion des paiements
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '184');");
            // Génération des lettres de mission
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '241');");
            // Gestion des temps
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '195');");
            // gestion multi sites
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '198');");
            // Interopérable avec un logiciel de comptabilité
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '204');");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('6', '138');");

            // $
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 9 ");
            // Crée ou transforme une facture au format Factur-X
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '242');");
            // Peut émettre et recevoir des factures hors périmètre du e-invoicing (B2B international, B2C, non assujettis)
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '245');");
            // Peut envoyer et recevoir des factures électroniques sous des formats autres que ceux du Socle minimal
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '246');");
            // Propose un module de facturation en ligne pour les clients du cabinet
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '247');");
            // Intègre un service de paiement
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '251');");
            // Edition de la liasse fiscale
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '324');");
            // Archivage des factures et de leurs cycles de vie
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '256');");
            // Signature / scellement des factures électroniques,
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '430');");
            //Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel)
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '259');");
            // Certification PEPPOL
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '264');");
            // Immatriculé sous réserve par la DGFiP
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '267');");


            // $
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 11 ");
            // Reporting sur la santé financière de l'entreprise
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '278');");
            // Anticipation des risques financiers
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '279');");
            // Synchronisation bancaire
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '282');");
            // Rapprochement bancaire
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '284');");
            // Flux de caisse
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '285');");
            // Relances clients
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '292');");
            // Emission des règlements
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '294');");
            //Intègre une solution IA
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '52');");
            // Interopérable avec un logiciel comptable
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '299');");
            // Interopérable avec un logiciel de gestion / caisse
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '301');");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('11', '138');");






            // $
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 7 ");
            // Extra-financier
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '207');");
            // Bilan Carbone
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '208');");
            // Démarche RSE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '209');");
            // Emission de Gaz à effet de serre
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '210');");
            // Labellisation
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '211');");
            // CSRD
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '212');");
            // CSRD Volontaire
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '213');");
            // Finance durable
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '214');");
            // Eco-organismes
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '215');");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('7', '138');");




            // $
            DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 10 ");
            // Bilan patrimonial
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('10', '268');");
            // Projections
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('10', '269');");
            // Simulation fiscale
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('10', '270');");
            // Simulation fiscale
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('10', '439');");
            // Simulation succession
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('10', '274');");
            // Diagnostic Retraite
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('10', '276');");
            // Intègre une solution IA
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('10', '52');");
            // Hébergement des données en UE
            DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('10', '138');");

            DB::statement(query:"UPDATE `category_translations` SET `description` = '<p>Signature électronique, Télétransmission, archivage</p>' WHERE `category_translations`.`id` = 23; ");
            DB::statement(query:"UPDATE `category_translations` SET `description` = '<p>Signature électronique, Télétransmission, archivage</p>' WHERE `category_translations`.`id` = 24; ");




































    }
}
