/**
 * Maritime Travellers Protection Committee
 * Interactive map of Australian ports.
 */

/**
 * Australian port type enum
 */
var PortType = {
    'MAJOR': 'Major',
    'MINOR': 'Minor',
    'RESTRICTED': 'Restricted',
    'EOP': 'Excise Offshore Places'
};

/**
 * An Australian Port
 */
function Port(name, state, latString, latDecimal, longString, longDecimal, description, www, PortType) {
    this.name = $.trim(name);
    this.state = $.trim(state);
    this.latString = $.trim(latString); // latitude string e.g. 20Â° 4' S
    this.latDecimal = latDecimal; // latitude decimal e.g. -20.066667
    this.longString = $.trim(longString); // longitude string e.g. 148Â° 21' E
    this.longDecimal = longDecimal; // longitude decimal e.g. 148.35
    this.description = $.trim(description);
    this.www = $.trim(www); // web address
    this.type = PortType;
}

/**
 * Load the map of Australian ports, including Maps API
 */
function loadPortsMap() {
    var $mapDiv = $(".ports-map");

    if ($mapDiv.length != 1) {
        return;
    }

    $('.static-ports-map').hide();

    // Asynchronously load Maps API after document load
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=createPortsMap";
    document.body.appendChild(script);
}

/**
 * Create the map with port markers and info windows
 */
