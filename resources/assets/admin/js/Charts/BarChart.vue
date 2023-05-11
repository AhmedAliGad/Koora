<script>
import { Bar } from 'vue-chartjs'

export default {
    extends: Bar,
    data () {
        return {
            chartData: {
                labels: ["Babol",	"Cabanatuan",	"Daegu",	"Jerusalem",	"Fairfield",	"New York",	"Gangtok", "Buenos Aires", "Hafar Al-Batin", "Idlib"],
                datasets: [
                    {
                        label: 'Bar Chart',
                        data: [600,	1150,	342,	6050,	2522,	3241,	1259,	157,	1545, 9841],
                        fill: false,
                        borderColor: '#2554FF',
                        backgroundColor: '#2554FF',
                        borderWidth: 1
                    },
                    {
                        label: 'Bar Chart',
                        data: [500,	1150,	342,	6050,	2522,	3241,	1259,	157,	1545, 200],
                        fill: false,
                        borderColor: '#f87979',
                        backgroundColor: '#f87979',
                        borderWidth: 1
                    },
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                    xAxes: [ {
                        gridLines: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: true
                },
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    mounted () {
        this.renderChart(this.chartData, this.options)
    }
}
</script>
