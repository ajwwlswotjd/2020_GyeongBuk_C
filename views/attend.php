<script src="/js/AttendApp.js"></script>
<?php use Gondr\DB; ?> 
<?php if(count($unSignedList) != 0) : ?>
<div class="row">
	<h4 class="col-12 mt-5">다른사용자가 함께 참여할 수 있는 사람으로 등록</h4>
    <table class="table table-stripe col-12 mt-2">
        <thead align="center">
            <tr>
                <th scope="col" colspan="2" width="25%">함께 신청한 유저</th>
                <th scope="col" width="20%">부스명</th>
                <th scope="col" width="30%">추천 연령대</th>
                <th scope="col" width="10%">추천 성별</th>
                <th scope="col" colspan="2" width="15%">기능</th>
            </tr>
        </thead>
        <tbody align="center">
        	<?php foreach ($unSignedList as $item) : ?>
			<?php
				// $item == $reservation
				$sql = "SELECT * FROM `common_user` WHERE `idx` = ?";
				$applicant = DB::fetch($sql,[$item->applicant_idx]);

				$sql = "SELECT * FROM `booth` WHERE `idx` = ?";
				$booth = DB::fetch($sql,[$item->booth_idx]);

			?>
            <tr>
                <td scope="row"><?= htmlentities($applicant->name) ?></td>
                <td><?= htmlentities($applicant->id) ?></td>
                <td><?= htmlentities($booth->name) ?></td>
                <td><?= htmlentities($booth->age) ?></td>
                <td><?= htmlentities($booth->gender == "female" ? "여" : "남") ?></td>
                <td>
                	<button data-fx="accept" data-idx="<?= $item->idx ?>" class="btn btn-primary btn-fx">승인</button>
                </td>
                <td>
                	<button data-fx="reject" data-idx="<?= $item->idx ?>" class="btn btn-danger btn-fx">거절</button>
                </td>
            </tr>

        	<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
<div class="row">
	<h4 class="col-12 mt-5">참여한 부스 목록</h4>
	<table class="table table-dark table-stripe col-12 mt-2">
		<thead align="center" valign="center">
			<tr>
				<th scope="col" width="5%">직접신청여부</th>
				<th scope="col" width="15%">신청자 아이디</th>
                <th scope="col" width="15%">부스 이름</th>
                <th scope="col" width="25%">추천 연령대</th>
                <th scope="col" width="10%">추천 성별</th>
                <th scope="col" width="20%">부스 위치</th>
			</tr>
		</thead>
		<tbody align="center">
			<?php foreach($signedList as $item) : ?>
			<?php
				$sql = "SELECT * FROM `common_user` WHERE `idx` = ?";
				$applicant = DB::fetch($sql,[$item->applicant_idx]);

				$sql = "SELECT * FROM `booth` WHERE `idx` = ?";
				$booth = DB::fetch($sql,[$item->booth_idx]);

				$direct = $item->applicant_idx == $item->user_idx;

				$arr = array();
				$position = $booth->position;
				for($i = 0; $i <= $booth->type; $i++){
					$x = explode(",", $position)[0];
					$y = explode(",", $position)[1];
					$str = '(' . (int)($x+$i) . ',' . $y . ')';
					array_push($arr, $str);
				}
				$locate = implode(",", $arr);
			?>
			<tr>
				<td scope="row"><?= $direct ? "Y" : "N" ?></td>
				<td><?= htmlentities($applicant->name); ?></td>
				<td><?= htmlentities($booth->name); ?></td>
				<td><?= htmlentities($booth->age); ?></td>
				<td><?= htmlentities($booth->gender == "female" ? "여" : "남") ?></td>
				<td><?= htmlentities($locate); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>