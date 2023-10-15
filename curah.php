<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rain Drop | Sensor Website</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="module">
            import { initializeApp } from "https://www.gstatic.com/firebasejs/10.5.0/firebase-app.js";
            import { getDatabase, ref, onValue } from "https://www.gstatic.com/firebasejs/10.5.0/firebase-database.js";
            import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.5.0/firebase-analytics.js";
            const firebaseConfig = {
                apiKey: "AIzaSyCSAQh_Ng6VKKfCQ9N3Lzstf-Ej1t-yzPQ",
                authDomain: "sensorprojects-17392.firebaseapp.com",
                databaseURL: "https://sensorprojects-17392-default-rtdb.firebaseio.com",
                projectId: "sensorprojects-17392",
                storageBucket: "sensorprojects-17392.appspot.com",
                messagingSenderId: "652184584795",
                appId: "1:652184584795:web:86f032dfd574532919f57e",
                measurementId: "G-J21F3311FV"
            };
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            const analytics = getAnalytics(app);
            const db = getDatabase(app);
            const refs = ref(db, 'sensor1');
            var firebaseData = [['Waktu', 'Curah Hujan']];
            onValue(refs, (snapshot) => {
            firebaseData = snapshot;
            drawChart();
            });
            function drawChart() {
                var temp = [['Waktu', 'Curah Hujan']];
                firebaseData.forEach(child=>{
                        temp.push([child.val().TimeStamp, parseFloat(child.val().RainDrop)]);
                    });
                var data = google.visualization.arrayToDataTable(temp);
                var options = {
                    title: 'Curah Hujan',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                };
                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Grafik Curah Hujan</h1>
                        <hr />
                        <div id="curve_chart" style="width: 100rem; height: 50rem"></div>
                        </div>

                        </div>
                   
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>