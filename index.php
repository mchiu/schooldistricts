<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
<script src="./L.KML.js"></script>
</head>
<body>
    <div style="width: 100vw; height: 100vh" id="map"></div>
    <script type="text/javascript">
        // Make basemap 28.412, 77.317
        const map = new L.Map('map', { center: new L.LatLng(29.7560, -95.3573), zoom: 11 });
        const osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    map.addLayer(osm);

    // Load kml file
    fetch('COH_NEIGHBORHOOD_SERVICES_-_MIL.kml')
        .then(res => res.text())
        .then(kmltext => {
            // Create new kml overlay
            const parser = new DOMParser();
            const kml = parser.parseFromString(kmltext, 'text/xml');
            const track = new L.KML(kml);
            map.addLayer(track);

            // Adjust map to show the kml
            const bounds = track.getBounds();
            map.fitBounds(bounds);
        });
</script>
