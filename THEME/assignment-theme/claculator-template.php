<?php 
/*
Template Name: Calculator
*/ get_header();
?>
<div id="single-post-wrapper" class="container">
	<div class="row">
		<div class="col-md-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<form id="quote">
						<table>
						  <tr>
							  <td><label for="one">One</label></td>
							  <td><input type="checkbox" id="choose[one]" name="selectedEquipment" value="choose1" onChange="getTotals()"></td>
							  </tr>
							  <tr><td><label for="two">Two</label></td>
							  <td><input type="checkbox" id="choose[two]" name="selectedEquipment" value="choose2" onChange="getTotals()"></td>
							  </tr>
							  <tr><td><label for="three">Three</label></td>
							  <td><input type="checkbox" id="choose[three]" name="selectedEquipment" value="choose3" onChange="getTotals()"></td>
							  <tr><td><label for="four">Four</label></td>
							  <td><input type="checkbox" id="choose[four]" name="selectedEquipment" value="choose4" onChange="getTotals()"></td>
						  </tr>
						 </table>
						<h2>Total addition:</h2><h3 id="totalPrice"></h3>
					</form>

					<script type="text/javascript">
					//ARRAY
						var eventEquipmentArray = new Array();
						eventEquipmentArray["choose1"] = 1;
						eventEquipmentArray["choose2"] = 2;
						eventEquipmentArray["choose3"] = 3;
						eventEquipmentArray["choose4"] = 4;

						//CHECKBOX - EVENT EQUIPMENT
						function getEventEquipment() {
						  var EventEquipment = 0;
						  var theForm = document.forms["quote"];
						  var selectedEquipment = theForm.elements["selectedEquipment"];

						  for (var i = 0; i < selectedEquipment.length; i++) {
						  	if(selectedEquipment[i].checked){
						    	EventEquipment += eventEquipmentArray[selectedEquipment[i].value] || 0;
						    }
						  }

						  return EventEquipment;
						}

						//DIV - TOTAL PRICE TEST
						function getTotals() {
						  //var totalPrice = getEventDuration() + getEventSuburb() + getEventEquipment();
						  var totalPrice = getEventEquipment();
						  var totalPriceDIV = document.getElementById("totalPrice");
						  totalPriceDIV.innerText = totalPrice;
						}
					</script>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .col-md-8 -->

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- .col-md-4 -->
	</div><!-- .row -->
</div><!-- #single-post-wrapper -->

<?php 
get_footer();