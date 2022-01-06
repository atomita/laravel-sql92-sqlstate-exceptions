<?php

$sqlstate = json_decode(file_get_contents(__DIR__.'/sql92_sqlstate.json'), true);

$output = __DIR__.'/src/Exceptions';

function studly(string $value): string
{
    return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', strtolower($value))));
}

function endsWith(string $haystack, string $needle): string
{
    return substr($haystack, -strlen($needle)) === $needle;
}

function isSubclass(string $code): bool
{
    return substr($code, -3) !== '000';
}

function isNoSubclass(string $value): bool
{
    return endsWith($value, '_NO_SUBCLASS');
}

function stripNoSubclass(string $value): string
{
    return isNoSubclass($value) ? substr($value, 0, -12) : $value;
}

function mainClass(string $code): string
{
    return substr($code, 0, -3).'000';
}

function make(string $class, string $parent): string
{
    return <<<PHP
<?php

namespace atomita\LaravelSql92SqlstateExceptions\Exceptions;

class $class extends $parent
{
}

PHP;
}

unset($sqlstate['SQLSTATE 00000']);
foreach ($sqlstate as $code => $name) {
    $class = studly(stripNoSubclass($name)).'Exception';

    $parentName = isSubclass($code) ? $sqlstate[mainClass($code)] ?? null : null;
    $parent = empty($parentName) ? '\Illuminate\Database\QueryException' : studly(stripNoSubclass($parentName)).'Exception';

    file_put_contents("{$output}/{$class}.php", make($class, $parent));
}
