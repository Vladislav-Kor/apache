<?php
/**
 *  @author Alex <hexman@live.ru>
 */

namespace app\repositories;

class Hydrator
{
    private $reflectionClassMap;

    /**
     * hydrate.
     *
     * @param mixed $class
     * @param mixed $data
     */
    public function hydrate($class, array $data)
    {
        $reflection = $this->getReflectionClass($class);
        $target = $reflection->newInstanceWithoutConstructor();
        foreach ($data as $name => $value) {
            $property = $reflection->getProperty($name);
            if ($property->isPrivate() || $property->isProtected()) {
                $property->setAccessible(true);
            }
            $property->setValue($target, $value);
        }

        return $target;
    }

    /**
     * getReflectionClass.
     *
     * @param mixed $className
     */
    private function getReflectionClass($className)
    {
        if (!isset($this->reflectionClassMap[$className])) {
            $this->reflectionClassMap[$className] = new \ReflectionClass($className);
        }

        return $this->reflectionClassMap[$className];
    }
}
