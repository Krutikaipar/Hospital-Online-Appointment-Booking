<?php
namespace Bookly\Lib\Utils;

/**
 * Class Collection
 *
 * @package Bookly\Lib\Utils
 */
class Collection implements \IteratorAggregate, \Countable
{
    protected $values = array();

    /**
     * @param array $values
     */
    public function __construct( $values )
    {
        $this->values = $values;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get( $key, $default = null )
    {
        return $this->has( $key ) ? stripslashes_deep( $this->values[ $key ] ) : $default;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has( $name )
    {
        return array_key_exists( $name, $this->values );
    }

    /**
     * @param string $name
     * @return void
     */
    public function remove( $name )
    {
        unset( $this->values[ $name ] );
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set( $key, $value )
    {
        $this->values[ $key ] = $value;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->values;
    }

    /**
     * Returns an iterator for parameters.
     *
     * @return \ArrayIterator<string, mixed>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->values);
    }

    /**
     * Returns the number of parameters.
     */
    public function count()
    {
        return count( $this->values );
    }
}