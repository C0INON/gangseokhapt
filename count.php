<?php
$people = isset($_GET['people']) ? (int)$_GET['people'] : 244;
$number = isset($_GET['number']) ? (int)$_GET['number'] : 144;

$number_array = range(1, $people); // 지정한 인원수 만큼 배열 생성
$room_number = array_fill(0, $people, ''); // 기본값은 빈 문자열로 설정

// 랜덤으로 144개의 인덱스를 선택하여 해당 인덱스에만 'O'를 설정
$selectedIndexes = array_rand($room_number, $number);
if (!is_array($selectedIndexes)) {
    $selectedIndexes = [$selectedIndexes]; // array_rand가 1개를 선택했을 때의 예외 처리
}

foreach ($selectedIndexes as $index) {
    $room_number[$index] = 'O';
}

header( "Content-type: application/vnd.ms-excel; charset=utf-8");
header( "Content-Disposition: attachment; filename = 추첨결과.xls" );
header( "Content-Description: PHP4 Generated Data" );
			?>
            <table>
			<thead>
			<tr>
			<th scope="col">번호표</th>
			<th scope="col">당첨자</th>
			</tr>
			</thead>
			<tbody>
			<?php
			for($i=0; $i<=$people;$i++) {
				if($room_number[$i] == "O"){
			?>
			<tr>
				<td><?=trim($_GET['division'],'"');?><?=$number_array[$i]?></td>
				<td><?=$room_number[$i]?></td>
			</tr>
			<?php
				}
			}
			?>
			</tr>
			</tbody>
			</table>
			
			<script>
        window.onload = function() {
            var audio = new Audio('start.mp3');
            audio.play();
        };
    </script>
	
	