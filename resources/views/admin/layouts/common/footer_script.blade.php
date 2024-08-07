<!-- Libs JS -->
<script src="{{asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487')}}" defer></script>
<script src="{{asset('dist/libs/jsvectormap/dist/maps/world.js?1692870487')}}" defer></script>
<script src="{{asset('dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487')}}" defer></script>
<!-- Tabler Core -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!--animation-->
<script>
	AOS.init();
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script src="{{asset('dist/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{asset('dist/js/demo.min.js?1692870487')}}" defer></script>


<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/wz96dir3qccs1frm29whhowfsscviapyi4afm64o6rtgm9h5/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
	$(document).ready(function() {
		document.querySelectorAll('textarea').forEach(textarea => {
			ClassicEditor
				.create(textarea)
				.catch(error => {
					console.error(error);
				});
		});
	});
</script>

<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function() {
		window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
			chart: {
				type: "radialBar",
				fontFamily: 'inherit',
				height: 40,
				width: 40,
				animations: {
					enabled: false
				},
				sparkline: {
					enabled: true
				},
			},
			tooltip: {
				enabled: false,
			},
			plotOptions: {
				radialBar: {
					hollow: {
						margin: 0,
						size: '75%'
					},
					track: {
						margin: 0
					},
					dataLabels: {
						show: false
					}
				}
			},
			colors: [tabler.getColor("blue")],
			series: [35],
		})).render();
	});
	// @formatter:on
</script>
<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function() {
		window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
			chart: {
				type: "area",
				fontFamily: 'inherit',
				height: 192,
				sparkline: {
					enabled: true
				},
				animations: {
					enabled: false
				},
			},
			dataLabels: {
				enabled: false,
			},
			fill: {
				opacity: .16,
				type: 'solid'
			},
			stroke: {
				width: 2,
				lineCap: "round",
				curve: "smooth",
			},
			series: [{
				name: "Purchases",
				data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
			}],
			tooltip: {
				theme: 'dark'
			},
			grid: {
				strokeDashArray: 4,
			},
			xaxis: {
				labels: {
					padding: 0,
				},
				tooltip: {
					enabled: false
				},
				axisBorder: {
					show: false,
				},
				type: 'datetime',
			},
			yaxis: {
				labels: {
					padding: 4
				},
			},
			labels: [
				'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
			],
			colors: [tabler.getColor("primary")],
			legend: {
				show: false,
			},
			point: {
				show: false
			},
		})).render();
	});
	// @formatter:on
</script>
<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function() {
		window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
			chart: {
				type: "line",
				fontFamily: 'inherit',
				height: 24,
				animations: {
					enabled: false
				},
				sparkline: {
					enabled: true
				},
			},
			tooltip: {
				enabled: false,
			},
			stroke: {
				width: 2,
				lineCap: "round",
			},
			series: [{
				color: tabler.getColor("primary"),
				data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
			}],
		})).render();
	});
	// @formatter:on
</script>
<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function() {
		window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
			chart: {
				type: "line",
				fontFamily: 'inherit',
				height: 24,
				animations: {
					enabled: false
				},
				sparkline: {
					enabled: true
				},
			},
			tooltip: {
				enabled: false,
			},
			stroke: {
				width: 2,
				lineCap: "round",
			},
			series: [{
				color: tabler.getColor("primary"),
				data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
			}],
		})).render();
	});
	// @formatter:on
</script>
<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function() {
		window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
			chart: {
				type: "line",
				fontFamily: 'inherit',
				height: 24,
				animations: {
					enabled: false
				},
				sparkline: {
					enabled: true
				},
			},
			tooltip: {
				enabled: false,
			},
			stroke: {
				width: 2,
				lineCap: "round",
			},
			series: [{
				color: tabler.getColor("primary"),
				data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
			}],
		})).render();
	});
	// @formatter:on
</script>
<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function() {
		window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
			chart: {
				type: "line",
				fontFamily: 'inherit',
				height: 24,
				animations: {
					enabled: false
				},
				sparkline: {
					enabled: true
				},
			},
			tooltip: {
				enabled: false,
			},
			stroke: {
				width: 2,
				lineCap: "round",
			},
			series: [{
				color: tabler.getColor("primary"),
				data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
			}],
		})).render();
	});
	// @formatter:on
</script>
<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function() {
		window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
			chart: {
				type: "line",
				fontFamily: 'inherit',
				height: 24,
				animations: {
					enabled: false
				},
				sparkline: {
					enabled: true
				},
			},
			tooltip: {
				enabled: false,
			},
			stroke: {
				width: 2,
				lineCap: "round",
			},
			series: [{
				color: tabler.getColor("primary"),
				data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
			}],
		})).render();
	});
	// @formatter:on
