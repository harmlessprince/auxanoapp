@extends('layouts.app')
@section('page')
@endsection

@section('content')
    @include('partials.cards')
    @include('partials.charts')
@endsection

@push('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="{{ asset('template/assets/js/charts-lines.js') }}" defer></script>
    <script>
        const ticketsPerAgent = @json($ticketsPerAgent->toArray());
        const ticketsPerCategory = @json($ticketsPerCategory->toArray());
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
@endpush
