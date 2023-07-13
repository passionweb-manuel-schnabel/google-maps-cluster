# Google Maps Cluster

Simple plugin for adding a google maps cluster (TYPO3 CMS)

## What does it do?

Adds a plugin for generating a Google Maps cluster based on specific marker records.

## Installation

Add via composer:

    composer require "passionweb/google-maps-cluster"

* Install the extension via composer
* Flush TYPO3 and PHP Cache

## Requirements

This example uses the Google Maps API.

Adjustments to the CSP headers will be necessary. Please also consider all data protection adjustments for the use of the Google Maps API.

## Extension settings

There are the following extension settings available.

### `mapsApiKey`

    # cat=Google Maps; type=string; label=Google Maps API Key
    mapsApiKey = YOUR_API_KEY

Enter your Google Maps API key.

### `mapsZoom`

    # cat=Google Maps; type=string; label=Zoom level
    mapsZoom = 3

Enter your desired zoom level.

### `centralMarkerLatitude`

    # cat=Google Maps; type=string; label=Latitude of the central marker
    centralMarkerLatitude = 50.024

Enter the latitude value for the central marker.

### `centralMarkerLongitude`

    # cat=Google Maps; type=string; label=Longitude of the central marker
    centralMarkerLongitude = 11.887

Enter the longitude value for the central marker.

## Troubleshooting and logging

If something does not work as expected take a look at the log file.
Every problem is logged to the TYPO3 log (normally found in `var/log/typo3_*.log`)

## Achieving more together or Feedback, Feedback, Feedback

I'm grateful for any feedback! Be it suggestions for improvement, requests or just a (constructive) feedback on how good or crappy this snippet/repo is.

Feel free to send me your feedback to [service@passionweb.de](mailto:service@passionweb.de "Send Feedback") or [contact me on Slack](https://typo3.slack.com/team/U02FG49J4TG "Contact me on Slack")
