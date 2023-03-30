<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setName('Tube beaume à lèvres');
        $product->setDescription("<p> les Tubes de baume à lèvres vides sont faits de bambou naturel et de plastique de haute qualité, matériau sûr avec conception antichoc, sain et écologique, bien fait pour une longue durée. L'apparence classique en bois de bambou vous rend plus proche de la nature.</p>
        <p> Capacité: 5ml; Taille: env. 72mm x 21mm x 21mm. Compact et léger, se glisse facilement dans votre sac à main ou votre poche, ne laissez jamais votre collection de gloss à lèvres derrière vous lors de vos déplacements.</p>
        <p>Il suffit de verser le mélange de rouge à lèvres fondu dans un récipient rond et de le refroidir, puis vous obtiendrez un baume à lèvres. Vous pouvez facilement faire glisser votre baume à lèvres vers le haut pour l'appliquer rapidement sur vos lèvres grâce au mécanisme à molette. Conception de bouchon à pression pour éviter les fuites.</p>
        <p>Parfait comme baumes à lèvres faits maison, baume à lèvres, tubes de rouge à lèvres, récipients de soins pour les lèvres, déodorant, convient également à la fabrication artisanale de baumes corporels, de bâtons de lotion, de pommades de guérison, de beurres corporels et bien plus encore.</p>
        <p>Tubes de rouge à lèvres rechargeables de 1 pièce x 5ml. Créer un baume à lèvres fait maison dans votre propre style, partager avec votre famille et vos amis, vous vous amuserez beaucoup. Cadeau parfait pour les mères et les femmes qui aiment le rouge à lèvres.</p>");
        $product->setPrice(5.30);
        $product->setIsPromote(false);
        $product->setImageName('tube-levre.png');
        $product->setDescriptionImage('tube à lèvres en bois, le contenant est vide car dédié au DiY');
        $product->setSlug('tube-levre');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);

        $product = new Product();
        $product->setName('Brosse pour Vaisselle');
        $product->setDescription("<p>Brosse de nettoyage à manche en bois de hêtre, outil de nettoyage de cuisine, de ménage, de vaisselle, à Long manche. Brosse de nettoyage à manche en bois de hêtre, outil de nettoyage de cuisine, de ménage, de vaisselle, à Long manche</p>
        <p> 1. Matériau de paume de noix de coco en Sisal: durable; Résistant au sel et à l'alcali et à haute température; Forte capacité à éliminer les taches d'huile</p>
        <p> Grand but pour les petits objets: toutes les casseroles et poêles peuvent être faites, et vous pouvez l'utiliser pour brosser les casseroles, les cuisinières, les assiettes, les bols, les éviers, etc.</p>
        <p>Conception suspendue: économisez de l'espace et séchez rapidement, réduisez la croissance bactérienne et stockage pratique</p>
        <p>Matériau en bois de hêtre: matériau en bois brut, finement poli et la texture naturelle est claire</p>
        <p>Taille: 23*5 (cm) & Matériau: fil de sisal + acier inoxydable + hêtre</p>");
        $product->setPrice(14.90);
        $product->setIsPromote(true);
        $product->setImageName('brosse-vaisselle.png');
        $product->setDescriptionImage('Brosse de nettoyage à manche en bois de hêtre, outil de nettoyage de cuisine pour vaisselle.');
        $product->setSlug('brosse-vaisselle');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Recharge brosse vaisselle');
        $product->setDescription("<p>Matériau de paume de noix de coco en Sisal: durable; Résistant au sel et à l'alcali et à haute température; Forte capacité à éliminer les taches d'huile</p>
        <p>Grand but pour les petits objets: toutes les casseroles et poêles peuvent être faites, et vous pouvez l'utiliser pour brosser les casseroles, les cuisinières, les assiettes, les bols, les éviers, etc.</p>
        <p> Conception suspendue: économisez de l'espace et séchez rapidement, réduisez la croissance bactérienne et stockage pratique</p>
        <p>Matériau en bois de hêtre: matériau en bois brut, finement poli et la texture naturelle est claire</p>");
        $product->setPrice(7.90);
        $product->setIsPromote(false);
        $product->setImageName('recharge-brosse.png');
        $product->setDescriptionImage('Recharge brosse pour vaisselle en bois');
        $product->setSlug('recharge-brosse');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);
        
        $product = new Product();
        $product->setName('Mini brosse à récurer');
        $product->setDescription("<p>Mini brosse à récurer naturelle en bambou, pour la cuisine, la vaisselle, le nettoyage des légumes, 1 pièce</p>");
        $product->setPrice(8.90);
        $product->setIsPromote(false);
        $product->setImageName('mini-brosse.png');
        $product->setDescriptionImage('Mini brosse à récurer naturelle en bambou, pour la cuisine, la vaisselle, le nettoyage des légumes, 1 pièce');
        $product->setSlug('mini-brosse');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Eponge lavable réutilisable (ronde)');
        $product->setDescription("<p>Matériau éponge haute densité, doux et confortable, adapté au nettoyage de la cuisine, de l'évier, de la vaisselle, etc. design Double face, fin et facile à enlever toutes sortes de taches tenaces.</p>
        <p>Taille: 12cm * 2.5cmTaille: 12cm * 2.5cm</p>
        <p>Liste de paquet: 3 éponges de nettoyage</p>
        <p>Remarques : En raison de la différence de réglage de la lumière et de l'écran, la couleur de l'article peut être légèrement différente des images. Veuillez permettre une légère différence de dimension en raison de différentes mesures manuelles.</p>");
        $product->setPrice(4.90);
        $product->setIsPromote(false);
        $product->setImageName('eponge-lavable.png');
        $product->setDescriptionImage('éponge ronde de nettoyage ménager réutilisable');
        $product->setSlug('eponge-lavable');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Eponge lavable réutilisable (rectangle)');
        $product->setDescription("<p>Double face bambou Fiber éponge essuyer cuisine nettoyage chiffon à vaisselle grand bloc éponge vaisselle Pot brosse anti-adhésif huile
        Lingette éponge Double face en Fiber de bambou</p>
        <p>Fait d'éponge élastique élevée, bonne représentation d'absorption d'eau.</p>
        <p>Le pouvoir anti-taches extrême de l'éponge est inarrêtable.</p>
        <p>Matériel: éponge de fibres superfines</p>");
        $product->setPrice(6.90);
        $product->setIsPromote(true);
        $product->setImageName('eponge-rectangle.png');
        $product->setDescriptionImage("Éponge Double face en Fiber de bambou pour la vaisselle");
        $product->setSlug('eponge-rectangle');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Pince à linge (en inox)');
        $product->setDescription("<p>Le clip est en acier inoxydable durable. Très solide et antirouille. La surface de la pince est très lisse. Ils n'endommageront pas vos chaussettes et ne laisseront aucune marque de pression
        Ils tiennent bien les vêtements, et sont faciles à ouvrir et à stabiliser. Et a une bonne flexibilité
        Les pinces à linge en métal sont petites et élégantes, et peuvent être placées n'importe où sans prendre de place
        Ce clip est très approprié pour contenir des chaussettes, des serviettes, des sous-vêtements et de petits objets. Les articles ne seront pas emportés par le vent. Ils peuvent également être utilisés pour les documents papier au bureau.
        </p>
        <p>Taille: 5.5x1.1 cm</p>
        <p>Matériau: acier inoxydable</p>
        <p>Quantité: 20 pièces</p>
        <p>Couleur: argent</p>");
        $product->setPrice(9.90);
        $product->setIsPromote(false);
        $product->setImageName('pince-linge.png');
        $product->setDescriptionImage('Pinces à linge en acier inoxydable, 20 pièces');
        $product->setSlug('pince-linge');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('20 Essuies-tout lavable');
        $product->setDescription("<p>Chiffon de vaisselle de cuisine quotidienne anti-adhésif huile épaissie chiffon de nettoyage de comptoir tampon à récurer absorbant (sans éponge) 20 pièces</p>
        <p>taille: 23x23cm; Matériau: molleton de corail; Emballage: 20 paquets de serviettes en papier de cuisine. L'ensemble de 8 pièces vous fournit beaucoup de serviettes de sac de farine pour répondre à tous les besoins de la famille dans votre vie quotidienne!</p>
        <p>Ces lingettes sont faites de molleton de corail épais de haute qualité, léger, forte absorption d'eau et sèchent rapidement. Les serviettes de cuisine classiques ne perdent pas leurs cheveux et peuvent absorber rapidement et efficacement les liquides dans toutes les tâches.</p>
        <p>Facile à nettoyer. Ils peuvent être lavés à la main et en machine. Même après plusieurs lavages, les serviettes restent de bonne qualité! Résistera à la contraction et réduira la perte de cheveux. Vous pouvez utiliser ces serviettes à plusieurs reprises!</p>
        <p>En raison de la forte absorption d'eau, ces serviettes sont très adaptées pour essuyer les chiffons, essuyer les mains, essuyer les taches, essuyer les fenêtres, ainsi que les filtres à fromage, les essoreuses à salade, et diverses tâches ménagères. C'est comme tenir une baguette magique dans votre main! Utilisez notre torchon pour faire le travail rapidement et de la bonne manière!</p>");
        $product->setPrice(29.90);
        $product->setIsPromote(false);
        $product->setImageName('essuie-tout.png');
        $product->setDescriptionImage('Nouveau torchon de cuisine en coton Super absorbant, anti-adhésif, huile, chiffon de nettoyage réutilisable, 20 pièces');
        $product->setSlug('essuie-tout');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Serviette hygiènique lavable');
        $product->setDescription("<p>Vous ressentirez la tranquillité d'esprit comme vous le savez, vous avez maintenant une solution à votre période mensuelle qui vous fera économiser de l'argent tout en économisant l'environnement en réduisant vos déchets.<br/>
        Vos serviettes hygiéniques réutilisables hollandais sont fabriquées avec une fibre de bambou magnifiquement douce avec une couche super absorbante et neutralisante d'odeur.<br/>
        Ils sont idéaux pour un flux léger à moyen, si confortable que vous vous sentirez en sécurité.</p>
        <p>Taille:<br/>
        S: longueur 20*6cm<br/>
        M: longueur 25*7cm<br/>
        L: longueur 30*8cm</p>");
        $product->setPrice(18);
        $product->setIsPromote(false);
        $product->setImageName('serviettes-hygieniques.png');
        $product->setDescriptionImage("Serviettes hygiéniques lavables au charbon de bambou organique");
        $product->setSlug('serviettes-hygieniques');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Lingettes pour démaquillage');
        $product->setDescription("<p>La lingette est délicate, super douce, soyeuse et agréable pour la peau. Fabriqué en microfibre, démaquillant naturellement, faible stimulation. Cool et convivial, adapté au maquillage des femmes. Le matériau naturel est très doux pour la peau.</p>
        <p>Matière: daim microfibre.<br/>
        Diamètre: 12cm / 4.72 pouces.<br/>
        Épaisseur: 1.2 cm / 0.5 pouces.<br/>
        Couleur: rose</p>
        <p>Vendu par lot de 4</p>");
        $product->setPrice(5.30);
        $product->setIsPromote(false);
        $product->setImageName('lingettes.png');
        $product->setDescriptionImage('Tampons démaquillants réutilisables, 4 pièces');
        $product->setSlug('lingettes');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Couche lavable bleu');
        $product->setDescription("<p>Couche por bébé lavable et réutilisable.<br/>Sexe: Unisexe.<br/>Quantité: 1Pcs.<br/>Matériau: Cloth Diaper.<br/>Poids Approprié: 5 à 12 kg.<br/>Tranche d'âge: 0-6m,7-12m,13-24m.</p>");
        $product->setPrice(9.90);
        $product->setIsPromote(false);
        $product->setImageName('couche-bleu.png');
        $product->setDescriptionImage('Couche-culotte en tissu réutilisable pour bébé, lavable, ajustable et imperméable');
        $product->setSlug('couche-bleu');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Mouchoires');
        $product->setDescription("<p>Design coloré avec bord ondulé, ce qui rend ce dames hankies très délicat et élégant, idéal pour un usage quotidien et peut être utilisé plusieurs fois.</p>
        <p>Matière: coton</p>
        <p>Taille: Approx.28 x 28cm</p>");
        $product->setPrice(14.90);
        $product->setIsPromote(false);
        $product->setImageName('mouchoires.png');
        $product->setDescriptionImage('Lot de 10 mouchoirs blancs pour femmes');
        $product->setSlug('mouchoires');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Pailles en acier inoxidable');
        $product->setDescription("<p>Cette paille est pour garder:Acier inoxydable 100% et écologique, dites non aux pailles en plastique à usage unique et dites oui aux pailles en acier inoxydable réutilisables.<br/>
        Adapté aux enfants:Ces pailles sont amusantes à utiliser-les enfants adorent tremper et siroter, et par conséquent restent hydratés tout au long de la journée.<br/>
        Lavable au lave-vaisselle:Acier inoxydable 18/8 de haute qualité. Mettez-le au lave-vaisselle pour une désinfection complète. Brosse de nettoyage gratuite incluse.<br/>
        Être en bonne santé:Buvez plus d'eau et des smoothies sains. Paille sans EA, sans plomb et sans rouille: ne buvez que ce qui est dans votre boisson!<br/>
        Ne goûtez que votre boisson:Les pailles en plastique peuvent lessiver les saveurs et les produits chimiques dans une boisson autrement saine. Utilisez des pailles en acier inoxydable et ne goûtez que votre boisson!</p>");
        $product->setPrice(14.90);
        $product->setIsPromote(true);
        $product->setImageName('pailles.png');
        $product->setDescriptionImage('Paille en acier inoxydable réutilisable avec brosse de nettoyage, 4 pièces/ensemble');
        $product->setSlug('pailles');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Pailles en bambou');
        $product->setDescription("<p>Le meilleur choix de pailles à boire pour enfants et adultes-Ce bel ensemble de 10 pailles de bambou biologiques originaires sont réutilisables, biodégradables et naturels. Les pailles de bambou de cuisine sont extrêmement solides et durables par nature, et ne contiennent ni encres ni colorants. Non seulement ils ont fière allure, mais ils sont également pratiques. <br/>Ce sont la bonne alternative aux pailles en plastique ainsi qu'aux autres pailles.<br/>
        Protéger votre santé et votre famille contre les produits toxiques et chimiques - Pourquoi des pailles vertes? Nous refusons d'utiliser des encres, des colorants et de l'eau de javel dans nos pailles de bambou-les encres, les colorants et les blanchissements peuvent être nocifs pour vous, votre famille et vos amis-votre sécurité et votre santé sont notre priorité!<br/>
        Devenir une personne soucieuse de l'environnement-En utilisant ces pailles à boire réutilisables, biodégradables et à base de plantes, vous aidez l'environnement en réduisant les déchets plastiques.</p>");
        $product->setPrice(14.90);
        $product->setIsPromote(false);
        $product->setImageName('pailles-bambou.png');
        $product->setDescriptionImage('Ensemble de pailles réutilisables en bambou biologique, 10 pièces/ensemble');
        $product->setSlug('pailles-bambou');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('mini-poubelle');
        $product->setDescription("<p>Mini poubelle de cuisine qui s'accroche facilement aux portes de cuisine.</p>");
        $product->setPrice(34.90);
        $product->setIsPromote(false);
        $product->setImageName('mini-poubelle.png');
        $product->setDescriptionImage('Poubelle murale 7L avec couvercle, corbeille suspendue à porte, pour cuisine et salle de bain');
        $product->setSlug('mini-poubelle');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_MAISON));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Rasoir Metal Rose');
        $product->setDescription("<p>Profitez de votre rasage le plus proche avec notre superbe rasoir sans déchets. Moderne, élégant et résistant avec un accent ferme sur la réduction de notre empreinte environnementale collective, vous pouvez profiter du rasage le plus doux et sans irritation de votre vie tout en utilisant le rasoir de sécurité le plus beau sur le marché. Inclus avec chaque rasoir sont 10 pièces lame de rasoir de remplacement qui dure environ 70 rasages (5-7 rasages par lame).</p>
        <p>Inclus:<br/>
        -1 x rasoir de sécurité réutilisable<br/>
        -10 x lames de rasoir<br/>
        -1 x brosse de nettoyage<br/>
        Conçu pour la praticité et la durabilité, ce rasoir vous aidera à enlever le plastique de votre vie et à aider notre planète.</p>");
        $product->setPrice(49.90);
        $product->setIsPromote(true);
        $product->setImageName('rasoir.png');
        $product->setDescriptionImage('Rasoir classique Double tranchant en or Rose, inclus: 10 lames de rasage');
        $product->setSlug('rasoir');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Lames de rasoir');
        $product->setDescription("<p>Fait d'acier inoxydable de haute qualité, léger, mince, antirouille, durable.</p>
        <p>Lames fines tranchantes de la plus haute qualité conçues pour s'adapter à différents rasoirs de sécurité à double tranchant.</p>
        <p>Caractéristiques:<br/>Produit: lames de rasoir<br/>Matériau: acier inoxydable<br/>Couleur: comme images montrées<br/>Modèle: lames doubles côtés<br/>Quantité: 10 pièces/1 ensemble</p>");
        $product->setPrice(2.90);
        $product->setIsPromote(false);
        $product->setImageName('lames-rasoir.png');
        $product->setDescriptionImage('Lames de rasoir Double face en acier inoxydable pour outil de rasage manuel, 10 pièces');
        $product->setSlug('lames-rasoir');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Coton-tige réutilisable');
        $product->setDescription("<p>Coton-tige en Silicone réutilisable, 2 pièces, Portable, écologique, nettoyable, pour le nettoyage des oreilles, outils de maquillage, de beauté, cosmétique</p>");
        $product->setPrice(24.90);
        $product->setIsPromote(true);
        $product->setImageName('coton-tige.png');
        $product->setDescriptionImage('Coton-tige en Silicone réutilisable avec sa boite');
        $product->setSlug('coton-tige');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Sac en filet');
        $product->setDescription("<p>Sacs d'épicerie réutilisables portables sacs de fruits et légumes peuvent être lavés coton maille corde organique fourre-tout court fourre-tout net sac fourre-tout.

        Matériaux durables: 100% sac fourre-tout en maille de coton, Durable, écologique et respirant lorsqu'il est stocké. Il peut être lavé par une machine à eau froide et peut être facilement séché sans culbuter. La nature réutilisable des achats de sac à main en filet a conduit à de nombreuses façons de sauver la planète des sacs en plastique. Convient pour stocker les fruits et légumes, en particulier dans les équipements de natation d'été et le transport de jouets de plage. Parfait pour le shopping, les pique-niques, l'école, le transport de jouets, etc. Toile de coton extension naturelle, plus spacieuse. Il semble beaucoup plus petit que l'image, mais quand vous commencez à le remplir de marchandise, il s'étire et se développe énormément. Pliez-vous et mettez-le dans une poche ou une boîte à gants. Ces produits bien faits vous offriront des années de service de qualité. Ils sont lavables en machine pour les garder au frais. Si vous décidez de jeter le sac, soyez assuré qu'il est biodégradable et se décomposera rapidement. Matériel: 100% coton type: sac à provisions/sac de rangement/sac de légumes taille: (poignée x largeur x hauteur) S-10X35X38CM liste de colisage: 1x sac de rangement chaud astuce: 1. (+ -1-3 cm, de légères différences peuvent exister entre les lots faits à la main et différents.)2. Avantages: coton de haute qualité, résistance haute/basse température, anti-dérapant</p>");
        $product->setPrice(12.90);
        $product->setIsPromote(false);
        $product->setImageName('sac-filet.png');
        $product->setDescriptionImage("Sacs filet réutilisables, corde en maille de coton biologique");
        $product->setSlug('sac-filet');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_ACCESSOIRES));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Miroir de poche');
        $product->setDescription("<p>Miroir de poche pour vous accompagner partout. Il est très pratique pour le maquillage ou une utilisation quotidienne. Le tenir facilement sur la paume ou le mettre dans la poche, le sac à main, le sac à main, vous pouvez l'utiliser en toute occasion.</p>
        <p>Spécifications:<br/>
            Matériau: bois, verre<br/>
            Taille: 2.83*3.08 pouces<br/>
            Couleur: Noyer<br/>
            Poids: 53 Grammes<br/>
            </p>");
        $product->setPrice(19.90);
        $product->setIsPromote(true);
        $product->setImageName('miroir-poche.png');
        $product->setDescriptionImage('Miroir de maquillage Compact en bois, Portable et pliable, pour femmes');
        $product->setSlug('miroir-poche');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_ACCESSOIRES));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Mini-miroir cuir');
        $product->setDescription("<p>Haute qualité, durable pour une utilisation de longue durée.<br/>
        La conception Pop-up facilite l'ouverture d'une seule main.<br/>
        Mini taille, peut être mis dans un sac, sac cosmétique pour le stockage et le transport.<br/>
        Joli miroir de poche pour vérifier votre maquillage facilement.<br/>
        Matériel: Métal<br/>
        Forme: Forme Ronde<br/>
        Quantité: 1Pc<br/>
        Diamètre: 8cm</p>");
        $product->setPrice(9.90);
        $product->setIsPromote(false);
        $product->setImageName('miroir-cuir.png');
        $product->setDescriptionImage('Mini miroir de maquillage rond en cuir');
        $product->setSlug('miroir-cuir');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_ACCESSOIRES));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Grand Sac en toile de jute');
        $product->setDescription("<p>Respectueux de l'environnement -- les sacs fourre-tout en Jute sont faits de tissu de toile de Jute (Jute) non blanchi à 100%. Les sacs réutilisables naturels peuvent protéger notre environnement des sacs en plastique. (Remarque: le lavage en machine n'est pas suggéré)</p>
        <p>Coutures renforcées-les sangles de poignée souples sont étroitement cousues aux sacs fourre-tout en jute, robustes et confortables.</p>
        <p>Taille : 39x31x15cm(L x H x W), avec des poignée confortable</p>
        <p>Conception -- intérieur doublé de film PE, imperméable et résistant à la saleté; Fond et côtés élargis, tiennent plus tout en gardant en bon état.</p>
        <p>Application -- sacs cadeaux en toile de jute parfaits avec poignées pour mariage, demoiselle d'honneur, hôtel, anniversaire, célébrations comme cadeaux, sacs de cadeaux de fête; Pour les femmes comme sacs de shopping, pour l'artisanat d'art de bricolage comme la broderie d'écriture au crochet imprimé.</p>");
        $product->setPrice(18.90);
        $product->setIsPromote(true);
        $product->setImageName('sac-toile.png');
        $product->setDescriptionImage('Sacs fourre-tout en Jute, avec intérieur laminé et poignée souple');
        $product->setSlug('sac-toile');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_ACCESSOIRES));
        $manager->persist($product);        
        
        $product = new Product();
        $product->setName('Brosse à dent bambou');
        $product->setDescription("<p>Caractéristiques:<br/>
        -La poignée a une prise en main parfaite pour tous les types de mains.<br/>
        -Poils souples afin de protéger vos gencives des saignements ou des rayures.<br/>
        -Laissez-vous confortablement brosser les dents, il vous sera facile de nettoyer chaque dent et chaque coin de votre bouche.<br/>
        Spécifications:<br/>
        Matériel: Bambou</p>");
        $product->setPrice(1.50);
        $product->setIsPromote(false);
        $product->setImageName('brosse-dent.png');
        $product->setDescriptionImage('Brosse à dents en bois bambou écologique');
        $product->setSlug('brosse-dent');
        $product->setStock(20);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_HYGIENE));
        $manager->persist($product);
        
        $manager->flush();
        
    }
}
