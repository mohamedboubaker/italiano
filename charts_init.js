function pie_init(){
var data = {
  labels: ['Bananas', 'Apples', 'Grapes','Nome'],
  series: [20, 40,20,20 ]
};

var defaultOptions = {
  width:'360px',
  height:'360px',
  chartPadding: 5,
  showLabel: true,
  labelOffset: 20,
  labelPosition: 'inside',
  labelInterpolationFnc: Chartist.noop,
  // Label direction can be 'neutral', 'explode' or 'implode'.
  labelDirection: 'neutral',
  // If true the whole data is reversed including labels, the series order as well as the whole series data arrays.
  reverseData: false,
  // If true empty values will be ignored to avoid drawing unncessary slices and labels
  ignoreEmptyValues: false
};

new Chartist.Pie('.ct-chart',data,defaultOptions);
}