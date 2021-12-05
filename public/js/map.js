window.onload = init;

function init() {
    const map = new ol.Map({
        view: getView(),
        target: 'js-map'
    });

    map.on('click', function (e) {
        console.log(e.coordinate);
    });

    //Basemap group
    const baseLayersGroup = getBaseLayersGroup();
    //Business layers group
    const businessLayersGroup = getBusinessLayersGroup();

    // Adding layers to map
    map.addLayer(baseLayersGroup);
    map.addLayer(businessLayersGroup);

    addBaseLayersMenu(baseLayersGroup);

    // map.getView().fit([12.1451849670559, -5.77188592678666, 12.5311494943228, -5.11706440856696]);

}

function getView() {
    return new ol.View({
        center: [ 1635857.2496572973, -12.159092342982895 ],
        zoom: 6,
        maxZoom: 10,
        minZoom: 1,
        projection: 'EPSG:4326'
    });
}

function getBaseLayersGroup() {

    // Basemap layers
    const openStreetMapStandard = new ol.layer.Tile({
        source: new ol.source.OSM(),
        visible: false,
        title: 'openStreetMapStandard'
    });
    const openStreetMapHumanitarian = new ol.layer.Tile({
        source: new ol.source.OSM({
            url: 'https://{a-c}.tile.openstreetmap.fr/hot/${z}/${x}/${y}.png'
        }),
        visible: false,
        title: 'openStreetMapHumanitarian'
    });
    const stamenTerrain = new ol.layer.Tile({
        source: new ol.source.OSM({
            url: 'https://stamen-tiles.a.ssl.fastly.net/terrain/{z}/{x}/{y}.jpg',
        }),
        visible: false,
        title: 'stamenTerrain'
    });
    const mapproxyGMlayer = new ol.layer.Tile({
        source: new ol.source.OSM({
            url: 'https://niugis.sugiro.eu/mapproxy/wmts/gm_layer/gm_grid/{z}/{x}/{y}.jpg',
        }),
        visible: false,
        title: 'mapproxyGMlayer'
    });
    return new ol.layer.Group({
        layers: [openStreetMapStandard, openStreetMapHumanitarian, stamenTerrain, mapproxyGMlayer]
    });
}

function getBusinessLayersGroup() {

    const source = new ol.source.Vector({
        url: '/data',
        format: new ol.format.GeoJSON()
    });
    const vectorLayer = new ol.layer.Vector({
        source: source
    });


    // Business layers
    const mapserverLayer = new ol.layer.Tile({
        source: new ol.source.TileWMS({
            url: 'https://residencia.niugis.com/cgi-bin/mapserv',

            params: {
                // 'MAP': '/var/www/htdocs/websig/v7/mapfile/residencia/analise.map',
                'MAP': '/var/www/htdocs/websig/v7/mapfile/residencia/modelsite.map',
                // 'LAYERS': ['0a548eb268927ca50e11fbf9ceefa6ea'],
                // 'modelsite_provincias', 'modelsite_municipios', 'modelsite_comunas', 'modelsite_bairros', 'modelsite_areas'
                'LAYERS': ['modelsite_provincias'],
                'FORMAT': 'image/png',
                'VERSION': '1.1.1'
            },
            serverType: 'mapserver',
        }),
        visible: true
    })

    return new ol.layer.Group({
        layers: [mapserverLayer, vectorLayer]
    });
}

function addBaseLayersMenu(baseLayersGroup) {

    // Creating a menu to change basemap
    let radio_div = document.getElementById("map-radio-buttons");
    baseLayersGroup.getLayers().forEach(function (element, index, array) {
        let radioButton = document.createElement("INPUT");
        radioButton.setAttribute("type", "radio");
        radioButton.setAttribute("name", "baseLayerRadioButton");
        radioButton.setAttribute("value", element.get('title'));
        radioButton.setAttribute("class", 'btn-check');
        radioButton.setAttribute('id', 'rb'+index);

        radioButton.addEventListener('change', function() {
            console.log(this);
            baseLayersGroup.getLayers().forEach(function (e, i, a) {
                console.log(e.get('title'));
                console.log(radioButton.value);
                e.setVisible( e.get('title') === radioButton.value );
            });
        });

        let label = document.createElement("label");
        label.setAttribute('class', 'btn btn-outline-primary')
        label.setAttribute('for', 'rb'+index)
        // label.appendChild(radioButton);
        label.appendChild(document.createTextNode( element.get('title')  ));

        radio_div.appendChild(radioButton);
        radio_div.appendChild(label);
    });
}