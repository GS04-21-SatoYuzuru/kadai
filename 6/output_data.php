<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>山手線ヒートマップ 出力側</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
        }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto', 'sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #floating-panel {
            background-color: #fff;
            border: 1px solid #999;
            left: 25%;
            padding: 5px;
            position: absolute;
            top: 10px;
            z-index: 5;
        }
    </style>
</head>

<body>
    <?php
        //言語設定、内部エンコーディングを指定する
        mb_language("japanese");
        mb_internal_encoding("UTF-8");
        mb_http_output("UTF-8");

        $station = $_POST["station"];
        $trafficy_level = $_POST["trafficy_level"];
    ?>
        <div id="floating-panel">
            <button onclick="toggleHeatmap()">Toggle Heatmap</button>
            <button onclick="changeGradient()">Change gradient</button>
            <button onclick="changeRadius()">Change radius</button>
            <button onclick="changeOpacity()">Change opacity</button>
        </div>
        <div id="map"></div>
        <script>
            var map, heatmap;

            var station = "<?= $station ?>";
            var trafficy_level = parseInt(<?= $trafficy_level ?>);

            var value_tmp = 0;

            // TODO: 一度行ったら二度目はしないようにしたい
            initStationInfo();

            checkStationAndTrafficyLV(station, trafficy_level);

            function initStationInfo(value) {
                localStorage.clear();
                localStorage.setItem("tLv_tokyo", 1);
                localStorage.setItem("tLv_yurakucho", 1);
                localStorage.setItem("tLv_shimbashi", 1);
                localStorage.setItem("tLv_hamamatsucho", 1);
                localStorage.setItem("tLv_tamachi", 1);
                localStorage.setItem("tLv_shinagawa", 1);
                localStorage.setItem("tLv_osaki", 1);
                localStorage.setItem("tLv_gotanda", 1);
                localStorage.setItem("tLv_meguro", 1);
                localStorage.setItem("tLv_ebisu", 1);
                localStorage.setItem("tLv_shibuya", 1);
                localStorage.setItem("tLv_harajuku", 1);
                localStorage.setItem("tLv_yoyogi", 1);
                localStorage.setItem("tLv_shinjuku", 1);
            }

            function checkStationAndTrafficyLV(name, value) {
                switch (name) {
                case "tokyo":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_tokyo"));
                    localStorage.setItem("tLv_tokyo", value_tmp);
                    console.log("東京: " + localStorage.getItem("tLv_tokyo"));
                    break;
                case "yurakucho":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_yurakucho"));
                    localStorage.setItem("tLv_yurakucho", value_tmp);
                    console.log("有楽町: " + localStorage.getItem("tLv_yurakucho"));
                    break;
                case "shimbashi":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_shimbashi"));
                    localStorage.setItem("tLv_shimbashi", value_tmp);
                    console.log("新橋: " + localStorage.getItem("tLv_shimbashi"));
                    break;
                case "hamamatsucho":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_hamamatsucho"));
                    localStorage.setItem("tLv_hamamatsucho", value_tmp);
                    console.log("浜松町: " + localStorage.getItem("tLv_hamamatsucho"));
                    break;
                case "tamachi":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_tamachi"));
                    localStorage.setItem("tLv_tamachi", value_tmp);
                    console.log("田町: " + localStorage.getItem("tLv_tamachi"));
                    break;
                case "shinagawa":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_shinagawa"));
                    localStorage.setItem("tLv_shinagawa", value_tmp);
                    console.log("品川: " + localStorage.getItem("tLv_shinagawa"));
                    break;
                case "osaki":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_osaki"));
                    localStorage.setItem("tLv_osaki", value_tmp);
                    console.log("大崎: " + localStorage.getItem("tLv_osaki"));
                    break;
                case "gotanda":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_gotanda"));
                    localStorage.setItem("tLv_gotanda", value_tmp);
                    console.log("五反田: " + localStorage.getItem("tLv_gotanda"));
                    break;
                case "meguro":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_meguro"));
                    localStorage.setItem("tLv_meguro", value_tmp);
                    console.log("目黒: " + localStorage.getItem("tLv_meguro"));
                    break;
                case "ebisu":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_ebisu"));
                    localStorage.setItem("tLv_ebisu", value_tmp);
                    console.log("恵比寿: " + localStorage.getItem("tLv_ebisu"));
                    break;
                case "shibuya":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_shibuya"));
                    localStorage.setItem("tLv_shibuya", value_tmp);
                    console.log("渋谷: " + localStorage.getItem("tLv_shibuya"));
                    break;
                case "harajuku":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_harajuku"));
                    localStorage.setItem("tLv_harajuku", value_tmp);
                    console.log("原宿: " + localStorage.getItem("tLv_harajuku"));
                    break;
                case "yoyogi":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_yoyogi"));
                    localStorage.setItem("tLv_yoyogi", value_tmp);
                    console.log("代々木: " + localStorage.getItem("tLv_yoyogi"));
                    break;
                case "shinjuku":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_shinjuku"));
                    localStorage.setItem("tLv_shinjuku", value_tmp);
                    console.log("新宿: " + localStorage.getItem("tLv_shinjuku"));
                    break;
                default:
                    break;
                }

            }

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: {
                        lat: 35.681298,
                        lng: 139.766247
                    },
                    mapTypeId: google.maps.MapTypeId.SATELLITE
                });

                heatmap = new google.maps.visualization.HeatmapLayer({
                    data: getPoints(),
                    map: map
                });
            }

            function toggleHeatmap() {
                heatmap.setMap(heatmap.getMap() ? null : map);
            }

            function changeGradient() {
                var gradient = [
    'rgba(0, 255, 255, 0)',
    'rgba(0, 255, 255, 1)',
    'rgba(0, 191, 255, 1)',
    'rgba(0, 127, 255, 1)',
    'rgba(0, 63, 255, 1)',
    'rgba(0, 0, 255, 1)',
    'rgba(0, 0, 223, 1)',
    'rgba(0, 0, 191, 1)',
    'rgba(0, 0, 159, 1)',
    'rgba(0, 0, 127, 1)',
    'rgba(63, 0, 91, 1)',
    'rgba(127, 0, 63, 1)',
    'rgba(191, 0, 31, 1)',
    'rgba(255, 0, 0, 1)'
  ]
                heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
            }

            function changeRadius() {
                heatmap.set('radius', heatmap.get('radius') ? null : 20);
            }

            function changeOpacity() {
                heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
            }

            // Heatmap data: 500 Points
            function getPoints() {
                return [

                    // 東京
                    new google.maps.LatLng(35.681298, 139.766247),
                    {
                        // 東京
                        location: new google.maps.LatLng(35.681298, 139.766247),
                        weight: parseInt(localStorage.getItem("tLv_tokyo"))
                        },
                    {
                        // 有楽町
                        location: new google.maps.LatLng(35.674942, 139.762894),
                        weight: parseInt(localStorage.getItem("tLv_yurakucho"))
                        },
                    {
                        // 新橋
                        location: new google.maps.LatLng(35.666132, 139.758412),
                        weight: parseInt(localStorage.getItem("tLv_shimbashi"))
                        },
                    {
                        // 浜松町
                        location: new google.maps.LatLng(35.655381, 139.757129),
                        weight: parseInt(localStorage.getItem("tLv_hamamatsucho"))
                    },
                    {
                        // 田町
                        location: new google.maps.LatLng(35.645798, 139.747656),
                        weight: parseInt(localStorage.getItem("tLv_tamachi"))
                    },
                    {
                        // 品川
                        location: new google.maps.LatLng(35.628856, 139.73885),
                        weight: parseInt(localStorage.getItem("tLv_shinagawa"))
                    },
                    {
                        // 大崎
                        location: new google.maps.LatLng(35.620023, 139.728188),
                        weight: parseInt(localStorage.getItem("tLv_osaki"))
                    },
                    {
                        // 五反田
                        location: new google.maps.LatLng(35.626178, 139.723606),
                        weight: parseInt(localStorage.getItem("tLv_gotanda"))
                    },
                    {
                        // 目黒
                        location: new google.maps.LatLng(35.633998, 139.715828),
                        weight: parseInt(localStorage.getItem("tLv_meguro"))
                    },
                    {
                        // 恵比寿
                        location: new google.maps.LatLng(35.647156, 139.709739),
                        weight: parseInt(localStorage.getItem("tLv_ebisu"))
                    },
                    {
                        // 渋谷
                        location: new google.maps.LatLng(35.6595, 139.699554),
                        weight: parseInt(localStorage.getItem("tLv_shibuya"))
                    },
                    {
                        // 原宿
                        location: new google.maps.LatLng(35.670399, 139.702715),
                        weight: parseInt(localStorage.getItem("tLv_harajuku"))
                    },
                    {
                        // 代々木
                        location: new google.maps.LatLng(35.684043, 139.702188),
                        weight: parseInt(localStorage.getItem("tLv_yoyogi"))
                    },
                    {
                        // 新宿
                        location: new google.maps.LatLng(35.690553, 139.699579),
                        weight: parseInt(localStorage.getItem("tLv_shinjuku"))
                    }
                ];
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi-xgm6MrOIMNp2t1GvVknWxG6fjI-vPY&signed_in=true&libraries=visualization&callback=initMap">
        </script>
</body>

</html>
