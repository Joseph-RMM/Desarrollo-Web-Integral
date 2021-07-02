
//GRAFICA DE LINEAS

var options = {
    series: [{
            name: "Alta de productos",
            data: [28, 29, 33, 36, 32, 32, 33, 22, 22, 22, 22, 22]
        },
        {
            name: "Prestamos",
            data: [50, 22, 35, 13, 43, 42, 24, 12, 53, 12, 11, 60]
        }
    ],
    chart: {
        height: 450,
        width: 750,
        type: 'line',
        dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
        },
        toolbar: {
            show: false
        }
    },
    colors: ['#74B9FF', '#55EFC4'],
    dataLabels: {
        enabled: true,
    },
    stroke: {
        curve: 'smooth'
    },
    title: {
        text: 'Altas y prestamos de productos 2021',
        align: 'left'
    },
    grid: {
        borderColor: '#e7e7e7',
        row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
        },
    },
    markers: {
        size: 1
    },
    xaxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        title: {
            text: 'Meses'
        }
    },
    yaxis: {
        title: {
            text: 'Productos'
        },
        min: 0,
        max: 60
    },
    legend: {
        position: 'top',
        horizontalAlign: 'right',
        floating: true,
        offsetY: -25,
        offsetX: -5
    }
};

var chart = new ApexCharts(document.querySelector("#chart-line"), options);
chart.render();

async function getUser()
{
    let response = await fetch(`http://127.0.0.1:8000/graficdonut`);
    let data = await response.json()
    return data;
}

/*function getData(){
    var resp;
    fetch(`http://127.0.0.1:8000/graficdonut`).then(res=>res.json()).then(data=>
        resp=data
    )
    return resp;
}*/
var Categorias={};
const Http = new XMLHttpRequest();
const url='http://127.0.0.1:8000/graficdonut';
Http.open("GET", url);
Http.send();

Http.onreadystatechange = (e) => {
    Categorias.categorias=Http.responseText
}
console.log(Categorias);
//GRAFICA DE DONA
var options = {
    series: [44, 80, 13, 43, 22],
    chart: {
    width: 380,
    type: 'pie',
  },
  title: {
    text: 'Categorias',
    align: 'left'
},
  labels:  ["44", "80", "13", "43", "22"],
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#chart-donus"), options);
  chart.render();




  /*ESTRELLAS*/
