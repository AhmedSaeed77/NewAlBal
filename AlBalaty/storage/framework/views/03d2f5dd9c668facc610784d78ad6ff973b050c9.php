
<?php $__env->startSection('content'); ?>
	<div class="tab d-flew justify-content-between" id="tab">
		<div class="card " style="width: 25rem;" onclick="openCity('teacher')">
			<div class="card-body">
				<h1 class="card-title">
					معلم
				</h1>
			</div>
		</div>
		<div class="card " style="width: 25rem;" onclick="openCity('student')">
			<div class="card-body">
				<h1>طالب</h1>
			</div>
		</div>
	</div>
	<div id="student" class="tabcontent mt-4 ">
		<div class="container h-p100" id="student" class="tabcontent">
			<div class="row align-items-center justify-content-md-center h-p100">

				<div class="col-12">
					<div class="row justify-content-center no-gutters">
						<div class="col-lg-5 col-md-5 col-12 w-800">
							<div class="bg-white rounded30 shadow-lg ">
								<div class="content-top-agile p-20 pb-0">
									<h2 class="text-primary">تسجيل كطالب</h2>

								</div>
								<div class="px-40 py-20">
									<form action="<?php echo e(route('register')); ?>" method="post">
										<?php echo csrf_field(); ?>
										<?php if(count($errors) > 0): ?>
											<div class="alert alert-warning" style="list-style:none;">
												<strong>Whoops!</strong> There were some problems with your input.<br><br>
												<ul>
													<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li><?php echo e($error); ?></li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
											</div>
										<?php endif; ?>
										<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3" >
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
													</div>
													<input type="text" name="name" class="form-control pl-15 bg-transparent h-40" placeholder="الأسم رباعى" style="border-radius:5px;" required>
												</div>
											</div>
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3">
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent"><i class="ti-mobile"></i></span>

													</div>
													<input type="text" name="phone" id="phone" class="form-control pl-15 bg-transparent h-40" placeholder="رقم الهاتف" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="border-radius:5px;"required >
												</div>
											</div>
											
										</div>
										<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
										<div class="form-group"style="width:100%;">
												<div class="input-group mb-3" style="direction:ltr"> 
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>

													</div>
													<input type="email" name="email"  class="form-control pl-15 bg-transparent h-40" placeholder="Email" style="border-radius:5px;text-align: left !important" required>
												</div>
											</div>

										</div>


										<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3">
												<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="fa fa-eye-slash" style="cursor:pointer" onclick="myFunction3()"></i></span>

													</div>
													<input id="pass3" type="password" name="password" class="form-control pl-15 bg-transparent" placeholder="كلمه المرور" style="border-radius:5px;" required value="">
												</div>
											</div>
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3">
												<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="fa fa-eye-slash" style="cursor:pointer" onclick="myFunction4()"></i></span>

													</div>
													<input id="pass4" type="password" name="password_confirmation"  class="form-control pl-15 bg-transparent" placeholder="تأكيد كلمة المرور" style="border-radius:5px;" required>
												</div>
											</div>
										</div>

										<div class="row" >
											<div class="col-12 text-center">
												<button type="submit" class="btn btn-info margin-top-10 w-150">التسجيل الأن</button>
											</div>
										</div>
									</form>
									<div class="text-center">
										<p class="mt-15 mb-0">لدى حساب بالفعل ؟<a href="<?php echo e(route('login')); ?>" class="text-danger ml-5"> تسجيل الدخول </a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="teacher" class="tabcontent mt-4">
		<div class="container h-p100" id="teacher" >
			<div class="row align-items-center justify-content-md-center h-p100">

				<div class="col-12">
					<div class="row justify-content-center no-gutters">
						<div class="col-lg-5 col-md-5 col-12 w-800">
							<div class="bg-white rounded30 shadow-lg ">
								<div class="content-top-agile p-20 pb-0">
									<h2 class="text-primary">تسجيل كمعلم</h2>

								</div>
								<div class="px-40 py-20 ">
									<form action="<?php echo e(route('teacher.register.post')); ?>" method="post" >
										<?php echo csrf_field(); ?>
										<?php if(count($errors) > 0): ?>
											<div class="alert alert-warning" style="list-style:none;">
												<strong>Whoops!</strong> There were some problems with your input.<br><br>
												<ul>
													<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li><?php echo e($error); ?></li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
											</div>
										<?php endif; ?>
										<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3" >
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="ti-user"></i></span>
													</div>
													<input type="text" class="form-control pl-15 bg-transparent" name="name" placeholder="الأسم رباعى" style="border-radius:5px;"required >
												</div>
											</div>
											<div class="form-group"style="width:100%;direction: ltr;">
												<div class="input-group mb-3">
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="ti-email"></i></span>

													</div>
													<input type="email" class="form-control pl-15 bg-transparent ltr" dir="auto" name="email"  placeholder="Email" style="border-radius:5px; text-align: left !important" required>
												</div>
											</div>
										</div>
										<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3">
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="ti-mobile"></i></span>

													</div>
													<input type="text" id="phone" class="form-control pl-15 bg-transparent" name="phone"  placeholder="رقم الهاتف" style="border-radius:5px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="border-radius:5px;" required>
												</div>
											</div>


										</div>
										<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3">
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="ti-menu"></i></span>

													</div>
													<select id="country" name="country" class="form-control pl-15 bg-transparent" required>
														<option value="" disabled selected >الدوله</option>
														<?php $__currentLoopData = \App\Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
											</div>
										</div>
						
										<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
											<div class="form-group" style="width:100%;position:relative">
												<div class="input-group mb-3">
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="fa fa-eye-slash" style="cursor:pointer" onclick="myFunction1()"></i></span>

													</div>
													<input id="pass1" type="password" name="password" class="form-control pl-15 bg-transparent" placeholder="كلمه المرور" style="border-radius:5px;" required value="">

												</div>
											</div>

											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3">
													<div class="input-group-prepend ps-5">
													<span class="input-group-text bg-transparent h-40"><i class="fa fa-eye-slash" style="cursor:pointer" onclick="myFunction2()"></i></span>
													</div>
													<input id="pass2" type="password" name="password_confirmation"  class="form-control pl-15 bg-transparent" placeholder="تأكيد كلمة المرور" style="border-radius:5px;" required>
												</div>
											</div>
										</div>
										<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3" >
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="ti-user"></i></span>
													</div>
													<input type="text" name="describtion" class="form-control pl-15 bg-transparent" placeholder="المؤهلات والشهادات" style="border-radius:5px;" required>
												</div>
											</div>
										</div>
										<div id="tbody" ></div>
										<div  class=" "style="padding-top:40px;">

											<div  style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
												<div class="form-group" style="width:100%;">
													<div class="input-group mb-3">
														<div class="input-group-prepend ps-5">
															<span class="input-group-text bg-transparent h-40"><i class="ti-menu"></i></span>
														</div>
														<select name="path[]" id="path" class="form-control pl-15 bg-transparent" required>
															<option value="" disabled selected >المراحل التعليميه </option>

														</select>

													</div>
												</div>
												<div class="form-group" style="width:100%;">
													<div class="input-group mb-3">
														<div class="input-group-prepend ps-5">
															<span class="input-group-text bg-transparent h-40"><i class="ti-menu"></i></span>
														</div>
														<select id="course" name="course[]" class="form-control pl-15 bg-transparent" required>
															<option value="" disabled selected > السنه الدراسيه</option>

														</select>
													</div>
												</div>
											</div>
											<div class="form-group" style="width:100%;">
												<div class="input-group mb-3">
													<div class="input-group-prepend ps-5">
														<span class="input-group-text bg-transparent h-40"><i class="ti-menu"></i></span>

													</div>
													<select id="lesson" name="lesson[]" class="form-control pl-15 bg-transparent" required>
														<option value="" disabled selected > الماده</option>
													</select>
													<button type="button" class="btn btn-info me-1"  id="addBtn"><i class="fa fa-plus"></i></button>
												</div>

											</div>
										</div>

										<div class="row" >
											<div class="col-12">
												<div class="checkbox text-center">
													<input type="checkbox" id="basic_checkbox_1" required >
													<label for="basic_checkbox_1">أوافق على شروط الإستخدام&nbsp;<a href="#" class="text-warning "><b>شروط الإستخدام </b></a></label>

												</div>
											</div>
											<!-- /.col -->
											<div class="col-12 text-center">
												<button type="submit" class="btn btn-info margin-top-10">التسجيل الأن</button>
											</div>
											<!-- /.col -->
										</div>
									</form>
									<div class="text-center">
										<p class="mt-15 mb-0">لدى حساب بالفعل ؟<a href="<?php echo e(route('login')); ?>" class="text-danger ml-5"> تسجيل الدخول </a></p>
									</div>
								</div>
							</div>

							<!-- <div class="text-center">
							<p class="mt-20 text-white">-التسجيل عبر-</p>
							<p class="gap-items-2 mb-20">
								<a class="btn btn-social-icon btn-round btn-facebook" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
								<a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
								<a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
								</p>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

