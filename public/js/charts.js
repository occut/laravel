//首页数据统计Start
FusionCharts.ready(function () {
    var salesChart = new FusionCharts({
        type: 'msarea',
        renderAt: 'chart-containerHome',
        width: '800',
        height: '300',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Sales of Liquor",
                "subCaption": "Previous week vs current week",
                "xAxisName": "Day",
                "yAxisName": "Sales (In USD)",
                "numberPrefix": "$",
                "paletteColors": "#0075c2,#1aaf5d",
                "bgColor": "#ffffff",
                "showBorder": "0",
                "showCanvasBorder": "0",
                "plotBorderAlpha": "10",
                "usePlotGradientColor": "0",
                "legendBorderAlpha": "0",
                "legendShadow": "0",
                "plotFillAlpha": "60",
                "showXAxisLine": "1",
                "axisLineAlpha": "25",
                "showValues": "0",
                "captionFontSize": "14",
                "subcaptionFontSize": "14",
                "subcaptionFontBold": "0",
                "divlineColor": "#999999",
                "divLineIsDashed": "1",
                "divLineDashLen": "1",
                "divLineGapLen": "1",
                "showAlternateHGridColor": "0",
                "toolTipColor": "#ffffff",
                "toolTipBorderThickness": "0",
                "toolTipBgColor": "#000000",
                "toolTipBgAlpha": "80",
                "toolTipBorderRadius": "2",
                "toolTipPadding": "5",
            },

            "categories": [
                {
                    "category": [
                        {
                            "label": "Mon"
                        },
                        {
                            "label": "Tue"
                        },
                        {
                            "label": "Wed"
                        },
                        {
                            "label": "Thu"
                        },
                        {
                            "label": "Fri"
                        },
                        {
                            "label": "Sat"
                        },
                        {
                            "label": "Sun"
                        }
                    ]
                }
            ],

            "dataset": [
                {
                    "seriesname": "Previous Week",
                    "data": [
                        {
                            "value": "13000"
                        },
                        {
                            "value": "14500"
                        },
                        {
                            "value": "13500"
                        },
                        {
                            "value": "15000"
                        },
                        {
                            "value": "15500"
                        },
                        {
                            "value": "17650"
                        },
                        {
                            "value": "19500"
                        }
                    ]
                },
                {
                    "seriesname": "Current Week",
                    "data": [
                        {
                            "value": "8400"
                        },
                        {
                            "value": "9800"
                        },
                        {
                            "value": "11800"
                        },
                        {
                            "value": "14400"
                        },
                        {
                            "value": "18800"
                        },
                        {
                            "value": "24800"
                        },
                        {
                            "value": "30800"
                        }
                    ]
                }
            ]
        }
    })
        .render();
});
//首页数据统计Over
FusionCharts.ready(function () {
    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();
    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container2',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();

    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container3',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();

    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container4',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();



    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container5',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();
    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container6',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();
    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container7',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();




    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container8',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();

    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container9',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();
    var visitChart = new FusionCharts({
        type: 'zoomline',
        renderAt: 'chart-container10',
        width: '600',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Unique Website Visitors",
                "subcaption": "Last year",
                "yaxisname": "Unique Visitors",
                "xaxisname": "Date",
                "yaxisminValue": "800",
                "lineThickness": "1",
                "compactdatamode" : "1",
                "dataseparator" : "|",
                //Minimum Distance Between Anchors
                "anchorMinRenderDistance" : "15",
                "theme": "fint"
            },
            "categories": [
                {
                    "category":  "Jan 01|Jan 02|Jan 03|Jan 04|Jan 05|Jan 06|Jan 07|Jan 08|Jan 09|Jan 10|Jan 11|Jan 12|Jan 13|Jan 14|Jan 15|Jan 16|Jan 17|Jan 18|Jan 19|Jan 20|Jan 21|Jan 22|Jan 23|Jan 24|Jan 25|Jan 26|Jan 27|Jan 28|Jan 29|Jan 30|Jan 31"
                }
            ],
            "dataset": [
                {
                    "seriesname": "harrysfoodmart.com",
                    "data": "978|976|955|981|992|964|973|949|985|962|977|955|988|959|985|965|991|985|966|989|960|944|976|980|940|941|945|952|973|946|951"

                },
                {
                    "seriesname": "harrysfashion.com",
                    "data": "1053|1057|1084|1082|1098|1055|1068|1067|1074|1056|1067|1078|1079|1084|1041|1052|1066|1080|1049|1051|1049|1044|1083|1053|1038|1077|1046|1067|1053|1033|1047"
                }
            ]
        }
    });
    visitChart.render();
});