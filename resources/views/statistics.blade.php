<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Voting Statistics</title>
    <script src="{{ asset('js/echarts.common.min.js') }}"></script>
</head>
<body>
<div id="main" style="width: 600px;height:400px;"></div>
<script type="text/javascript">
    var myChart = echarts.init(document.getElementById('main'));
    option = {
        backgroundColor: '#2c343c',

        title: {
            text: '{{$question->question_content}}',
            left: 'center',
            top: 20,
            textStyle: {
                color: '#ccc'
            }
        },

        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },

        visualMap: {
            show: false,
            min: 80,
            max: 600,
            inRange: {
                colorLightness: [0, 1]
            }
        },
        series: [
            {
                name: 'Selected',
                type: 'pie',
                radius: '55%',
                center: ['50%', '50%'],
                data: [
                        @foreach($question->questionOptions as $option)
                    {
                        value:{{$option->selectedTimes}}, name: '{{$option->question_option_name.'.'.$option->question_option_content}}'
                    },
                    @endforeach

            ].sort(function (a, b) {
                            return a.value - b.value;
                        }),
                roseType: 'radius',
                label: {
                    normal: {
                        textStyle: {
                            color: 'rgba(255, 255, 255, 0.3)'
                        }
                    }
                },
                labelLine: {
                    normal: {
                        lineStyle: {
                            color: 'rgba(255, 255, 255, 0.3)'
                        },
                        smooth: 0.2,
                        length: 10,
                        length2: 20
                    }
                },
                itemStyle: {
                    normal: {
                        color: '#c23531',
                        shadowBlur: 200,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                },

                animationType: 'scale',
                animationEasing: 'elasticOut',
                animationDelay: function (idx) {
                    return Math.random() * 200;
                }
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
</body>
</html>