function myFunction1() {
  var x = document.getElementById("pass1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("pass2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


function myFunction3() {
  var x = document.getElementById("pass3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


function myFunction4() {
  var x = document.getElementById("pass4");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

var rowIdx = 0;

// jQuery button click event to add a row.
$('#addBtn').on('click', function () {

	// Adding a row inside the tbody.
	$('#tbody').append(`
			<section class="col-12 my-2"style="padding-top: 40px;" id="R${++rowIdx}">
				<div style="display:flex; justify-content: space-between; align-items: center; column-gap:15px;">
									<div class="form-group" style="width:100%;">
										<div class="input-group mb-3">
											<div class="input-group-prepend ps-5">
												<span class="input-group-text bg-transparent h-40"><i class="ti-menu"></i></span>
											</div>
											<select name="path[]" id="path${rowIdx}" class="form-control pl-15 bg-transparent" required>
											<option value="" disabled selected >المراحل التعليميه </option>
												<?php $__currentLoopData = \App\Models\Library\Path::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<option value="<?php echo e($country->id); ?>"><?php echo e($country->title); ?></option>
												 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>

</div>
</div>
<div class="form-group" style="width:100%;">
<div class="input-group mb-3">
	<div class="input-group-prepend ps-5">
		<span class="input-group-text bg-transparent h-40"><i class="ti-menu"></i></span>
	</div>
	<select id="course${rowIdx}"  name="course[]" class="form-control pl-15 bg-transparent" required>
												<option value="" disabled selected >الصف الدراسى</option>

											</select>
										</div>
									</div>
								</div>
								<div class="form-group" style="width:100%;">
									<div class="input-group mb-3">
										<div class="input-group-prepend ps-5">
											<span class="input-group-text bg-transparent h-40"><i class="ti-menu"></i></span>

										</div>
										<select id="lesson${rowIdx}" name="lesson[]" class="form-control pl-15 bg-transparent" required>
											<option value="" disabled selected>الماده الدراسيه</option>

										</select>
										<button  type="button"  class=" remove btn btn-danger me-1 " >
												<i class="fa fa-minus "></i>
									</button>
									</div>

								</div>

			</section>
			`);
	$("#course"+rowIdx).change(function(){
		let country_id = this.value;
		$.get('<?php echo e(route('get.course-parts')); ?>?country_id='+country_id,function(data){
			$('#lesson'+rowIdx).html(data);
		});
	});
	$('#path'+rowIdx).change(function(){
		let country_id = this.value;
		$.get('<?php echo e(route('get.path-courses')); ?>?country_id='+country_id,function(data){
			$('#course'+rowIdx).html(data);
		});
	});

	


});

$('#tbody').on('click', '.remove', function () {

	// Getting all the rows next to the
	// row containing the clicked button
	var child = $(this).closest('section').nextAll();

	// Iterating across all the rows
	// obtained to change the index
	child.each(function () {

		// Getting <tr> id.
		var id = $(this).attr('id');

		// Getting the <p> inside the .row-index class.
		var idx = $(this).children('.row-index').children('section');

		// Gets the row number from <tr> id.
		var dig = parseInt(id.substring(1));

		// Modifying row index.
		idx.html(`Row ${dig - 1}`);

		// Modifying row id.
		$(this).attr('id', `R${dig - 1}`);
	});

	// Removing the current row.
	$(this).closest('section').remove();

	// Decreasing the total number of rows by 1.
	rowIdx--;
});


</script>


<script>
	$(document).ready(function(){
		$('#country').change(function(){
		let country_id = this.value;
		$.get('<?php echo e(route('get.paths')); ?>?country_id='+country_id,function(data){
			$('#path').html(data);
		});

		});

		$('#path').change(function(){
		let path_id = this.value;
		$.get('<?php echo e(route('get.path-courses')); ?>?country_id='+path_id,function(data){
			$('#course').html(data);
		});

		});

	});

$(document).ready(function(){
	$('#course').change(function(){
		let country_id = this.value;
		$.get('<?php echo e(route('get.course-parts')); ?>?country_id='+country_id,function(data){
			$('#lesson').html(data);
		});
	});
});

$(document).ready(function(){
	$('#path_student').change(function(){
		let country_id = this.value;
		$.get('<?php echo e(route('get.path-courses')); ?>?country_id='+country_id,function(data){
			$('#course_student').html(data);
		});
	});

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>