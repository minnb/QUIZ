 <!-- jQuery -->
    <script src="{{ asset('public/dashboard/vendor/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/dashboard/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('public/dashboard/vendor/bootstrap.min.js') }}"></script>
    <!-- Perfect Scrollbar -->
    <script src="{{ asset('public/dashboard/vendor/perfect-scrollbar.min.js') }}"></script>
    <!-- MDK -->
    <script src="{{ asset('public/dashboard/vendor/dom-factory.js') }}"></script>
    <script src="{{ asset('public/dashboard/vendor/material-design-kit.js') }}"></script>
    <!-- App JS -->
    <script src="{{ asset('public/dashboard/js/app.js') }}"></script>
    <!-- Highlight.js -->
    <script src="{{ asset('public/dashboard/js/hljs.js') }}"></script>
    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('public/dashboard/js/app-settings.js') }}"></script>
    <!-- Global Settings -->
    <script src="{{ asset('public/dashboard/js/settings.js') }}"></script>
    <!-- Moment.js -->
    <script src="{{ asset('public/dashboard/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('public/dashboard/vendor/moment-range.min.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('public/dashboard/vendor/Chart.min.js') }}"></script>
    <!-- UI Charts Page JS -->
    <script src="{{ asset('public/dashboard/js/chartjs-rounded-bar.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/chartjs.js') }}"></script>
    <!-- Chart.js Samples -->
    <script>
        (function() {
            'use strict';

            Charts.init()

            var earnings = []

            // Create a date range for the last 7 days
            var start = moment().subtract(6, 'days').format('YYYY-MM-DD') // 7 days ago
            var end = moment().format('YYYY-MM-DD') // today
            var range = moment.range(start, end)

            // Create the earnings graph data
            // Iterate the date range and assign a random ($) earnings value for each day
            range.by('days', function(moment) {
                earnings.push({
                    y: Math.floor(Math.random() * 200) + 15,
                    x: moment.toDate()
                })
            })

            var WeekIQChart = function(id, type = 'line', options = {}) {
                options = Chart.helpers.merge({
                    elements: {
                        point: {
                            pointStyle: 'circle',
                            radius: 4,
                            hoverRadius: 5,
                            backgroundColor: settings.colors.white,
                            borderColor: settings.colors.primary[500],
                            borderWidth: 2
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            },
                            type: 'time',
                            distribution: 'series',
                            time: {
                                unit: 'day',
                                stepSize: 1,
                                autoSkip: false,
                                displayFormats: {
                                    day: 'dd'
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(a, e) {
                                var t = e.datasets[a.datasetIndex].label || "",
                                    o = a.yLabel,
                                    r = "";
                                return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + o + " points</span>"
                            }
                        }
                    }
                }, options)

                var data = {
                    datasets: [{
                        label: "Experience IQ",
                        data: earnings,
                        pointHoverBorderColor: settings.colors.success[400],
                        pointHoverBackgroundColor: settings.colors.white
                    }]
                }

                Charts.create(id, type, options, data)
            }

            var TopicIQChart = function(id, type = 'radar', options = {}) {
                options = Chart.helpers.merge({
                    elements: {
                        point: {
                            pointStyle: 'circle',
                            radius: 4,
                            hoverRadius: 5,
                            backgroundColor: settings.colors.white,
                            borderColor: settings.colors.primary[500],
                            borderWidth: 2
                        }
                    },
                    scale: {
                        ticks: {
                            display: false,
                            beginAtZero: true,
                            maxTicksLimit: 4
                        },
                        gridLines: {
                            color: settings.colors.gray[300]
                        },
                        angleLines: {
                            color: settings.colors.gray[300]
                        },
                        pointLabels: {
                            fontSize: 14
                        }
                    },
                    tooltips: {
                        callbacks: {
                            label: function(a, e) {
                                var t = e.datasets[a.datasetIndex].label || "",
                                    o = a.yLabel,
                                    r = "";
                                return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + o + " points</span>"
                            }
                        }
                    }
                }, options)

                var data = {
                    labels: ["JavaScript", "HTML", "Flinto", "Vue.js", "Sketch", "Priciple", "CSS", "Angular"],
                    datasets: [{
                        label: "Experience IQ",
                        data: [30, 35, 33, 32, 31, 30, 28, 36],
                        pointHoverBorderColor: settings.colors.success[400],
                        pointHoverBackgroundColor: settings.colors.white,
                        borderJoinStyle: 'bevel',
                        lineTension: .1
                    }]
                }

                Charts.create(id, type, options, data)
            }

            // Create Chart
            WeekIQChart('#iqChart')
            TopicIQChart('#topicIqChart')

        })()
    </script>

</body>

</html>