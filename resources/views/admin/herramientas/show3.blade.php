<!DOCTYPE html>
<html>

<head>
    <title>Calculadora gráfica de funciones trigonométricas</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>

    <input type="text" id="equation1" placeholder="Ingresa la primera ecuación aquí">
    <input type="text" id="equation2" placeholder="Ingresa la segunda ecuación aquí">
    <button onclick="plot()">Graficar</button>

    <div id="myDiv"></div>

    <script>
        function plot() {
            var equation1 = document.getElementById("equation1").value;
            var equation2 = document.getElementById("equation2").value;
            var xValues = [];
            var yValues1 = [];
            var yValues2 = [];
            for (var x = -2 * Math.PI; x < 2 * Math.PI; x += 0.1) {
                xValues.push(x);
                yValues1.push(eval(equation1));
                yValues2.push(eval(equation2));
            }

            var trace1 = {
                x: xValues,
                y: yValues1,
                type: 'scatter',
                name: 'Función 1'
            };

            var trace2 = {
                x: xValues,
                y: yValues2,
                type: 'scatter',
                name: 'Función 2'
            };

            var data = [trace1, trace2];

            var layout = {
                title: 'Gráfico de las funciones',
                xaxis: {
                    title: 'x'
                },
                yaxis: {
                    title: 'y'
                }
            };

            Plotly.newPlot('myDiv', data, layout);
        }
    </script>

</body>

</html>
