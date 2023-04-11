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

        $inflacjaApi2 = new GetXmlData();
        $inflacjaApi2->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=217230&year=2008');
        $inflacjaApi2->setTsLastDownload($date);

        $inflacjaApi3 = new GetXmlData();
        $inflacjaApi3->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=217230&year=2019');
        $inflacjaApi3->setTsLastDownload($date);

        $inflacjaApi4 = new GetXmlData();
        $inflacjaApi4->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=217230&year=2021');
        $inflacjaApi4->setTsLastDownload($date);

        //Przeciętne miesięczne wynagrodzenia brutto
        $przecietneWynagrodzenieApi1 = new GetXmlData();
        $przecietneWynagrodzenieApi1->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=64428&year=2007');
        $przecietneWynagrodzenieApi1->setTsLastDownload($date);

        $przecietneWynagrodzenieApi2 = new GetXmlData();
        $przecietneWynagrodzenieApi2->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=64428&year=2008');
        $przecietneWynagrodzenieApi2->setTsLastDownload($date);

        $przecietneWynagrodzenieApi3 = new GetXmlData();
        $przecietneWynagrodzenieApi3->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=64428&year=2019');
        $przecietneWynagrodzenieApi3->setTsLastDownload($date);

        $przecietneWynagrodzenieApi4 = new GetXmlData();
        $przecietneWynagrodzenieApi4->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=64428&year=2021');
        $przecietneWynagrodzenieApi4->setTsLastDownload($date);

        //Przeciętna emerytura z pozarolniczego systemu ubezpieczeń społecznych emerytury
        $przecietnaEmeryturaApi1 = new GetXmlData();
        $przecietnaEmeryturaApi1->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=155058&year=2007');
        $przecietnaEmeryturaApi1->setTsLastDownload($date);

        $przecietnaEmeryturaApi2 = new GetXmlData();
        $przecietnaEmeryturaApi2->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=155058&year=2008');
        $przecietnaEmeryturaApi2->setTsLastDownload($date);

        $przecietnaEmeryturaApi3 = new GetXmlData();
        $przecietnaEmeryturaApi3->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=155058&year=2019');
        $przecietnaEmeryturaApi3->setTsLastDownload($date);

        $przecietnaEmeryturaApi4 = new GetXmlData();
        $przecietnaEmeryturaApi4->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=155058&year=2021');
        $przecietnaEmeryturaApi4->setTsLastDownload($date);

        //PKB na 1 mieszkańca (zł)
        $pkbApi1 = new GetXmlData();
        $pkbApi1->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=458421&year=2007');
        $pkbApi1->setTsLastDownload($date);

        $pkbApi2 = new GetXmlData();
        $pkbApi2->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=458421&year=2008');
        $pkbApi2->setTsLastDownload($date);

        $pkbApi3 = new GetXmlData();
        $pkbApi3->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=458421&year=2019');
        $pkbApi3->setTsLastDownload($date);

        $pkbApi4 = new GetXmlData();
        $pkbApi4->setUrl('https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=458421&year=2021');
        $pkbApi4->setTsLastDownload($date);

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


        $manager->flush();
    }
}
