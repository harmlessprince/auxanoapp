<?php $__env->startSection('page'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.stat-tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.charts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    
    <script>
        const ticketsPerAgent = <?php echo json_encode($ticketsPerAgent->toArray(), 15, 512) ?>;
        const ticketsPerCategory = <?php echo json_encode($ticketsPerCategory->toArray(), 15, 512) ?>;
        google.charts.load('current', {
            'packages': ['corechart']
        });
        let ticketsPerAgentPieData = ticketsPerAgent.map(function(item) {
            return [
                `${item.first_name} ${item.last_name}`, item.agent_tickets_count
            ];
        });
        let ticketsPerCategoryPieData = ticketsPerCategory.map(function(item) {
            return [item.name, item.tickets_count];
        });
        const ticketsPerAgentPieDataHeader = ['Agent Full Name', 'Tickets Count'];
        const ticketsPerCategoryPieDataHeader = ['Category Name', 'Tickets Count'];
        ticketsPerAgentPieData.unshift(ticketsPerAgentPieDataHeader);
        ticketsPerCategoryPieData.unshift(ticketsPerCategoryPieDataHeader);
        function drawTicketsPerAgentPieDataChart() {
            const data = google.visualization.arrayToDataTable(ticketsPerAgentPieData);
            const options = {
                // title: 'Ticket Share Per agent',
                is3D: false,
                legend: {
                    position: "bottom",
                    maxLines: 2
                }
            };
            const chart = new google.visualization.PieChart(document.getElementById('ticket-share-per-agent'));
            chart.draw(data, options);
        }

        function drawTicketsPerCategoryChart() {
            const data = google.visualization.arrayToDataTable(ticketsPerCategoryPieData);
            const options = {
                // title: 'Ticket Share Per agent',
                is3D: false,
                legend: {
                    position: "bottom",
                    maxLines: 2
                }
            };
            const chart = new google.visualization.PieChart(document.getElementById('ticket-share-per-category'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawTicketsPerAgentPieDataChart);
        google.charts.setOnLoadCallback(drawTicketsPerCategoryChart);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/dashboard.blade.php ENDPATH**/ ?>