</script>
<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function() {
		window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
			chart: {
				type: "line",
				fontFamily: 'inherit',
				height: 24,
				animations: {
					enabled: false
				},
				sparkline: {
					enabled: true
				},
			},
			tooltip: {
				enabled: false,
			},
			stroke: {
				width: 2,
				lineCap: "round",
			},
			series: [{
				color: tabler.getColor("primary"),
				data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
			}],
		})).render();
	});
	// @formatter:on
</script>
<script>
	$(document).ready(function() {
		$(".select2").select2();
	});
</script>

<script>
	function checkAll(filterClass) {
		// Get the "Check All" checkbox and all other checkboxes
		const checkAllCheckbox = document.querySelector(`.${filterClass} #checkAll`);
		const checkboxes = document.querySelectorAll(`.${filterClass} .form-check-input:not(.check-all)`);

		// Add event listener to the "Check All" checkbox
		checkAllCheckbox.addEventListener('change', function() {
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = checkAllCheckbox.checked;
			});
		});

		// Add event listener to other checkboxes to uncheck "Check All" if any checkbox is unchecked
		checkboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				if (!this.checked) {
					checkAllCheckbox.checked = false;
				}
			});
		});
	}
</script>

<script>
	$(function() {
		$('.toggole-class').change(function() {
			var status = $(this).prop('checked') == true ? 1 : 0;
			var id = $(this).data('id');
			var type = $(this).data('type');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "{{url('admin/changestatus')}}",
				data: {
					'status': status,
					'id': id,
					'type': type
				},
				success: function(data) {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						text: data.success,
					});
					setTimeout(function() {
						window.location.reload();
					}, 3000);


				}
			});
		})
	})

	$(function() {
		$('.toggole-recommened').change(function() {
			var status = $(this).prop('checked') == true ? 1 : 0;
			var id = $(this).data('id');
			var type = $(this).data('type');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "{{url('admin/changerecommened')}}",

				data: {
					'recommened': status,
					'id': id,
					'type': type
				},
				success: function(data) {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						text: data.success,
					});
					setTimeout(function() {
						window.location.reload();
					}, 3000);


				}
			});
		})
	})

	$(function() {
		$('.toggole-trackfooter').change(function() {
			var status = $(this).prop('checked') == true ? 1 : 0;
			var id = $(this).data('id');
			var type = $(this).data('type');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "{{url('admin/changetrackfooter')}}",

				data: {
					'in_footer': status,
					'id': id,
					'type': type
				},
				success: function(data) {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						text: data.success,
					});
					setTimeout(function() {
						window.location.reload();
					}, 3000);


				}
			});
		})
	})
</script>


<!-- Buttons -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/colvis/1.1.2/js/dataTables.colVis.min.js"></script>



<script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>

