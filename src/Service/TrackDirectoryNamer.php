<?php


namespace App\Service;

use DateTime;
use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\DirectoryNamerInterface;

class TrackDirectoryNamer implements DirectoryNamerInterface
{

    /**
     * @inheritDoc
     */
    public function directoryName($object, PropertyMapping $mapping): string
    {
        $albumYear = $object->getCreatedAt()->format('Y');

        $subDirectory = $object->getAlbum()->getArtist()->getName().'-'.
            $object->getAlbum()->getArtist()->getId().'/'.
            $object->getAlbum()->getName().'-'. $albumYear;

        return $mapping->getUploadDestination().'/'.$subDirectory;
    }
}