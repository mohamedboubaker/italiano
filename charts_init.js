function pie_render(response){
var jstat = JSON.parse(response);
var data = {
  labels: ['Verbo','Nome','Aggettivo','Avverbio','Articolo','Pronome','Preposizione','Coniugazione'],
  series: [jstat.Verbo,jstat.Nome,jstat.Aggettivo,jstat.Avverbio,jstat.Articolo,jstat.Pronome,jstat.Preposizione,jstat.Coniugazione]
};


var defaultOptions = {
  width:'360px',
  height:'360px',
  chartPadding: 5,
  showLabel: true,
  labelOffset:30,
  labelPosition: 'inside',
  labelInterpolationFnc: Chartist.noop,
  // Label direction can be 'neutral', 'explode' or 'implode'.
  labelDirection: 'neutral',
  // If true the whole data is reversed including labels, the series order as well as the whole series data arrays.
  reverseData: false,
  // If true empty values will be ignored to avoid drawing unncessary slices and labels
  ignoreEmptyValues: true,
    donut: false,
  donutWidth: 150,
  donutSolid: true,
  startAngle: 270
};
new Chartist.Pie('.ct-chart',data,defaultOptions);
}


function chart_init(){
  $.ajax({
        type: "GET",
        url: "stats.php",
        data: "",
        cache: false,
        success: function(response){
        pie_render(response);
        }
      });
}
