<?php

namespace App\Factory;

use App\Entity\GetXmlData;
use App\Repository\GetXmlDataRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<GetXmlData>
 *
 * @method        GetXmlData|Proxy create(array|callable $attributes = [])
 * @method static GetXmlData|Proxy createOne(array $attributes = [])
 * @method static GetXmlData|Proxy find(object|array|mixed $criteria)
 * @method static GetXmlData|Proxy findOrCreate(array $attributes)
 * @method static GetXmlData|Proxy first(string $sortedField = 'id')
 * @method static GetXmlData|Proxy last(string $sortedField = 'id')
 * @method static GetXmlData|Proxy random(array $attributes = [])
 * @method static GetXmlData|Proxy randomOrCreate(array $attributes = [])
 * @method static GetXmlDataRepository|RepositoryProxy repository()
 * @method static GetXmlData[]|Proxy[] all()
 * @method static GetXmlData[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static GetXmlData[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static GetXmlData[]|Proxy[] findBy(array $attributes)
 * @method static GetXmlData[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static GetXmlData[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class GetXmlDataFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(GetXmlData $getXmlData): void {})
        ;
    }

    protected static function getClass(): string
    {
        return GetXmlData::class;
    }
}
