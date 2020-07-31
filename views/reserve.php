<script>document.querySelectorAll(".nav-link")[2].classList.add("active");</script>
<script src="/js/BoothReserveApp.js"></script>
<div class="popup friend_popup">
	<input type="hidden" id="user_id" value="<?= $_SESSION['user']->id ?>">
	<div class="popup_container friend_popup_container">
		<div class="div-wrapper">
			<h3 align="center">함께 참여할 사람</h3>
			<div class="input-group mt-3">
				<input type="text" class="form-control" id="friend_add_input" placeholder="ID 입력">
				<button class="ml-2 btn btn-primary" id="friend_add_btn">추가</button>
			</div>
			<div class="row">
				<h4 class="col-12 mt-2" align="center">함께 참여할 사람 목록</h4>
				<div class="col-12 friend_list">
					<!-- <p>엄준식</p> -->
				</div>
			</div>
			<div class="row">
				<button class="btn btn-danger ml-auto mr-3" id="friend_close_btn">닫기</button>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-6 mt-5">
		<h4>부스 지도</h4>
		<canvas width="400" height="400" id="map"></canvas>
	</div>
	<div class="col-6 mt-5">
		<form onsubmit="return reserve_submit();">
			<input type="hidden" id="booth_idx">
			<h4>입력 폼</h4>
			<div class="form-group">
				<label for="info_name">부스 이름</label>
				<input type="text" class="form-control" id="info_name" readonly>
			</div>
			<div class="form-group">
				<label for="info_price">부스 이용료</label>
				<input type="text" class="form-control" id="info_price" readonly>
			</div>
			<div class="row">
				<button type="button" class="ml-2 btn btn-secondary" id="btn_attend_step_1">부스 참여 신청</button>
				<button type="button" class="ml-2 btn btn-info" id="btn_attend_step_2">함께 참여할 수 있는 사람 추가</button>
				<button type="submit" class="ml-2 btn btn-primary" id="btn_attend_step_3">예약 신청</button>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<button class="btn btn-info mt-4 ml-3" id="auto_btn">자동 부스 신청</button>
</div>
<div class="row mt-4 auto_list display-flex">
	
</div>
<div class="row">
	<button class="btn btn-primary mt-4 ml-3" id="auto_reserve_btn">일괄 예약</button>
</div>

<script>
	let list = <?= json_encode($list,JSON_UNESCAPED_UNICODE) ?>
</script>
<script>
	let booths = <?= json_encode($booths,JSON_UNESCAPED_UNICODE) ?>
</script>