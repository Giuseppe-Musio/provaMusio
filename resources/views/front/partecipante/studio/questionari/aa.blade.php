@extends('front.master') @section('content')

<div class="container">
	<h2>Questionario attrakdiff</h2>
	<br />
	<form action="#" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-xs-12">
				<table class="table table-hover">
					<tbody>
						<tr class="dispari">
							<td class="prova">human</td>
							<td>
								<input type="Radio" id="Item1" name="Item1" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item1" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item1" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item1" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item1" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item1" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item1" value="7" required>
							</td>
							<td class="prova">technical</td>
						</tr>

						<tr class="pari">
							<td class="prova">isolating</td>
							<td>
								<input type="Radio" id="Item1" name="Item2" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item2" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item2" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item2" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item2" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item2" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item2" value="7" required>
							</td>
							<td class="prova">connective</td>
						</tr>

						<tr class="dispari">
							<td class="prova">pleasant</td>
							<td>
								<input type="Radio" id="Item2" name="Item3" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item3" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item3" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item3" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item3" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item3" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item3" value="7" required>
							</td>
							<td class="prova">unpleasant</td>
						</tr>

						<tr class="pari">
							<td class="prova">inventive</td>
							<td>
								<input type="Radio" id="Item4" name="Item4" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item4" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item4" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item4" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item4" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item4" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item4" value="7" required>
							</td>
							<td class="prova">conventional</td>
						</tr>

						<tr class="dispari">
							<td class="prova">simple</td>
							<td>
								<input type="Radio" id="Item5" name="Item5" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item5" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item5" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item5" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item5" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item5" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item5" value="7" required>
							</td>
							<td class="prova">complicated</td>
						</tr>

						<tr class="pari">
							<td class="prova">professional</td>
							<td>
								<input type="Radio" id="Item6" name="Item6" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item6" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item6" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item6" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item6" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item6" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item6" value="7" required>
							</td>
							<td class="prova">unprofessional</td>
						</tr>

						<tr class="dispari">
							<td class="prova">ugly</td>
							<td>
								<input type="Radio" id="Item7" name="Item7" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item7" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item7" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item7" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item7" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item7" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item7" value="7" required>
							</td>
							<td class="prova">attractive</td>
						</tr>

						<tr class="pari">
							<td class="prova">practical</td>
							<td>
								<input type="Radio" id="Item8" name="Item8" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item8" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item8" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item8" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item8" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item8" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item8" value="7" required>
							</td>
							<td class="prova">impractical</td>
						</tr>

						<tr class="dispari">
							<td class="prova">likeable</td>
							<td>
								<input type="Radio" id="Item9" name="Item9" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item9" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item9" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item9" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item9" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item9" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item9" value="7" required>
							</td>
							<td class="prova">disagreeable</td>
						</tr>

						<tr class="pari">
							<td class="prova">cumbersome</td>
							<td>
								<input type="Radio" id="Item10" name="Item10" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item10" name="Item10" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item10" name="Item10" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item10" name="Item10" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item10" name="Item10" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item10" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item10" value="7" required>
							</td>
							<td class="prova">straightforward</td>
						</tr>
						<tr class="dispari">
							<td class="prova">stylish</td>
							<td>
								<input type="Radio" id="Item1" name="Item11" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item11" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item11" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item11" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item11" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item11" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item11" value="7" required>
							</td>
							<td class="prova">tacky</td>
						</tr>

						<tr class="pari">
							<td class="prova">predictable</td>
							<td>
								<input type="Radio" id="Item1" name="Item12" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item12" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item12" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item12" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item12" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item12" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item12" value="7" required>
							</td>
							<td class="prova">unpredictable</td>
						</tr>

						<tr class="dispari">
							<td class="prova">cheap</td>
							<td>
								<input type="Radio" id="Item2" name="Item13" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item13" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item13" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item13" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item13" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item13" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item13" value="7" required>
							</td>
							<td class="prova">premium</td>
						</tr>

						<tr class="pari">
							<td class="prova">alienanting</td>
							<td>
								<input type="Radio" id="Item4" name="Item14" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item14" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item14" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item14" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item14" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item14" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item14" value="7" required>
							</td>
							<td class="prova">integrating</td>
						</tr>

						<tr class="dispari">
							<td class="prova">brings me closer to people</td>
							<td>
								<input type="Radio" id="Item5" name="Item15" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item15" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item15" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item15" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item15" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item15" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item15" value="7" required>
							</td>
							<td class="prova">separates me from people</td>
						</tr>

						<tr class="pari">
							<td class="prova">unpresentable</td>
							<td>
								<input type="Radio" id="Item6" name="Item16" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item16" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item16" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item16" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item16" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item16" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item16" value="7" required>
							</td>
							<td class="prova">presentable</td>
						</tr>

						<tr class="dispari">
							<td class="prova">rejecting</td>
							<td>
								<input type="Radio" id="Item7" name="Item17" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item17" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item17" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item17" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item17" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item17" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item17" value="7" required>
							</td>
							<td class="prova">inviting</td>
						</tr>

						<tr class="pari">
							<td class="prova">unimaginative</td>
							<td>
								<input type="Radio" id="Item8" name="Item18" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item18" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item18" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item18" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item18" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item18" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item18" value="7" required>
							</td>
							<td class="prova">creative</td>
						</tr>

						<tr class="dispari">
							<td class="prova">good</td>
							<td>
								<input type="Radio" id="Item9" name="Item19" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item19" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item19" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item19" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item19" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item19" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item19" value="7" required>
							</td>
							<td class="prova">bad</td>
						</tr>

						<tr class="dispari">
							<td class="prova">confusing</td>
							<td>
								<input type="Radio" id="Item1" name="Item20" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item20" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item20" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item20" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item20" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item20" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item20" value="7" required>
							</td>
							<td class="prova">clearly structured</td>
						</tr>
						<tr class="pari">
							<td class="prova">repelling</td>
							<td>
								<input type="Radio" id="Item1" name="Item21" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item21" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item21" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item21" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item21" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item21" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item21" value="7" required>
							</td>
							<td class="prova">appealing</td>
						</tr>

						<tr class="dispari">
							<td class="prova">bold</td>
							<td>
								<input type="Radio" id="Item2" name="Item22" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item22" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item22" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item22" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item2" name="Item22" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item22" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item22" value="7" required>
							</td>
							<td class="prova">cautious</td>
						</tr>

						<tr class="pari">
							<td class="prova">innovative</td>
							<td>
								<input type="Radio" id="Item4" name="Item23" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item23" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item23" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item23" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item4" name="Item23" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item23" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item23" value="7" required>
							</td>
							<td class="prova">conservative</td>
						</tr>

						<tr class="dispari">
							<td class="prova">dull</td>
							<td>
								<input type="Radio" id="Item5" name="Item24" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item24" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item24" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item24" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item5" name="Item24" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item24" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item24" value="7" required>
							</td>
							<td class="prova">captivating</td>
						</tr>

						<tr class="pari">
							<td class="prova">undemanding</td>
							<td>
								<input type="Radio" id="Item6" name="Item25" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item25" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item25" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item25" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item6" name="Item25" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item25" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item25" value="7" required>
							</td>
							<td class="prova">challenging</td>
						</tr>

						<tr class="dispari">
							<td class="prova">motivating</td>
							<td>
								<input type="Radio" id="Item7" name="Item26" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item26" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item26" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item26" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item7" name="Item26" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item26" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item26" value="7" required>
							</td>
							<td class="prova">discouraging</td>
						</tr>

						<tr class="pari">
							<td class="prova">novel</td>
							<td>
								<input type="Radio" id="Item8" name="Item27" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item27" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item27" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item27" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item8" name="Item27" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item27" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item27" value="7" required>
							</td>
							<td class="prova">ordinary</td>
						</tr>

						<tr class="dispari">
							<td class="prova">unruly</td>
							<td>
								<input type="Radio" id="Item9" name="Item28" value="1" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item28" value="2" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item28" value="3" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item28" value="4" required>
							</td>
							<td>
								<input type="Radio" id="Item9" name="Item28" value="5" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item28" value="6" required>
							</td>
							<td>
								<input type="Radio" id="Item1" name="Item28" value="7" required>
							</td>
							<td class="prova">manageable</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<button id="btnSubmit" type="submit" class="btn btn-success center-block">
				<span class="glyphicon glyphicon-ok"></span> Salva questionario
			</button>

		</div>
	</form>
