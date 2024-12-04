<?php declare(strict_types=1);

namespace GraphQL\Utils\CustomLoader;

use GraphQL\Type\Definition\Type;

class CustomTypeLoader implements CustomTypeLoaderInterface
{
    /**
     * @var callable(string): bool|null
     */
    private $canProvideCallable;
    /**
     * @var callable(string, array): Type|null
     */
    private $getCustomCallable;

    public function __construct(
        ?callable $canProvide,
        ?callable $getCustomType
    )
    {
        $this->canProvideCallable = $canProvide;
        $this->getCustomCallable = $getCustomType;
    }

    public function canProvideCustomType(string $typeName): bool
    {
        if ($this->canProvideCallable) {
            return ($this->canProvideCallable)($typeName);
        }

        return false;
    }

    /**
     * @param string $typeName
     * @param array $config
     * @return CustomScalarType|InputObjectType|ObjectType|EnumType|Type|null
     */
    public function getCustomType(string $typeName, array $config)
    {
        if ($this->getCustomCallable) {
            return ($this->getCustomCallable)($typeName, $config);
        }

        return null;
    }
}
