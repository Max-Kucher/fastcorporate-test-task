import axios from 'axios'
import Alpine from 'alpinejs'
import { Chart, registerables } from 'chart.js'

window.axios = axios

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

window.Alpine = Alpine

Alpine.start()

Chart.register(...registerables);
window.Chart = Chart
