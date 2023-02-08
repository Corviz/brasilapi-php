<?php

namespace Corviz\BrasilAPI\Data;

use ArrayAccess;
use JsonSerializable;
use ReflectionClass;
use ReflectionException;

class BaseData implements ArrayAccess, JsonSerializable
{

    /**
     * @param array $data
     * @return static
     * @throws ReflectionException
     */
    public static function from(array $data): static
    {
        $r = new ReflectionClass(static::class);
        return $r->newInstanceArgs($data);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $arr = (array) $this;

        foreach ($arr as &$item) {
            if ($item instanceof BaseData) {
                $item = $item->toArray();
            }
        }

        return $arr;
    }

    /**
     * @return string|false
     */
    public function toJson(): string|false
    {
        return json_encode($this);
    }

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return bool true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->$offset);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->$offset;
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->$offset = $value;
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->$offset);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4
     */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}