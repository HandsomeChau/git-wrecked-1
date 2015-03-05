<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    var Total = 100;

    //These are the variables that control the pie chart
    var min = 33;
    var avg = 78;
    var max = 94;

    var leftover = 100 - max;

    min = min;
    avg = avg - min;
    max = max - (avg + min);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Effort', 'Amount given'],
            ['Min: ' + min + '%', min],
            ['Avg: ' + min + '% - ' + (min + avg + max) + '%', avg],
            ['Max: ' + (min + avg + max) + '%', max],
            ['Unachievable: ' + (leftover) + '%', leftover]
        ]);

        var options = {
            pieHole: 0.5,
            pieSliceTextStyle: {
                color: 'black'
            },
            legend: 'none',
            slices: {
                0: {color: 'blue'},
                1: {color: 'yellow'},
                2: {color: 'green'},
                3: {color: 'transparent'}
            }
        };


        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
    }
</script>

<div id="donut_single" style="width: 800px; height: 800px; float: right; "></div>

<div class="table-responsive">
    <table class="table" style="width: 45%; background-color: #ffffff">
        <tr>
            <td><h5>COMP</h5></td>
            <td></td>
        </tr>
        <tr>
            <td>COMP 4777</td>
            <td>95%</td>
            <td><a href="*">edit </a></td>
        </tr>
        <tr>
            <td>COMP 5678</td>
            <td>42%</td>
            <td><a href="*">edit </a></td>
        </tr>
        <tr>
            <td>COMP 8819</td>
            <td>61%</td>
            <td><a href="*">edit </a></td>
        </tr>

        <tr>
            <td><h5>AUTO</h5></td>
            <td></td>
        </tr>
        <tr>
            <td>AUTO 4777</td>
            <td>45%</td>
            <td><a href="*">edit </a></td>
        </tr>
        <tr>
            <td>AUTO 5678</td>
            <td>40%</td>
            <td><a href="*">edit </a></td>
        </tr>
        <tr>
            <td>AUTO 8819</td>
            <td>65%</td>
            <td><a href="*">edit </a></td>
        </tr>

        <tr>
            <td><h5>COMM</h5></td>
            <td></td>
        </tr>
        <tr>
            <td>COMM 4777</td>
            <td>70%</td>
            <td><a href="*">edit </a></td>
        </tr>
        <tr>
            <td>COMM 5678</td>
            <td>53%</td>
            <td><a href="*">edit </a></td>
        </tr>
        <tr>
            <td>COMM 8819</td>
            <td>89%</td>
            <td><a href="*">edit </a></td>
        </tr>
        <tr>
            <td><br><a href="*">Add Grade</a></td>
        </tr>
    </table>
</div>

<!--TODO ADD BASIC MARK OVERVIEW TAKEN FORM DATABASE ADN CALCULATED INTO ON BIG GPA-->
<!--TODO ADD BUTTON TO CREATE UPDATE DELETE MARKS-->
<!--TODO SHOW COURSE GPA BREAKDOWN-->
<!--TODO ACTUALLY WRITE ALGO FOR CALCULATION GPA-->