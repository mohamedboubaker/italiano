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
  labelOffset:40,
  labelPosition: 'inside',
  labelInterpolationFnc: Chartist.noop,
  // Label direction can be 'neutral', 'explode' or 'implode'.
  labelDirection: 'implode',
  // If true the whole data is reversed including labels, the series order as well as the whole series data arrays.
  reverseData: false,
  // If true empty values will be ignored to avoid drawing unncessary slices and labels
  ignoreEmptyValues: false
};

new Chartist.Pie('.ct-chart',data,defaultOptions);
}

function bar_render(response){
 var data = {
  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
  series: [
    [5, 2, 4, 2, 0]
  ]
};

// In the global name space Chartist we call the Bar function to initialize a bar chart. As a first parameter we pass in a selector where we would like to get our chart created and as a second parameter we pass our data object.
new Chartist.Bar('.ct-chart', data);
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