function createPortsMap() {
    var mapDiv = $('.ports-map').get(0);

    var centre = new google.maps.LatLng(-27.4, 132.7);
    var mapOptions = {
        zoom: 4,
        minZoom: 4,
        center: centre,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        streetViewControl: false,
        mapTypeControl: false
    };
    var map = new google.maps.Map(mapDiv, mapOptions);
    var infoWindow = new google.maps.InfoWindow();

    plotPorts();

    google.maps.event.addListener(map, 'click', function() {
        infoWindow.close();
    });

    $(mapDiv).show();
    $('.interactive-ports-map-note').show();
    
    /**
     * Create a marker on the map for a port with an infoWindow
     */
    function createMarker(port) {
        var link = port.www != '' ? '<a href=http://' + port.www + ' style="text-decoration: underline;" target="_blank">' + port.www + '</a>' : '';

        var content = '<span style="color: #000000; font-weight: bold;">' + port.name;

        if (port.state != '' && port.state != 'OT') {
            content += ', ' + port.state;
        }

        content += '</span><br/><span style="font-style: italic;">' + port.type + ' Port</span>';

        if (port.description != '') {
            content += '<br/>' + port.description;
        }

        if (port.link != '') {
            content += '<br/>' + link;
        }

        var position = new google.maps.LatLng(port.latDecimal, port.longDecimal);

        var icon;

        if (PortType.MAJOR === port.type) {
            icon = '../wordpress/wp-content/themes/mtpc/images/mtpc/boat-blue.png';
        } else if (PortType.MINOR === port.type) {
            icon = '../wordpress/wp-content/themes/mtpc/images/mtpc/boat-orange.png';
        } else if (PortType.RESTRICTED === port.type) {
            icon = '../wordpress/wp-content/themes/mtpc/images/mtpc/boat-red.png';
        } else if (PortType.EOP === port.type) {
            icon = '../wordpress/wp-content/themes/mtpc/images/mtpc/boat-aqua.png';
        }

        var markerOptions = {
            position: position,
            map: map,
            title: port.name,
            content: content,
            optimized: false,
            icon: icon
        };
        var marker = new google.maps.Marker(markerOptions);

        google.maps.event.addListener(marker, "click", function() {
            infoWindow.setOptions(markerOptions);
            infoWindow.open(map, marker);
        });
    }

    /**
     * Array of Ports in Australia
     */
    function getPorts() {
        var ports = [

            new Port("	Sydney	","	NSW	","	33° 51' S	",	-33.8547251762	,"	151° 13' E	",	151.2139583824	,"	Wharf 5 Barangaroo or Overseas Passenger Terminal (OPT) Circular Quay	","	www.sydneyports.com.au	",	PortType.MAJOR	),
            new Port("	Botany Bay	","	NSW	","	33° 59' S	",	-33.983333	,"	151° 12' E	",	151.2	,"		","	www.sydneyports.com.au	",	PortType.MINOR	),
            new Port("	Coffs Harbour	","	NSW	","	30° 19' S	",	-30.316667	,"	153° 8' E	",	153.133333	,"		","		",	PortType.MINOR	),
            new Port("	Eden	","	NSW	","	37° 4' S	",	-37.066667	,"	149° 56' E	",	149.933333	,"		","		",	PortType.MINOR	),
            new Port("	Lord Howe Island	","	NSW	","	31° 33' S	",	-31.554987	,"	146° 49' E	",	159.082096	,"		","		",	PortType.MINOR	),
            new Port("	Newcastle	","	NSW	","	32° 55' S	",	-32.916667	,"	151° 47' E	",	151.783333	,"		","	www.newportcorp.com.au	",	PortType.MINOR	),
            new Port("	Port Kembla	","	NSW	","	34° 28' S	",	-34.466667	,"	150° 54' E	",	150.9	,"		","	www.kemblaport.com.au	",	PortType.MINOR	),
            new Port("	Jervis Bay	","	NSW	","	35° 8' S	",	-35.133	,"	150° 42' E	",	150.7	,"		","		",	PortType.RESTRICTED	),
            new Port("	Darwin	","	NT	","	12° 28' S	",	-12.4707433743	,"	130° 51' E	",	130.8493801408	,"	Darwin Cruise Ship Terminal	","	www.darwinport.nt.gov.au	",	PortType.MAJOR	),
            new Port("	Melville Bay (Gove)	","	NT	","	12° 12' S	",	-12.2	,"	136° 44' E	",	136.733333	,"	Nhulunbuy	","		",	PortType.MINOR	),
            new Port("	Milner Bay (Groote)	","	NT	","	13° 52' S	",	-13.866667	,"	136° 23' E	",	136.383333	,"	Groote Eylandt, Anindilyakwa	","		",	PortType.MINOR	),
            new Port("	Christmas Island	","	OT	","	10° 25' S	",	-10.416667	,"	105° 43' E	",	105.716667	,"		","		",	PortType.EOP	),
            new Port("	Macquarie Island	","	OT	","	54° 30' S	",	-54.5	,"	158° 57' E	",	158.95	,"		","	www.antarctica.gov.au	",	PortType.RESTRICTED	),
            new Port("	Port Kennedy (Thursday Island) 	","	QLD	","	10° 35' S	",	-10.582469	,"	142° 13' E	",	142.220078	,"		","		",	PortType.EOP	),
            new Port("	Brisbane	","	QLD	","	27° 27' S	",	-27.4414215519	,"	153° 4' E	",	153.068363731	,"	Port Side or Multi Use Terminal	","	www.portbris.com.au	",	PortType.MAJOR	),
            new Port("	Cairns	","	QLD	","	16° 55' S	",	-16.9289074146	,"	145° 47' E	",	145.7801971236	,"	Cairns Cruise Ship Terminal	","	www.cairnsport.com.au	",	PortType.MAJOR	),
            new Port("	Abbot Point/Bowen	","	QLD	","	20° 4' S	",	-20.066667	,"	148° 21' E	",	148.35	,"		","	www.pcq.com.au	",	PortType.MINOR	),
            new Port("	Bundaberg	","	QLD	","	24° 45' S	",	-24.75	,"	152° 24' E	",	152.4	,"		","	www.portofbundaberg.com.au	",	PortType.MINOR	),
            new Port("	Gladstone	","	QLD	","	23° 50' S	",	-23.833333	,"	151° 35' E	",	151.583333	,"		","	www.gpcl.com.au	",	PortType.MINOR	),
            new Port("	Hay Point	","	QLD	","	21° 13' S	",	-21.216667	,"	149° 20' E	",	149.333333	,"		","	www.pcq.com.au	",	PortType.MINOR	),
            new Port("	Karumba	","	QLD	","	17° 28' S	",	-17.466667	,"	140° 50' E	",	140.833333	,"		","	www.pcq.com.au	",	PortType.MINOR	),
            new Port("	Lockhart River	","	QLD	","	12° 48' S	",	-12.795229	,"	143° 22' E	",	143.359708	,"	Quintell Beach	","	www.cairnsport.com.au	",	PortType.MINOR	),
            new Port("	Lucinda	","	QLD	","	18° 32' S	",	-18.533333	,"	146° 20' E	",	143.416667	,"		","	www.pcq.com.au	",	PortType.MINOR	),
            new Port("	Mackay	","	QLD	","	21° 10' S	",	-21.166667	,"	149° 14' E	",	149.233333	,"		","	www.mackayports.com	",	PortType.MINOR	),
            new Port("	Mourilyan (Innisfail)	","	QLD	","	17° 37' S	",	-17.616667	,"	146° 7' E	",	146.116667	,"		","	www.pcq.com.au	",	PortType.MINOR	),
            new Port("	Port Alma	","	QLD	","	23° 35' S	",	-23.583333	,"	150° 52' E	",	150.866667	,"	Rockhampton	","	www.msq.qld.gov.au	",	PortType.MINOR	),
            new Port("	Townsville	","	QLD	","	19° 15' S	",	-19.25	,"	146° 50' E	",	146.833333	,"		","	www.townsville-port.com.au	",	PortType.MINOR	),
            new Port("	Weipa	","	QLD	","	12° 40' S	",	-12.666667	,"	141° 51' E	",	141.85	,"		","	www.pcq.com.au	",	PortType.MINOR	),
            new Port("	Cooktown	","	QLD	","	15° 28' S	",	-15.466667	,"	145° 15' E	",	145.25	,"		","	www.pcq.com.au	",	PortType.RESTRICTED	),
            new Port("	Fitzalan Passage	","	QLD	","	20° 20' S	",	-20.348168	,"	148° 59' E	",	148.983107	,"	Hamilton Island, Whitsundays	","		",	PortType.RESTRICTED	),
            new Port("	Funnel Bay	","	QLD	","	20° 15' S	",	-20.255836	,"	148° 45' E	",	148.747416	,"	Airlie Beach, Whitsundays	","		",	PortType.RESTRICTED	),
            new Port("	Percy Island	","	QLD	","	21° 39' S	",	-21.646898	,"	150° 16' E	",	150.266361	,"		","		",	PortType.RESTRICTED	),
            new Port("	Port Adelaide	","	SA	","	34° 47' S	",	-34.77505378	,"	138° 29' E	",	138.4836505905	,"	Adelaide Passenger Terminal	","	www.flindersports.com.au	",	PortType.MAJOR	),
            new Port("	Ardrossan	","	SA	","	34° 26' S	",	-34.433333	,"	137° 55' E	",	137.916667	,"		","	www.abb.com.au	",	PortType.MINOR	),
            new Port("	Port Bonython	","	SA	","	33° 01' S	",	-33.016667	,"	137° 46' E	",	137.766667	,"		","	www.flindersports.com.au	",	PortType.MINOR	),
            new Port("	Port Giles	","	SA	","	35° 02' S	",	-35.033333	,"	137° 46' E	",	137.766667	,"		","	www.flindersports.com.au	",	PortType.MINOR	),
            new Port("	Port Lincoln	","	SA	","	34° 44' S	",	-34.733333	,"	135° 56' E	",	135.933333	,"		","	www.flindersports.com.au	",	PortType.MINOR	),
            new Port("	Port Pirie	","	SA	","	33° 10' S	",	-33.166667	,"	138° 02' E	",	138.033333	,"		","	www.flindersports.com.au	",	PortType.MINOR	),
            new Port("	Thevenard	","	SA	","	32° 7' S	",	-32.116667	,"	133° 38' E	",	133.633333	,"	Port Adelaide	","	www.flindersports.com.au	",	PortType.MINOR	),
            new Port("	Wallaroo	","	SA	","	33° 56' S	",	-33.933333	,"	137° 37' E	",	137.616667	,"		","	www.flindersports.com.au	",	PortType.MINOR	),
            new Port("	Hobart	","	TAS	","	42° 53' S	",	-42.8856667633	,"	147° 20' E	",	147.3346596977	,"	Hobart Cruise Terminal	","	www.tasports.com.au	",	PortType.MAJOR	),
            new Port("	Burnie	","	TAS	","	41° 03' S	",	-41.05447	,"	145° 55' E	",	145.913844	,"		","	www.tasports.com.au	",	PortType.MINOR	),
            new Port("	Devonport	","	TAS	","	41° 09' S	",	-41.15	,"	146° 22' E	",	146.366667	,"		","	www.tasports.com.au	",	PortType.MINOR	),
            new Port("	Launceston	","	TAS	","	41° 26' S	",	-41.433333	,"	146° 46' E	",	146.766667	,"		","	www.tasports.com.au	",	PortType.MINOR	),
            new Port("	Port Latta	","	TAS	","	40° 51' S	",	-40.85	,"	145° 23' E	",	145.383333	,"		","	www.tasports.com.au	",	PortType.MINOR	),
            new Port("	Spring Bay	","	TAS	","	42° 33' S	",	-42.55	,"	 147° 56' E	",	147.933333	,"		","	www.tasports.com.au	",	PortType.MINOR	),
            new Port("	Stanley	","	TAS	","	40° 46' S	",	-40.766667	,"	145° 18' E	",	145.3	,"		","	www.tasports.com.au	",	PortType.MINOR	),
            new Port("	Wineglass Bay	","	TAS	","	42° 9' S	",	-42.152714	,"	148° 20' E	",	148.330879	,"		","	www.wineglassbay.com	",	PortType.RESTRICTED	),
            new Port("	Melbourne	","	VIC	","	37° 51' S	",	-37.8432094464	,"	144° 56' E	",	144.9267604579	,"	Station Pier Sea Passenger Terminal	","	www.portofmelbourne.com	",	PortType.MAJOR	),
            new Port("	Port Welshpool	","	VIC	","	38° 42' S	",	-38.694353	,"	146° 28' E	",	146.466637	,"		","	south-gippsland.com/portwelshpool.htm	",	PortType.MINOR	),
            new Port("	Geelong	","	VIC	","	38° 07' S	",	-38.116666667	,"	144° 23' E	",	144.383333333	,"		","	www.regionalchannels.vic.gov.au	",	PortType.MINOR	),
            new Port("	Portland	","	VIC	","	38°21'S	",	-38.35	,"	141°37'E	",	141.616666667	,"		","	www.portofportland.com.au	",	PortType.MINOR	),
            new Port("	Fremantle	","	WA	","	32° 3' S	",	-32.0495169532	,"	115° 45' E	",	115.7448702936	,"	Fremantle Passenger Terminal	","	www.fremantleports.com.au	",	PortType.MAJOR	),
            new Port("	Albany	","	WA	","	35° 2' S	",	-35.033333	,"	117° 54' E	",	117.9	,"		","	www.albanyport.com.au	",	PortType.MINOR	),
            new Port("	Broome	","	WA	","	17° 58' S	",	-17.966667	,"	122° 14' E	",	122.233333	,"		","	broomeport.wa.gov.au	",	PortType.MINOR	),
            new Port("	Bunbury	","	WA	","	33° 20' S	",	-33.333333	,"	115° 38' E	",	115.633333	,"		","	www.byport.com.au	",	PortType.MINOR	),
            new Port("	Cape Cuvier	","	WA	","	24° 13' S	",	-24.216667	,"	113° 22' E	",	113.366667	,"		","	www.westernaustralia.com	",	PortType.MINOR	),
            new Port("	Cape Preston	","	WA	","	10° 35' S	",	-10.579875	,"	142° 13' E	",	142.218533	,"		","		",	PortType.MINOR	),
            new Port("	Carnarvon	","	WA	","	24° 52' S	",	-24.866667	,"	113° 37' E	",	113.616667	,"		","	www.dpi.wa.gov.au	",	PortType.MINOR	),
            new Port("	Dampier	","	WA	","	20° 40' S	",	-20.666667	,"	116° 42' E	",	116.7	,"		","	www.dpa.wa.gov.au	",	PortType.MINOR	),
            new Port("	Esperance	","	WA	","	33° 52' S	",	-33.866667	,"	121° 53' E	",	121.883333	,"		","	www.esperanceport.com.au	",	PortType.MINOR	),
            new Port("	Exmouth	","	WA	","	21° 49' S	",	-21.816667	,"	114° 11' E	",	114.183333	,"		","	www.transport.wa.gov.au/imarine/19450.asp	",	PortType.MINOR	),
            new Port("	Geraldton	","	WA	","	28° 47' S	",	-28.783333	,"	114° 36' E	",	114.6	,"		","	gpa.wa.gov.au	",	PortType.MINOR	),
            new Port("	Onslow	","	WA	","	21° 36' S	",	-21.602535	,"	115° 7' E	",	115.110626	,"		","	www.transport.wa.gov.au	",	PortType.MINOR	),
            new Port("	Port Hedland	","	WA	","	20° 19' S	",	-20.316667	,"	118° 36' E	",	118.6	,"		","	www.phpa.com.au	",	PortType.MINOR	),
            new Port("	Port Walcott	","	WA	","	20° 39' S	",	-20.65	,"	117° 11' E	",	117.183333	,"	Wickham	","		",	PortType.MINOR	),
            new Port("	Cape Leveque	","	WA	","	16° 16' S	",	-16.272687	,"	122° 56' E	",	122.937012	,"	Dampier Peninsula	","		",	PortType.RESTRICTED	)

            
        ];

        return ports;
    }

    /**
     * Plot the port markers on the map
     */
    function plotPorts() {
        var ports = getPorts();
        for (port in ports) {
            createMarker(ports[port]);
        }
    }
}