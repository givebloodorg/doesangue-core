<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Laravel\Rector\ClassMethod\AddArgumentDefaultValueRector;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Php80\Rector\FunctionLike\UnionTypesRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::AUTO_IMPORT_NAMES, true);

    $parameters->set(Option::PATHS, [
        __DIR__ . '/app',
        __DIR__ . '/tests'
    ]);

    //$parameters->set(Option::PARALLEL, true);

    // Define what rule sets will be applied
    $containerConfigurator->import(LevelSetList::UP_TO_PHP_81);
    $containerConfigurator->import(LaravelSetList::LARAVEL_80);
    $containerConfigurator->import(SetList::CODE_QUALITY);
    $containerConfigurator->import(SetList::CODING_STYLE);
    $containerConfigurator->import(SetList::TYPE_DECLARATION);
    $containerConfigurator->import(SetList::EARLY_RETURN);
    $containerConfigurator->import(SetList::DEAD_CODE);
    $containerConfigurator->import(\Rector\Nette\Set\NetteSetList::NETTE_UTILS_CODE_QUALITY);
    $containerConfigurator->import(\Rector\Doctrine\Set\DoctrineSetList::DOCTRINE_CODE_QUALITY);

    // get services (needed for register a single rule)
    //$services = $containerConfigurator->services();

    // register a single rule
    // $services->set(TypedPropertyRector::class);
    //$services->set(UnionTypesRector::class);

};