<script>
	$(document).ready(function() {
		$('.select2').select2();
	});
	$(document).ready(function() {

		let categoryCards = document.querySelector('.categoryCards');
		let rowsCards = document.querySelector('.rowsCards');
		let paginationCards = document.querySelectorAll('#paginationCard .card_pagination');
		let paginationCardsImg = document.querySelectorAll('#paginationCard .paginationCardImg');
		let paginationCardsData = document.querySelectorAll('#paginationCard .paginationCardData');

		rowsCards.addEventListener('click', function() {
			categoryCards.classList.remove('active');
			rowsCards.classList.add('active');

			paginationCards.forEach(paginationCard => {
				paginationCard.classList.add('col-sm-12');
			});
			paginationCardsImg.forEach(paginationCardImg => {
				paginationCardImg.classList.remove('col-12');
				paginationCardImg.classList.add('col-4');
			});
			paginationCardsData.forEach(paginationCardData => {
				paginationCardData.classList.remove('col-12');
				paginationCardData.classList.add('col-8');
			});

			let paginationCardsDesc = document.querySelectorAll('#paginationCard article p');

			paginationCardsDesc.forEach(paginationCardDesc => {
				paginationCardDesc.style.cssText = 'white-space: normal;';
			});
		});

		categoryCards.addEventListener('click', function() {
			rowsCards.classList.remove('active');
			categoryCards.classList.add('active');

			paginationCards.forEach(paginationCard => {
				paginationCard.classList.remove('col-sm-12');

				paginationCardsImg.forEach(paginationCardImg => {
					paginationCardImg.classList.remove('col-4');
					paginationCardImg.classList.add('col-12');
				});
				paginationCardsData.forEach(paginationCardData => {
					paginationCardData.classList.remove('col-8');
					paginationCardData.classList.add('col-12');
				});
			});

			let paginationCardsDesc = document.querySelectorAll('#paginationCard article p');

			paginationCardsDesc.forEach(paginationCardDesc => {
				paginationCardDesc.style.cssText = 'white-space: nowrap;';
			});
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#track_id').on('change', function() {
			var track_id = $(this).val();
			if (track_id) {
				$.ajax({
					url: "{{ route('admin.getCourses') }}",
					type: "GET",
					data: {
						'track_id': track_id
					},
					dataType: "json",
					success: function(data) {
						var html = '<option value="">Select Course</option>';
						$.each(data, function(index, value) {
							html += '<option value="' + value.id + '">' + value.name + '</option>';
						});
						$('#courses').html(html);
					}
				})
			}
		});

		$('#track_id').on('change', function() {
			var track_id = $(this).val();
			if (track_id) {
				$.ajax({
					url: "{{ route('admin.getCourses') }}",
					type: "GET",
					data: {
						'track_id': track_id
					},
					dataType: "json",
					success: function(data) {
						var html = '<option value="">Select Course</option>';
						$.each(data, function(index, value) {
							html += '<option value="' + value.id + '">' + value.name + '</option>';
						});
						$('#course_id').html(html);
					}
				})
			}
		});
		$('#course_id').on('change', function() {
			var course_id = $(this).val();
			if (course_id) {
				$.ajax({
					url: "{{ route('admin.getLevels') }}",
					type: "GET",
					data: {
						'course_id': course_id
					},
					dataType: "json",
					success: function(data) {
						var html = '<option value="">Select Level</option>';
						$.each(data, function(index, value) {
							html += '<option value="' + value.id + '">' + value.name + '</option>';
						});
						$('#levels').html(html);
					}
				})
			}
		});
		$('#levels').on('change', function() {
			var level_id = $(this).val();
			if (level_id) {
				$.ajax({
					url: "{{ route('admin.getLectures') }}",
					type: "GET",
					data: {
						'level_id': level_id
					},
					dataType: "json",
					success: function(data) {
						var html = '<option value="">Select Lecture</option>';
						$.each(data, function(index, value) {
							html += '<option value="' + value.id + '">' + value.title + '</option>';
						});
						$('#lectures').html(html);
					}
				})
			}
		});

		$('#courses').on('change', function() {
			var course_id = $(this).val();
			if (course_id) {
				$.ajax({
					url: "{{ route('admin.getcourse') }}",
					type: "GET",
					data: {
						'course_id': course_id
					},
					dataType: "json",
					success: function(data) {
						$('#course_price').val(data.price_with_discount);
						$('#course_main_price').val(data.price);


					}
				})
			}
		});


		document.querySelector('#start_date').addEventListener('keydown', (e) => {
			e.preventDefault();
		});
		document.querySelector('#end_date').addEventListener('keydown', (e) => {
			e.preventDefault();
		});
		document.querySelector('#published_at').addEventListener('keydown', (e) => {
			e.preventDefault();
		});
	});
</script>
</script>
<script>
	$(document).ready(function() {
		$('#isemployee').on('change', function() {
			var is_emp = $(this).val();
			if (is_emp == 1) {
				$('#empsalary').removeAttr('readonly');
			} else {
				$('#empsalary').attr('readonly', 'readonly');
				$('#empsalary').val(0);
			}

		});
	});
</script>

<script>
	$(document).ready(function() {

		$('#flexHasLevelSwitchCheckDefault').on('change', function() {
			if ($(this).is(':checked')) {
				const myDiv = document.getElementById('bankgroupsList');
				myDiv.style.display = 'none';

			} else {
				const myDiv = document.getElementById('bankgroupsList');
				myDiv.style.display = 'block';

			}
		});
	});
</script>

<!-- <script>
	$('document').ready(function() {
		const passwordField = document.getElementById("password");
		const togglePassword = document.querySelector(".password-toggle-icon");

		togglePassword.addEventListener("click", function() {
			if (passwordField.type === "password") {
				passwordField.type = "text";
				togglePassword.classList.remove("eye-icon");
				togglePassword.classList.add("fa-eye-slash");
			} else {
				passwordField.type = "password";
				togglePassword.classList.remove("fa-eye-slash");
				togglePassword.classList.add("eye-icon");
			}
		});

		const passwordConfirmationField = document.getElementById("password_confirmation");
		const togglePasswordconfirmation = document.querySelector(".password-confirmation-toggle-icon");

		togglePasswordconfirmation.addEventListener("click", function() {
			if (togglePasswordconfirmation.type === "password") {
				togglePasswordconfirmation.type = "text";
				togglePasswordconfirmation.classList.remove("eye-icon");
				togglePasswordconfirmation.classList.add("fa-eye-slash");
			} else {
				togglePasswordconfirmation.type = "password";
				togglePasswordconfirmation.classList.remove("fa-eye-slash");
				togglePasswordconfirmation.classList.add("eye-icon");
			}
		});
	});
</script> -->



