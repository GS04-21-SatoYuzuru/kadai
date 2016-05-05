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
            //            initStationInfo();

            checkStationAndTrafficyLV(station, trafficy_level);

            function initStationInfo(value) {
                localStorage.clear();
                localStorage.setItem("tLv_tokyo", 50);
                localStorage.setItem("tLv_yurakucho", 5);
                localStorage.setItem("tLv_shimbashi", 1);
                localStorage.setItem("tLv_hamamatsucho", 2);
                localStorage.setItem("tLv_tamachi", 3);
                localStorage.setItem("tLv_shinagawa", 7);
                localStorage.setItem("tLv_osaki", 14);
                localStorage.setItem("tLv_gotanda", 1);
                localStorage.setItem("tLv_meguro", 8);
                localStorage.setItem("tLv_ebisu", 4);
                localStorage.setItem("tLv_shibuya", 10);
                localStorage.setItem("tLv_harajuku", 15);
                localStorage.setItem("tLv_yoyogi", 20);
                localStorage.setItem("tLv_shinjuku", 6);
                localStorage.setItem("tLv_shinokubo", 2);
                localStorage.setItem("tLv_takadanobaba", 6);
                localStorage.setItem("tLv_mejiro", 2);
                localStorage.setItem("tLv_ikebukuro", 8);
                localStorage.setItem("tLv_otsuka", 13);
                localStorage.setItem("tLv_sugamo", 30);
                localStorage.setItem("tLv_komagome", 4);
                localStorage.setItem("tLv_tabata", 16);
                localStorage.setItem("tLv_nishinippori", 7);
                localStorage.setItem("tLv_nippori", 9);
                localStorage.setItem("tLv_uguisudani", 10);
                localStorage.setItem("tLv_ueno", 12);
                localStorage.setItem("tLv_okachimachi", 15);
                localStorage.setItem("tLv_akihabara", 4);
                localStorage.setItem("tLv_kanda", 6);
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
                case "shinokubo":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_shinokubo"));
                    localStorage.setItem("tLv_shinokubo", value_tmp);
                    console.log("新大久保: " + localStorage.getItem("tLv_shinokubo"));
                    break;
                case "takadanobaba":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_takadanobaba"));
                    localStorage.setItem("tLv_takadanobaba", value_tmp);
                    console.log("高田馬場: " + localStorage.getItem("tLv_takadanobaba"));
                    break;
                case "mejiro":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_mejiro"));
                    localStorage.setItem("tLv_mejiro", value_tmp);
                    console.log("目白: " + localStorage.getItem("tLv_mejiro"));
                    break;
                case "ikebukuro":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_ikebukuro"));
                    localStorage.setItem("tLv_ikebukuro", value_tmp);
                    console.log("池袋: " + localStorage.getItem("tLv_ikebukuro"));
                    break;
                case "otsuka":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_otsuka"));
                    localStorage.setItem("tLv_otsuka", value_tmp);
                    console.log("大塚: " + localStorage.getItem("tLv_otsuka"));
                    break;
                case "sugamo":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_sugamo"));
                    localStorage.setItem("tLv_sugamo", value_tmp);
                    console.log("巣鴨: " + localStorage.getItem("tLv_sugamo"));
                    break;
                case "komagome":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_komagome"));
                    localStorage.setItem("tLv_komagome", value_tmp);
                    console.log("駒込: " + localStorage.getItem("tLv_komagome"));
                    break;
                case "tabata":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_tabata"));
                    localStorage.setItem("tLv_tabata", value_tmp);
                    console.log("田端: " + localStorage.getItem("tLv_tabata"));
                    break;
                case "nishinippori":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_nishinippori"));
                    localStorage.setItem("tLv_nishinippori", value_tmp);
                    console.log("西日暮里: " + localStorage.getItem("tLv_nishinippori"));
                    break;
                case "nippori":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_nippori"));
                    localStorage.setItem("tLv_nippori", value_tmp);
                    console.log("日暮里: " + localStorage.getItem("tLv_nippori"));
                    break;
                case "uguisudani":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_uguisudani"));
                    localStorage.setItem("tLv_uguisudani", value_tmp);
                    console.log("鶯谷: " + localStorage.getItem("tLv_uguisudani"));
                    break;
                case "ueno":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_ueno"));
                    localStorage.setItem("tLv_ueno", value_tmp);
                    console.log("上野: " + localStorage.getItem("tLv_ueno"));
                    break;
                case "okachimachi":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_okachimachi"));
                    localStorage.setItem("tLv_okachimachi", value_tmp);
                    console.log("御徒町: " + localStorage.getItem("tLv_okachimachi"));
                    break;
                case "akihabara":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_akihabara"));
                    localStorage.setItem("tLv_akihabara", value_tmp);
                    console.log("秋葉原: " + localStorage.getItem("tLv_akihabara"));
                    break;
                case "kanda":
                    value_tmp = parseInt(value) + parseInt(localStorage.getItem("tLv_kanda"));
                    localStorage.setItem("tLv_kanda", value_tmp);
                    console.log("神田: " + localStorage.getItem("tLv_kanada"));
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
                    },
                    {
                        // 新大久保
                        location: new google.maps.LatLng(35.701305, 139.700048),
                        weight: parseInt(localStorage.getItem("tLv_shinokubo"))
                    },
                    {
                        // 高田馬場
                        location: new google.maps.LatLng(35.713447, 139.704138),
                        weight: parseInt(localStorage.getItem("tLv_takadanobaba"))
                    },
                    {
                        // 目白
                        location: new google.maps.LatLng(35.72122, 139.706612),
                        weight: parseInt(localStorage.getItem("tLv_mejiro"))
                    },
                    {
                        // 池袋
                        location: new google.maps.LatLng(35.72888, 139.710348),
                        weight: parseInt(localStorage.getItem("tLv_mejiro"))
                    },
                    {
                        // 大塚
                        location: new google.maps.LatLng(35.731785, 139.728227),
                        weight: parseInt(localStorage.getItem("tLv_mejiro"))
                    },
                    {
                        // 巣鴨
                        location: new google.maps.LatLng(35.733705, 139.740349),
                        weight: parseInt(localStorage.getItem("tLv_mejiro"))
                    },
                    {
                        // 駒込
                        location: new google.maps.LatLng(35.736567, 139.74701),
                        weight: parseInt(localStorage.getItem("tLv_komagome"))
                    },
                    {
                        // 田端
                        location: new google.maps.LatLng(35.738365, 139.760744),
                        weight: parseInt(localStorage.getItem("tLv_tabata"))
                    },
                    {
                        // 西日暮里
                        location: new google.maps.LatLng(35.732006, 139.766886),
                        weight: parseInt(localStorage.getItem("tLv_nishinippori"))
                    },
                    {
                        // 日暮里
                        location: new google.maps.LatLng(35.728312, 139.770518),
                        weight: parseInt(localStorage.getItem("tLv_nippori"))
                    },
                    {
                        // 鶯谷
                        location: new google.maps.LatLng(35.720358, 139.779036),
                        weight: parseInt(localStorage.getItem("tLv_uguisudani"))
                    },
                    {
                        // 上野
                        location: new google.maps.LatLng(35.711208, 139.773542),
                        weight: parseInt(localStorage.getItem("tLv_ueno"))
                    },
                    {
                        // 御徒町
                        location: new google.maps.LatLng(35.707498, 139.774805),
                        weight: parseInt(localStorage.getItem("tLv_okachimachi"))
                    },
                    {
                        // 秋葉原
                        location: new google.maps.LatLng(35.698353, 139.773114),
                        weight: parseInt(localStorage.getItem("tLv_akihabara"))
                    },
                    {
                        // 神田
                        location: new google.maps.LatLng(35.692141, 139.771225),
                        weight: parseInt(localStorage.getItem("tLv_kanda"))
                    }
                ];
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi-xgm6MrOIMNp2t1GvVknWxG6fjI-vPY&signed_in=true&libraries=visualization&callback=initMap">
        </script>
</body>

</html>
