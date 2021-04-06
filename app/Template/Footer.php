<?php

$html="";
//define("FOOTER", $html);

?>
</body>

<style>
    #q-graph {
        display: block; /* fixes layout wonkiness in FF1.5 */
        position: relative; 
        width: 500px; 
        height: 300px;
        margin: 1.1em 0 0; 
        padding: 0;
        background: transparent;
        font-size: 11px;
    }

    #q-graph caption {
        caption-side: top; 
        width: 500px;
        text-transform: uppercase;
        letter-spacing: .5px;
        top: -40px;
        position: relative; 
        z-index: 10;
        font-weight: bold;
    }

    #q-graph tr, #q-graph th, #q-graph td { 
        position: absolute;
        bottom: 0; 
        width: 150px; 
        z-index: 2;
        margin: 0; 
        padding: 0;
        text-align: center;
    }

    #q-graph td {
        transition: all .3s ease;
    }

    #q-graph td:hover {
        background-color:#85144b;
        opacity: .9;
        color: white;
    }


    #q-graph thead tr {
        left: 100%; 
        top: 50%; 
        bottom: auto;
        margin: -2.5em 0 0 5em;}
    #q-graph thead th {
        width: 7.5em; 
        height: auto; 
        padding: 0.5em 1em;
    }
    #q-graph thead th.sent {
        top: 0; 
        left: 0; 
        line-height: 2;
    }
    #q-graph thead th.paid {
        top: 2.75em; 
        line-height: 2;
        left: 0; 
    }

    #q-graph tbody tr {
        height: 296px;
        padding-top: 2px;
        border-right: 1px dotted #C4C4C4; 
        color: #AAA;
    }
    #q-graph #q1 {
        left: 0;
    }
    #q-graph #q2 {left: 150px;}
    #q-graph #q3 {left: 300px;}
    #q-graph #q4 {left: 450px; border-right: none;}
    #q-graph tbody th {bottom: -1.75em; vertical-align: top;
                       font-weight: normal; color: #333;}
    #q-graph .bar {
        width: 60px; 
        border: 1px solid; 
        border-bottom: none; 
        color: #000;
    }
    #q-graph .bar p {
        margin: 5px 0 0; 
        padding: 0;
        opacity: .4;
    }


    #q-graph .sent {
        left: 13px; 
        background-color: #39cccc;;
        border-color: transparent;
    }
    #q-graph .paid {
        left: 77px; 
        background-color: #7fdbff;
        border-color: transparent;
    }


    #ticks {
        position: relative; 
        top: -300px; 
        left: 2px;
        width: 596px; 
        height: 300px; 
        z-index: 1;
        margin-bottom: -300px;
        font-size: 10px;
        font-family: "fira-sans-2", Verdana, sans-serif;
    }

    #ticks .tick {
        position: relative; 
        border-bottom: 1px dotted #C4C4C4; 
        width: 600px;
    }

    #ticks .tick p {
        position: absolute; 
        left: -5em; 
        top: -0.8em; 
        margin: 0 0 0 0.5em;
    }
</style>
<script type="text/javascript">
// Load google charts
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 8],
            ['Eat', 2],
            ['TV', 4],
            ['Gym', 2],
            ['Sleep', 8]
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title': 'My Average Day', 'width': 550, 'height': 400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>



</html>


