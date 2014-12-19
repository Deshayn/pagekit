<?php

namespace Pagekit\Tree\Event;

use Symfony\Component\EventDispatcher\Event;

class NodeTypeEvent extends Event implements \IteratorAggregate
{
    protected $types = [];

    /**
     * Registers a node type.
     *
     * @param string $id
     * @param string $label
     */
    public function register($id, $label, array $options = [])
    {
        $this->types[$id] = array_merge($options, compact('id', 'label'));
    }

    /**
     * Get list of node types.
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->types);
    }
}