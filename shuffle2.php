<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = array(); // 추첨번호 배열 선언
    $room_number = array(); // 세대창고 번호 배열 선언

    // textarea에 입력된 값 가져오기
    $input_text = $_POST['textarea_input'];
    // 각 줄을 배열로 변환
    $number = explode("\n", trim($input_text)); // 입력된 값을 줄별로 배열로 변환

    // 배열의 크기가 348이 아니면 메시지 박스를 띄우고 엑셀 생성 중단
    if (count($number) != 348) {
        echo "<script>alert('입력된 값이 348개가 아닙니다. 다시 확인해주세요.');
		 window.location.href = 'http://gangseoapt.dothome.co.kr';
		</script>";
		
    } else {
        // 세대창고 번호 1~348 room_number 변수에 push
        for($i=1; $i<=348; $i++) {
            array_push($room_number, $i);
        }
        shuffle($room_number); // 세대창고 배열 섞기

        /*
        섞은 세대창고 번호표와 추첨번호표 엑셀 저장
        */

        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=추첨결과.xls");
        header("Content-Description: PHP Generated Data");
        ?>
        <table>
        <thead>
        <tr>
        <th scope="col">번호표</th>
        <th scope="col">계절창고번호</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($i=0; $i < count($number); $i++) { // $number 배열의 크기만큼 반복
        ?>
        <tr>
            <td><?= trim($number[$i]) ?></td> <!-- 각 줄의 공백 제거 -->
            <td><?= $room_number[$i] ?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
        </table>
        <?php
        exit; // HTML 폼이 표시되지 않도록 스크립트 종료
    }
}
?>
