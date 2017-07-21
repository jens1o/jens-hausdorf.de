<?php
namespace jens1o\webpage\util;

/**
 * Extends the `\DateTime` class with the functionality to
 * get how many years a timestamp is ago.
 *
 * @author     jens1o
 * @copyright  Jens Hausdorf 2017
 * @license    MIT License
 * @package    namespace
 * @subpackage subpackage
 */
class AgeDateTime extends \DateTime {

    /**
     * Returns how many years this timestamp is ago.
     *
     * @return int
     */
    public function getAge(): int {
        return (int) $this->diff(new \DateTime)->format('%y');
    }

    /**
     * Returns how old a milestone is.
     *
     * @return string
     */
    public function __toString(): string {
        return $this->getAge();
    }

}