</div>

<script>
	$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
		});

		
	$("form").submit(function(event){
		event.preventDefault();

		var formData = {
			'Item1' : $("input[name='Item1']:checked").val(),
			'Item2' : $("input[name='Item2']:checked").val(),
			'Item3' : $("input[name='Item3']:checked").val(),
			'Item4' : $("input[name='Item4']:checked").val(),
			'Item5' : $("input[name='Item5']:checked").val(),
			'Item6' : $("input[name='Item6']:checked").val(),
			'Item7' : $("input[name='Item7']:checked").val(),
			'Item8' : $("input[name='Item8']:checked").val(),
			'Item9' : $("input[name='Item9']:checked").val(),
			'Item10' : $("input[name='Item10']:checked").val(),
			'Item11' : $("input[name='Item11']:checked").val(),
			'Item12' : $("input[name='Item12']:checked").val(),
			'Item13' : $("input[name='Item13']:checked").val(),
			'Item14' : $("input[name='Item14']:checked").val(),
			'Item15' : $("input[name='Item15']:checked").val(),
			'Item16' : $("input[name='Item16']:checked").val(),
			'Item17' : $("input[name='Item17']:checked").val(),
			'Item18' : $("input[name='Item18']:checked").val(),
			'Item19' : $("input[name='Item19']:checked").val(),
			'Item20' : $("input[name='Item20']:checked").val(),
			'Item21' : $("input[name='Item21']:checked").val(),
			'Item22' : $("input[name='Item22']:checked").val(),
			'Item23' : $("input[name='Item23']:checked").val(),
			'Item24' : $("input[name='Item24']:checked").val(),
			'Item25' : $("input[name='Item25']:checked").val(),
			'Item26' : $("input[name='Item26']:checked").val(),
			'Item27' : $("input[name='Item27']:checked").val(),
			'Item28' : $("input[name='Item28']:checked").val()
		}

		console.log(formData);
		$.ajax({
			url: '{{route('partecipante.studio.questionario.aa.store', ['idstudio' => session()->get('id_studio_execute')])}}',
			type: 'POST',
			dataType: 'json',
			data: formData,
			success: function(data){
				console.log(data),
				$('#btnSubmit').attr("disabled", true);
				$('#btnSubmit').text("Inviato!");
			}
		});
	});

</script>
@endsection @section('navbar') @include('front.partecipante.studio.navbar') @endsection