<?php

declare(strict_types=1);

namespace Passionweb\GoogleMapsCluster\Domain\Model;


use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Marker extends AbstractEntity
{
    protected float $lat = 0.0;

    protected float $lon = 0.0;

    protected string $title = '';

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function setLon(float $lon): void
    {
        $this->lon = $lon;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
