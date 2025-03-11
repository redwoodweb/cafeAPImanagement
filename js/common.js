async function fetchProductData() {
  try {
    const response = await fetch('./getdb.php');
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }

    const data = await response.json(); // JSON 응답을 파싱
    const jsonData = JSON.stringify(data, null, 2); // JSON 데이터를 보기 좋게 표시

    let pdImg = 'Product Image',
      pdName = 'Product Name',
      pdPrice = 'Price';
    deletePd = 'delete';

    // 가격 3자리 콤마찍기 함수
    function addkomma(el) {
      if (typeof el === 'number') {
        let changeType = el.toLocaleString(); //komma찍기
        return changeType;
      }
    }
    // 가져오 데이터 보기
    // console.log(jsonData);

    //   data 항목에 맞게 정렬하여 가져오기 순서: 이미지, 상품명, 가격
    let dataList = [];
    data.products.forEach((el, i) => {
      let arrayList = [];
      for (let key in el) {
        if (key === 'list_image') {
          arrayList[0] = el[key];
        } else if (key === 'product_name') {
          arrayList[1] = el[key];
        } else if (key === 'price') {
          arrayList[2] = `${addkomma(Math.floor(el[key]))}원`;
        } else if (key === 'product_no') {
          arrayList[3] = el[key];
        }
      }
      dataList.push(arrayList);
    });

    // body에 추가할 요소를 조합
    let addDbContents = `<thead><tr><th scope="col">#</th><th scope="col">${pdImg}</th><th scope="col">${pdName}</th><th scope="col">${pdPrice}</th><th scope="col">${deletePd}</th></tr></thead><tbody>`;
    // 순서에 맞게 정렬하여 가져오 데이터를 태그와 조합하여 아래와 같이 출력
    for (const index in dataList) {
      addDbContents += `<tr><th scope="row">${Math.floor(index) + 1}</th>`;
      for (const [i, list] of dataList[index].entries()) {
        // 순서가 없는 객체타입의 데이터를 인덱스값을 부여하여 가져오기 : entries() 사용
        //   console.log(i);
        if (i == 0) {
          addDbContents += `<td><img src="${list}"></td>`;
        } else if (i == 3) {
          addDbContents += `<td><button type="button" class="btn btn-danger" data-pdno="${list}">delete</button></td>`;
        } else {
          addDbContents += `<td>${list}</td>`;
        }
      }
      addDbContents += `</tr>`;
    }
    addDbContents += '</tbody>';
    //body 요소 추가
    document.getElementById('pddata').innerHTML = addDbContents;
  } catch (error) {
    // error 캐치
    console.error('Fetch error:', error);
  }
}

document.querySelector('#pddata').addEventListener('click', function (e) {
  let pdNo = e.target.getAttribute('data-pdno');
  if (pdNo) {
    let check = confirm(
      `이 상품을 삭제 하시겠습니까? 삭제이후 복구할 수 없습니다. 삭제를 원하시면 '확인' 버튼을 눌러주세요.`
    );
    if (check) {
      console.log('삭제');
      document.location.href = `./delpd.php?pd_no=${pdNo}`;
    } else {
      console.log('삭제 하지않음' + pdNo);
    }
  }
});
