<?php


namespace App\Service;


use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;

class TrackNamer implements NamerInterface
{

    public function name($object, PropertyMapping $mapping): string
    {
        return $object->getDiscNumber().'-'.$object->getTrackNumber().'-'.$object->getTitle().'.mp3';
    }
}