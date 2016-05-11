var chart = new CanvasJS.Chart("chartContainer", {
    data: [{

        // グラフの種類を設定する
        type: 'pie',

        // グラフに描画するデータを設定する
        dataPoints: dataPlot //ここにデータを渡す

    }]
});

var dataPlot = [
    {
        label: "リンゴ",
        y: 10
    },
    {
        label: "オレンジ",
        y: 15
    },
    {
        label: "バナナ",
        y: 25
    },
    {
        label: "マンゴー",
        y: 30
    },
    {
        label: "グレープ",
        y: 28
    }
          ];
chart.render();
