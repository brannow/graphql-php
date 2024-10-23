<?php declare(strict_types=1);

namespace GraphQL\Utils\CustomLoader;

use GraphQL\Type\Definition\CustomScalarType;
use GraphQL\Type\Definition\EnumType;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

interface CustomTypeLoaderInterface
{
    public function canProvideCustomType(string $typeName): bool;

    /**
     * @param string $typeName
     * @param array $config
     * @return CustomScalarType|InputObjectType|ObjectType|EnumType|Type|null
     */
    public function getCustomType(string $typeName, array $config);
}
