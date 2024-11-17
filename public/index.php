<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Service\Generator\RandomStringGenerator;
use App\Service\Generator\RandomStringArrayGenerator;
use App\Service\Converter\StringConverter;
use App\Service\Converter\Rot13Converter;
use App\Service\Collection\GeneratorCollection;
use Symfony\Component\DependencyInjection\ContainerBuilder;

// Build DI container (could be moved to separate file like a service provider)
$container = new ContainerBuilder();

$container->register('random_string_generator', RandomStringGenerator::class)
    ->addArgument(6);

$container->register('random_string_array_generator', RandomStringArrayGenerator::class)
    ->addArgument(3)
    ->addArgument(6);

$container->register('string_converter', StringConverter::class);
$container->register('rot13_converter', Rot13Converter::class);

$container->register('generator_collection', GeneratorCollection::class);

// Add generators to the collection
$generatorCollection = $container->get('generator_collection');
$generatorCollection->addGenerator($container->get('random_string_generator'));
$generatorCollection->addGenerator($container->get('random_string_array_generator'));

// Get available converters
$converters = [
    $container->get('string_converter'),
    $container->get('rot13_converter'),
];

// Loop through generators in collection
foreach ($generatorCollection->getGenerators() as $generator) {
    $generated = $generator->generate();

    // Pick a random converter
    $randomConverter = $converters[array_rand($converters)];

    if (is_array($generated)) {
        foreach ($generated as $string) {
            echo "Original: $string\n";
            echo "Converted: " . $randomConverter->convert($string) . "\n";
        }
    } else {
        echo "Original: $generated\n";
        echo "Converted: " . $randomConverter->convert($generated) . "\n";
    }

    echo "----\n";
}
