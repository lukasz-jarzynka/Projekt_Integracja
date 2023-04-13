<?php

namespace App\DataFixtures;

use App\Entity\GetXmlData;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $date = null;

        //Wskaźnik cen towarów i usług konsumpcyjnych (pot. inflacja)
        $inflacjaApi1 = new GetXmlData();
        $inflacjaApi1->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=217230&year=2007');
        $inflacjaApi1->setTsLastDownload($date);
        $inflacjaApi1->setDescription('Inflacja');

        $inflacjaApi2 = new GetXmlData();
        $inflacjaApi2->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=217230&year=2008');
        $inflacjaApi2->setTsLastDownload($date);
        $inflacjaApi2->setDescription('Inflacja');

        $inflacjaApi3 = new GetXmlData();
        $inflacjaApi3->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=217230&year=2019');
        $inflacjaApi3->setTsLastDownload($date);
        $inflacjaApi3->setDescription('Inflacja');

        $inflacjaApi4 = new GetXmlData();
        $inflacjaApi4->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=217230&year=2021');
        $inflacjaApi4->setTsLastDownload($date);
        $inflacjaApi4->setDescription('Inflacja');

        //Przeciętne miesięczne wynagrodzenia brutto
        $przecietneWynagrodzenieApi1 = new GetXmlData();
        $przecietneWynagrodzenieApi1->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=64428&year=2007');
        $przecietneWynagrodzenieApi1->setTsLastDownload($date);
        $przecietneWynagrodzenieApi1->setDescription('Przeciętne miesięczne wynagrodzenia brutto');

        $przecietneWynagrodzenieApi2 = new GetXmlData();
        $przecietneWynagrodzenieApi2->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=64428&year=2008');
        $przecietneWynagrodzenieApi2->setTsLastDownload($date);
        $przecietneWynagrodzenieApi2->setDescription('Przeciętne miesięczne wynagrodzenia brutto');

        $przecietneWynagrodzenieApi3 = new GetXmlData();
        $przecietneWynagrodzenieApi3->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=64428&year=2019');
        $przecietneWynagrodzenieApi3->setTsLastDownload($date);
        $przecietneWynagrodzenieApi3->setDescription('Przeciętne miesięczne wynagrodzenia brutto');

        $przecietneWynagrodzenieApi4 = new GetXmlData();
        $przecietneWynagrodzenieApi4->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=64428&year=2021');
        $przecietneWynagrodzenieApi4->setTsLastDownload($date);
        $przecietneWynagrodzenieApi4->setDescription('Przeciętne miesięczne wynagrodzenia brutto');

        //Przeciętna emerytura z pozarolniczego systemu ubezpieczeń społecznych emerytury
        $przecietnaEmeryturaApi1 = new GetXmlData();
        $przecietnaEmeryturaApi1->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=155058&year=2007');
        $przecietnaEmeryturaApi1->setTsLastDownload($date);
        $przecietnaEmeryturaApi1->setDescription('Przeciętne emerytura');

        $przecietnaEmeryturaApi2 = new GetXmlData();
        $przecietnaEmeryturaApi2->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=155058&year=2008');
        $przecietnaEmeryturaApi2->setTsLastDownload($date);
        $przecietnaEmeryturaApi2->setDescription('Przeciętne emerytura');

        $przecietnaEmeryturaApi3 = new GetXmlData();
        $przecietnaEmeryturaApi3->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=155058&year=2019');
        $przecietnaEmeryturaApi3->setTsLastDownload($date);
        $przecietnaEmeryturaApi3->setDescription('Przeciętne emerytura');

        $przecietnaEmeryturaApi4 = new GetXmlData();
        $przecietnaEmeryturaApi4->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=155058&year=2021');
        $przecietnaEmeryturaApi4->setTsLastDownload($date);
        $przecietnaEmeryturaApi4->setDescription('Przeciętne emerytura');

        //PKB na 1 mieszkańca (zł)
        $pkbApi1 = new GetXmlData();
        $pkbApi1->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=458421&year=2007');
        $pkbApi1->setTsLastDownload($date);
        $pkbApi1->setDescription('PKB na 1 mieszkańca');

        $pkbApi2 = new GetXmlData();
        $pkbApi2->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=458421&year=2008');
        $pkbApi2->setTsLastDownload($date);
        $pkbApi2->setDescription('PKB na 1 mieszkańca');

        $pkbApi3 = new GetXmlData();
        $pkbApi3->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=458421&year=2019');
        $pkbApi3->setTsLastDownload($date);
        $pkbApi3->setDescription('PKB na 1 mieszkańca');

        $pkbApi4 = new GetXmlData();
        $pkbApi4->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=458421&year=2021');
        $pkbApi4->setTsLastDownload($date);
        $pkbApi4->setDescription('PKB na 1 mieszkańca');

        $minimalne1 = new GetXmlData();
        $minimalne1->setUrl('');
        $minimalne1->setTsLastDownload(new \DateTime());
        $minimalne1->setDescription('Minimalne wynagrodzenie');
        $minimalne1->setYear(2007);
        $minimalne1->setDataValue(936.0);

        $minimalne2 = new GetXmlData();
        $minimalne2->setUrl('');
        $minimalne2->setTsLastDownload(new \DateTime());
        $minimalne2->setDescription('Minimalne wynagrodzenie');
        $minimalne2->setYear(2008);
        $minimalne2->setDataValue(1126.0);

        $minimalne3 = new GetXmlData();
        $minimalne3->setUrl('');
        $minimalne3->setTsLastDownload(new \DateTime());
        $minimalne3->setDescription('Minimalne wynagrodzenie');
        $minimalne3->setYear(2019);
        $minimalne3->setDataValue(2250.0);

        $minimalne4 = new GetXmlData();
        $minimalne4->setUrl('');
        $minimalne4->setTsLastDownload(new \DateTime());
        $minimalne4->setDescription('Minimalne wynagrodzenie');
        $minimalne4->setYear(2021);
        $minimalne4->setDataValue(2800.0);

        $manager->persist($inflacjaApi1);
        $manager->persist($inflacjaApi2);
        $manager->persist($inflacjaApi3);
        $manager->persist($inflacjaApi4);

        $manager->persist($przecietneWynagrodzenieApi1);
        $manager->persist($przecietneWynagrodzenieApi2);
        $manager->persist($przecietneWynagrodzenieApi3);
        $manager->persist($przecietneWynagrodzenieApi4);

        $manager->persist($przecietnaEmeryturaApi1);
        $manager->persist($przecietnaEmeryturaApi2);
        $manager->persist($przecietnaEmeryturaApi3);
        $manager->persist($przecietnaEmeryturaApi4);

        $manager->persist($pkbApi1);
        $manager->persist($pkbApi2);
        $manager->persist($pkbApi3);
        $manager->persist($pkbApi4);

        $manager->persist($minimalne1);
        $manager->persist($minimalne2);
        $manager->persist($minimalne3);
        $manager->persist($minimalne4);


        $manager->flush();
    }
}
