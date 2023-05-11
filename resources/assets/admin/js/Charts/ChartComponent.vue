<script>
import { Bar } from 'vue-chartjs'

export default {
    extends: Bar,
    props :{
        users : Array
    },
    data () {
        return {
            labels: [],
            calls:[],
            durations: [],
        }
    },
    beforeMount() {
        this.users.forEach(element => {
            this.labels.push(element.name);
            this.calls.push(element.total_calls);
            this.durations.push(element.total_duration);
        });
    },
    mounted () {
        let chartData =  {
            labels: this.labels,
                datasets: [
                {
                    label: 'Numbers Of Calls',
                    data: this.calls,
                    fill: false,
                    borderColor: '#2554FF',
                    backgroundColor: '#2554FF',
                    borderWidth: 1
                },
                {
                    label: 'Total Durations',
                    data: this.durations,
                    fill: false,
                    borderColor: '#f87979',
                    backgroundColor: '#f87979',
                    borderWidth: 1
                },
            ]
        };
        let options = {
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
                        display: true
                    }
                }]
            },
            legend: {
                display: true
            },
            responsive: true,
                maintainAspectRatio: false
        }
        this.renderChart(chartData, options)
    }
}
</script>
