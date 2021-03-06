<?php

namespace Nuwave\Lighthouse\Console;

use HaydenPierce\ClassFinder\ClassFinder;
use Illuminate\Console\Command;
use Nuwave\Lighthouse\Schema\AST\PartialParser;
use Nuwave\Lighthouse\Schema\DirectiveNamespacer;
use Nuwave\Lighthouse\Support\Contracts\DefinedDirective;
use Nuwave\Lighthouse\Support\Contracts\Directive;

class IdeHelperCommand extends Command
{
    const GENERATED_NOTICE = <<<'SDL'
# File generated by "php artisan lighthouse:ide-helper".
# Do not edit this file directly.
# This file should be ignored by git as it can be autogenerated.

SDL;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lighthouse:ide-helper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gather all schema directive definitions and write them to a file.';

    /**
     * Execute the console command.
     *
     * @param  \Nuwave\Lighthouse\Schema\DirectiveNamespacer  $directiveNamespaces
     * @return int
     */
    public function handle(DirectiveNamespacer $directiveNamespaces): int
    {
        if (! class_exists('HaydenPierce\ClassFinder\ClassFinder')) {
            $this->error(
                "This command requires haydenpierce/class-finder. Install it by running:\n"
                ."\n"
                ."    composer require --dev haydenpierce/class-finder\n"
            );

            return 1;
        }

        $directiveClasses = $this->scanForDirectives(
            $directiveNamespaces->gather()
        );

        $schema = $this->buildSchemaString($directiveClasses);

        $filePath = static::filePath();
        file_put_contents($filePath, $schema);

        $this->info("Wrote schema directive definitions to $filePath.");

        return 0;
    }

    /**
     * Scan the given namespaces for directive classes.
     *
     * @param  string[]  $directiveNamespaces
     * @return string[]
     */
    protected function scanForDirectives(array $directiveNamespaces): array
    {
        $directives = [];

        foreach ($directiveNamespaces as $directiveNamespace) {
            $classesInNamespace = ClassFinder::getClassesInNamespace($directiveNamespace);

            foreach ($classesInNamespace as $class) {
                $reflection = new \ReflectionClass($class);
                if (! $reflection->isInstantiable()) {
                    continue;
                }

                if (! is_a($class, Directive::class, true)) {
                    continue;
                }

                /** @var \Nuwave\Lighthouse\Support\Contracts\Directive $instance */
                $instance = app($class);
                $name = $instance->name();

                // The directive was already found, so we do not add it twice
                if (isset($directives[$name])) {
                    continue;
                }

                $directives[$name] = $class;
            }
        }

        return $directives;
    }

    /**
     * @param string[] $directiveClasses
     * @return string
     */
    protected function buildSchemaString(array $directiveClasses): string
    {
        $schema = self::GENERATED_NOTICE;

        foreach ($directiveClasses as $name => $directiveClass) {
            $definition = $this->define($name, $directiveClass);

            $schema .= "\n"
                ."# Directive class: $directiveClass\n"
                .$definition."\n";
        }

        return $schema;
    }

    protected function define(string $name, string $directiveClass): string
    {
        if (is_a($directiveClass, DefinedDirective::class, true)) {
            /** @var DefinedDirective $directiveClass */
            $definition = $directiveClass::definition();

            // This operation throws if the schema definition is invalid
            PartialParser::directiveDefinition($definition);

            return trim($definition);
        } else {
            return '# Add a proper definition by implementing '.DefinedDirective::class."\n"
                ."directive @{$name}";
        }
    }

    public static function filePath(): string
    {
        return base_path().'/schema-directives.graphql';
    }
}
