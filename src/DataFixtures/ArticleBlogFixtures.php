<?php

namespace App\DataFixtures;

use App\Entity\ArticleBlog;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleBlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $articleBlog = new ArticleBlog();
        $articleBlog->setIsActive(true);
        $articleBlog->setTitle("Limiter les déchets plastiques");
        $articleBlog->setDescription("<p>Malgré leur interdiction, vous trouverez encore des sacs plastiques chez certains commerçants. Ne plus les utiliser évitera que vos sacs plastiques s'envolent et se retrouvent ensuite dans les océans ou qu'ils se décomposent dans l'environnement.</p> 
        <p>Au restaurant ou chez les commerçants, il vaut mieux apporter vos propres contenants. SI vous achetez des aliments ou des boissons à emporter, demandez aux commerçants de ne pas les emballer dans du plastique.</p>
        <p>Les produits bio sont moins chers en vrac, et cela vous permet de choisir la quantité dont vous avez besoin. Pensez-bien à apporter vos propres sacs à vrac, autrement le gain écologique sera limité.</p>");
        $articleBlog->setSignature("L'équipe de Mon Petit Geste Eco.");
        $articleBlog->setimageName("sac-courses.jpg");
        $articleBlog->setImageDescription("Sac de courses en filet avec à l'intérieur des produits dans des emballages papiers et un petit bouquet de fleurs sauvages qui dépasse.");
        $manager->persist($articleBlog);

        $articleBlog = new ArticleBlog();
        $articleBlog->setIsActive(true);
        $articleBlog->setTitle("Faire le tri");
        $articleBlog->setDescription("<p>En 2017, la France a produit près de 39 millions de tonnes de déchets ménagers et assimilés (soit environ 580 kg par Français, incluant les déchets de déchèteries, les déchets des commerçants, etc.) : malgré les communications positives des acteurs, seulement 42% sont effectivement recyclés, le reste étant incinéré ou mis en décharge.</p> 
        <p>Le geste de tri reste néanmoins essentiel pour permettre d'orienter les déchets qui n'ont pu être évités et qui sont recyclables vers les bonnes filières de traitement. Un déchet qui n'a pas fait l'objet d'un tri à la source est en effet difficilement voire pas du tout valorisable : le recyclage ne peut être réalisé que si les flux de matières sont suffisamment homogènes. Trier a posteriori des déchets qui ont été mélangés (on parle de « sur-tri ») n'est pas toujours techniquement possible, et a un coût qui rend parfois le recyclage moins compétitif. Trier à la source permet donc d'améliorer la qualité des matériaux à recycler, et de réduire les interventions ultérieures de sur-tri.</p>");
        $articleBlog->setSignature("L'équipe de Mon Petit Geste Eco.");
        $articleBlog->setimageName("trier.jpg");
        $articleBlog->setImageDescription("Paysage montrant des déchets au sol en pleine nature avec à côté : des chèvres, et au loin : l'horizon.");
        $manager->persist($articleBlog);

        $articleBlog = new ArticleBlog();
        $articleBlog->setIsActive(true);
        $articleBlog->setTitle("Allonger la durée de vie de vos objets");
        $articleBlog->setDescription("<p>L'éco-conception désigne le fait de concevoir un produit de manière à minimiser son impact sur l'environnement et notamment sa consommation de matières premières et d'énergie tout au long du cycle de vie (production, distribution, utilisation, collecte et traitement en tant que déchet). Cela peut passer par l'utilisation de matières premières recyclées, de matériaux robustes et durables ou encore par la conception d'objets facilement réparables (par exemple en facilitant le démontage et l'accès aux composants) ou plus adaptables aux évolutions technologiques.</p> 
        <p>Certaines entreprises adoptent cependant des stratégies à l'inverse de l'éco-conception et pratiquent l'obsolescence programmée de leurs produits, en limitant volontairement la durée de vie ou d'utilisation des objets. Dans la même logique, de nombreuses stratégies marketing encouragent au renouvellement rapide des achats, souvent décorrélés du besoin réel du consommateur, accélérant ainsi la surproduction et la surconsommation de nos ressources.</p>");
        $articleBlog->setSignature("L'équipe de Mon Petit Geste Eco.");
        $articleBlog->setimageName("reparer.jpg");
        $articleBlog->setImageDescription("Deux personnes tentent de réparer une radio.");
        $manager->persist($articleBlog);

        $articleBlog = new ArticleBlog();
        $articleBlog->setIsActive(true);
        $articleBlog->setTitle("Trier vos déchets organiques");
        $articleBlog->setDescription("<p>Les biodéchets correspondent aux déchets organiques issus de ressources naturelles végétales ou animales. Ils sont constitués principalement des déchets de cuisine (épluchures de légumes et autres restes alimentaires) et des déchets verts du jardin (tailles de haie, tonte de gazon, feuilles mortes…). 
        Les biodéchets ont la capacité de « pourrir », c'est pourquoi on les appelle également putrescibles ou fermentescibles.</p>
        <p>Le compostage est la forme de traitement des déchets organiques la plus simple. Il s'agit d'un processus naturel de décomposition de la matière organique aérobie (c'est-à-dire en présence et grâce à l'oxygène). La décomposition des déchets organiques s'opère ainsi grâce à l'action d'organismes vivants tels que les bactéries, les champignons, les vers et les larves d'insectes.</p>");
        $articleBlog->setSignature("L'équipe de Mon Petit Geste Eco.");
        $articleBlog->setimageName("composteur.jpg");
        $articleBlog->setImageDescription("Composteur en bois, contenant des déchets organiques. On voit clairement les différentes couches de déchets.");
        $manager->persist($articleBlog);
        
        $manager->flush();
    }
}
