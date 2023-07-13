<?php

declare(strict_types=1);

namespace Passionweb\GoogleMapsCluster\Controller;

use Passionweb\GoogleMapsCluster\Domain\Model\Marker;
use Passionweb\GoogleMapsCluster\Domain\Repository\MarkerRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class MapController extends ActionController
{
    protected array $extConf;
    protected MarkerRepository $markerRepository;

    public function __construct(
        MarkerRepository $markerRepository,
        array $extConf
    )
    {
        $this->markerRepository = $markerRepository;
        $this->extConf = $extConf;
    }

    public function clusterAction(): ResponseInterface
    {
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->addCssFile('EXT:google_maps_cluster/Resources/Public/Css/cluster.css');
        $pageRenderer->addJsFooterFile('https://maps.googleapis.com/maps/api/js?key=' . $this->extConf['mapsApiKey'], 'text/javascript', true, false, '', false, '|', true);
        $pageRenderer->addJsFooterFile('EXT:google_maps_cluster/Resources/Public/JavaScript/markerclusterer.min.js');
        $pageRenderer->addJsFooterFile('EXT:google_maps_cluster/Resources/Public/JavaScript/cluster.js');

        $markers = $this->markerRepository->findAll();

        $locationData = [];
        $labelData = [];
        /** @var Marker $marker */
        foreach ($markers as $marker) {
            $locationData[] = ['lat' => $marker->getLat(), 'lng' => $marker->getLon()];
            $labelData[] = $marker->getTitle();
        }

        $mapsData = '<script type="text/javascript">
            function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: '. (int)$this->extConf['mapsZoom'] .',
    center: { lat: '. (float)$this->extConf['centralMarkerLat'] .', lng: '. (float)$this->extConf['centralMarkerLon'] .' },
  });
  const infoWindow = new google.maps.InfoWindow({
    content: "",
    disableAutoPan: true,
  });

  const markers = locations.map((position, i) => {
    const label = labels[i];
    const marker = new google.maps.Marker({
      position,
      i
    });

    marker.addListener("click", () => {
      infoWindow.setContent(label);
      infoWindow.open(map, marker);
    });
    return marker;
  });

  new markerClusterer.MarkerClusterer({ markers, map });
}
let locations = ' . json_encode($locationData) . '
let labels = ' . json_encode($labelData) . '
        </script>';

        $this->view->assign('mapsData', $mapsData);
        return $this->htmlResponse();
    }
}
