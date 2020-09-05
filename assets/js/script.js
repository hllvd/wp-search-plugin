function func(el){
  var inlineFormCustomSelect = document.getElementById( "inlineFormCustomSelect" );
  var order = document.getElementById("order");
  var selection = inlineFormCustomSelect.options[ inlineFormCustomSelect.selectedIndex ]

  if ( selection.value == 'date' && selection.getAttribute('id') == 'date_asc' ){
    order.value="asc"
  }else{
    if ( selection.value == 'title'){
      order.value="asc"
    }else{
      order.value="desc"
    }
  }


}
