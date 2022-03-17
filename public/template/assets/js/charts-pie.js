/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const pieConfig = {
  type: 'doughnut',
  data: {
    datasets: [
      {
        data: [20, 20, 20, 20, 20],
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         * https://davidpiesse.github.io/tailwind-md-colours/
         */
        backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2', '#00acc1', '#e53935'],
        label: 'Dataset 1',
      },
    ],
    labels: ['Laptops', 'Printers', 'Desktops', 'Monitors', 'Others'],
  },
  options: {
    responsive: true,
    cutoutPercentage: 80,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: false,
    },
  },
}

// change this to the id of your chart element in HMTL
const pieCtx = document.getElementById('ticket-share-per-category')
window.myPie = new Chart(pieCtx, pieConfig)
